<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;
use App\Appsetting;
use App\User;

class AppsettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:app-setting', ['only' => ['appSetting','appSettingUpdate']]);
    }

    public function appSetting()
    {
    	$appsetting = Appsetting::first();
        return view('admin.app-setting', compact('appsetting'));
    }

    public function appSettingUpdate(Request $request)
    {
        $this->validate($request, [
            'app_name'          => ['required', 'string', 'max:191'],
            'email'             => ['required', 'email', 'max:191'],
            'mobilenum'         => ['required', 'numeric', 'digits_between:9,11'],
            'address'           => ['required', 'string', 'max:191']
        ]);

        $destinationPath    = 'assets/uploads/';
        $image_name = str_slug(substr($request->app_name, 0, 30));
        $saveFile = $request->old_app_logo;
        if($request->hasFile('app_logo'))
        {
            if($request->old_app_logo!='')
            {
                if(file_exists($destinationPath.'logothumb/'.$request->old_app_logo)){
                    unlink($destinationPath.'logothumb/'.$request->old_app_logo);
                }
            }
            $file       = $request->app_logo;
            $fileName   = value(function() use ($file, $image_name)
            {
              $newName = $image_name.'-'.time() . '.' . $file->getClientOriginalExtension();
              return strtolower($newName);
            });
            $request->app_logo->move($destinationPath, $fileName);
            $img = \Image::make($destinationPath.$fileName);
            $img->resize(80, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath.'logothumb/'.$fileName);
            $saveFile = $destinationPath.'logothumb/'.$fileName;
            if(file_exists($destinationPath.$fileName)){ 
                unlink($destinationPath.$fileName);
            }
        }

        $appsetting = Appsetting::find(1);
        $appsetting->app_name         = $request->app_name;
        $appsetting->email            = $request->email;
        $appsetting->mobilenum        = $request->mobilenum;
        $appsetting->address          = $request->address;
        $appsetting->seo_keyword      = $request->seo_keyword;
        $appsetting->seo_description  = $request->seo_description;
        $appsetting->google_analytics = $request->google_analytics;
        $appsetting->app_logo         = $saveFile;
        $appsetting->save();
        if($appsetting)
        {
            notify()->success('Success, App setting successfully changed.');
        }
        else
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
        }
        return \Redirect()->back();

    }
}
