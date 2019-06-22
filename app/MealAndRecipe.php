<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MealMaster; 
use App\RecipeMaster;

class MealAndRecipe extends Model
{
    protected $fillable = [
         'meal_master_id','recipe_master_id'
    ];


   public function getMealMaster()
   {
      return $this->belongsTo(MealMaster::class, 'meal_master_id','id');
   }
    
    public function getRecipeMaster()
   {
      return $this->belongsTo(RecipeMaster::class, 'recipe_master_id','id');
   }

}
