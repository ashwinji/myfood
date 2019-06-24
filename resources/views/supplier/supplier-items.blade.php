@extends('layouts.master')
@section('content')
@inject('content', 'App\library\InjectService')

<!-- <div class="page-header">
    <ol class="breadcrumb breadcrumb-arrow mt-3">
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li class="active"><span>User Management</span></li>
    </ol>
</div> -->

@if(Request::segment(2)==='supplier-edit-item' || Request::segment(2)==='add-supplier-item')
@if(Request::segment(2)==='add-supplier-item')
<?php
$id                               = '';
$name                             = '';
$mobile                           = '';
$email                            = '';
$address                          = '';
$status                           = '';

?>
@else
<?php
$id                              = $supplieritems->id;
$name                            = $supplieritems->name;
$mobile                          = $supplieritems->mobile;
$email                           = $supplieritems->email;
$address                         = $supplieritems->address;
$status                          = $supplieritems->status;


?>
@endif

{{ Form::open(array('route' => 'supplier-item-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}

@csrf
<div class="row row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(2)==='add-supplier-item')
                    Add
                    @else
                    Edit
                    @endif
                    Supplier
                </h3>
            </div>
            <div class="card-body">
                <div class="row">


            <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="form-label">Supplier Name</label>
                            {!! Form::text('name',$name,array('id'=>'name','class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Supplier Name', 'autocomplete'=>'off','required'=>'required' )) !!}
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile" class="form-label">Contact Number</label>
                            {!! Form::number('mobile',$mobile,array('id'=>'mobile','class'=> $errors->has('mobile') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Contact Number', 'autocomplete'=>'off','required'=>'required' )) !!}
                            @if ($errors->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            {!!Form::email('email',$email,array('id'=>'email','class'=> $errors->has('email') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Email', 'autocomplete'=>'off','required'=>'required' )) !!}
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            {!! Form::textarea('address',$address,array('id'=>'address','class'=> $errors->has('contact_no') ? 'form-control is-invalid state-invalid' : 'form-control','rows' => 6, 'placeholder'=>'Address', 'autocomplete'=>'off','required'=>'required' )) !!}
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                 
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
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
            <h3 class="card-title ">Supplier Items List</h3>
            <div class="card-options">
                @if(auth()->user()->userType=='admin')
                   
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('add-supplier') }}"> <i class="fa fa-plus"></i> Create New Supplier Item</a>
                   
                @endif

                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table  id="example" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Supplier Name</th> 
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Create Date</th>
                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php $i = 0 @endphp
                        @foreach($getsupplierList as $getsupplier)
                        <tr>
                            <td>{!! ++$i !!}</td>
                            <td>{!! $getsupplier->name !!}</td>   
                            <td>{!! $getsupplier->mobile !!}</td>
                            <td>{!! $getsupplier->email !!}</td>
                            <td>{!! $getsupplier->address !!}</td>
                            <td>{!! $getsupplier->status !!}</td> 
                            <td>{!! $getsupplier->created_at !!}</td>                                      
                            <td>
                                <div class="btn-group btn-group-xs">   
                                    <a class="btn btn-sm btn-primary" href="{{ route('supplier-edit',$getsupplier->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('supplier-delete',$getsupplier->id) }}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>
</div>
@endif

@endsection