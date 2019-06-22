<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RawMaterialMaster;

class RawMaterialStockOut extends Model
{
    protected $fillable = [
         'item_id','created_by','old_stock','change_stock','new_stock'
    ];

    public function getRawMaterialMaster()
   {
       return $this->belongsTo(RawMaterialMaster::class, 'item_id','id');
   }

}
