<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipeMaster;
use App\RawMaterialMaster;
use App\UnitMaster;
use App\Ingredient;

class RecipeMasterController extends Controller
{
    function __construct()
    {
        /*$this->middleware('permission:foodProduct');
        $this->middleware('permission:foodProduct', ['only' => ['recipeadd','recipesave','recipeedit']]);     */          
    }

    public function recipelist()
    {
    	$data = RecipeMaster::paginate(10); 
      $itemlist = RawMaterialMaster::get();
    	return view ('recipe.recipe-view',compact('data','itemlist'));
    }

    public function recipeadd()
    {
      $itemlist = RawMaterialMaster::get();
    	return view('recipe.recipe-view',compact('itemlist'));	
    }

    public function recipesave(Request $request)
    {

    	 if(empty($request->id))
         { 
   		$this->validate($request, [
            'name'                  => 'required|unique:recipe_masters', 
            'recipe_info'        	  => 'required',
            'recipe_method'        	=> 'required',
            'recipe_status'    		  => 'required', 
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
         
      $destinationPath = '';


   		if($request->hasFile('image_path'))
            {
                
                $destinationPath    = 'assets/uploads/recipe/';
                if($request->oldimage!='')
                {
                    if(file_exists($destinationPath.$request->oldimage)){ 
                       // unlink($destinationPath.$request->oldimage);
                      //  unlink($destinationPath.'avatar/'.$request->oldimage);
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
                $img->resize(250, 250);
                $img->save('assets/uploads/recipe/'.$fileName);
                //unlink($destinationPath.$fileName);
            }
            else
            {
                $fileName = $request->oldimage;

            }


   		   if(!empty($request->id))
          {
           $menu = RecipeMaster::find($request->id);
           notify()->success('Success, Recipe information successfully updated.');
          }
        else
        {
          $menu = new RecipeMaster;
        }

            $menu->name       		= $request->name;
            $menu->recipe_info 	  = $request->recipe_info;
            $menu->image_path 		= $destinationPath.$fileName;
            $menu->recipe_method 	= $request->recipe_method;
            $menu->recipe_status 	= $request->recipe_status;
            $menu->save();
            

           //here we will get the insert id
            $recipemasterid = $menu->id;
          Ingredient::where('recipe_master_id',$recipemasterid)->delete();

          //$request->qty);
          if(!empty($request->qty)){ 
          for($i =0;$i<sizeof($request->qty);$i++)
           {
                $ing = new Ingredient;
                $ing->recipe_master_id         = $recipemasterid;
                $ing->item_id                  = $request->item[$i];
                $ing->standard_qty             = $request->qty[$i];
                if($request->item[$i] !=''){
                          $ing->save();
                  }
            }
          }



            //here we have repeated the loop of inserting the recipe measurement
            if(empty($request->id))
            {
            notify()->success('Success, Recipe successfully created.');
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
        $itemlist = RawMaterialMaster::get();
        $ingrelist = Ingredient::where('recipe_master_id',$id)->get();
        return View('recipe.recipe-view',compact('data','itemlist','ingrelist'));

    }


    public function recipedelete($id)
    {
      if(RecipeMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = RecipeMaster::where('id', $id)->delete();
        notify()->success('Success, Recipe successfully deleted.');
        return \Redirect()->back();
    }

    public function gettheunit(Request $request)
   {    
     $ingredientid = $request->itemid;
     $ingredient_unit = RawMaterialMaster::where('id',$ingredientid)->first()->unit;
     $price =  RawMaterialMaster::where('id',$ingredientid)->first()->expected_price;
     $unname = UnitMaster::where('id',$ingredient_unit)->first()->name;
     return $unname;//."_".$price;
   }

}
