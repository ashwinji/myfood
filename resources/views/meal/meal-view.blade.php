@extends('layouts.master')
@section('content')

@if(Request::segment(2)==='meals-edit' || Request::segment(2)==='meals-add')
@if(Request::segment(2)==='meals-add')
<?php
$id                    = '';
$meal_name             = '';
$status                = '';
?>
@else
<?php
$id                    = $data->id;
$meal_name             = $data->meal_name;
$status                = $data->status;
?>
@endif

{{ Form::open(array('route' => 'meals-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(2)==='meals-add')
                    Add
                    @else
                    Edit
                    @endif
                    Meals
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meal_name" class="form-label">Meal Name</label>
                            {!! Form::text('meal_name',$meal_name,array('id'=>'meal_name','class'=> $errors->has('meal_name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Meal Name', 'autocomplete'=>'off','required'=>'required','step'=>'any')) !!}
                            @if ($errors->has('meal_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('meal_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meal_name" class="form-label">Status</label>
                            <select class="form-control show-tick" name="status">
                                
                                <option value="1" @if($status == '1') selected @endif>Active</option>
                                <option value="0" @if($status == '0') selected @endif>Inactive</option>
                                
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
            <h3 class="card-title ">Meals List</h3>
            <div class="card-options">
                
                <a class="btn btn-sm btn-outline-primary" href="{{ route('meals-add') }}"> <i class="fa fa-plus"></i> Create New Meal</a>
                
                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
        </div>
        {{ Form::open(array('route' => 'meals', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
        @csrf
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <!-- <th scope="col"></th> -->
                            <th scope="col">#</th>
                            <th scope="col">Meal Name</th>
                            <th scope="col">Status</th>                                     
                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                         @php $i = 0 @endphp
                        @foreach($mealslist as $rows)
                        <tr>
                            <td>{!! ++$i !!}</td>
                            <td>{!! $rows->meal_name !!}</td>
                            <td>@if($rows->status =='1')Acitve @else Inactive @endif</td>                                           
                            <td>
                                <div class="btn-group btn-group-xs">                                   
                                    <a class="btn btn-sm btn-primary" href="{{ route('meals-edit',array('id'=>$rows->id)) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('meals-delete',array('id'=>$rows->id)) }}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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
@endif

@endsection