@extends('layouts.app')

@section('content')
@if (Session::has('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success !!',
                text: '{{ Session::get('status') }}',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="profile">Profile</a>
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
            <h3 class="card-title text-center">Address</h3>
          </div>
          <div class="card-body">
           <h4>Name : {{session()->get('name')}}</h4>
           <p>Email : {{session()->get('mail')}}</p>
           <hr>
            <h5>Address:</h5>
            <ul class="list-group">
                <li class="list-group-item mt-3">
                @if($double)
                <form method="post" action="{{url('user-address')}}">
                    @csrf
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
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="number" required="" value="{{$user[0]['number']}}">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Landmark" name="landmark" required="" value="{{$user[0]['landmark']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" class="form-control" placeholder="Town/City" name="city" required="" value="{{$user[0]['city']}}">
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="address" required="" value="{{$user[0]['address']}}">
                                        <option value="{{$user[0]['address']}}">{{$user[0]['address']}}</option>
                                        <option value="Office">Office</option>
                                        <option vlaue="Home">Home</option>
                                        <option value="Commercial">Commercial</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    Update
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                    @else
                    <form method="post" action="{{url('user-address')}}">
                    @csrf
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
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="number" required="" >
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Landmark" name="landmark" required="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" class="form-control" placeholder="Town/City" name="city" required="" >
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="address" required="" >
                                        <option>Select Address type</option>
                                        <option value="Office">Office</option>
                                        <option vlaue="Home">Home</option>
                                        <option value="Commercial">Commercial</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    Add Address
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                    @endif
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
