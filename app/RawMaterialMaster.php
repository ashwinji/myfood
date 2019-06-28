<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\RawMaterialStock;
use App\RawMaterialStockOut;
use App\PurchaseIndentItem;
use App\Ingredient;
use App\RawMaterialRecTransLog;
use App\SupplierItem;

class RawMaterialMaster extends Model
{
  use SoftDeletes;
   
    protected $fillable = ['item_name','unit','expected_price'];


     public function unitname()
   {
       return $this->belongsTo('App\UnitMaster', 'unit', 'id');

    }

    public function getRawMaterialStocks()
   {
       return $this->hasMany(RawMaterialStock::class, 'item_id','id');
   }

   
   public function getRawMaterialStockOuts()
   {
       return $this->hasMany(RawMaterialStockOut::class, 'item_id','id');
   }

   
   public function getPurchaseIndentItems()
   {
       return $this->hasMany(PurchaseIndentItem::class, 'item_id','id');
   }

   
   public function getIngredients()
   {
       return $this->hasMany(Ingredient::class, 'item_id','id');
   }

   
   public function getRawMaterialRecTransLogs()
   {
       return $this->hasMany(RawMaterialRecTransLog::class, 'item_id','id');
   }

   
   public function getSupplierItems()
   {
       return $this->hasMany(SupplierItem::class, 'item_id','id');
   }
}
