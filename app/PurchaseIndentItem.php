<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchaseIndent;
use App\RawMaterialMaster;
use App\RawMaterialRecTransLog;

class PurchaseIndentItem extends Model
{
    protected $fillable = [
         'purchase_indent_id','item_id','unit','required_qty','price','accept_qty',
         'item_status','complete_date'
    ];

    public function getPurchaseIndent()
   {
       return $this->belongsTo(PurchaseIndent::class, 'purchase_indent_id','id');
   }

    public function getRawMaterialMaster()
   {
       return $this->belongsTo(RawMaterialMaster::class, 'item_id','id');
   }

   public function getRawMaterialRecTransLogs()
   {
       return $this->hasMany(RawMaterialRecTransLog::class, 'purchase_indent_item_id','id');
   }
}
