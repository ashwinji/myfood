<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;
use App\User;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users-list');
        $this->middleware('permission:users-create', ['only' => ['adduser','saveuser']]);
        $this->middleware('permission:users-edit', ['only' => ['edituser','saveuser']]);
        $this->middleware('permission:users-action', ['only' => ['actionUsers']]);
    }
    
    public function editprofile()
    {
    	$user = User::find(Auth::id());
        return view('edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name'          => ['required', 'string', 'max:191'],
            'mobile'        => ['required', 'numeric', 'digits_between:10,12'],
            'address'       => ['required', 'string', 'max:191'],
            'city'          => ['required', 'string', 'max:191'],
            'zipCode'       => ['required', 'numeric', 'regex:/\b\d{6}\b/'],
            'locktimeout'   => ['required', 'numeric','min:10','max:120']
        ]);

        $user = User::find(Auth::user()->id);
        $user->name         = $request->name;
        $user->mobile       = $request->mobile;
        $user->address      = $request->address;
        $user->city         = $request->city;
        $user->zipCode      = $request->zipCode;
        $user->locktimeout  = $request->locktimeout;
        $user->save();
        if($user)
        {
            notify()->success('Success, Profile setting successfully changed.');
        }
        else
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
        }
        return \Redirect()->back();

    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'              => ['required'],
            'new_password'              => ['required', 'confirmed', 'min:6', 'max:25'],
            'new_password_confirmation' => ['required']
        ]);

        $matchpassword  = User::find(Auth::user()->id)->password;
        if(\Hash::check($request->old_password, $matchpassword))
        {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            notify()->success('Success, Password successfully changed.');
        }
        else
        {
            notify()->error('Incorrect password, Please try again with correct password.');
        }
        return \Redirect()->back();
    }
}
