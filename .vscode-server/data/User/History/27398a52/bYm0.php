<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Incident;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Http\Controllers\DepartmentController;

use App\Models\Category;
use App\Http\Controllers\CategoryController;

use App\Models\User;
use App\Http\Controllers\UserController;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::orderBy('created_at')->get();
        return view('incidents.index',['incidents'=>$incidents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        return view('incidents.create',['categories'=>$categories]);
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
        $incident->user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $incident->department_id = $user->department_id;
        $incident->category_id = $request->category_id;
        $incident->save();
        return redirect()->route('incidents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return view('incidents.show',['incident'=>$incident]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        $categories = Category::orderBy('id')->get();
        if (Auth::id() == $incident->user_id) {
            return view('incidents.create',['incident'=>$incident,'categories'=>$categories]);
        } else {
            return back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        $incident->title = $request->title;
        $incident->text = $request->text;
        $incident->category_id = $request->category_id;
        //$incident->department_id = $request->department_id;    NO HACE FALTA YA QUE EL INCIDENTE SOLO SE PUEDE CREAR EN EL DEPARTAMENTO DEL USUARIO.
        $incident->save();


        //return back();
        return view('incidents.show',['incident'=>$incident]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        if ($string == "home") {
            return back();
        } else {
            return redirect()->route('incidents.index');
        }
        
    }
}