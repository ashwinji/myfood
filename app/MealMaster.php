<?php

namespace App;
use App\MealAndRecipe;
use App\MenuPlanning;

use Illuminate\Database\Eloquent\Model;

class MealMaster extends Model
{
<<<<<<< HEAD
   protected $fillable = [
=======

    protected $fillable = [
>>>>>>> e46eddeed485d2bbcc91cf68a93734e58b5b8264
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
