<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::with(['incidents' => function($query) {
            $query->orderBy('incidents.created_at', 'desc');
        }])->get();
        return view('priorities.index',['priorities'=>$priorities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        $priorities = Priority::with(['incidents' => function($query) {
            $query->orderBy('incidents.created_at', 'desc');
        }])->where('id',$priorities->id)->first();
        return view('priorities.show',['priorities'=>$priorities]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        //
    }
}
