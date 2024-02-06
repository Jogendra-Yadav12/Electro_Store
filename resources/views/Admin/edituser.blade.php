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
		   <!-- MAIN-CONTENT -->
           <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body"> 
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Update User</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Estore</a></li>
									<li class="breadcrumb-item active" aria-current="page">Update User</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12 col-md-12">
								<form class="card custom-card" action="../upduser/{{$address[0]['id']}}" method="POST" enctype="multipart/form-data">
                                    @csrf
									<div class="card-body">
										<div class="form-group">
											<label class="tx-medium">User Name</label>
											<input type="text" class="form-control" placeholder="Name" name="name" value="{{$address[0]['name']}}" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Email</label>
											<input type="email" class="form-control" placeholder="Password" name="email" value="{{$address[0]['email']}}" required>
										</div>
                                        <div class="form-group">
											<label class="tx-medium">Category</label>
											<select class="form-control " name="type" required>
												<option label="{{$address[0]['type']}}">
												{{$address[0]['type']}}
												</option>
												<option value="admin">
													admin
												</option>
												<option value="customer">
													customer
												</option>
											</select>
										</div>
									</div>
									<div class="card-footer mb-1">
										<button class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
						<!-- End Row -->
                    </div>
                </div>
            </div>
			
            <!-- END MAIN-CONTENT -->

			@include('Admin/footer')