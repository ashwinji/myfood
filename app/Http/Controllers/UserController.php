<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use DB;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users-list');
        $this->middleware('permission:user-create', ['only' => ['adduser','saveuser']]);
        $this->middleware('permission:user-edit', ['only' => ['edituser','saveuser', 'updateStatus']]);
        $this->middleware('permission:user-view', ['only' => ['viewuser']]);
        $this->middleware('permission:user-action', ['only' => ['actionUsers', 'updateStatus']]);
    }


    public function users()
    {

        // $data = User::where('userType','==','admin')->get();
        $data = User::get();
        // dd($data);
        return View('admin.users',compact('data'));
    }

    public function viewuser($id)
    {
        if(User::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = User::where('id', $id)->first();
        return View('admin.users', compact('user'));
    }

    public function actionUsers(Request $request)
    {
      	$data  = $request->all();
      	foreach($request->input('boxchecked') as $action)
      	{
          	if($request->input('cmbaction')=='Active')
          	{
              	User::where('id', $action)->update(array('status' => '1'));
          	}
          	else
          	{
              	User::where('id', $action)->update(array('status' => '0'));
          	}
      	}
      	notify()->success('Success, Action successfully done.');
      	return \Redirect()->back();
  	}

    public function updateStatus(Request $request)
    {
        if(User::where('id', $id)->count()<1)
        {
            $data = [
                'type'      => 'error',
                'message'   => 'something went wrong. please try again.',
            ];
            return response()->json($data, 200);
        }
        if($request->input('cmbaction')=='Active')
        {
            User::where('id', $request->id)->update(array('status' => '1'));
            $data = [
                'type'      => 'success',
                'message'   => 'Account successfully activated.',
            ];
            return response()->json($data, 200);
        }
        else
        {
            User::where('id', $request->id)->update(array('status' => '0'));
            $data = [
                'type'      => 'success',
                'message'   => 'Account successfully inactivated.',
            ];
            return response()->json($data, 200);
        }
    }

    public function adduser()
    {
        $roles = Role::pluck('name','name')->all();
        return View('admin.users',compact('roles'));
    }

    public function saveuser(Request $request)
    {

        $this->validate($request, [
            'name'        		=> 'required',
            'email'       		=> 'required|email',
            'mobile'     		=> 'required|numeric',
            'address'   		=> 'required',
            'city'              =>'required',
            'zip'              =>'required',
        ]);

        if(!empty($request->id))
        {
            $data = [
                'name'        		=> $request->name,
                'email'       		=> $request->email,
                'mobile'     		=> $request->mobile,
                'address'           => $request->address,
                'status'            => $request->status,
                'zipCode'               => $request->zip,
                'city'     		    => $request->city,

            ];

            $user = User::find($request->id);
            $user->update($data);
            DB::table('model_has_roles')->where('model_id',$request->id)->delete();
            if(!empty($request->input('roles')))
            {
                $user->assignRole($request->input('roles'));
            }
            notify()->success('Success, User information successfully updated.');
            return \Redirect()->back();
        }
        else
        {
            $this->validate($request, [
                'email'     => 'required|email|unique:users,email',
                'password'  => 'required|same:confirm-password'
            ]);

            $input 					= $request->all();
            $input['password'] 		= bcrypt($input['password']);
            $input['app_key'] 		= str_random(25);
            $input['app_secret'] 	= str_random(15);
            $input['api_token']     =str_random(25);
            $input['zipCode']       =$request->zip;
            $input['status']        =$request->status;


            $user = User::create($input);
            if(!empty($request->input('roles')))
            {
              $user->assignRole($request->input('roles'));
            }
            notify()->success('Success, User successfully created.');
            return \Redirect()->back();
        }
    }

    public function edituser($id)
    {
        if(User::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $roles = Role::pluck('name','name')->all();
        $user = User::where('id', $id)->first();
        $userRole = $user->roles->pluck('name','name')->all();
        return View('admin.users',compact('roles', 'user', 'userRole'));
    }

    public function deleteuser($id)
    {
        if(User::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = User::where('id', $id)->delete();
        notify()->success('Success, User successfully deleted.');
        return \Redirect()->back();
    }
}
