<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Supplier;
use Auth;

class SupplierController extends Controller
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
    
  	public function supplierList(){
      $getsupplierList = Supplier::get();
     
      return View('supplier.supplier-view',compact('getsupplierList'));
  	}
   

  	
  	public function suplierAdd(){

  		 //$getsupplierList = Supplier::get();
       // echo 'hel';die;
  		return View('supplier.supplier-view');
  	}
  	 
  	public function supplierEdit($id){ 
  	   
		 if(count(Supplier::where('id', $id)->first())<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = Supplier::where('id', $id)->first();
        $getsupplierList = Supplier::get(); 
        return View('supplier.supplier-view',compact('user','getsupplierList'));

   }

   public function supplierSave(Request $request){

   		$this->validate($request, [   

            'name'       => 'required', 
            'mobile'     => 'required|min:10|numeric', 
            'email'      => 'required',
            'address'    => 'required',
            'status'     => 'required'

        ]);
   		 if(!empty($request->id))
        {
            $menu = Supplier::find($request->id);
            notify()->success('Success, Supplier information successfully updated.');
        }
        else
        {
        	$menu = new Supplier;
        }   $menu->name    = $request->name;
            $menu->mobile  = $request->mobile;
            $menu->email   = $request->email;
            $menu->address = $request->address;
            $menu->status  = $request->status;
            $menu->save();
            if(empty($request->id))
            {
            notify()->success('Success, Supplier successfully created.');
            }
            return redirect()->route('supplier-list');

   }


    public function supplierDelete($id){
		 if(count(Supplier::where('id', $id)->first())<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $user = Supplier::where('id', $id)->delete();
        notify()->success('Success, Supplier successfully deleted.');
        return \Redirect()->back();
   }

   

}
