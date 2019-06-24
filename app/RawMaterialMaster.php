<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterialMaster extends Model
{
    protected $table = 'raw_material_masters';
    protected $fillable = ['item_name','unit','expected_price'];



     public function unitname()
   {
       return $this->belongsTo('App\UnitMaster', 'unit', 'id');
   }
}
