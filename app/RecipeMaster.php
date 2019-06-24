<?php

namespace App;
use App\Ingredient;
use App\MealAndRecipe;
use App\TaskAssign;

use Illuminate\Database\Eloquent\Model;

class RecipeMaster extends Model
{
    protected $fillable = [
         'name','image_path','recipe_info','recipe_method','recipe_status'
    ];

    public function getIngredients()
   {
       return $this->hasMany(Ingredient::class, 'recipe_master_id','id');
   }

   public function getMealAndRecipes()
   {
       return $this->hasMany(MealAndRecipe::class, 'recipe_master_id','id');
   }

    public function getTaskAssigns()
   {
       return $this->hasMany(TaskAssign::class, 'recipe_master_id','id');
   }
}
