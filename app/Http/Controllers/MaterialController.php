<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        $user = auth()->user();

        
        // dd($data);
        //     $user_id = auth()->user()->id;
        //     $user_courses_ids = DB::select("SELECT course_id FROM orders WHERE user_id = $user_id AND esewa_status = 'verified';");
        //     foreach ($user_courses_ids as $key => $user_courses_id) 
        //     {
        //         $course_ids_arr[] = $user_courses_id->course_id;
        //     }
        //     if (count($course_ids_arr)) {
            
        //     }
        //     $course_ids = implode(',', $course_ids_arr);
        //     if(isset($course_ids))
        //     {
        //         $course = DB::select("SELECT * FROM courses WHERE id IN ($course_ids);");
        //         return view('material.material_view', ['data' => $course,'role' => $role]);
        //     }
        //     else{
        //         $course = DB::select("SELECT * FROM courses;");
        //         return view('material.material_view', ['data' => $course,'role' => $role]);
        //     }
        // }else{
        //     $user_id= auth()->user()->id;
        //     $course = DB::select("SELECT * FROM courses WHERE instructor_id = $user_id;");
        //     // dd($course);
        if($role == "learner"){
            $course = Order::query()
            ->where('user_id',$user->id)
            ->where('esewa_status','verified')
            ->whereHas('user', function($q )use($role){
                $q->where('role',$role);
            })
            ->with('course')
            ->get();
            return view('material.material_view', ['data' => $course,'role' => $role]);
        }else{
            $course = Course::query()
            ->where('instructor_id',$user->id)
            ->get();
            return view('material.material_view', ['data' => $course,'role' => $role]); 
        }
    }
    public function getById(Request $request)
    {
        $course = Course::query()->where('id', $request->course_id)->with('materials')->first();
        return view('material.material_add', ['course'=>$course]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'course_id' => 'required',
        ]);
        
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }
        $extension = $request->file('image')->getClientOriginalExtension();
        //  @dd(ini_get('post_max_size'));
        Material::create([
            'title' => $request->title,
            'description' => $request->description,
            'files' =>  $request->hasFile('image') ? $image_path: null,
            'status' => $request->status,
            'course_id' => $request->course_id,
            'file_extension' => $extension,
        ]);
        return redirect()->route('material.add', ['course_id' => $request->course_id]);
    }
    public function search(Request $request){
        $search = $request->input('search');
        $material = Material::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        return redirect()->route('material.add', ['material' => $material]);
    }
}
