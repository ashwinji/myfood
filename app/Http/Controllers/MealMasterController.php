<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MealMaster;
use App\RecipeMaster;
use App\MealAndRecipe;

class MealMasterController extends Controller
{
     function __construct()
    {
        /*$this->middleware('permission:mealType');
        $this->middleware('permission:mealType', ['only' => ['mealTypeAdd','mealTypeEdit','mealTypeSave','mealTypeDelete','mealTypeAction']]);  */
    }

    public function mealslist()
    {

    	$mealslist = MealMaster::get();
    	return view('meal.meal-view',compact('mealslist'));
    }

    public function mealsadd()
    {
    	return view('meal.meal-view');
    }

    public function mealsedit($id)
    {

    	if(MealMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $data = MealMaster::where('id', $id)->first();

        return View('meal.meal-view',compact('data'));
    }

    public function mealssave(Request $request)
    {
    	if(empty($request->id))
    	{
       	$this->validate($request, [    			  
            'meal_name'     	 => 'required|unique:meal_masters',  
            'status'     		 => 'required',                       
        ]);
       }
       else
       {
       	$this->validate($request, [    			  
            'meal_name'     	 => 'required',  
            'status'     		 => 'required',                       
        ]);
       }
   		
   		if(!empty($request->id))
        {

            $meal = MealMaster::find($request->id);
            notify()->success('Success, Meals information successfully updated.');
        }
        else
        {
        $meal = new MealMaster;
        }
        	$meal->meal_name  		    = $request->meal_name;  
        	$meal->status  		   		= $request->status;         	       
            $meal->save();
          if(empty($request->id))
          {
          notify()->success('Success, Meal successfully created.');
          }
          return redirect()->route('meals');
    }


    public function mealsdelete($id)
    {
    	if(MealMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $mealdelete = MealMaster::where('id', $id)->delete();
        notify()->success('Success, Meals successfully deleted.');
        return \Redirect()->back();
    }

          //////////////meal and recipe connection ///////////////
     public function mealrecipe()
     {

       $mealrecipelist = MealMaster::paginate(10);
     // dd($mealrecipelist);//->get(['meal_master_id']);
        return view('meal.meal-recipe-view',compact('mealrecipelist'));


     }

     public function showmealandrecipepage(Request $request)
     {
        
        $id = $request->id;
        $recipelist = RecipeMaster::get();
        $datarows = MealAndRecipe::where('meal_master_id',$id)->get();
        // dd($datarows);
       // echo "<pre>";
       //  print_r($datarows);
       //  die;
        return view('meal.meal-recipe-fill-model',compact('recipelist','datarows','id'));
     }
     
      public function meal_recipe_save(Request $request)
      {
             
        $request_id = $request->id;
       
       

       if($request_id == '')
       {
      

        $checkifexist = MealMaster::where('meal_name',$request->meal_name)->count();
        if($checkifexist < 1)
         {
        $mealname = $request->meal_name;
        $meal = new MealMaster;
        $meal->meal_name = $mealname;
        $meal->save();
        $insertid = $meal->id;
         $recipecount = count($request->recipelst);
         if($recipecount>0){

           
          for($i=0; $i<count($request->recipelst);$i++)
                 {
                    $mealrec = new MealAndRecipe;
                    $mealrec->meal_master_id = $insertid;
                    $mealrec->recipe_master_id = $request->recipelst[$i];
                    $mealrec->save();
                 }
            
                
                 }
           notify()->success('Success, Meals successfully deleted.');
          }
          else
          {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
          }
      
       

       }
      
       else
       {
             MealAndRecipe::where('meal_master_id',$request->id)->delete();
             $recipecount2 = count($request->recipelst);
               if($recipecount2>0)
               {
                for($i=0; $i<count($request->recipelst);$i++)
                 {
                    $mealrec = new MealAndRecipe;                 
                    $mealrec->meal_master_id = $request_id;
                    $mealrec->recipe_master_id = $request->recipelst[$i];
                    $mealrec->save();
                 }
             }
                 notify()->success('Success, Meals successfully updated.');
    
       }

               return redirect()->route('meal-recipe');
      }

    public function mealrecipedelete($id)
    {
        if(MealMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $mealdelete = MealMaster::where('id', $id)->delete();
        notify()->success('Success, Meals and its recipe successfully deleted.');
        return \Redirect()->back();

    }


    
}
