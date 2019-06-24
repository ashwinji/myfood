@extends('layouts.master')
@section('content')

<!-- <div class="page-header">
    <ol class="breadcrumb breadcrumb-arrow mt-3">
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li class="active"><span>User Management</span></li>
    </ol>
</div> -->
@if(Request::segment(1)==='rawmaterial-edit' || Request::segment(1)==='rawmaterial-add')
@if(Request::segment(1)==='rawmaterial-add')
<?php
$id                    = '';
$ingredient_name       = '';
// $qty_in_grams       = '';
$unit = '';
?>
@else
<?php
$id                    = $ingredientlist->id;
$ingredient_name       = $ingredientlist->ingredient_name;
$unit                  = $ingredientlist->unit;
?>
@endif

{{ Form::open(array('route' => 'rawmaterial-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(1)==='rawmaterial-add')
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
                            {!! Form::text('ingredient_name',$ingredient_name,array('id'=>'ingredient_name','class'=> $errors->has('ingredient_name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Ingredient Name', 'autocomplete'=>'off','required'=>'required')) !!}
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
                            <select class="form-control show-tick" name="unitname" required>
                                <option value=''>--Select Unit--</option>

                                @foreach($unitlist as $units)
                                @if($unit == $units->id)
                                <option value="{{$units->id}}" selected>{{ $units->weight_unit }}</option>
                                @else
                                <option value="{{$units->id}}" >{{ $units->weight_unit }}</option>
                                @endif
                                @endforeach
                            </select>
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
                
                <a class="btn btn-sm btn-outline-primary" href="#"> <i class="fa fa-plus"></i> Create New Item</a>
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
                            <th scope="col">Ingredient Name</th>                                            
                            <th scope="col">Units</th>                                            

                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>   
                            <td></td>   
                            <td>
                                <div class="btn-group btn-group-xs">                                   
                                   
                                    <a class="btn btn-sm btn-primary" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="#" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                   
                                </div>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
            
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endif

@endsection