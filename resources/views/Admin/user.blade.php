
@include('Admin/header')
@include('Admin/nav')
@include('Admin/sidebar')
@if (Session::has('status'))
<div class="container px-5">
	<div class="alert alert-success alert-dismissible">
		<strong>{{ Session::get('status') }}</strong>
		<svg class="float-right" data-bs-dismiss="alert" xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
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
							<div class="col-md-12 col-lg-12">
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
						</div>
						<!-- End Row -->


                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
            <!-- END MAIN-CONTENT -->
	@include('Admin/footer')


			<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple -->