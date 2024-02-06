@extends('layouts.app')
@section('content')


<!-- Banner -->
<div class="page-head_agile_info_w3l">
</div>
<!-- End Banner -->

<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="/">Home</a>
                    <i>|</i>
                </li>
                <li>Product Details</li>
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
				<span>D</span>etails</h3>
			<!-- //tittle heading -->
			@foreach($product as $value)
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
							<div class="thumb-image">
								<img src="{{asset($value->img)}}" data-imagezoom="true" style="height: 400px; width:300px; object-fit:contain">
							</div>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
					@foreach($images as $key=>$imgs)
						<img class="p-2" src="{{asset($imgs['img'])}}" alt="" style="height: 90px; width:100px;  border:2px solid black; object-fit:contain">
					@endforeach
				</div>
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3">{{$value->name}}</h3>
					<p class="mb-3">
						<span class="item_price">Rs. {{number_format($value->price, 0, '', ',')}}</span>
						<del class="mx-2 font-weight-light"></del><br><br>
						<label>Free delivery</label>
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
								Shipping Speed to Delivery.
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
                    <a href="/payment/{{$value->id}}"><button name="submit" class="button btn btn-secondary">Buy now</button></a>
					
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- //Single Page -->

@endsection