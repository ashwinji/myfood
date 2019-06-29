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
 {!! Form::hidden('id','',array('class'=>'form-control')) !!}
        @csrf
        <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label click-me">Prepared Qty</label>
                            {!! Form::number('name','',array('id'=>'name','class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Food product name', 'autocomplete'=>'off','required'=>'required','min'=>1,'onBlur="showaccordian()"')) !!}
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                     </div>


                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Prepared Date</label>
                            {!! Form::number('name','',array('id'=>'name','class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Food product name', 'autocomplete'=>'off','required'=>'required','min'=>1)) !!}
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                     </div>

                      <div class="col-md-12">
                        <div class="panel-group"  role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default active">
                        <div class="panel-heading " role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a id="p2" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                              Collapsible Group Item #1
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div>
                     
                      
                    </div><!-- panel-group -->
                     </div>
                   <!--I have done this-->
                   <div class="col-md-12">
                   <div class="row">

                        
                       
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


    <script type="text/javascript">
     



      function showaccordian()
      {
        $('#collapseOne').collapse('toggle');
      
      }
    </script>