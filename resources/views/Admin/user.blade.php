
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
		<!-- MAIN-CONTENT -->
        <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body"> 
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Users</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12 col-lg-9">
								<div class="card custom-card">
									<div class="card-header  border-bottom-0 pb-0">
										<div>
											<div class="d-flex">
												<label class="main-content-label my-auto pt-2">All Users</label>
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
														<th>Password</th>
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
														<td>{{$value->password}}</td>
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
															<a href="removeuser/{{$value->id}}"><i class="ti ti-trash"></i></a>	
															</div>
														</td>
														</tr>
                                                        <input type="hidden" value="{{$x += 1}}">
                                                    @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-12 col-md-12">
								<form class="card custom-card" action="{{url('add_user')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
									<div class="card-body">
										<div class="form-group">
											<label class="tx-medium">User Name</label>
											<input type="text" class="form-control" placeholder="Name" name="name" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Password</label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Category</label>
											<select class="form-control select2" name="type" required>
												<option label="Choose one">
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
										<button class="btn btn-primary">Add Product</button>
										<button class="btn btn-danger">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						</div>
						<!-- End Row -->
						<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
								@if ($user->onFirstPage())
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								@else
									<li class="page-item"><a class="page-link" href="{{ $user->previousPageUrl() }}" rel="prev">Previous</a></li>
								@endif

								@foreach ($user->getUrlRange($user->currentPage(), $user->currentPage() + 2) as $page => $url)
									@if ($page == $user->currentPage())
										<li class="page-item active"><span class="page-link">{{ $page }}</span></li>
									@else
										<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
									@endif
								@endforeach

								@if ($user->hasMorePages())
									<li class="page-item"><a class="page-link" href="{{ $user->nextPageUrl() }}" rel="next">Next</a></li>
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
            <!-- END MAIN-CONTENT -->
	@include('Admin/footer')