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
                <li>Product Page</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>P</span>oduct
				<span>P</span>age</h3>
			<!-- //tittle heading -->
			@foreach($product as $value)
			<div class="row">
				
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<img src="{{asset($value->img)}}" style="height: 450px;width: 250px;">
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3">{{$value->name}}</h3>
					<p class="mb-3">
						<span class="item_price">Rs. {{$value->price}}</span>
						<del class="mx-2 font-weight-light"></del>
						<label>Free delivery</label>
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
								Cash on Delivery Eligible.
							</li>
							<li class="mb-3">
								Shipping Speed to Delivery.
							</li>
							<li class="mb-3">
								EMIs from $655/month.
							</li>
							<li class="mb-3">
								Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
							</li>
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<label>1 Year</label>Manufacturer Warranty</p>
						<ul>
							{{$value->description}}
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
						</p>
					</div>
					<a href="/checkout/{{$value->id}}"><button name="submit" class="button btn btn-primary">Add to cart</button></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- //Single Page -->
    @include('footer')