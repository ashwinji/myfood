@extends('layouts.master')
@section('extracss')
{!! Html::style('assets/plugins/charts-c3/c3-chart.css') !!}
{!! Html::style('assets/plugins/morris/morris.css') !!}

@endsection
@section('content')
                     <div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">IT Dashboard</li>
							</ol>
						</div>

						<div class="row row-cards">
							<div class="col-sm-12 col-lg-6 col-md-6 col-xl-3 ">
								<div class="card card-img-holder">
								    <div class="card-body">
										<iiiip class="card-text text-muted font-weight-semibold mb-1">Total Customer</p>
										<div class="clearfix">
											<div class="float-left  mt-2">
												<h1>6,525</h1>
											</div>
											<div class="float-right text-right">
												<span class="pie" data-peity='{ "fill": ["#ff685c", "#f2f2f2"]}'>226,134</span>
											</div>
										</div>
										<div class="progress progress-md mt-1 h-2">
											<div class="progress-bar  bg-gradient-primary w-70"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
								<div class="card card-img-holder">
								    <div class="card-body">
										<p class="card-text text-muted font-weight-semibold mb-1">Total Chef</p>
										<div class="clearfix">
											<div class="float-left  mt-2">
												<h1>2,435</h1>
											</div>
											<div class="float-right text-right">
												<span class="pie" data-peity='{ "fill": ["#32cafe", "#f2f2f2"]}'>1,4</span>
											</div>
										</div>
										<div class="progress progress-md mt-1 h-2">
											<div class="progress-bar  bg-gradient-secondary w-50"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
							    <div class="card card-img-holder">
								    <div class="card-body">
										<p class="card-text text-muted font-weight-semibold mb-1">Total Subscriber</p>
										<div class="clearfix">
											<div class="float-left  mt-2">
												<h1>3,546</h1>
											</div>
											<div class="float-right text-right">
												<span class="pie" data-peity='{ "fill": ["#5ed84f", "#f2f2f2"]}'>0.52/1.561</span>
											</div>
										</div>
										<div class="progress progress-md mt-1 h-2">
											<div class="progress-bar  bg-gradient-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
							    <div class="card card-img-holder">
								    <div class="card-body">
										<p class="card-text text-muted font-weight-semibold mb-1">Total Recipe</p>
										<div class="clearfix">
											<div class="float-left  mt-2">
												<h1>1,657</h1>
											</div>
											<div class="float-right text-right">
												<span class="pie" data-peity='{ "fill": ["#fdb901", "#f2f2f2"]}'>0.52,1.041</span>
											</div>
										</div>
										<div class="progress progress-md mt-1 h-2">
											<div class="progress-bar  progress-bar-animated bg-warning w-55"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row row-deck">
							<div class="col-lg-6 col-sm-12">
								<div class="card ">
									<div class="card-header">
										<h3 class="card-title">Project Budget</h3>
									</div>
									<div class="card-body text-center">
										<div id="echart" class="chartsh chart-dropshadow "></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="card ">
									<div class="card-header">
										<h3 class="card-title">Avg Handle Time For Project [In Months]</h3>
									</div>
									<div class="card-body text-center">
										<div id="echart9" class="chartsh chart-dropshadow"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="row ">
							<div class="col-12">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title ">Chef Task View </h3>

									</div>
									<div class="table-responsive">
										


{{ Form::open(array('route' => 'submitdailycheftask', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true)) }}
@csrf




										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
											  <tr>
												<th scope="col">ID</th>
												@if($hisrole =='admin') 
												<th scope="col">Chef Name</th>
												@else
												@endif
												<th scope="col">Recipe Name</th>
												<th scope="col">Assigned Qty</th>
												<th scope="col" style="width:20%">Assigned on</th>
												
												<th scope="col" style="width:20%">Completed Qty </th>
												
												@if($hisrole !='admin') 
												<th scope="col" class="reasontxtbox">Reason</th>
												@else
												<th scope="col" >Reason</th>
												@endif
												<th></th> 
											  </tr>
											</thead>
											<tbody>
                                           <?php $i=0; ?>
                                        @foreach($assignedtask as $tasklist)
											  <tr>
												<td scope="row"><?= ++$i ?>
												<input type="hidden" name="taskarray[]" value="{{$tasklist->id}}">
												</td>
                                                @if($hisrole =='admin') 
												<td>{{ $tasklist->getUser->name}}</td>
												@else
												@endif

												<td>{{$tasklist->getRecipeMaster->name}}</td>
		<td style="width:5%;">{{$tasklist->assigned_qty}}<input type="hidden" value="{{$tasklist->assigned_qty}}" id="assqty{{$tasklist->id}}"> </td>
												<td>{{$tasklist->assigned_date}}</td>
	<td style="width:2%;">

   @if($hisrole !='admin') 
		<input type="number" name="completedqtyarray[]" class="form-control" min="1" id="comp{{$tasklist->id}}" onchange="checkequal({{$tasklist->id}});" value='{{$tasklist->prepared_qty}}' >
   @else
   {{$tasklist->prepared_qty}}
   @endif
	</td> 
		
     @if($hisrole !='admin') 
	<td class="reasontxtbox">
			<input type="text" class="reasontxt" name="reasonarray[]"  id="reason{{$tasklist->id}}" value="{{$tasklist->reason }}"  >
		</td>
    @else
    <td>
    {{ $tasklist->reason }}
    </td>
    @endif
		
	
												<td>
    


													</td>
											  </tr>
                                      @endforeach
                                <tr><td></td><td></td><td></td><td></td><td></td><td></td><td>
                                	@if(count($assignedtask)!=0 && $hisrole !='admin')
                                	<input class="btn btn-primary" type="submit" value="submit">
                                	@else
                                	@endif
                                 </td></tr>      
			  						</tbody>
										  </table>
									</div>
								</div>
							</div>
						</div>
         @endsection


@section('extrajs')
{!! Html::script('assets/plugins/peitychart/jquery.peity.min.js') !!}
{!! Html::script('assets/plugins/peitychart/peitychart.init.js') !!}
{!! Html::script('assets/plugins/flot/jquery.flot.js') !!}
{!! Html::script('assets/plugins/flot/jquery.flot.fillbetween.js') !!}
{!! Html::script('assets/plugins/flot/jquery.flot.pie.js') !!}
{!! Html::script('assets/plugins/echarts/echarts.js') !!}
{!! Html::script('assets/js/index1.js') !!}
{!! Html::script('assets/plugins/flot/jquery.flot.pie.js') !!}
{!! Html::script('assets/js/othercharts.js') !!}
{!! Html::script('assets/plugins/chart/Chart.bundle.js') !!}
{!! Html::script('assets/plugins/othercharts/jquery.knob.js') !!}
@endsection



