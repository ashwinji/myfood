<?php

namespace App\Http\Controllers;
          
use App\PurchaseIndentItem;
use App\PurchaseIndent;
use App\RawMaterialMaster;
use Illuminate\Http\Request;
use DataTables;


class PurchaseIndentItemController extends Controller
{
    function __construct()
    {
        /*$this->middleware('permission:mealType');
        $this->middleware('permission:mealType', ['only' => ['mealTypeAdd','mealTypeEdit','mealTypeSave','mealTypeDelete','mealTypeAction']]);*/  
    }

        public function index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = PurchaseIndentItem::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-sm btn-info showProduct"><i class="fa fa-eye"></i></a>';
               $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-primary editProduct"><i class="fa fa-edit"></i></a>';
               $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-danger deleteProduct"><i class="fa fa-trash"></i></a>';
            
                return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      $purchaseindent    = PurchaseIndent::get();
      $rawmaterialmaster = RawMaterialMaster::get();
      return view('purchaseindent.purchaseindentitemView',compact('purchaseindents','purchaseindent','rawmaterialmaster'));
    }

    
    
    public function store(Request $request)
    {

      if(empty($request->id))
      {
      request()->validate([
            'purchase_indent_id'  => 'required',   
            'item_id'             => 'required',
            'unit'                => 'required',   
            'required_qty'        => 'required',
            'price'               => 'required',
            'accept_qty'          => 'required',
            'item_status'         => 'required',
            'complete_date'       => 'required',
        ]);
     }
     else
     {
      request()->validate([
            'purchase_indent_id'  => 'required',   
            'item_id'             => 'required',
            'unit'                => 'required',   
            'required_qty'        => 'required',
            'price'               => 'required',
            'accept_qty'          => 'required',
            'item_status'         => 'required',
            'complete_date'       => 'required', 
        ]);
     }
        PurchaseIndentItem::updateOrCreate(['id' => $request->id],
                ['indent_date' => $request->indent_date, 'remark' => $request->remark]);        
   
        return response()->json(['success'=>'Purchase Indent saved successfully.']);
    }

    
    
    public function show($id)
    {
        $purchaseindent = PurchaseIndentItem::findOrFail($id);

        return response()->json($purchaseindent);
    }

    
    
    public function edit($id)
    {
        $purchaseindent = PurchaseIndentItem::find($id);
        return response()->json($purchaseindent);
    }

    
    
    public function destroy($id)
    {
        PurchaseIndentItem::findOrFail($id)->delete();
        return response()->json(['success'=>'Purchase Indent deleted successfully.']);
    }

    public function getUnit(Request $request)
    {
     $getunit = RawMaterialMaster::where("unit",$request->raw_material)
                ->pluck("item_name","id");
        return response()->json($getunit);
    }

}
