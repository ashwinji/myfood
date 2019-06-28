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
										<p class="card-text text-muted font-weight-semibold mb-1">Total Customer</p>
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
										<h3 class="card-title ">Upcoming Deadlines</h3>

									</div>
									<div class="table-responsive">
										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
											  <tr>
												<th scope="col">ID</th>
												<th scope="col">Employee</th>
												<th scope="col">Project Name</th>
												<th scope="col">Issues</th>
												<th scope="col">Deadline</th>
												<th scope="col">Team Members</th>
												<th scope="col">WorkLoad </th>
											  </tr>
											</thead>
											<tbody>
											  <tr>
												<th scope="row">1</th>
												<td>Juliette</td>
												<td>At vero eos et accusamus et iusto odio </td>
												<td>CMS Issue</td>
												<td>02/01/2019</td>
												<td>5 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-success w-70"></div>
													</div>
												</td>
											  </tr>
											  <tr>
												<th scope="row">2</th>
												<td>Brock Lee</td>
												<td>voluptatum deleniti atque corrupti quos</td>
												<td>DNS Issue</td>
												<td>13/01/2019</td>
												<td>4 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-primary w-30"></div>
													</div>
												</td>
											  </tr>
											  <tr>
												<th scope="row">3</th>
												<td>Brock Lee</td>
												<td >dignissimos ducimus qui blanditiis praesentium</td>
												<td>Hardware Failure</td>
												<td >18/01/2019</td>
												<td >5 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-warning w-45"></div>
													</div>
												</td>
											  </tr>
											  <tr>
												<th scope="row">4</th>
												<td>Robin</td>
												<td>deleniti atque corrupti quos dolores </td>
												<td>Host Provider</td>
												<td >21/01/2019</td>
												<td >10 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-secondary w-35"></div>
													</div>
												</td>
											  </tr>
											  <tr>
												<th scope="row">5</th>
												<td>Anne Fibbiyon</td>
												<td>et quas molestias excepturi sint occaecati</td>
												<td>Hardware Failure</td>
												<td >28/01/2019</td>
												<td >3 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-pink w-60"></div>
													</div>
												</td>
											  </tr>
											  <tr>
												<th scope="row">6</th>
												<td>Anthony</td>
												<td>At vero eos et accusamus et iusto odio </td>
												<td>CMS Issue</td>
												<td>05/02/2019</td>
												<td>6 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-success w-40"></div>
													</div>
												</td>
											  </tr>
											  <tr>
												<th scope="row">7</th>
												<td>Jennifer</td>
												<td>At vero eos et accusamus et iusto odio </td>
												<td>DNS Issue</td>
												<td>12/02/2019</td>
												<td>4 Members</td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-primary w-60"></div>
													</div>
												</td>
											  </tr>
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