<!-- SIDEBAR -->
            
<div class="sticky">
	<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
		<div class="main-sidebar-header main-container-1">
			<div class="main-sidebar-body main-body-1">
				<div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
				<ul class="menu-nav nav">
					<li class="nav-header"><a href="/home"><strong class="nav-label">Dashboard</strong></a>
					<li class="nav-item active show">
						<ul class="nav-sub">
						@if(session()->get('id') === 24)
						<li class="nav-sub-item"><a class="nav-sub-link" href="/user">Users</a></li> @endif
						<li class="nav-sub-item"><a class="nav-sub-link" href="/customer">Customers</a></li>
						<li class="nav-sub-item"><a class="nav-sub-link" href="/product">Products</a></li>
						<li class="nav-sub-item"><a class="nav-sub-link" href="/adminOrder">Orders</a></li>
						</ul>
					</li>
				</ul>
				<div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
			</div>
		</div>
	</div>
</div>
<!-- END SIDEBAR -->