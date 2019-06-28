@extends('layouts.master')
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
										<p class="card-text text-muted font-weight-semibold mb-1">Total Projects</p>
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
										<p class="card-text text-muted font-weight-semibold mb-1">Completed Task</p>
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
										<p class="card-text text-muted font-weight-semibold mb-1">Ongoing Projects</p>
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
										<p class="card-text text-muted font-weight-semibold mb-1">Successful Task</p>
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

						<div class="row ">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
								<div class="card overflow-hidden">
								    <div class="card-header">
										<h3 class="card-title">Return On Investiment</h3>
									</div>
									<div class="card-body">
										<div class="dash2 ">
											<div class="">
												<p>Lorem ipsum dolor sit amet consectetur At vero eos et accusamus et iusto odio.</p>
												<div class="mb-0">
													<h3 class="text-primary mb-1">12,450</h3>
													<span class="text-success"><i class="zmdi zmdi-long-arrow-up zmdi-hc-lg mr-2"></i><span>+24%</span></span><span class="text-muted ml-2">From Last Month</span>
												</div>
											</div>
										</div>
									</div>
									<div class="chart-wrapper ">
										<canvas id="widgetChart1" class="mb-0 p-0 chart-dropshadow"></canvas>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
								<div class="card ">
								    <div class="card-header">
										<h3 class="card-title">Current Budget</h3>
									</div>
									<div class="card-body">
									   <div id="placeholder03" class="chartsh demo-placeholder"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-sm-12 col-sm-12 col-xl-4">
								<div class="row">
									<div class="col-lg-12">
										<div class="card ">
											<div class="card-body">
												<div class="card-value float-right text-purple">
													<div class="sparkline22 h-100"></div>
												</div>
												<h3 class="mb-1 counter font-30">5673</h3>
												<div class="text-muted">Active Projects</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="card overflow-hidden bg-gradient-secondary text-white work-progress">
											<div class="card-body">
												<div class="clearfix mb-4">
													<div class="float-left  mt-2  ">
														<h4 class="card-text font-weight-semibold">Work Progress</h4>
													</div>
													<div class="float-right text-right  ">
														<h3 class="mb-0">39.05%</h3>
													</div>
												</div>
											</div>
											<span class="updating-chart1 br-bl-7 br-br-7" data-peity='{ "fill": ["#32cafe"], "stroke": ["#32cafe"] }'>5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span>
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
						<div class="row row-deck">
							<div class="col-md-12 col-xl-4 col-lg-4 col-sm-12">
							   <div class="card">
									<div class="card-body text-center">
										<h3 class="mb-3 counter ">Server1</h3>
										<div class="">
											<div class="chart-circle mt-4" data-value="0.77" data-thickness="10" data-color="#ff695c"><canvas width="128" height="128"></canvas></div>
										</div>
										<h6 class=" mb-0 mt-3 text-muted"><span class="text-success"><i class="fe fe-arrow-up-circle "></i></span> Last Down 75 days Ago</h6>
									    <div class="chart-circle-value text-center h3 mt-1"><div class="text-xxl mt-2">75</div><small></small></div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xl-4 col-lg-4 col-sm-12">
							    <div class="card">
									<div class="card-body text-center">
										<h3 class="mb-3 counter ">Server2</h3>
										<div class="mt-3 mb-2">
											<div class="chart-circle mt-4" data-value="0.55" data-thickness="10" data-color="#32cafe"><canvas width="128" height="128"></canvas></div>
										  </div>
										<h6 class=" mb-0 mt-3 text-muted"><span class="text-success"><i class="fe fe-arrow-up-circle "></i></span> Last Down 55 days Ago</h6>
									    <div class="chart-circle-value text-center h3 mt-1"><div class="text-xxl mt-2">55</div><small></small></div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xl-4 col-lg-4 col-sm-12">
							    <div class="card">
									<div class="card-body text-center">
										<h3 class="mb-3 counter ">Server3</h3>
										<div class="mt-3 mb-2">
											<div class="chart-circle mt-4" data-value="0.39" data-thickness="10" data-color="#fdb901"><canvas width="128" height="128"></canvas></div>
										</div>
										<h6 class=" mb-0 mt-3 text-muted"><span class="text-danger"><i class="fe fe-arrow-down-circle "></i></span> Last Down 38 days Ago</h6>
									    <div class="chart-circle-value text-center h3 mt-1"><div class="text-xxl mt-2">39</div><small></small></div>
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
										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
											  <tr>
												<th scope="col">ID</th>
												<th scope="col">Recipe Name</th>
												<th scope="col">Assigned Qty</th>
												<th scope="col">Assigned on</th>
												<th scope="col">Completed Qty</th>
												<th scope="col">Comleted on</th>
												<th scope="col">Reason </th>
												<th scope="col">Accept </th>
											  </tr>
											</thead>
											<tbody>
                                           <?php $i=0; ?>
                                        @foreach($assignedtask as $tasklist)
											  <tr>
												<th scope="row"><?= ++$i ?></th>
												<td>{{$tasklist->getRecipeMaster->name}}</td>
												<td style="width:5%;">{{$tasklist->assigned_qty}} </td>
												<td>{{$tasklist->assigned_date}}</td>
												<td style="width:2%;"><input type="number" class="form-control" min="1" ></td>
												<td>
										<!-- <div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
											</div>
										
																			</div> --></td>
												<td>
													<div class="progress progress-md mt-1 h-2">
														<div class="progress-bar  progress-bar-animated bg-success w-70"></div>
													</div>
												</td>
												<td><label class="colorinput">
													<input name="color" type="checkbox" id="{{$tasklist->id}}" value="azure" class="colorinput-input" onchange="deductthestock(this)"  />
																<span class="colorinput-color bg-azure"></span>
															</label>

														</td>
											  </tr>
                                      @endforeach

											  
											  
											</tbody>
										  </table>
									</div>
								</div>
							</div>
						</div>
         @endsection

<script>
	
</script>