<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipeMaster;

class RecipeMasterController extends Controller
{
    function __construct()
    {
        /*$this->middleware('permission:foodProduct');
        $this->middleware('permission:foodProduct', ['only' => ['recipeadd','recipesave','recipeedit']]);     */          
    }

    public function recipelist()
    {
    	$data = RecipeMaster::get(); 
    	return view ('recipe.recipe-view',compact('data'));
    }

    public function recipeadd()
    {
    	return view('recipe.recipe-view');	
    }

    public function recipesave(Request $request)
    {

    	 if(empty($request->id))
         { 
   		$this->validate($request, [
            'name'                  => 'required|unique:recipe_masters', 
            'recipe_info'        	=> 'required',
            'recipe_method'        	=> 'required',
            'recipe_status'    		=> 'required', 
           ]);
         }
         else
         {
          $this->validate($request, [
            'name'                 => 'required',
            'recipe_info'          => 'required',
            'recipe_method'        => 'required',
            'recipe_status'        => 'required', 
           ]);
         }
         



   		 if($request->hasFile('image_path'))
            {
                $destinationPath    = 'assets/uploads/recipe/';
                if($request->oldimage!='')
                {
                    if(file_exists($destinationPath.$request->oldimage)){ 
                         unlink($destinationPath.$request->oldimage);
                         // unlink($destinationPath.'avatar/'.$request->oldimage);
                    }
                }
                $file       = $request->image_path;
                $fileName   = value(function() use ($file)
                {
                  $newName = str_random(10) . '.' . $file->getClientOriginalExtension();
                  return strtolower($newName);
                });
                $request->image_path->move($destinationPath, $fileName);
                $img = \Image::make($destinationPath.$fileName);
                //$img->resize(250, 250);
                $img->save('assets/uploads/recipe/'.$fileName);
                unlink($destinationPath.$fileName);
            }
            else
            {
            	$destinationPath = '';
                $fileName = $request->oldimage;
            }


   		   if(!empty($request->id))
          {
           $menu = RecipeMaster::find($request->id);
           notify()->success('Success, Food information successfully updated.');
          }
        else
        {
          $menu = new RecipeMaster;
        }
            $menu->name       		= $request->name;
            $menu->recipe_info 	    = $request->recipe_info;
            $menu->image_path 		= $destinationPath.$fileName;
            $menu->recipe_method 	= $request->recipe_method;
            $menu->recipe_status 	= $request->recipe_status;
            $menu->save();
            if(empty($request->id))
            {
            notify()->success('Success, Food successfully created.');
            }
             return redirect()->route('recipe');

    }


    public function recipeedit($id)
    {
    	 if(RecipeMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $data = RecipeMaster::where('id', $id)->first();
        return View('recipe.recipe-view',compact('data'));

    }

}
