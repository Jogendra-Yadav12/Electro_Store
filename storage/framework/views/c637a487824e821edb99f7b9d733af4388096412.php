<!-- navigation -->
<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<!-- <div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="">All Categories</option>
							<option value="Televisions">Televisions</option>
							<option value="Headphones">Mobile</a></option>
							<option value="Computers">Computers Accessories</option>
							<option value="iPad & Tablets">Tablets</option>
							<option value="Cameras & Camcorders">Case & Cover</option>
							<option value="Home Audio & Theater">Laptops</option>
						</select>
					</form>
				</div> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Electronics
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Mobiles, Computers</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="/mobile">All Mobile Phones</a>
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
						<?php if(session()->get('mail')): ?>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/wishlist">Wishlist</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation --><?php /**PATH E:\practice\e-commerce\resources\views/components/nav.blade.php ENDPATH**/ ?>