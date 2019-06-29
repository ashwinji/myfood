@extends('layouts.master')
@section('content')

<!-- <div class="page-header">
    <ol class="breadcrumb breadcrumb-arrow mt-3">
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li class="active"><span>User Management</span></li>
    </ol>
</div> -->
@if(Request::segment(2)==='recipe-edit' || Request::segment(2)==='recipe-add')
@if(Request::segment(2)==='recipe-add')
<?php
$id                     = '';
$name                   = '';
$recipe_info            = '';
$recipe_method          = '';
$image_path             = '';
$recipe_status          = '';
?>
@else
<?php
$id                     = $data->id;
$name                   = $data->name;
$recipe_info            = $data->recipe_info;
$recipe_method          = $data->recipe_method;
$image_path             = $data->image_path;
$recipe_status          = $data->ingredient;
?>
@endif

{{ Form::open(array('route' => 'recipe-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
{!! Form::hidden('oldimage', $image_path,array('id'=>'oldimage','class'=>'form-control',)) !!}
@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(1)==='recipe-add')
                    Add
                    @else
                    Edit
                    @endif
                    Recipe
                </h3>
              </div>
                <div class="card-body">
                   <div class="row">
                      
                    
                    
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="form-label">Recipe Name</label>
                            {!! Form::text('name',$name,array('id'=>'name','class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Food product name', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                     </div>
                 
                    

                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="image_path" class="form-label">Image</label>                         
                                <div class="custom-file">
                                 {!! Form::file('image_path',array('id'=>'image_path','class'=>'custom-file-input', 'accept'=>'image/*')) !!}
                                     <label class="custom-file-label">Choose file</label>
                                </div>
                            @if ($errors->has('image_path'))
         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_path') }}</strong>
                            </span>
                            @endif
                        </div>
                     </div>


                      

                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipe_info" class="form-label">Recipe Info</label>
                             {!! Form::textarea('recipe_info',$recipe_info,array('id'=>'recipe_info','class'=> $errors->has('recipe_info') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Recipe Information', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('recipe_info'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('recipe_info') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipe_method" class="form-label">Recipe Method</label>
                             {!! Form::textarea('recipe_method',$recipe_method,array('id'=>'recipe_method','class'=> $errors->has('recipe_method') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Recipe Method', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('recipe_method'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('recipe_method') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    @if(Request::segment(2)==='recipe-edit' && $image_path!='')         
                      <div class="col-md-6">
                        <img src="{{url('/')}}/{!! $image_path !!}" width="150px">
                      </div>
                     @endif
                    <div class="col-md-12">
                        <div class="form-group">
                          Add the ingredients
                           <!-- I have done this -->
            <?php $i =1; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example11" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th scope="col">Item Name</th> 
                                <th scope="col" style="width:50%;">Qty </th>
                            
                               
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>

                        <tbody class="itemSection">
                           
                       @if(!empty($ingrelist))
                            @foreach($ingrelist as $ingre)
                            <tr class="blockItem">
                                
                                <td>
                                   <input type="hidden" class="form-control" name="item[]" value="{{ $ingre->item_id }}" >
                                   <span>{{ $ingre->getRawMaterialMaster->item_name }}</span>
                                </td>   
                                <td><input type="text" class="form-control" name="qty[]" value="{{$ingre->standard_qty}}" readonly>
                                </td>
                                <td><div class="btn-group btn-group-xs" style="margin-left: 100px;"> <a class="btn btn-sm btn-danger removeItem" href="javascript:;" data-toggle="tooltip" data-placement="top" title="remove" data-original-title="Remove This"><i class="fa fa-minus" ></i></a> </div></td>
                             
                           </tr>
                           @endforeach
                           @else
                           @endif



                            <tr class="blockItem">
                                <td>
                                    <select class="form-control" name="item[]" id="item1" onchange="gettheunit(this.value,1)" >
                                        <option value="">--Select Item--</option>
                                        @foreach($itemlist as $itm)
                                        <option value="{{$itm->id}}">{{$itm->item_name}}</option>
                                        @endforeach
                                    </select>
                                </td>   
                                <td><input style="width:80%; display: inline-block;" type="text" class="form-control" id="qty1" name="qty[]" value="0.00">
                                    <span style="width:15%; display: inline-block;" id="unitname<?= $i ?>"></span>
                                </td>
                                
                                
                                                                  
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">   

                                       <a class="btn btn-sm btn-secondary addMoreItem" href="javascript:;" data-toggle="tooltip"  data-placement="top" title="" data-original-title="Add new "><i class="fa fa-plus"></i></a>

                             
                                   </div>
                               </td>
                           </tr>
                           
                       </tbody>
                   </table>
               </div>

            </div>
        
            <!-- I have done this -->

            <div class="col-md-4">
                        <div class="form-group">
                            <label for="recipe_status" class="form-label">Status</label>
                            <select name="recipe_status" class="form-control show-tick" required> 
                            <option value="1" @if($recipe_status == '1') selected @endif>Active</option>
                            <option value="0" @if($recipe_status == '0') selected @endif>Inactive</option>
                            </select>
                          </div>
                        </div>
                        </div>
                    </div>
                     
               
                    <div class="form-footer">
                        {!! Form::submit('Save', array('class'=>'btn btn-primary btn-block')) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
{{ Form::close() }}

@else
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title ">Recipe List</h3>
            <div class="card-options">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('recipe-add') }}"> <i class="fa fa-plus"></i> Add Recipe </a>
                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
        </div>
        {{ Form::open(array('route' => 'recipe', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
        @csrf
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th> 
                            <th scope="col">Recipe Info</th>
                            <th scope="col">Recipe Method</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach($data as $key=>$rows)
                        <tr>
                            <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}</td>
                            <td>{{ $rows->name }}</td>   
                            <td>{{ $rows->recipe_info }}</td>
                            <td>{{ $rows->recipe_method }}</td> 
                            <td>@if($rows->recipe_status ==1) Active @else Inactive @endif </td>
                                
                            <td><img src="{{url('/')}}/{!! $rows->image_path !!}" width="80px"></td>
                              
                            <td>
                                <div class="btn-group btn-group-xs">                                   
                                    <a class="btn btn-sm btn-primary" href="{{ route('recipe-edit',array('id'=>$rows->id)) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('recipe-delete',$rows->id) }}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>



  <div class="pagination-nav text-left mt-60 mtb-xs-30 pull-right" >
                          {{ $data->links() }}
          </div>

@endif

@endsection


@section('extrajs')
<script type="text/javascript">
var i = 2;
$('.addMoreItem').click(function() {
$('.blockItem:last').after('<tr class="blockItem"> <td> <select class="form-control" name="item[]" id="item'+i+'" onchange="gettheunit(this.value, '+i+')" ><option value="">--Select Item--</option> @foreach($itemlist as $itm) <option value="{{$itm->id}}">{{$itm->item_name}}</option> @endforeach </select> </td> <td> <input style="width:80%; display: inline-block;" type="text" class="form-control" id="qty'+i+'" name="qty[]"  value="0.00"><span style="width:15%; display: inline-block;" id="unitname'+i+'"></span> </td>   <td class="text-center"> <div class="btn-group btn-group-xs"> <a class="btn btn-sm btn-danger removeItem" href="javascript:;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove This>"><i class="fa fa-minus"></i></a> </div> </td> </tr>'); 
    i++;
});
$('.itemSection').on('click','.removeItem',function() {
  $(this).parents(".blockItem").remove();
});
</script>
@endsection