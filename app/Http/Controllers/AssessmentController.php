<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
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
            return view('assessment.assessment_view', ['data' => $course,'role' => $role]);
        }else{
            $course = Course::query()
            ->where('instructor_id',$user->id)
            ->get();
            return view('assessment.assessment_view', ['data' => $course,'role' => $role]); 
        }
    }
    public function getById(Request $request)
    {        
        $course = Course::query()->where('id', $request->course_id)->with('assessments')->first();
        return view('assessment.assessment_add', ['course'=>$course]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'course_id' => 'required',
            'mark' => 'required',
        ]);
        
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }
        $extension = $request->file('image')->getClientOriginalExtension();
        //  @dd(ini_get('post_max_size'));
        Assessment::create([
            'title' => $request->title,
            'description' => $request->description,
            'files' =>  $request->hasFile('image') ? $image_path: null,
            'status' => $request->status,
            'course_id' => $request->course_id,
            'file_extension' => $extension,
            'mark' => $request->mark,
        ]);
        return redirect()->route('assessement.add', ['course_id' => $request->course_id]);
    }
    public function search(Request $request){
        $search = $request->input('search');
        $assessment = Assessment::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        return redirect()->route('assessment.add', ['assessment' => $assessment]);
    }

    public function getAssessments(Assessment $assessment_id)
    { 
        // dd($material_id);
        $assessment_submits = DB::select("SELECT * FROM assessment_submits 
        INNER JOIN users
        ON assessment_submits.learner_id = users.id;
        WHERE assessment_id = $assessment_id->id;");

        // dd($assessment_submits);
        return view('assessment.assessment_submit', [
            'assessment' => $assessment_id,
            'assessement_submits' => $assessment_submits,
        ]);
    }
    public function submitAssessmentStore(Request $request)
    {
        $role = auth()->user()->role;
        $user = auth()->user();
        // dd($request->all());
        
        if($role == "learner"){
        $request->validate([
            'title' => 'required',
            'assessment_id' => 'required',
            'learner_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }
        $extension = $request->file('image')->getClientOriginalExtension();
        //  @dd(ini_get('post_max_size'));
        DB::table('assessment_submits')->insert([
            'title' => $request->title,
            'files' =>  $request->hasFile('image') ? $image_path: null,
            'assessment_id' => $request->assessment_id,
            'file_extension' => $extension,
            'learner_id' => $request->learner_id,
        ]);
        return redirect()->route('assessement.submit.add', ['assessment_id' => $request->assessment_id]);
    }else{
        // dd('here');
        $marks_obtained = $request->marks_obtained;
        DB::select("UPDATE assessment_submits SET marks_obtained = $marks_obtained WHERE id = $request->assessment_id ;");
        return redirect()->route('assessement.submit.add', ['assessment_id' => $request->assessment_id]);
    }
    }
}
