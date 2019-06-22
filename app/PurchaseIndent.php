<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchaseIndentItem;
use App\RawMaterialRecTransLog;

class PurchaseIndent extends Model
{
    protected $fillable = [
         'indent_date','status','indent_complete','remark'
    ];

     public function getPurchaseIndentItems()
   {
       return $this->hasMany(PurchaseIndentItem::class, 'purchase_indent_id','id');
   }

   public function getRawMaterialRecTransLogs()
   {
       return $this->hasMany(RawMaterialRecTransLog::class, 'purchase_indent_id','id');
   }
}
