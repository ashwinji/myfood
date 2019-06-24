<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MealMaster; 
use App\RecipeMaster;

class MealAndRecipe extends Model
{
<<<<<<< HEAD
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

=======
    protected $table = 'meal_and_recipes';
    protected $fillable = ['meal_master_id','recipe_master_id']; 
>>>>>>> raw-material,unit master, meal master completed
}
