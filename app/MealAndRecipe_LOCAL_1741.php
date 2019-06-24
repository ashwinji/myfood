<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealAndRecipe extends Model
{
    protected $table = 'meal_and_recipes';
    protected $fillable = ['meal_master_id','recipe_master_id']; 
}
