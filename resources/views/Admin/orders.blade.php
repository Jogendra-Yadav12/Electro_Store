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
                title: 'Error!',
                text: '{{ Session::get('error') }}',
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
								<h2 class="main-content-title tx-24 mg-b-5">Orders</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">E-store</a></li>
									<li class="breadcrumb-item active" aria-current="page">Orders</li>
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
												<label class="main-content-label my-auto pt-2">All Orders</label>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border border-bottom-0">
											<table class="table mb-0 text-nowrap text-md-nowrap">
												<thead>
													<tr class="border-bottom">
														<th>ID</th>
														<th>Product</th>
														<th>Payment Id</th>
														<th>Status</th>
														<th>Total Price</th>
														<th>Details</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												@if($count > 0)
                                                 	@foreach($order as $key=>$value)
														<tr class="border-bottom">
														<td>{{$y}}</td>
														<td><img src="{{$data[$x]}}" alt="" style="height:100px;width:80px" class="img-responsive"></td>
														<td>{{$value['r_payment_id']}}</td>
														<td> 
														<select class="select2" id="{{$value['id']}}" required>
															<option value="{{$value['status']}}">
																{{$value['status']}}
															</option>
															<option value="Processing">
																Processing
															</option>
															<option value="Packed">
																Packed
															</option>
															<option value="On the way">
																On the way
															</option>
															<option value="Delivered">
																Delivered
															</option>
														</select>		
														</td>
														<td>{{ number_format(($value['quantity'] * $value['price']), 0, '', ',') }}</td>
														<td>
															<div class="button-list">
															<a href="adminorderview/{{$value['id']}}"><button class="btn btn-secondary">View</button></a>	
															</div>
														</td>
														<td>
														<div class="button-list">
															<form method="POST" action="status/{{$value['id']}}">
															@csrf
															<input type="hidden" value="{{$value['status']}}" name="order_id{{$value['id']}}" id="order_input_{{$value['id']}}">
															<button class="btn btn-secondary">Update</button>
	                                                          </form>
															</div>
														</td>
														</tr>
														<input type="hidden" value="{{$x++}}">
														<input type="hidden" value="{{$y++}}">
                                                    	@endforeach
														@else
															<tr><td colspan="7" style="text-align: center;padding:20px"> <h1> No Orders In A List </h1></td></tr>
														@endif
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
								@if ($order->onFirstPage())
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								@else
									<li class="page-item"><a class="page-link" href="{{ $order->previousPageUrl() }}" rel="prev">Previous</a></li>
								@endif

								@foreach ($order->getUrlRange($order->currentPage(), $order->currentPage()) as $page => $url)
									@if ($page == $order->currentPage())
										<li class="page-item active"><span class="page-link">{{ $page }}</span></li>
									@else
										<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
									@endif
								@endforeach

								@if ($order->hasMorePages())
									<li class="page-item"><a class="page-link" href="{{ $order->nextPageUrl() }}" rel="next">Next</a></li>
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
			<script>
				$(document).ready(function () {
				$('.select2').change(function () {
					var selectedValue = $(this).val();
					var selectId = $(this).attr('id');
					$('input[name="order_id' + selectId + '"]').val(selectedValue);
					console.log("Selected value for " + selectId + ":", selectedValue);
				});
			});
			</script>
            <!-- END MAIN-CONTENT -->
	@include('Admin/footer')

<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple -->