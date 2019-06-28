<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskAssign;
use Auth;
use App\User;

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
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $logged_in_person_id = Auth::id();
        
        $hisrole = User::where('id',$logged_in_person_id)->first()->userType;
         //$assignedtask = TaskAssign::where('chef_id',$logged_in_person_id)->get();
         $assignedtask = TaskAssign::get();

        return view('dashboard',compact('assignedtask'));
    }
}
