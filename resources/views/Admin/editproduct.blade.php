
@include('Admin/header')
@include('Admin/nav')
@include('Admin/sidebar')
@if (Session::has('status'))
<div class="container px-5">
	<div class="alert alert-success alert-dismissible">
		<strong>{{ Session::get('status') }}</strong>
		<svg class="float-end" data-bs-dismiss="alert" xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
		<path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
		<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
		</svg>
	</div>
</div>
@endif
			<div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Update Product</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
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
                                                <img src="{{asset($product[0]['img'])}}" width="150px" height="100px">
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