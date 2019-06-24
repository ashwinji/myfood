<?php 

namespace App\library;

use App\User;


class InjectService 
{  
	function userName($id){
		return  User::where('id',$id)->first();
	}
   
    
   

}
