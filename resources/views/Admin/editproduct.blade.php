
@include('Admin/header')
@include('Admin/nav')
@include('Admin/sidebar')
@if (Session::has('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('status') }}',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

@if (Session::has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
			<div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Update Product</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">E-store</a></li>
									<li class="breadcrumb-item active" aria-current="page">Update Product</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<div class="row row-sm">
							<div class="col-lg-12 col-md-12 col-md-12">
								<form class="card custom-card" action="../updproduct/{{$product[0]['id']}}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="card-body">
										<div class="form-group">
											<label class="tx-medium">Product Name</label>
											<input type="text" class="form-control" placeholder="Name" name="name" value="{{$product[0]['name']}}" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Category</label>
											<select class="form-control" name="category" value="{{$product[0]['category']}}">
												<option value="{{$product[0]['category']}}">
                                                {{$product[0]['category']}}
												</option>
												<option value="Mobile">
													Mobile
												</option>
												<option value="laptop">
													Laptop
												</option>
												<option value="Television & Audio">
													Television & Audio
												</option>
												<option value="Case & Cover">
													Case & Cover
												</option>
												<option value="Tablet">
													Tablet
												</option>
												<option value="Computer">
													Computer
												</option>
											</select>
										</div>
                                        <div class="form-group">
											<label class="tx-medium">Brand</label>
											<input type="text" class="form-control" placeholder="brand" name="brand" value="{{$product[0]['brand']}}" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Price</label>
											<input type="text" class="form-control" placeholder="Price" name="price" value="{{$product[0]['price']}}" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Product Description</label>
												<textarea class="form-control" style="background-color:transparent;width:100%" placeholder="Product Description" name="des" required>{{$product[0]['description']}}</textarea>
										</div>
										<label class="tx-medium">Display Images</label>

										<div class="p-4 border rounded-6 mb-0 form-group">
											<div>
												<input id="demo" type="file" name="img" value="{{$product[0]['img']}}" />
											</div>
										</div>
									</div>
									<div class="card-footer mb-1">
										<button class="btn btn-primary" name="product">update Product</button>
									</div>
								</form>
							</div>
						</div>

                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
	@include('Admin/footer')


			<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple -->