<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Incident;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Incident;
use App\Http\Controllers\IncidentController;

use App\Models\User;
use App\Http\Controllers\UserController;

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
        $user = User::where('id',Auth::id())->first();
        $incident = Incident::where('id',$id)->first();
        dd($incident);
        if ($user->department_id === $incident->department_id) {
            return view('comments.create',['incident'=>$incident]);
        } else {
            return back();
        }
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Incident $incident)
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
        if (Auth::id() == $comment->user_id) {
            return view('comments.create',['comment'=>$comment]);
        } else {
            return back();
        }
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
