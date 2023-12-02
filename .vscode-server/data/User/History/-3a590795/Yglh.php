<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Incident;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Controllers\IncidentController;

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
    public function create($id)
    {
        return view('comments.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->used_time = $request->used_time;
        $comment->user_id = Auth::id();
        $comment->incident_id = $request->incident_id;
        $comment->save();
        return redirect()->route('incidents.show', $comment->incident_id);
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
        return view('comments.create',['comment'=>$comment]);
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
        $incident = Incident::where('id',$comment->incident_id)->first();
        if (Auth::id() == $incident->user_id) {
            $comment->delete();
            return redirect()->route('incidents.show', $comment->incident_id);
        } else {
            return back();
        }
    }
}
