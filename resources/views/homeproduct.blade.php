
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12" id="1">
					<div class="wrapper">
					
					<!-- first section -->
					<x-product :product="$mobile" title="New Brand Mobile" :wish="$wish" :count="$count"/>

					<!-- second section -->
						<x-product :product="$tv" title="Television & Audio" :wish="$wish" :count="$count"/>

						<!-- third section -->
						<div class="product-sec1 product-sec2 px-sm-5 px-3">
							<div class="row">
								<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
								<p class="w3l-nut-middle">Get Extra 10% Off</p>
								<div class="col-md-8 bg-right-nut">
									<img src="{{asset('asset/images/image1.png')}}" alt="">
								</div>
							</div>
						</div>
						<!-- //third section -->

						<!-- fourth section -->
						<x-product :product="$laptop" title="Laptops" :wish="$wish" :count="$count"/>
						<!-- //fourth section -->

					</div>
				</div>
				<!-- //product left -->
				</div>
			</div>
		</div>
	</div>