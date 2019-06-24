<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeMaster extends Model
{
    protected $table = 'recipe_masters';
    protected $fillable = ['name','image_path','recipe_info','recipe_method','recipe_status'];
}
