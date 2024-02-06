
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

@if (Session::has('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: '{{ Session::get('error') }}',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
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
								<h2 class="main-content-title tx-24 mg-b-5">Customers</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">E-store</a></li>
									<li class="breadcrumb-item active" aria-current="page">Customers</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12 col-lg-12">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div>
											<div class="d-flex">
												<label class="main-content-label my-auto pt-2">All Customers</label>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border border-bottom-0">
											<table class="table mb-0 text-nowrap text-md-nowrap">
												<thead>
													<tr class="border-bottom">
														<th>ID</th>
														<th>Name</th>
														<th>Email</th>
														<th>Type</th>
														<th>status</th>
														<th>methods</th>
													</tr>
												</thead>
												<tbody>
                                                 	@foreach($user as $key=>$value)
														<tr class="border-bottom">
														<td>{{$x}}</td>
														<td>{{$value->name}}</td>
														<td>{{$value->email}}</td>
														<td>{{$value->type}}</td>
														<td>
														@if($value->status === 1)
															<a href="/active/{{$value->id}}"><span class="alert alert-success py-1" role="alert">
																Activate
															</span></a>
														@else
															<a href="/active/{{$value->id}}"><span class="alert alert-danger py-1" role="alert">
																Blocked
															</span></a>
														@endif
														</td>
														<td>
															<div class="button-list">
															<a href="/update/{{$value->id}}"><i class="ti ti-pencil"></i></a>
															<a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$value->id}}"><i class="ti ti-trash"></i></a>	
															</div>
														</td>
														</tr>
                                                        <input type="hidden" value="{{$x += 1}}">

														<!-- Modal -->
													<div class="modal fade" id="staticBackdrop{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="staticBackdropLabel">Warning !!</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															Are you sure. You want to delete !!
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<a href="removeuser/{{$value->id}}"><button type="button" class="btn btn-primary">OK</button></a>
														</div>
														</div>
													</div>
													</div>
                                                    @endforeach
												</tbody>
											</table>
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
			<!-- Navigation -->
			<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
								@if ($user->onFirstPage())
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								@else
									<li class="page-item"><a class="page-link" href="{{ $user->previousPageUrl() }}" rel="prev">Previous</a></li>
								@endif

								@foreach ($user->getUrlRange($user->currentPage(), $user->currentPage()) as $page => $url)
									@if ($page == $user->currentPage())
										<li class="page-item active"><span class="page-link">{{ $page }}</span></li>
									@else
										<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
									@endif
								@endforeach

								@if ($user->hasMorePages() && $user->nextPage()->count() > 0)
									<li class="page-item"><a class="page-link" href="{{ $user->nextPageUrl() }}" rel="next">Next</a></li>
								@else
									<li class="page-item disabled"><span class="page-link">Next</span></li>
								@endif
							</ul>
						</nav>
						<!-- End Navigation -->
            <!-- END MAIN-CONTENT -->
	@include('Admin/footer')


			<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple -->