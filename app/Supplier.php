<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SupplierItem;
class Supplier extends Model
{
     protected $fillable = [
         'name', 'mobile', 'email', 'address', 'status'
    ];

 public function getSupplierItems()
   {
       return $this->hasMany(SupplierItem::class, 'supplier_id','id');
   }
}
