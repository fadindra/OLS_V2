<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Material $material_id)
    { 
        $comment = Comment::get();
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
