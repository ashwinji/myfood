@inject('service', 'App\library\InjectService')
@extends('layouts.master')
@section('content')

<!-- <div class="page-header">
    <ol class="breadcrumb breadcrumb-arrow mt-3">
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li class="active"><span>User Management</span></li>
    </ol>
</div> -->
<!-- {{Request::segment(2)}}  -->
@if(Request::segment(2)==='meal-recipe-add' || Request::segment(2)==='meal-recipe-edit')
@if(Request::segment(2)==='meal-recipe')
<?php
$id                   = '';
$meal_master_id       = '';
$recipe_master_id     = '';
?>
@else
<?php
$id                    = $ingredientlist->id;
$meal_master_id        = $ingredientlist->ingredient_name;
$recipe_master_id      = $ingredientlist->unit;
?>
@endif

{{ Form::open(array('route' => 'meal-recipe', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(2)==='meal-recipe')
                    Add
                    @else
                    Edit
                    @endif
                    Ingredient
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ingredient_name" class="form-label">Ingredient Name</label>
                            {!! Form::text('ingredient_name','',array('id'=>'ingredient_name','class'=> $errors->has('ingredient_name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Ingredient Name', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('ingredient_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     


                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="unitname" class="form-label">Unit</label>
                            
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
            <h3 class="card-title ">Item List</h3>
            <div class="card-options">
                
                <a data-toggle="modal" data-target="#takemealinfo" data-id="" id="takemealinfoid" class="btn btn-sm btn-outline-primary" href="javascript:;"> <i class="fa fa-plus"></i> Create Meal</a>




                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
        </div>
        {{ Form::open(array('route' => 'raw-material', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
        @csrf
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Meal </th>                                            
                            <th scope="col">Recipe</th>                                            

                            <th scope="col"width="10%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i=0; ?>
                        @foreach($mealrecipelist as $key=>$rows)
                        <tr>
                            <td>{{ ($mealrecipelist->currentpage()-1) * $mealrecipelist->perpage() + $key + 1 }}</td>
                            <td>{{ $rows->meal_name }}</td>   
                            <td><?php $listingrecipe =  $service->getrecipelisting($rows->id);  ?>
                               <ul>
                               @foreach($listingrecipe as $rows2)
                                   <li>
                                   {{$rows2->getRecipeMaster->name }}
                                   </li>
                               @endforeach
                               <ul>
                            </td>   
                            <td>
                                <div class="btn-group btn-group-xs">                                   
                                   
<a data-toggle="modal" data-target="#takemealinfo" data-id="{{ $rows->id }}" id="takemealinfoid2" class="btn btn-sm btn-primary" href="javascript:;" data-original-title="{{ $rows->meal_master_id }}"><i class="fa fa-edit"></i></a>

                                    
                                   <a class="btn btn-sm btn-danger" href="{{route('mealrecipedelete',array('id'=>$rows->id))}}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a> 
                                   
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
                          {{ $mealrecipelist->links() }}
          </div>




@endif



@endsection


<div class="modal fade" id="takemealinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" 
data-keyboard="true" >
<div class="modal-dialog modal-lg">
    <!-- <div class="text-center loading"> <img src="{{url('/')}}/assets/img/ajax-loader.gif"></div> -->
    <div class="modal-content" id="fillmealinfo"></div>
</div>
</div>