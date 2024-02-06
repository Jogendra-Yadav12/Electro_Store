@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
        <h1 class="m-3">Payment Bill</h1>
        <div class="mt-5">
    <div class="row container">
        <div class="col-md-3 mb-2">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/profile">Profile</a>
                </li>
                <li class="list-group-item">
                    <a href="/user-address">Address</a>
                </li>
                <li class="list-group-item">
                    <a href="/customerOrder">Orders</a>
                </li>
            </ul>
        </div>
        <div class="card col-md-9">
            <div class="card-body">
            <a href="/pdf/{{$data[0]['id']}}" target="_blank"><button class="btn btn-primary float-right">Payment Bill</button></a>
                <h5 class="card-title">Invoice Details</h5>
                <div class="row mb-3 text-center float-right">
                    <div class="col-sm-9">
                        <img src="{{asset($img[0]['img'])}}" alt="" style="height:250px;width:200px;object-fit:contain" class="img-responsive mt-5">
                    </div>
                </div>
                <hr>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Product Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{$img[0]['name']}}</p>
                        <input type="hidden" name="userName" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Price:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">Rs. {{number_format($data[0]['price'], 0, '', ',')}}</p>
                        <input type="hidden" name="price" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Quantity:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">X {{$data[0]['quantity']}}</p>
                        <input type="hidden" name="quantity" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{$data[0]['landmark']}},{{$data[0]['city']}}</p>
                        <input type="hidden" name="totalAmount" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Timing :</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{$data[0]['created_at']}}</p>
                        <input type="hidden" name="date" value="">
                    </div>
                </div>
                </div>
                <!-- Add other fields as necessary -->
                <hr>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Total Amount:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">Rs. {{ number_format(($data[0]['quantity'] * $data[0]['price']), 0, '', ',')}}</p>
                        <input type="hidden" name="price" value="">
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
@endsection