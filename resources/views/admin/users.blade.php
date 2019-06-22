@extends('layouts.master')
@section('content')

<!-- <div class="page-header">
    <ol class="breadcrumb breadcrumb-arrow mt-3">
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li class="active"><span>User Management</span></li>
    </ol>
</div> -->
@if(Request::segment(1)==='edit-user' || Request::segment(1)==='add-user')
@if(Request::segment(1)==='add-user')
<?php
$id             = '';
$name           = '';
$email          = '';
$address        = '';
$mobile         = '';
$address        = '';
$companyName    = '';
$status         = '';
$tw_account_sid = '';
$tw_auth_token  = '';
$tw_mobile_num  = '';
$userRole       = '';
?>
@else
<?php
$id             = $user->id;
$name           = $user->name;
$email          = $user->email;
$address        = $user->address;
$mobile         = $user->mobile;
$address        = $user->address;
$companyName    = $user->companyName;
$status         = $user->status;
$tw_account_sid = $user->tw_account_sid;
$tw_auth_token  = $user->tw_auth_token;
$tw_mobile_num  = $user->tw_mobile_num;
$userRole       = $userRole;
?>
@endif

{{ Form::open(array('route' => 'user-save', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
{!! Form::hidden('id',$id,array('class'=>'form-control')) !!}
@csrf
<div class="row row-deck">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(1)==='add-user')
                    Add
                    @else
                    Edit
                    @endif
                    User
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            {!! Form::text('name',$name,array('id'=>'name','class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Name', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            {!! Form::text('email',$email,array('id'=>'email','class'=> $errors->has('email') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Email Address', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    @if(Request::segment(1)==='add-user')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            {!! Form::text('password','',array('id'=>'password','class'=> $errors->has('password') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Password', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            {!! Form::text('confirm-password','',array('id'=>'confirm-password','class'=> $errors->has('confirm-password') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Confirm Password', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('confirm-password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('confirm-password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile</label>
                            {!! Form::text('mobile',$mobile,array('id'=>'mobile','class'=> $errors->has('mobile') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Mobile', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            {!! Form::text('address',$address,array('id'=>'address','class'=> $errors->has('address') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Address', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companyName" class="form-label">Company Name</label>
                            {!! Form::text('companyName',$companyName,array('id'=>'companyName','class'=> $errors->has('companyName') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Company Name', 'autocomplete'=>'off','required'=>'required')) !!}
                            @if ($errors->has('companyName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('companyName') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="roles" class="form-label">Role</label>
                            {!! Form::select('roles', $roles,$userRole, array('class' => 'form-control')) !!}
                            @if ($errors->has('roles'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if(Request::segment(1)==='add-user')
                    Add
                    @else
                    Edit
                    @endif
                    Twilio Info
                </h3>
                <div class="card-options">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="tw_account_sid" class="form-label">Twilio Account Sid</label>
                    {!! Form::text('tw_account_sid',$tw_account_sid,array('id'=>'tw_account_sid','class'=> $errors->has('tw_account_sid') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Twilio Account Sid', 'autocomplete'=>'off','required'=>'required')) !!}
                    @if ($errors->has('tw_account_sid'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tw_account_sid') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tw_auth_token" class="form-label">Twilio Auth Token</label>
                    {!! Form::text('tw_auth_token',$tw_auth_token,array('id'=>'tw_auth_token','class'=> $errors->has('tw_auth_token') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Twilio Auth Token', 'autocomplete'=>'off','required'=>'required')) !!}
                    @if ($errors->has('tw_auth_token'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tw_auth_token') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tw_mobile_num" class="form-label">Twilio Mobile Number</label>
                    {!! Form::text('tw_mobile_num',$tw_mobile_num,array('id'=>'tw_mobile_num','class'=> $errors->has('tw_mobile_num') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Twilio Mobile Number', 'autocomplete'=>'off','required'=>'required')) !!}
                    @if ($errors->has('tw_mobile_num'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tw_mobile_num') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-footer">
                    {!! Form::submit('Save', array('class'=>'btn btn-primary btn-block')) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

@elseif(Request::segment(1)==='view-user')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-primary">
                    <div class=" tab-menu-heading">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class=""><a href="#basicInfo" class="active" data-toggle="tab">Basic Info</a></li>
                                <li class=""><a href="#twInfo" data-toggle="tab">Twilio Info</a></li>
                                <li><a href="#apiInfo" data-toggle="tab">Api Info</a></li>
                                <li><a href="#accountInfo" data-toggle="tab">Account Info</a></li>
                                <li><a href="#otherInfo" data-toggle="tab">Others</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active " id="basicInfo">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item justify-content-between">
                                                Name
                                                <span class="badgetext">{{ $user->name }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Email
                                                <span class="badgetext">{{ $user->email }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Mobile
                                                <span class="badgetext">{{ $user->mobile }}</span>
                                            </li>
                                            
                                            <li class="list-group-item justify-content-between">
                                                Company Name
                                                <span class="badgetext">{{ $user->companyName }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Website URL
                                                <span class="badgetext">{{ $user->websiteUrl }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Auto lock time out
                                                <span class="badgetext">{{ $user->locktimeout }} minute</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Status
                                                @if($user->status=='0') 
                                                <span class="badgetext text-danger">
                                                    Inactive
                                                </span>
                                                @else
                                                <span class="badgetext text-success">
                                                    Active
                                                </span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group">

                                            <li class="list-group-item justify-content-between">
                                                Address
                                                <span class="badgetext">{{ $user->address }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                City
                                                <span class="badgetext">{{ $user->city }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Zip Code
                                                <span class="badgetext">{{ $user->zipCode }}</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Logo
                                                <span class="badgetext">
                                                    <img src="{{ url('/')}}/{{ $user->companyLogo }}" height="160">
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="twInfo">
                                <ul class="list-group">
                                    <li class="list-group-item justify-content-between">
                                        Twilio Account Sid
                                        <span class="badgetext">{{ $user->tw_account_sid }}</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Twilio Auth Token
                                        <span class="badgetext">{{ $user->tw_auth_token }}</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Twilio Mobile Number
                                        <span class="badgetext">{{ $user->tw_mobile_num }}</span>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="tab-pane " id="apiInfo">
                                <ul class="list-group">
                                    <li class="list-group-item justify-content-between">
                                        App Key
                                        <span class="badgetext">{{ $user->app_key }}</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        App Secret
                                        <span class="badgetext">{{ $user->app_secret }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane " id="accountInfo">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-status card-status-left bg-red br-bl-7 br-tl-7"></div>
                                            <div class="card-header">
                                                <h3 class="card-title">Credit Balance</h3>
                                                <div class="card-options">
                                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                {{ Form::open(array('route' => 'add-credit', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
                                                {!! Form::hidden('app_key',$user->id,array('class'=>'form-control')) !!}
                                                @csrf
                                                <div class="form-group">
                                                    <label for="current_balance" class="form-label">Credit Balance</label>
                                                    {!! Form::number('current_balance','',array('id'=>'current_balance','class'=> $errors->has('current_balance') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Credit Balance', 'autocomplete'=>'off','required'=>'required','step'=>'1')) !!}
                                                    @if ($errors->has('current_balance'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('current_balance') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="expire_at" class="form-label">Expire</label>
                                                            {!! Form::date('expire_at','',array('id'=>'expire_at','class'=> $errors->has('expire_at') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Expire', 'autocomplete'=>'off','required'=>'required')) !!}
                                                            @if ($errors->has('expire_at'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('expire_at') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="rate" class="form-label">Rate</label>
                                                            {!! Form::number('rate','',array('id'=>'rate','class'=> $errors->has('rate') ? 'form-control is-invalid state-invalid' : 'form-control', 'placeholder'=>'Rate', 'autocomplete'=>'off','required'=>'required')) !!}
                                                            @if ($errors->has('rate'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('rate') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="">
                                                    {!! Form::submit('Add Credit', array('class'=>'btn btn-primary btn-block')) !!}
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-status card-status-left bg-red br-bl-7 br-tl-7"></div>
                                            <div class="card-header">
                                                <h3 class="card-title">Credit Information</h3>
                                                <div class="card-options">
                                                    <label class="custom-switch m-0">
                                                        <input type="checkbox" value="Yes" class="custom-switch-input" @if($user->status=='1') checked @endif onchange="changeAccountStatus('{{$user->app_key}}')">
                                                        <span class="custom-switch-indicator" data-container="body" data-toggle="popover" data-popover-color="default" data-placement="top" data-content="@if($user->status=='0') 
                                                            Activate Account?
                                                            @else
                                                            Deactivate Account?
                                                            @endif" data-original-title=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item justify-content-between">
                                                            Current balance
                                                            <span class="badgetext badge badge-primary badge-pill">14000</span>
                                                        </li>

                                                        <li class="list-group-item justify-content-between">
                                                            Expire
                                                            <span class="badgetext font-weight-bold">24 Jan 2019</span>
                                                        </li>

                                                        <li class="list-group-item justify-content-between">
                                                            Rate
                                                            <span class="badgetext font-weight-bold">12.5/Msg</span>
                                                        </li>

                                                        <li class="list-group-item justify-content-between">
                                                            Last Credit
                                                            <span class="badgetext font-weight-bold">01 Jan 2019 10:25:22 AM</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">

                                            <div class="card">
                                                <div class="card-status card-status-left bg-red br-bl-7 br-tl-7"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title ">Credit Log</h3>
                                                    <div class="card-options">
                                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover card-table table-bordered table-vcenter table-outline text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Credit</th>
                                                                    <th scope="col">Rate</th>
                                                                    <th scope="col">Expire</th>
                                                                    <th scope="col">Credited By</th>
                                                                    <th scope="col">Credited</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>25000</td>
                                                                    <td>14.25</td>
                                                                    <td>24 Jan 2019</td>
                                                                    <td>Ashok</td>
                                                                    <td>01 Jan 2019 10:25:22 AM</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>25000</td>
                                                                    <td>14.25</td>
                                                                    <td>24 Jan 2019</td>
                                                                    <td>Ashok</td>
                                                                    <td>01 Jan 2019 10:25:22 AM</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>25000</td>
                                                                    <td>14.25</td>
                                                                    <td>24 Jan 2019</td>
                                                                    <td>Ashok</td>
                                                                    <td>01 Jan 2019 10:25:22 AM</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>25000</td>
                                                                    <td>14.25</td>
                                                                    <td>24 Jan 2019</td>
                                                                    <td>Ashok</td>
                                                                    <td>01 Jan 2019 10:25:22 AM</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane " id="otherInfo">
                                    <p>page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@else
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header ">
            <h3 class="card-title ">User Management</h3>
            <div class="card-options">
                @can('user-create')
                <a class="btn btn-sm btn-outline-primary" href="{{ route('user-create') }}"> <i class="fa fa-plus"></i> Create New User</a>
                @endcan
                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
        </div>
        {{ Form::open(array('route' => 'user-action', 'class'=> 'form-horizontal', 'autocomplete'=>'off')) }}
        @csrf
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Company</th>
                            <th scope="col">Status</th>
                            <th scope="col"width="10%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 0 @endphp
                        @foreach($data as $rows)
                        <tr>
                            <td>
                                <label class="custom-control custom-checkbox">
                                    {{ Form::checkbox('boxchecked[]', $rows->id,'', array('class' => 'colorinput-input custom-control-input', 'id'=>'')) }}
                                    <span class="custom-control-label"></span>
                                </label>
                            </td>
                            <td>{!! ++$i !!}</td>
                            <td>{!! $rows->name !!}</td>
                            <td>{!! $rows->email !!}</td>
                            <td>{!! $rows->contactNo !!}</td>
                            <td>{!! $rows->companyName !!}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs ">
                                    @if($rows->status=='0') 
                                    <span class="text-danger">Inactive</span>
                                    @else 
                                    <span class="text-success">Active</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    @can('user-view')
                                    <a class="btn btn-sm btn-secondary" href="{{ route('user-view',$rows->app_key) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                                    @endcan
                                    @can('user-edit')
                                    <a class="btn btn-sm btn-primary" href="{{ route('user-edit',$rows->app_key) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('user-delete')
                                    <a class="btn btn-sm btn-danger" href="{{ route('user-delete',$rows->app_key) }}" onClick="return confirm('Are you sure you want to delete this?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @can('user-action')
            <div class="row div-margin">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="input-group"> 
                        <span class="input-group-addon">
                            <i class="fa fa-hand-o-right"></i> </span> 
                            {{ Form::select('cmbaction', array(
                            ''              => 'Action', 
                            'Active'        => 'Active',
                            'Inactive'  => 'Inactive'), 
                            '', array('class'=>'form-control','id'=>'cmbaction'))}} 
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-6">
                        <div class="input-group">
                            <button type="submit" class="btn btn-danger pull-right" name="Action" onClick="return delrec(document.getElementById('cmbaction').value);">Apply</button>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endif

@endsection