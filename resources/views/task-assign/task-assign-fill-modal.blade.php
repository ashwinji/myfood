@inject('service', 'App\library\InjectService')
<div class="modal-header" id="getitemtotenderdetailsss">
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
    -->
    <h4 class="modal-title" id="myModalLabel">Enter Meal and its recipe
       
    </h4>
     

</div>
@if ($errors->any())
<div class="alert alert-danger login-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="modal-body" id="print_data">      
                      <div class="row">
                       <div class="col-md-12">      
  <?php
   //$mealname = $service->getmealname($id);
  ?>                                  
 {{ Form::open(array('route' => 'meal_recipe_save', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
 {!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
        @csrf
        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
                      <div class="form-group">
                           <label for="chef_id" class="form-label">Select Chef</label>
                           <select class="form-control show-tick" name="chef_id" id="chef_id">
                                @foreach($cheflist as $chef)
                                 @if($datarow['chef_id'] == $chef->id)
                                <option value="{{$chef->id}}" selected>{{ $chef->name}}</option>
                                @else
                                <option value="{{$chef->id}}" >{{ $chef->name}}</option>
                                @endif
                                @endforeach
                           </select>
                        </div>
 
                        
                    </div>
                   <!--I have done this-->
                   <div class="col-md-12">
                   <div class="row">

                        <div class="form-group col-md-6">
                            

                            
                                            <div class="form-group m-0">
                                                    <div class="custom-controls-stacked">
                                                        
                                                   @foreach($recipelist as $recipe)
                                              <label class="custom-control custom-checkbox">
           <input type="checkbox" class="custom-control-input" name="recipe_name[]" value="{{$recipe->id}}"  >
                                               <input type="text"  name="inps[]" value="0" style="display:none"/>
                                                            <span class="custom-control-label">{{$recipe->name}}</span>
                                                        </label>
                                                    @endforeach  
                                                    </div>
                                                </div>
                        </div>
                        <div class="form-group col-md-6">
                             <div class="form-group m-0">
                                                    <div class="custom-controls-stacked">
                                                   @foreach($recipelist as $recipe2)
                                                        <input type="number" id="tr{{$recipe2->id}}" name="targeted_qty[]" min="0" max="200" value="0" style="display:block;" >
                                                    @endforeach  
                                                    </div>
                                                </div>
                        </div>
                    </div>
                </div>
             
                   <!--I have done this-->

                 
                    <div class="form-footer modal-footer">
                        <div class="modal-footer">

        <button type="button" id="savebutton" class="btn btn-danger ss" data-dismiss="modal" >Save</button>
        <button type="button" class="btn btn-danger ss" data-dismiss="modal">Close</button>
    </div>
    </div>

                    </div>

                </div>
            </div>
            {{ Form::close() }}
                        
   
                    </div>
                    
                    </div> 
        
    </div>

    <script>

$(document).ready(function(){
  $("#savebutton").click(function(){
    // var a = $("div").text($("form").serialize());
             // var id = $(this).data('id');
               var formdata = $("form").serialize();
                //alert(formdata);
              $.ajax({
                url: appurl+"admin/filltaskassign",
                type: 'POST',
                data:formdata,
                success:function(info){
                  // alert(info);
                  var response = $.parseJSON(info);
                  var trHTML = '';

                 $("#example").empty();
                 $(function() {
                  var jj=1;
                                $.each(response, function(i, item) {
                                      trHTML += '<tr><td>'+jj+'</td><td>' + item.chefname + '</td><td>' + item.recipename + '</td><td><input  class="targetedqtytxtbox" type="number"  min="1" max="2000" id="'+item.id+'" value="'+item.assigned_qty+'" onBlur="saveindbs(this.value,'+item.id+')" readonly /></td><td>' + item.assigned_date + '</td><td><a class="btn btn-sm btn-primary" href="javascript:;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onClick="changingvalue('+item.id+')"><i class="fa fa-edit"></i></a><a class="btn btn-sm btn-danger" href="javascript:;" onClick="takeconfirm('+item.id+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a></td></tr>';
                                      jj++;
                                });
                                $('#example').append(trHTML);
                            });
                   
                  
                }
              });
            

  });
});



//var foodlist = [];
//var targatedqty = [];

$('input[type="checkbox"]'). click(function(){
var id = $(this).val();
if($(this). prop("checked") == true){
   $(this).next().val(id);
    //$("#tr"+id).css('display','block');
 $('#tr'+id).focus();
}
else if($(this). prop("checked") == false){
 $('#tr'+id).val('0');
  // $("#tr"+id).css('display','none');
 $(this).next().val('0');
}
});




function takeconfirm(id)
{
 if (confirm("Are you sure you want to delete this record!")) {
  // txt = "You pressed OK!";
   // alert(id);
   $.ajax({
        type: "GET",
        url: appurl+'admin/delete-assigned-task/'+id,  
        // data:'id='+id,
        success: function(data){
            // alert(data);
         window.location.href=appurl+'admin/task-assign';    
                // location.reload();
           // alert('done');
            //$splt = data.split('_');
             //$("#unitname"+incrementnumber).html(data);
             // $("#unitname"+incrementnumber).html($splt[0]);
            //$("#price"+incrementnumber).val($splt[1]);

        }
        });
   


   } else {
     // txt = "You pressed Cancel!";
  } 
  }

 </script>

   
    