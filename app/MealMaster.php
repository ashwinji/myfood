<?php

namespace App;
use App\MealAndRecipe;
use App\MenuPlanning;

use Illuminate\Database\Eloquent\Model;

class MealMaster extends Model
{
<<<<<<< HEAD
    protected $table = 'meal_masters';
    protected $fillable = ['meal_name','status']; 
=======
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
>>>>>>> 1ecdb255b07d939fb54fdf45438d06ff526fb4c8
}
