<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplierItem;
use Auth;
class SupplierItemsController extends Controller
{
    function __construct()
    {
    //     $this->middleware('permission:supplier-list');
    //     $this->middleware('permission:supplier-create', ['only' => ['adduser','saveuser']]);
    //     $this->middleware('permission:supplier-edit', ['only' => ['editsupplier','saveuser', 'updateStatus']]);
    //     $this->middleware('permission:supplier-view', ['only' => ['viewuser']]);
    //     $this->middleware('permission:supplier-action', ['only' => ['actionSupplier', 'updateStatus']]);
    //
     }
    
  	public function supplierItemList(){
      $getsupplierItemList = SupplierItem::get();
     
      return View('supplier.supplier-view',compact('getsupplierItemList'));
  	}
   

  	
  	public function suplierItemAdd(){

  		
  		return View('supplier.supplier-item');
  	}
  	 
  	public function supplierItemEdit($id){ 
  	   
		  if(count(SupplierItem::where('id', $id)->first())<1)
         {
             notify()->error('Oops!!!, something went wrong, please try again.');
             return \Redirect()->back();
         }
        $supplieritems = SupplierItem::where('id', $id)->first();
        $getsupplierList = SupplierItem::get(); 
        return View('supplier.supplier-item',compact('supplieritems','getsupplierList'));

   }

   public function supplierItemSave(Request $request){

   		$this->validate($request, [   

            'name'       => 'required', 
            'mobile'     => 'required|min:10|numeric', 
            'email'      => 'required',
            'address'    => 'required',
            'status'     => 'required'

        ]);
   		 if(!empty($request->id))
        {
            $menu = SupplierItem::find($request->id);
            notify()->success('Success, Supplier item information successfully updated.');
        }
        else
        {
        	$supplierItem = new SupplierItem;
        }   $supplierItem->name    = $request->name;
            $supplierItem->mobile  = $request->mobile;
            $supplierItem->email   = $request->email;
            $supplierItem->address = $request->address;
            $supplierItem->status  = $request->status;
            $supplierItem->save();
            if(empty($request->id))
            {
            notify()->success('Success, Supplier item successfully created.');
            }
            return redirect()->route('supplier-item-list');

   }


    public function supplierItemDelete($id){
		 if(count(SupplierItem::where('id', $id)->first())<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = SupplierItem::where('id', $id)->delete();
        notify()->success('Success, Supplier item successfully deleted.');
        return \Redirect()->back();
   }

}
