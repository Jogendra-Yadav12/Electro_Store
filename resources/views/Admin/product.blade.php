@include('Admin.header')
@include('Admin.nav')
@include('Admin.sidebar')
 <!-- MAIN-CONTENT -->
 <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">

                        
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Products</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Products</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm container">
							<div class="col-md-12 col-lg-12">
								<div class="row row-sm">
									@foreach($product as $key=>$value)
										<div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
											<div class="card custom-card">
												<div class="p-0 ht-100p">
													<div class="product-grid">
														<div class="product-image">
															<a href="pdetails/{{$value->id}}" class="image">
																<img class="pic-1 p-3" style="height:300px;border-radius:2vw;" alt="product-image-1" src="{{asset($value->img)}}">
															</a>
															<a class="product-like-icon" href="pdetails/{{$value->id}}"><i class="bi bi-ticket-detailed"></i></i></a>
															<div class="product-link">
																<a href="product/{{$value->id}}">
																	<i class="bi bi-pencil-fill"></i>
																</a>
																<a href="/removeproduct/{{$value->id}}">
																	<i class="bi bi-trash"></i>
																</a>
															</div>
														</div>
														<div class="product-content">
															<h3 class="title">{{$value->name}}</h3>
															<div class="price"><span class="old-price"></span><span class="text-danger">Rs {{$value->price}}</span></div>
															<ul class="rating">
																<li class="fas fa-star"></li>
																<li class="fas fa-star"></li>
																<li class="fas fa-star"></li>
																<li class="fas fa-star"></li>
																<li class="far fa-star"></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						<!-- End Row -->
                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
		
@include('Admin.footer')