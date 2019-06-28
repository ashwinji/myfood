@extends('layouts.master')
@section('content')

<!-- <div class="page-header">
    <ol class="breadcrumb breadcrumb-arrow mt-3">
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li class="active"><span>User Management</span></li>
    </ol>
</div> -->
@if(Request::segment(2)==='unit-edit' || Request::segment(2)==='unit-add')
@if(Request::segment(2)==='unit-add')
<?php
$id                       = '';
$weight_unit              = '';
?>
@else
<?php
$id                       = $unitrow->id;
$weight_unit              = $unitrow->name;
?>
@endif

{{ Form::open(array('route' => 'unit-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}

@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(2)==='unit-add')
                    Add
                    @else
                    Edit
                    @endif
                    Weight Unit
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="weight_unit" class="form-label">Weight Unit</label>
                            {!! Form::text('weight_unit',$weight_unit,array('id'=>'weight_unit','class'=> $errors->has('weight_unit') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Weight unit', 'autocomplete'=>'off','required'=>'required','step'=>'any')) !!}
                            @if ($errors->has('weight_unit'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('weight_unit') }}</strong>
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
            <h3 class="card-title "> Weight Unit</h3>
            <div class="card-options">
               
                <a class="btn btn-sm btn-outline-primary" href="{{ route('unit-add') }}"> <i class="fa fa-plus"></i> Create New Weight Unit</a>
                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
        </div>
        {{ Form::open(array('route' => 'unit-master', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
        @csrf
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>                           
                            <th scope="col">Weight Unit</th>                        
                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($data as $key=>$rows)
                       
                        <tr>
                            <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}</td>                           
                            
                            <td>{!! $rows->name !!}</td>                         
                            <td>
                                <div class="btn-group btn-group-xs">                                   
                                    <a class="btn btn-sm btn-primary" href="{{ route('unit-edit',array('id'=>$rows->id)) }}" data-toggle="tooltip" data-placement="top" title="Unit Edit" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('unit-delete',array('id'=>$rows->id)) }}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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