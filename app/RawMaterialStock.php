<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RawMaterialMaster;

class RawMaterialStock extends Model
{
    protected $fillable = [
         'item_id','minimum_qty','current_stock','stock_type'
    ];

    public function getRawMaterialMaster()
   {
       return $this->belongsTo(RawMaterialMaster::class, 'item_id','id');
   }
}
