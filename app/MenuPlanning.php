<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MealMaster; 

class MenuPlanning extends Model
{
    protected $fillable = ['meal_master_id','week_number','from_date','to_date','day_1','day_2','day_3','day_4','day_5','day_6','day_7']; 


    public function getMealMaster()
   {
      return $this->belongsTo(MealMaster::class, 'meal_master_id','id');
   }
}
