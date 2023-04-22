<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function add(Material $material_id)
    { 
        // dd($material_id);
        $comment = DB::select("SELECT * FROM comments INNER JOIN users ON comments.instructor_id = users.id OR comments.learner_id = users.id WHERE material_id = $material_id->id;");
        // dd($comment);
        return view('comment.comment', [
            'material' => $material_id,
            'comments' => $comment,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'material_id' => 'required',
            'comment_text' => 'required',
            'status' => 'required',
        ]);
        Comment::create([
            'course_id' => $request->course_id,
            'material_id' => $request->material_id,
            'comment_text' => $request->comment_text,
            'instructor_id' => $request->instructor_id,
            'learner_id' => $request->learner_id,
            'status' => $request->status,
        ]);
        return redirect()->route('comment.add', ['material_id' => $request->material_id]);
    }
}
