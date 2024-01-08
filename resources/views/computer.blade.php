@include('header')
	@include('nav')
    <!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Home</a>
						<i>|</i>
					</li>
					<li>Computers Accessories</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!---728x90--->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>omputers
                <span>&</span>
                <span>A</span>ccessories</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
							@foreach($ca as $value)
								<div class="col-md-4 product-men product-item" data-brand="{{ $value->brand }}">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="{{asset($value->img)}}" style="height:160px;width:200px;" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="/singlepage/{{$value->id}}" class="link-product-add-cart">Quick View</a>
												</div> 
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="/singlepage">{{$value->name}}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">Rs. {{$value->price}}</span>
												
											</div>
											<a href="/checkout/{{$value->id}}"><button name="submit" class="button btn btn-primary">Add to cart</button></a>
											<a href="/wishlist/{{$value->id}}"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
											<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
											</svg></button></a>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							@include('brand')
						<!-- price -->
						
    
@include('bannerbottom')
@include('footer')