<?php 
namespace App\library;
use App\Slider;

use App\MealAndRecipe;
use App\MealMaster;
use App\TaskAssign;



class InjectService
{

	function getrecipelisting($mealid)
    {
        return MealAndRecipe::where('meal_master_id',$mealid)->get();
    }

    function checkifrecipe_id_exist($mealmasterid,$recipemasterid)
    {
    	$check = MealAndRecipe::where('meal_master_id',$mealmasterid)
    					->where('recipe_master_id',$recipemasterid)
    					->first();
    	if(empty($check))
    		{ return false; }
    	else
    		{ return true; }
    }

    function getmealname($mealid)
    {
    	$checkmealexist = MealMaster::where('id',$mealid)->first();
    	if(empty($checkmealexist))
    	{
    		return "";
    	}
    	else
    	{
    		return $checkmealexist->meal_name;
    	}

    }




    ////////////we are viewing the task assigned to a chef on a particular date

    function getthecheflist($assigneddate)
    {
        // $cheflist = TaskAssign::where('chef_id',$chefid)->get();
        // return $cheflist;


        $cheflist = TaskAssign::select('chef_id')
                           ->distinct()
                           ->where('assigned_date',$assigneddate)
                           ->get();
        return $cheflist;
                           
    }
    function gettheassignedrecipelist($assigneddate,$chefid)
    {
        $recipelistondate = TaskAssign::where('assigned_date',$assigneddate)
                                        ->where('chef_id',$chefid)
                                            ->get();
        return $recipelistondate;
    }
}
