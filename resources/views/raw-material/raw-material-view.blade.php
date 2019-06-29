@extends('layouts.master')
@section('content')


@if(Request::segment(2)==='raw-material-edit' || Request::segment(2)==='raw-material-add')
@if(Request::segment(2)==='raw-material-add')
<?php
$id              = '';
$item_name       = '';
$unit            = '';
$expected_price  = '';
?>
@else
<?php
$id              = $rawmateriallist->id;
$item_name       = $rawmateriallist->item_name;
$unit            = $rawmateriallist->unit;
$expected_price  = $rawmateriallist->expected_price;
?>
@endif

{{ Form::open(array('route' => 'raw-material-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(1)==='raw-material-add')
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
                            <label for="item_name" class="form-label">Ingredient Name</label>
                            {!! Form::text('item_name',$item_name,array('id'=>'item_name','class'=> $errors->has('item_name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Item Name', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('item_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('item_name') }}</strong>
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
                                <option value="{{$units->id}}" selected>{{ $units->name }}</option>
                                @else
                                <option value="{{$units->id}}" >{{ $units->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ingredient_name" class="form-label">Expected Price</label>
                            {!! Form::text('expected_price',$expected_price,array('id'=>'expected_price','class'=> $errors->has('expected_price') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Expected Price', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('ingredient_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_name') }}</strong>
                            </span>
                            @endif
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
                
                <a class="btn btn-sm btn-outline-primary" href="{{route('raw-material-add')}}"> <i class="fa fa-plus"></i> Create New Item</a>
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
                            <th scope="col">Item Name</th>                                           
                            <th scope="col">Units</th>                                            
                            <th scope="col">Expected Price</th>                                            

                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach($rawmateriallist as $key=>$rows)
                        <tr>
                            <td>{{ ($rawmateriallist->currentpage()-1) * $rawmateriallist->perpage() + $key + 1 }}</td>
                            <td>{!! $rows->item_name!!}</td>   
                            <td>{!! $rows->unitname->name !!}</td>   
                            <td>{!! $rows->expected_price !!}</td>   

                            <td>
                                <div class="btn-group btn-group-xs">                                   
                                   
                                    <a class="btn btn-sm btn-primary" href="{{ route('raw-material-edit',array('id'=>$rows->id)) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>

                                    <a class="btn btn-sm btn-danger" href="{{ route('raw-material-delete',array('id'=>$rows->id)) }}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                   
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
                          {{ $rawmateriallist->links() }}
          </div>

@endif

@endsection