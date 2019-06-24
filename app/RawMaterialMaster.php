<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RawMaterialStock;
use App\RawMaterialStockOut;
use App\PurchaseIndentItem;
use App\Ingredient;
use App\RawMaterialRecTransLog;
use App\SupplierItem;

class RawMaterialMaster extends Model
{
    protected $table = 'raw_material_masters';
    protected $fillable = ['item_name','unit','expected_price'];
  use SoftDeletes;


     public function unitname()
   {
       return $this->belongsTo('App\UnitMaster', 'unit', 'id');

  }

    
    protected $fillable = [
         'item_name','unit','expected_price'
    ];

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
