<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        // $courses = DB::select("SELECT orders.course_id FROM orders INNER JOIN courses ON courses.id NOT IN (orders.course_id);");
        // dd($courses);
        $course = Course::with('orders')
        ->get();
        return view('course.course_view', ['data' => $course]);
    }
    public function course_list()
    {
        $course = Course::query()
        ->orderBy('id','desc')
        ->get();
        return view('course.course_list', ['data' => $course]);
    }
    public function getAll()
    {
        $course = DB::table('courses')
        ->orderBy('id','desc')
        ->paginate(6);
        return view('homepage', ['data' => $course]);
    } 
    public function add()
    {
        return view('course.course_add');
    }
    public function store(Request $request)
    {
        //  dd($request);
         $this->validate($request, [
            'course_name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
            'price' => 'required',
            'instructor_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }
        Course::create([
            'course_name' => $request->course_name,
            'description' => $request->description,
            'image' => $image ?? null,
            'image' =>$image_path,
            'status' => $request->status,
            'instructor_id' => $request->instructor_id,
            'price' => $request->price,
        ]);
        
        return redirect(route('course.view'))->with('status', 'Course Created !!');
    }

    public function update(Request $request):RedirectResponse
    {
       
        $validate = $request->validate([
        'course_name' => 'required',
        'description' => 'required',
        'status' => 'required',
        'instructor_id' => 'required',
        'price' => 'required',
    ]);
    $course = Course::query()->where('id',$request->course)->first();
    $course->update($validate);
    if ($request->hasFile('image')) 
    {
        $image_path = $request->file('image')->store('image', 'public');
        $course->update([
            'image'=>$image_path,
        ]);
    }    
        return redirect(route('course.view'))->with('status', 'Course Updated !!');
    }
    public function getById(Course $course)
    {
        $course = Course::query()->where('id', $course->id)->with('materials','orders')->first();
        // dd($course);
        return view('course_detail', [
            'course' => $course,
        ]);
    }
    public function edit(Course $course)
    {
        return view('course.course_edit', [
            'course' => $course,
        ]);
    }
    public function delete(course $course)
    {
        $data = Course::query()->where('id', $course->id)->first();
        $course->delete($data);
        return redirect(route('course.view'))->with('status', 'Course Deleted');
    }
    public function search(Request $request){
        $search = $request->input('search');
        $course = Course::query()
            ->where('course_name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->get();
        return view('course.course_view', ['data' => $course]);
    }
    public function getCourseByLearner(){
        // $course = DB::select("SELECT courses.id, courses.image, courses.course_name, courses.price, courses.created_at,users.id, orders.course_id FROM courses INNER JOIN orders ON orders.course_id = courses.id INNER JOIN users ON orders.user_id = users.id WHERE (orders.esewa_status != 'failed' AND orders.esewa_status != 'unverified'); ");
        // $user_id= auth()->user()->id;
        // dd($user_id);
        $course = Course::with('orders')
        ->get();
        return view('course.course_list', ['data' => $course]);
    }
}
