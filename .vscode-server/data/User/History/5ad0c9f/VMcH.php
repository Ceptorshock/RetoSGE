<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\UserController;

use App\Models\Department;
use App\Http\Controllers\DepartmentController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::with(['incidents' => function($query) {
            $query->orderBy('incidents.updated_at', 'desc');
        }])->where('id',Auth::id())->first();
        $departments = Department::orderBy('id')->get();
        return view('home',['user' => $user,'departments'=>$departments]);
        //return view('home');
    }


    // public function changePassword($request)
    // {
    //     $user = User::where('id',Auth::id())->first();
    //     if($user->password !=)
    //     $departments = Department::orderBy('id')->get();
    //     return view('home',['user' => $user,'departments'=>$departments]);
    //     //return view('home');
    // }

}
