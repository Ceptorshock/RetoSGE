<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\UserController;

use App\Models\Department;
use App\Http\Controllers\DepartmentController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    }

    public function update(Request $request)
    {
        $user = User::where('id',Auth::id())->first();
        dd($user);
        if(Hash::make($request->old_password) === $user->password) {
            if ($request->new_password !=null && $request->new_password === $request->password_confirm) {
                $user->password = Hash::make($request->new_password);
                
            }
            if ($request->department_id != $user->department_id) {
                $user->department_id = $request->department_id;
            }
            $user->save();
        }
        return redirect('home');
    }
}
