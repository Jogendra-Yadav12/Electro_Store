@include('Admin/header')
@include('Admin/nav')
@include('Admin/sidebar')

<!-- MAIN-CONTENT -->
<div class="main-content side-content">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Product-Details</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product-Details</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card productdesc">
									<div class="card-body h-100">
										<div class="row">
											<div class="col-xl-6 col-lg-12 col-md-12">
												<div class="row">
													<div class="col-3 col-xl-2">
														<div class="clearfix carousel-slider">
															<div id="thumbcarousel" class="carousel slide" data-bs-interval="false">
																<div class="carousel-inner">
																	<div class="carousel-item active">
																		<img src="" alt="">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-7 offset-md-1 col-sm-9 col-8">
														<div class="product-carousel">
															<div id="carousel" class="carousel slide" data-bs-ride="false">
																<div class="carousel-inner">
																	<div class="carousel-item active"><img src="{{asset($product->img)}}" alt="img" class="img-fluid mx-auto d-block" style="height:400px;width:700px;object-fit:conatin"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-lg-12 col-md-12">
												<div class="mt-4 mb-4">
                                                    <h4 class="mt-1 mb-3">{{$product->name}}</h4>

                                                    <p class="text-muted float-start me-3">
                                                        <span class="fe fe-star text-warning"></span>
                                                        <span class="fe fe-star text-warning"></span>
                                                        <span class="fe fe-star text-warning"></span>
                                                        <span class="fe fe-star text-warning"></span>
                                                        <span class="fe fe-star"></span>
                                                    </p>
                                                    <p class="text-muted mb-4">( 135 Customers Review )</p>
													<h6 class="text-success text-uppercase">20 % Off</h6>
													<h5 class="mb-2">Price : <span class="text-muted me-2"><del></del></span> <b>Rs {{$product->price}}</b></h5>
													<p class="tx-13 text-muted">FREE SHIPPING on above Purchase of <b>Rs. 500</b> </p>
													<h6 class="mt-4 fs-16">Description</h6>
													<p>{{$product->description}}</p>
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						</div>
                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
@include('Admin/footer')