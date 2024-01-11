@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/profile">Profile</a>
                </li>
                <li class="list-group-item">
                    <a href="user-address">Address</a>
                </li>
                <li class="list-group-item">
                    <a href="/customerOrder">Orders</a>
                </li>
            </ul>
        </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center">Order List</h3>
          </div>
          <div class="card-body">
           <h4>Name : {{session()->get('name')}}</h4>
           <p>Email : {{session()->get('mail')}}</p>
           <hr>
            
              @if($order)
                <li class="list-group-item">
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
														<th>Quantity</th>
														<th>Price</th>
														<th>Sub_Total</th>
														<th>Details</th>
													</tr>
												</thead>
												<tbody>
                        						@foreach($order as $key=>$value)
														<tr class="border-bottom">
														<td>{{$y}}</td>
														<td><img src="{{$data[$x]}}" alt="" style="height:100px;width:80px" class="img-responsive"></td>
														<td>{{$value['quantity']}}</td>
														<td>{{$value['price']}}</td>
														<td>{{$value['quantity'] * $value['price']}}</td>
														<td>
															<div class="button-list">
															<a href="orderview/{{$value['id']}}"><button class="btn btn-secondary">View</button></a>	
															</div>
														</td>
														</tr>
														<input type="hidden" value="{{$y++}}">
														<input type="hidden" value="{{$x++}}">
                          						@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
              @else
              <li class="list-group-item">
                  Nothing ordered !!
                </li>
             @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection