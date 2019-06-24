<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MealMaster;

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





    


    
}
