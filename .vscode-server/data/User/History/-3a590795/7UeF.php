<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Incident;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Incident $incident)
    {
        return view('comments.create',['incident'=>$incident]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->used_time = $request->used_time;
        $comment->user_id = 1;
        $comment->incident_id = $id;
        $comment->save();
        return redirect()->route('incidents.show', $comment->incident_id);
        //return redirect()->route('incidents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->text = $request->text;
        $comment->used_time = $request->used_time;
        $comment->save();
        return redirect()->route('incidents.show', $comment->incident_id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
