<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\RecipeMaster;

class TaskAssign extends Model
{
     protected $fillable = [
         'chef_id','recipe_master_id','assigned_qty','assigned_date',
         'prepared_qty','prepared_date','reason'
    ];

    public function getUser()
   {
       return $this->belongsTo(User::class, 'user_id','id');
   }

   public function getRecipeMaster()
   {
       return $this->belongsTo(RecipeMaster::class, 'recipe_master_id','id');
   }
}
