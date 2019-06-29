<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskAssign;
use Auth;
use App\User;
use Carbon\Carbon;

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
         
        if(Auth::user()->hasRole('admin'))
        {
           $assignedtask = TaskAssign::get();
        }
        else
        {
        $assignedtask = TaskAssign::where('chef_id',$logged_in_person_id)
                                    ->where('prepared_qty',null)
                                    ->get();
         }
         
        return view('dashboard',compact('assignedtask','hisrole'));
    }
}
