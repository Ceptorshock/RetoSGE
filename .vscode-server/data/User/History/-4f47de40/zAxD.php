<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::orderBy('id')->get();
        return view('incidents.index',['incidents'=>$incidents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incident = new Incident();
        $incident->title = $request->title;
        $incident->text = $request->text;
        $incident->stimated_time = $request->stimated_time;
        $incident->user_id = $request->user_id;  //Auth::id();
        $incident->save();
        return redirect()->route('incidents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        //$comments = Incident::find($incident->id)->comments;
        //return view('incidents.show',['incident'=>$incident,'comments'=>$comments]);
        return view('incidents.show',['incident'=>$incident]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        return view('incidents.edit',['incident'=>$incident]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        $incident->title = $request->title;
        $incident->text = $request->text;
        $incident->user_id = $request->user_id;
        $incident->save();

        return view('incidents.show',['incident'=>$incident]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index');
    }
}