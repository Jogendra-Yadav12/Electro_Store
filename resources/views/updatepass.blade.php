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
@if (Session::has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Warning !!',
                text: '{{ Session::get('warning') }}',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
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
            <h3 class="card-title text-center">Update Password</h3>
          </div>
          <div class="card-body">
           <h4>Name : {{session()->get('name')}}</h4>
           <p>Email : {{session()->get('mail')}}</p>
           <hr>
            <ul class="list-group">
                <li class="list-group-item mt-3">
                    <form method="post" action="{{url('updatepass')}}">
                    @csrf
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                    <div class="controls form-group">
                                </div>
                                        <div class="controls">
                                            <strong>Old Password</strong>
                                            <input type="password" class="form-control" placeholder="Old Password" name="oldpass" required="" >
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <strong>New Password</strong>
                                        <div class="controls">
                                            <input type="password" class="form-control" placeholder="New Password" name="newpass" required="" >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                   
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
