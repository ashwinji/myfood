<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Supplier;
use App\RawMaterialMaster;
class SupplierItem extends Model
{
   protected $fillable = [
         'supplier_id','item_id','item_price','select_for_item_deliver'
    ];

    public function getSupplier()
   {
       return $this->belongsTo(Supplier::class, 'supplier_id','id');
   }

   public function getRawMaterialMaster()
   {
       return $this->belongsTo(RawMaterialMaster::class, 'item_id','id');
   }
}
