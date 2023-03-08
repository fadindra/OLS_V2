<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::query()
        ->orderBy('id','desc')
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
        // $course = Course::query()
        // ->orderBy('id','desc')
        // ->get();
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
}
