<?php 
namespace App\library;
use App\Slider;

use App\MealAndRecipe;
use App\MealMaster;



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
}
