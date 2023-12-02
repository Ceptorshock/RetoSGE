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
        $user = User::where('id',Auth::id())->first();
        $departments = Department::orderBy('id')->get();
        return view('home',['user' => $user,'departments'=>$departments]);
        //return view('home');
    }

    public function changePassword()
    {
        $user = User::where('id',Auth::id())->first();
        $departments = Department::orderBy('id')->get();
        return view('home',['user' => $user,'departments'=>$departments]);
        //return view('home');
    }

    Route::get('changepassword', function() {
        $user = App\Models\User::where('email', 'admin@laravel.com')->first();
        $user->password = Hash::make('123456');
        $user->save();
     
        echo 'Password changed successfully.';
    });
}
