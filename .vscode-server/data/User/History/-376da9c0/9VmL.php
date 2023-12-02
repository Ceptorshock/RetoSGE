<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with(['incidents' => function($query) {
            $query->orderBy('incidents.created_at', 'desc');
        }])->get();
        return view('departments.index',['departments'=>$departments]);
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
    public function show(Department $department)
    {
        $departments = Department::with(['incidents' => function($query) {
            $query->orderBy('incidents.created_at', 'desc');
        }])->where('id',$department->id)->first();
        return view('departments.show',['departments'=>$departments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
