<!-- navigation -->
<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/">Home
								
							</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Electronics
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">All Products</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="/mobile">Mobiles</a>
												</li>
												<li>
													<a href="/cc">Cases & Covers</a>
												</li>
												<li>
													<a href="/tablet">Tablets</a>
												</li>
											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="/laptop">Laptops</a>
												</li>
												<li>
													<a href="/tv">T.V & Audio</a>
												</li>
												<li>
													<a href="/computer">Computer Accessories</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/about">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/contact">Contact Us</a>
						</li>
						@if(session()->get('mail'))
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/wishlist">Wishlist
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="color:white">
								@if(!$countWish)
									0
								@else
									{{$countWish}}
								@endif	
							</span>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</nav>
		</div>
	</div>
<!-- //navigation -->