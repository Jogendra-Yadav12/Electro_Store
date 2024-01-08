
include('header.php')
include('sidebar.php')
	
			<div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Add Product</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Product</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<div class="row row-sm">
							<div class="col-lg-12 col-md-12 col-md-12">
								<form class="card custom-card" method="POST" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group">
											<label class="tx-medium">Product Name</label>
											<input type="text" class="form-control" placeholder="Name" name="name" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Category</label>
											<select class="form-control select2" name="category" required>
												<option label="Choose one">
												</option>
												<option value="Party Wear">
													Party Wear
												</option>
												<option value="Casual Wear">
													Casual Wear
												</option>
												<option value="Wedding">
													Wedding
												</option>
												<option value="Festive">
													Festive
												</option>
											</select>
										</div>
										<div class="form-group">
											<label class="tx-medium">Price</label>
											<input type="text" class="form-control" placeholder="Price" name="price" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Product Description</label>
											
												<textarea class="form-control" style="background-color:transparent;width:100%" placeholder="Product Description" name="des" required></textarea>
									
										</div>
										<label class="tx-medium">Display Images</label>

										<div class="p-4 border rounded-6 mb-0 form-group">
											<div>
												<input id="demo" type="file" name="img" required>
											</div>
										</div>
										<label class="tx-medium mt-3">Other Images</label>

										<div class="p-4 border rounded-6 mb-0 form-group">
											<div>
												<input id="demo" type="file" name="file[]" multiple required>
											</div>
										</div>
										
									</div>
									<div class="card-footer mb-1">
										<button class="btn btn-primary" name="product">Add Product</button>
										<a href="index.php" class="btn btn-danger">Cancel</a>
									</div>
								</form>
							</div>
						</div>

                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
	include('footer.php')


			<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple --><?php /**PATH E:\practice\e-commerce\resources\views/addproduct.blade.php ENDPATH**/ ?>