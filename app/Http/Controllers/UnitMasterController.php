<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitMaster;

class UnitMasterController extends Controller
{
     function __construct()
    {
      /*  $this->middleware('permission:mealType');
        $this->middleware('permission:mealType', ['only' => ['mealTypeAdd','mealTypeEdit','mealTypeSave','mealTypeDelete','mealTypeAction']]);*/  
    }


    public function UnitList(){

  		$data = UnitMaster::paginate(10);
        //$unitlist = WeightUnit::get();
        return View('units.unit-view',compact('data'));
  	}

  	public function UnitAdd()
  	{
 		return View('units.unit-view');//,compact('data'));
  	}
    public function UnitEdit($id)
  	{
  		 if(UnitMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $unitrow = UnitMaster::where('id', $id)->first();

 		return View('units.unit-view',compact('unitrow'));
  	}



      
     public function UnitSave(Request $request)
     {
     	$this->validate($request, [    			  
            'weight_unit'     		 => 'required',                        
        ]);
   		
   		  if(!empty($request->id))
        {
            $units = UnitMaster::find($request->id);
            notify()->success('Success, Weight Unit information successfully updated.');
        }
        else
        {
        $units = new UnitMaster;
        }
        	$units->name  		   	= $request->weight_unit;          
            $units->save();
          if(empty($request->id))
          {
           notify()->success('Success, Weight Unit successfully created.');
          } 
            return redirect()->route('unit-master');

     }

     public function UnitDelete($id) {
     if(UnitMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = UnitMaster::where('id', $id)->delete();
        notify()->success('Success, Weight Unit successfully deleted.');
        return \Redirect()->back();
   }


    
}
