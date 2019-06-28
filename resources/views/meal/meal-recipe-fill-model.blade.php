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
   $mealname = $service->getmealname($id);
  ?>                                  
 {{ Form::open(array('route' => 'meal_recipe_save', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
 {!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
        @csrf
        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="meal_name" class="form-label">Meal Name</label>
                            {!! Form::text('meal_name',$mealname,array('id'=>'meal_name','class'=> $errors->has('meal_name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Meal Name', 'autocomplete'=>'off','required'=>'required','step'=>'any')) !!}
                            @if ($errors->has('meal_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('meal_name') }}</strong>
                            </span>
                            @endif
                        </div>

 
                        @foreach($recipelist as $recipe)
                
                        <?php $ifyes = $service->checkifrecipe_id_exist($id,$recipe->id);  ?>
                        <div class="col-md-4" style="display:inline-block;">
                        <label class="custom-control custom-checkbox custom-control-inline ">
					    <input type="checkbox" class="custom-control-input" name="recipelst[]" value="{{$recipe->id}}" <?php if($ifyes ==1){ echo "checked";} else{} ?>>
                        <span class="custom-control-label">{{$recipe->name}} {{$ifyes}} </span><br>
                        </label>
                        </div>
                        

                        @endforeach
                        
                    </div>
                 
                    <div class="form-footer modal-footer">
                        {!! Form::submit('Save', array('class'=>'btn btn-primary btn-block')) !!}
                        <div class="modal-footer">

        <button type="button" class="btn btn-danger ss" data-dismiss="modal">Close</button>
    </div>

                    </div>

                </div>
            </div>
            {{ Form::close() }}
                        
   
                    </div>
                    
                    </div> 
        
    </div>

   
    