<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RecipeMaster; 
use App\RawMaterialMaster;

class Ingredient extends Model
{
    protected $fillable = [
         'recipe_master_id', 'item_id', 'standard_qty'
    ];

    public function getRecipeMaster()
   {
       return $this->belongsTo(RecipeMaster::class, 'recipe_master_id','id');
   }

    public function getRawMaterialMaster()
   {
       return $this->belongsTo(RawMaterialMaster::class, 'item_id','id');
   }
}
