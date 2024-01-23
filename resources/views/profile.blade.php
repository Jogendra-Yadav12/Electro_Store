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
                    <a href="/user-address">Address</a>
                </li>
                <li class="list-group-item">
                    <a href="/customerOrder">Orders</a>
                </li>
            </ul>
        </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center">User Profile</h3>
          </div>
          <div class="card-body">
           <h4>Name : {{session()->get('name')}}</h4><a href="/updpass" class="float-right" ><button class="btn btn-secondary">Update Password</button></a>
           <p>Email : {{session()->get('mail')}}</p>
           <hr>
            <h4>Address</h4>
            <ul class="list-group">
              @if($check == false)
                    <li class="list-group-item mt-3">Please add address</li>
                @else
                <li class="list-group-item mt-3">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                    <div class="controls form-group">
                                    <input class="billing-address-name form-control" type="hidden" name="name" placeholder="Name" value="{{session()->get('name')}}" readonly>
                                </div>
                                <input type="hidden" class="form-control"  name="email" value="{{session()->get('mail')}}">
                                        <div class="controls">
                                            <h5><strong>Mobile No :-</strong>  {{$detail[0]['number']}}</h5>
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                        <h5><strong>Landmark :-</strong> {{$detail[0]['landmark']}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                <h5><strong>City :-</strong> {{$detail[0]['city']}}</h5>
                                </div>
                                <div class="controls form-group">
                                    <h5><strong>Residance :-</strong> {{$detail[0]['address']}}</h5>
                                </div>
                            </div>
                        </div>
                        </div>
                </li>
                @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection