<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<div class="dropdown user-pro-body">
			<div>
				<img src="{{url('/')}}/assets/images/avatar.png" alt="{{Auth::user()->name}}" class="avatar avatar-xl brround mCS_img_loaded">
				<a href="{{ route('edit-profile') }}" class="profile-img">
					<span class="fa fa-pencil" aria-hidden="true"></span>
				</a>
			</div>
			<div class="user-info mb-2">
				<h4 class="font-weight-semibold text-dark mb-1">{{Auth::user()->name}}</h4>
				<span class="mb-0 text-muted">{{Auth::user()->companyName}}</span>
			</div>
			<a href="{{ route('app-setting') }}" title="" class="user-button" data-container="body" data-toggle="popover" data-popover-color="default" data-placement="top" title="" data-content="setting"><i class="fa fa-cog"></i></a>
			<a href="{{ route('screenlock', [time(), Auth::user()->id, MD5(str_random(10))]) }}" title="" class="user-button"  data-container="body" data-toggle="popover" data-popover-color="default" data-placement="top" title="" data-content="Screen Lock"><i class="fa fa-lock"></i></a>
			<a href="{{ route('logout') }}" title="" class="user-button"  data-container="body" data-toggle="popover" data-popover-color="default" data-placement="top" title="" data-content="Sign Out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>
		</div>
	</div>
	<ul class="side-menu">
		<li>
			<a class="side-menu__item" href="{{ route('dashboard') }}"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Dashboard</span></a>
		</li>
		@hasanyrole('admin|manager')
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Users & Roles</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				@can('users-list')
				<li>
					<a href="{{ route('users-list') }}" class="slide-item">User List</a>
				</li>
				@endcan
				@can('role-list')
				<li>
					<a href="{{ route('roles.index') }}" class="slide-item">Manage Role</a>
				</li>
				@endcan
				@can('permission-list')
				<li>
					<a href="{{ route('permissions.index') }}" class="slide-item">Manage Permission</a>
				</li>
				@endcan
			</ul>
		</li>

		

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-table"></i><span class="side-menu__label">Raw Material</span><i class="angle fa fa-angle-right"></i></a>
				<ul class="slide-menu">
					<li>
						<a href="{{ route('raw-material') }}" class="slide-item">Item Master</a>
					</li>
					<li>
						<a href="{{ route('unit-master') }}" class="slide-item">Unit Master</a>
					</li>
				</ul>
			</li>


               <li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-table"></i><span class="side-menu__label">Food</span><i class="angle fa fa-angle-right"></i></a>
				<ul class="slide-menu">
					<!-- <li>
						<a href="{{ route('meals') }}" class="slide-item">Meal Master</a>
					</li> -->
					<li>
						<a href="{{ route('recipe') }}" class="slide-item">Recipe Master</a>
					</li>
					<li>
				<a href="{{ route('meal-recipe') }}" class="slide-item">Meal and Recipe</a>
					</li>
					<li>
				<a href="{{ route('task-assign') }}" class="slide-item">Task Assign </a>
					</li>

				</ul>
			</li>


			 <li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-table"></i><span class="side-menu__label">Purchase Indent</span><i class="angle fa fa-angle-right"></i></a>
				<ul class="slide-menu">
					<li>
						<a href="{{route('admin-purchaseindent.index')}}" class="slide-item">Purchase Indent</a>
					</li>
					<li>
						<a href="{{route('admin-purchaseindentitem.index')}}" class="slide-item">Purchase Indent Item</a>
					</li>

				</ul>
			</li>
         
         <li>

@endhasanyrole

    @hasrole('chef')
                    
    @endhasrole

		<li>

			<a class="side-menu__item" href="{{ route('need-help') }}"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Help & Support</span></a>
		</li>

	</ul>
</aside>
