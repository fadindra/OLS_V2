<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        if(auth()->user()->role =='learner'){
            $user_type = 'learner';
        }else{
            $user_type = 'instructor';
        }
        if($user_type=='instructor'){
            $course = Course::query()->where('instructor_id','auth()->user()->id')
            ->get();
        }else{
            $course = Course::query()->with('orders')
            ->get();
        }
        // dd($course);
        return view('material.material_view', ['data' => $course]);
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
