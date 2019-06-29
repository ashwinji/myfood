<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipeMaster;
use App\User;
use App\TaskAssign;
use App\Ingredient;
use App\RawMaterialStock;
use Carbon\Carbon;
use Auth;
use DB;

class TaskAssignController extends Controller
{
     function __construct()
    {
        /*$this->middleware('permission:mealType');
        $this->middleware('permission:mealType', ['only' => ['mealTypeAdd','mealTypeEdit','mealTypeSave','mealTypeDelete','mealTypeAction']]);*/  
    }


    public function Tasks()
    {
          $tasklist = TaskAssign::paginate(10);
          $assigningdt = '';
    	 return view('task-assign.task-assign-view',compact('tasklist','assigningdt'));
    }

    public function ShowTaskAssigningPage(Request $request)
    {
        $id = $request->id;
        $recipelist = RecipeMaster::get();
        $cheflist = User::where('userType','chef')->get();
        $datarow = TaskAssign::where('id',$id)->first();
        // dd($datarow);
        return view('task-assign.task-assign-fill-modal',compact('recipelist','cheflist','id','datarow'));


    }

    public function FillTheTask(Request $request)
    {
        
        //return count($request->recipe_name);

        // dd($request->all());
    	$chefid =  $request->chef_id;
    	//return $request->targeted_qty[0];
    	// return Carbon::now()->toDateTimeString();
    	$cc = count($request->inps);
        // return json_encode($request->targeted_qty);
        // return $cc;
         for($i=0;$i<$cc;$i++)
        	{
                if($request->inps[$i]!=0)
                {
	    		$assignlist = new TaskAssign;
	    		$assignlist->chef_id = $chefid;
	    		$assignlist->recipe_master_id =  $request->inps[$i];
	    		$assignlist->assigned_qty  = $request->targeted_qty[$i];
	    		$assignlist->assigned_date  = Carbon::now()->toDateTimeString();
                $assignlist->save();
               }
               else
               {}

	    	}
        // $assignedlist = TaskAssign::get();
         
         $assignedlist = TaskAssign::join('users', 'task_assigns.chef_id', '=', 'users.id')
                         ->join('recipe_masters','task_assigns.recipe_master_id','=','recipe_masters.id')
                         ->select('task_assigns.assigned_qty','task_assigns.assigned_date','task_assigns.id','users.name as chefname','recipe_masters.name as recipename')
                         ->get();

         $lst = json_encode($assignedlist);
         return $lst;
    }

    public function DeleteAssignedTask($id)
    {
        //dd($id);
        if(TaskAssign::where('id', $id)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $task = TaskAssign::where('id', $id)->delete();
        notify()->success('Success, Task successfully deleted.');
        // return true;
        //return \Redirect()->back();
       $tasklist = TaskAssign::paginate(10);
          $assigningdt = '';
       return view('task-assign.task-assign-view',compact('tasklist','assigningdt'));
    }

    public function SavetheTargetUpdated(Request $request)
    {

       $newvalue =  $request->newvalue;
       $id = $request->id;

        if($newvalue == '0')
        {
            notify()->error('Oops!!!, Zero is not allowed.');
           return false;
           // return \Redirect()->back();
        }
        else
        {
         $newqty= TaskAssign::find($id);
         $newqty->assigned_qty           = $newvalue;                    
         $newqty->save();
         notify()->success('Success, Task successfully updated.');
         return \Redirect()->back();
         }        
        
    }



    /////////////////////////Now we are deducting the task

    public function DeducttheStockQuantity($id)
    {
      
       // $taskassignmasterid = $request->id;
       $taskassignmasterid = $id;
       $datarow = TaskAssign::where('id',$taskassignmasterid)->first();

        $recipeid = $datarow['recipe_master_id'];
        /////now get the list of ingredients
        
       $ingredientlist = Ingredient::where('recipe_master_id',$recipeid)->get();
       $targeted_qty = $datarow['assigned_qty'];
       $counting = count($ingredientlist);
       $initcount =0;
       foreach($ingredientlist as $list)
                {
                    $required_qty = $list->standard_qty*$targeted_qty;
                    $item = $list->item_id;
                    /// now check whether we are having enough stock
                    $currentstockofitem = RawMaterialStock::where('item_id',$item)->first()->current_stock; 
                    if($required_qty > $currentstockofitem)
                    { return 'running out of stock';  }
                    else
                    {   $initcount++;  }
                }
         if($initcount == $counting)
         {
               ///////////////////////////Now we are actually deducting the stock
               foreach($ingredientlist as $list)
                {
                    $required_qty = $list->standard_qty*$targeted_qty;
                    $item = $list->item_id;
                    /// now check whether we are having enough stock
                    
                    $currentstockofitem = RawMaterialStock::where('item_id',$item)->first()->current_stock; 
                    $updated_stock = $currentstockofitem-$required_qty;
                    $data = ['current_stock' => $updated_stock];
                    RawMaterialStock::where('item_id',$item)->update($data);

                   
                }
               ///////////////////////////Now we are actually deducting the stock

         }
         else
         {

         }
               return 'Stock is deducted';

      //  notify()->error('Oops!!!, Running out of stock.');
      ///  return 'true';
    }

    public function GetTheBusyChefList(Request $request)
    {

      $assigningdt = $request->assigned_date;
    
      
      $tasklist  = TaskAssign::select('chef_id')
                           ->distinct()
                           ->where('assigned_date',$assigningdt)
                           ->get();
        return view('task-assign.task-assign-view',compact('tasklist','assigningdt'));

    }

    public function DeleteAllofThisChef($chefid)
    {
        //dd($id);
        if(TaskAssign::where('chef_id', $chefid)->count()<1)
        {
            notify()->error('Oops!!!, something went wrong, please try again.');
            return \Redirect()->back();
        }
        $task = TaskAssign::where('chef_id', $chefid)->delete();
        notify()->success('Success, Task successfully deleted.');
        // return true;
       // return \Redirect()->back();
        $tasklist = TaskAssign::paginate(10);
          $assigningdt = '';
       return view('task-assign.task-assign-view',compact('tasklist','assigningdt'));
    }




       public function SubmitDailyChefTask(Request $request)
       {
        $totalrows = count($request->taskarray);
        $tasks = $request->taskarray;
        $reasonlist = $request->reasonarray;
        $completedarray = $request->completedqtyarray;
        $i =0;
        $chef_id = Auth::id();
        $currenttime = Carbon::now()->toDateTimeString();
          
        foreach($request->taskarray as $key=>$value)
           {
           
              $data =[
              'prepared_qty' => $completedarray[$i],
              'reason' => $reasonlist[$i],
              'prepared_date'=>$currenttime,
                ];
              TaskAssign::where('id',$value)
                          ->update($data);

    $deductingthestock = $this->deductthestockquantity($value); //we are passing the taskassign master id      
          }

          notify()->success('Success, Task successfully Submitted.');
          return \Redirect()->back();

       }

}
