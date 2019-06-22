<div class="app-header header py-1 d-flex">
	<div class="container-fluid">
		<div class="d-flex">
			<a class="header-brand" href="index.html">
				<img src="{{url('/')}}/{{$appSetting->app_logo}}" class="" alt="{{$appSetting->app_name}}">
			</a>
			<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
			<div class="d-none d-lg-block horizontal">
				<ul class="nav">

					<li class="">
						<div class="dropdown d-none d-md-flex border-right">
							<a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
								<i class="fe fe-mail floating"></i>
								<span class=" nav-unread badge badge-warning  badge-pill">2</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<a href="#" class="dropdown-item text-center">2 New Messages</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item d-flex pb-3">
									<span class="avatar brround mr-3 align-self-center"><img src="{{url('/')}}/assets/images/faces/male/41.jpg" class="avatar brround " alt="user-img"></span>
									<div>
										<strong>Madeleine</strong> Hey! there I' am available....
										<div class="small text-muted">3 hours ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex pb-3">
									<span class="avatar brround mr-3 align-self-center"><img src="{{url('/')}}/{{Auth::user()->companyLogo}}"  class="avatar brround " alt="{{Auth::user()->companyName}}"></span>
									<div>
										<strong>{{Auth::user()->name}}</strong> New product Launching...
										<div class="small text-muted">5  hour ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex pb-3">
									<span class="avatar brround mr-3 align-self-center"><img src="{{url('/')}}/assets/images/faces/female/18.jpg"  class="avatar brround " alt="user-img"></span>
									<div>
										<strong>Olivia</strong> New Schedule Realease......
										<div class="small text-muted">45 mintues ago</div>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item text-center">See all Messages</a>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="d-flex order-lg-2 ml-auto">
				<div class="mt-2">
					<div class="searching mt-2 ml-2 mr-3">
						<a href="javascript:void(0)" class="search-open mt-3">
							<i class="fa fa-search text-dark"></i>
						</a>
						<div class="search-inline">
							<form>
								<input type="text" class="form-control" placeholder="Search here">
								<button type="submit">
									<i class="fa fa-search"></i>
								</button>
								<a href="javascript:void(0)" class="search-close">
									<i class="fa fa-times"></i>
								</a>
							</form>
						</div>
					</div>
				</div>
				<div class="dropdown d-none d-md-flex " >
					<a  class="nav-link icon full-screen-link">
						<i class="mdi mdi-arrow-expand-all"  id="fullscreen-button"></i>
					</a>
				</div>
				<div class="dropdown d-none d-md-flex">
					<a class="nav-link icon" data-toggle="dropdown">
						<i class="mdi mdi-bell-outline "></i>
						<span class="nav-unread bg-success"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
						<a href="#" class="dropdown-item d-flex pb-3">
							<div class="notifyimg">
								<i class="fa fa-thumbs-o-up"></i>
							</div>
							<div>
								<strong>Someone likes our posts.</strong>
								<div class="small text-muted">3 hours ago</div>
							</div>
						</a>
						<a href="#" class="dropdown-item d-flex pb-3">
							<div class="notifyimg">
								<i class="fa fa-commenting-o"></i>
							</div>
							<div>
								<strong> 3 New Comments</strong>
								<div class="small text-muted">5  hour ago</div>
							</div>
						</a>

						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item text-center">View all Notification</a>
					</div>
				</div>
				<div class="dropdown d-none d-md-flex">
					<a class="nav-link icon" data-toggle="dropdown">
						<i class="fe fe-grid floating"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-0">
						<ul class="drop-icon-wrap p-0 m-0">
							<li>
								<a href="#" class="drop-icon-item">
									<i class="fe fe-mail"></i>
									<span class="block"> E-mail</span>
								</a>
							</li>
							<li>
								<a href="#" class="drop-icon-item">
									<i class="fe fe-calendar"></i>
									<span class="block">calendar</span>
								</a>
							</li>
							<li>
								<a href="#" class="drop-icon-item">
									<i class="fe fe-map-pin"></i>
									<span class="block">map</span>
								</a>
							</li>
							<li>
								<a href="#" class="drop-icon-item">
									<i class="fe fe-shopping-cart"></i>
									<span class="block">Cart</span>
								</a>
							</li>
							<li>
								<a href="#" class="drop-icon-item">
									<i class="fe fe-message-square"></i>
									<span class="block">chat</span>
								</a>
							</li>
							<li>
								<a href="#" class="drop-icon-item">
									<i class="fe fe-phone-outgoing"></i>
									<span class="block">contact</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="dropdown">
					<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
						<span class="avatar avatar-md brround"><img src="{{url('/')}}/assets/images/avatar.png" alt="{{Auth::user()->name}}" class="avatar avatar-md brround"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
						<div class="text-center">
							<a href="#" class="dropdown-item text-center font-weight-sembold user">{{Auth::user()->name}}</a>

							<div class="dropdown-divider"></div>
						</div>
						<a class="dropdown-item @if(Request::segment(1)==='edit-profile') active @endif" href="{{ route('edit-profile') }}">
							<i class="dropdown-icon mdi mdi-account-outline "></i> Profile
						</a>
						@can('app-setting')
						<a class="dropdown-item @if(Request::segment(1)==='app-setting') active @endif" href="{{ route('app-setting') }}">
							<i class="dropdown-icon  mdi mdi-settings"></i> 
							App Setting
						</a>
						@endcan
						
						<div class="dropdown-divider"></div>
						<a class="dropdown-item @if(Request::segment(1)==='need-help') active @endif" href="{{ route('need-help') }}">
							<i class="dropdown-icon fa fa-question-circle"></i> Help & Support?
						</a>
						<a class="dropdown-item" href="{{ route('screenlock', [time(), Auth::user()->id, MD5(str_random(10))]) }}">
							<i class="dropdown-icon fa fa-lock"></i> Screen Lock
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="dropdown-icon mdi  mdi-logout-variant"></i>
                            {{ __('Sign out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>