<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawMaterialMaster;
use App\UnitMaster;

class RawMaterialMasterController extends Controller
{
    function __construct()
    {
        /*$this->middleware('permission:mealType');
        $this->middleware('permission:mealType', ['only' => ['mealTypeAdd','mealTypeEdit','mealTypeSave','mealTypeDelete','mealTypeAction']]);*/  
    }

    function index()
    {

    }

    public function rawmaterialList(){

  		$rawmateriallist = RawMaterialMaster::get();
        //$unitlist = WeightUnit::get();
        return View('raw-material.raw-material-view',compact('rawmateriallist'));
  	}

  	public function rawmaterialadd()
  	{
  		$unitlist = UnitMaster::get();
        return View('raw-material.raw-material-view',compact('unitlist'));	
  	}

  	public function rawmaterialedit($id)
  	{
  		 if(RawMaterialMaster::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }

        $rawmateriallist = RawMaterialMaster::where('id', $id)->first();
        $unitlist = UnitMaster::get();
        return View('raw-material.raw-material-view',compact('rawmateriallist','unitlist'));
  	}

  	public function rawmaterialsave(Request $request)
  	{
  	   if(empty($request->id))
      {
      $this->validate($request, [
            'item_name'        	=> 'required|unique:raw_material_masters',   
            'unitname'          => 'required',
            'expected_price'    => 'required',
        ]);
     }
     else
     {
      $this->validate($request, [
            'item_name'         => 'required',   
            'unitname'          => 'required',
            'expected_price'    => 'required', 
        ]);
     }
   		
   		if(!empty($request->id))
        {
            $itemlist = RawMaterialMaster::find($request->id);
            notify()->success('Success, Raw Material information successfully updated.');
        }
        else
        {
          $itemlist  = new RawMaterialMaster;
        }
    
            $itemlist->item_name        = $request->item_name;      
            $itemlist->unit             = $request->unitname;      
            $itemlist->expected_price   = $request->expected_price;      
            $itemlist->save();
            if(empty($request->id))
            {
            notify()->success('Success,Raw Material successfully created.');
            }
            return redirect()->route('raw-material');
  	}

  	public function rawmaterialdelete($id)
  	{
  		if(RawMaterialMaster::where('id', $id)->count()<1)

        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = RawMaterialMaster::where('id', $id)->delete();
        notify()->success('Success, Raw Material successfully deleted.');
        return \Redirect()->back();
  	}

}
