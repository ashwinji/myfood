<?php

namespace App;
use App\MealAndRecipe;
use App\MenuPlanning;

use Illuminate\Database\Eloquent\Model;

class MealMaster extends Model
{
    protected $fillable = [
         'meal_name','status'
    ];

    public function getMealAndRecipes()
   {
      return $this->hasMany(MealAndRecipe::class, 'meal_master_id','id');
   }

   public function getMenuPlannings()
   {
      return $this->hasMany(MenuPlanning::class, 'meal_master_id','id');
   } 
}
