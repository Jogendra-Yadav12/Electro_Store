
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
					<li>{{$title}}</li>
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
				{{$title}}</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
							@foreach($product as $value)
								@php $check = false; @endphp

								@foreach($wish as $item)
									@if($item->p_id == $value->id)
										@php $check = true; @endphp
									@endif
								@endforeach
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
											@if(!(session()->get('mail')))
												<a href="/wishlist/{{$value->id}}"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											@elseif($count === 0)
												<a href="/wishlist/{{$value->id}}"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											@elseif($check == true)
												<a href="/wishlist/{{$value->id}}"><button class="button btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											@else
												<a href="/wishlist/{{$value->id}}"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											@endif
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
						<div class="search-hotel border-bottom py-2">
	<h3 class="agileits-sear-head mb-3">Category</h3>
		<form action="/brand" method="get">		
			<div class="left-side py-2">
				<ul>
					@foreach($brand as $key=>$value)
						<li>
							<input type="checkbox" class="checked" name="filter[]" value="{{$value['brand']}}" id="{{$value['brand']}}" />
							<label class="span" for="{{$value['brand']}}" >{{$value['brand']}}</label>
						</li>
					@endforeach
				</ul>
			</div>
		</form>
	</div>
					<!-- price -->
						<div class="range py-2">
							<h3 class="agileits-sear-head mb-3">Price</h3>
							<div class="w3l-range">
								<ul>
								<li>
									<input type="checkbox" class="checked" value="0-1000">
										<a href="#">Under Rs. 1,000</a>
									</li>
									<li class="my-1">
									<input type="checkbox" class="checked" value="1000-5000">
										<a href="#">Rs. 1,000 - Rs. 5,000</a>
									</li>
									<li>
										<input type="checkbox" class="checked" value="5000-10000">
										<a href="#">Rs. 5,000 - Rs. 10,000</a>
									</li>
									<li class="my-1">
									<input type="checkbox" class="checked" value="10000-20000">
										<a href="#">Rs. 10,000 - Rs. 20,000</a>
									</li>
									<li>
									<input type="checkbox" class="checked" value="20000-30000">
										<a href="#">Rs. 20,000 Rs. 30,000</a>
									</li>
									<li class="mt-1">
									<input type="checkbox" class="checked" value="30000-100000">
										<a href="#">Above Rs. 30,000</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
					</div>
					<!-- //product right -->
				</div>
				
			</div>
			
		</div>
				<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
								@if ($product->onFirstPage())
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								@else
									<li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}" rel="prev">Previous</a></li>
								@endif

								@foreach ($product->getUrlRange($product->currentPage(), $product->currentPage() + 2) as $page => $url)
									@if ($page == $product->currentPage())
										<li class="page-item active"><span class="page-link">{{ $page }}</span></li>
									@else
										<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
									@endif
								@endforeach

								@if ($product->hasMorePages())
									<li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}" rel="next">Next</a></li>
								@else
									<li class="page-item disabled"><span class="page-link">Next</span></li>
								@endif
							</ul>
						</nav>
						<!-- End Navigation -->
	</div>
	<!-- //top products -->
	


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	$(document).ready(function() {
    $('.checked').change(function() {
        var selectedBrands = []; 
        var selectedPrices = []; 

        // Loop through all checked checkboxes and store their values (brands/prices) in the respective arrays
        $('.checked:checked').each(function() {
            var value = $(this).val();
            if (value.includes('-')) {
                selectedPrices.push(value);
            } else {
                selectedBrands.push(value);
            }
        });

        // Filter products based on selected brands
        if (selectedBrands.length > 0) {
            $('.product-item').hide(); 

            
            selectedBrands.forEach(function(brand) {
                $('.product-item[data-brand="' + brand + '"]').show();
            });
        } else {
            $('.product-item').show(); 
        }

        // Filter products based on selected prices
        if (selectedPrices.length > 0) {
            $('.product-item').each(function() {
                var price = parseInt($(this).find('.item_price').text().replace('Rs. ', '').trim());
                var showProduct = false;

                selectedPrices.forEach(function(priceRange) {
                    var range = priceRange.split('-');
                    if (price >= parseInt(range[0]) && price <= parseInt(range[1])) {
                        showProduct = true;
                    }
                });

                showProduct ? $(this).show() : $(this).hide();
            });
        }
    });
});

</script>
						