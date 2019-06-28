<?php

namespace App\Http\Controllers;
          
use App\PurchaseIndent;
use Illuminate\Http\Request;
use DataTables;


class PurchaseIndentController extends Controller
{
    function __construct()
    {
        /*$this->middleware('permission:mealType');
        $this->middleware('permission:mealType', ['only' => ['mealTypeAdd','mealTypeEdit','mealTypeSave','mealTypeDelete','mealTypeAction']]);*/  
    }

        public function index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = PurchaseIndent::latest()->get();
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
      
        return view('purchaseindent.purchaseindentView',compact('purchaseindents'));
    }

    
    public function store(Request $request)
    {

      if(empty($request->id))
      {
      request()->validate([
            'indent_date'    => 'required',   
            'remark'         => 'required',
        ]);
     }
     else
     {
      request()->validate([
            'indent_date'       => 'required',   
            'remark'            => 'required', 
        ]);
     }
        PurchaseIndent::updateOrCreate(['id' => $request->id],
                ['indent_date' => $request->indent_date, 'remark' => $request->remark]);        
   
        return response()->json(['success'=>'Purchase Indent saved successfully.']);
    }

    
    public function show($id)
    {
        $purchaseindent = PurchaseIndent::findOrFail($id);

        return response()->json($purchaseindent);
    }

    
    public function edit($id)
    {
        $purchaseindent = PurchaseIndent::find($id);
        return response()->json($purchaseindent);
    }

    
    public function destroy($id)
    {
        PurchaseIndent::findOrFail($id)->delete();
        return response()->json(['success'=>'Purchase Indent deleted successfully.']);
    }

}
