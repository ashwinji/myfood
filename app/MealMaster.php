<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealMaster extends Model
{
    protected $table = 'meal_masters';
    protected $fillable = ['meal_name','status']; 
}
