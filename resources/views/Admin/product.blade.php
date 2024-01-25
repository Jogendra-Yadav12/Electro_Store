@include('Admin.header')
@include('Admin.nav')
@include('Admin.sidebar')

@if (Session::has('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success !!',
                text: '{{ Session::get('status') }}',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

@if (Session::has('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: '{{ Session::get('warning') }}',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

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
										@if($value->status)
										<div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
											<div class="card custom-card">
												<div class="p-0 ht-100p">
													<div class="product-grid">
														<div class="product-image">
															<a href="pdetails/{{$value->id}}" class="image">
																<img class="pic-1 p-3" style="height:300px;border-radius:2vw;object-fit:contain" alt="product-image-1" src="{{asset($value->img)}}">
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
														</div>
													</div>
												</div>
											</div>
										</div>
										@endif
									@endforeach
								</div>
							</div>
						<!-- End Row -->

						<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
							
								@if ($product->onFirstPage())
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								@else
									<li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}" rel="prev">Previous</a></li>
								@endif

								@foreach ($product->getUrlRange($product->currentPage(), $product->currentPage()) as $page => $url)
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
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
		
@include('Admin.footer')