@extends('layouts.app')

@section('content')

<!-- banner-2 -->
<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->

<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="/">Home</a>
                    <i>|</i>
                </li>
                <li>Payment Page</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page -->

<!-- Payment Page-->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>P</span>ayment</h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <!--Horizontal Tab-->
            <div id="parentHorizontalTab">
                <div class="resp-tabs-container hor_1">
                        <div class="vertical_post check_box_agile m-5">
                        <div class="card col-md-12">
                            <div class="card-body">
                                <h5 class="card-title">Product Detail</h5>
                                <div class="row mb-3 text-center float-right">
                                    <div class="col-sm-9">
                                        <img src="{{asset($product->img)}}" alt="" style="height:150px;width:100px" class="img-responsive mt-5">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3 text-center">
                                    <label class="col-sm-3 col-form-label">Product Name:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static">{{$product->name}}</p>
                                        <input type="hidden" name="userName" value="">
                                    </div>
                                </div>
                                <div class="row mb-3 text-center">
                                    <label class="col-sm-3 col-form-label">Price:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static">Rs.{{$product->price}} </p>
                                        <input type="hidden" name="price" value="">
                                    </div>
                                </div>
                                <div class="row mb-3 text-center">
                                    <label class="col-sm-3 col-form-label">Quantity of Product:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static">X 1</p>
                                        <input type="hidden" name="quantity" value="">
                                    </div>
                                </div>
                                @if($add)
                                <div class="row mb-3 text-center">
                                    <label class="col-sm-3 col-form-label">Address:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static">{{$address[0]['landmark']}},{{$address[0]['city']}}</p>
                                        <input type="hidden" name="quantity" value="">
                                    </div>
                                </div>
                                @endif
                                </div>
                                <!-- Add other fields as necessary -->
                                <hr>
                                <div class="row mb-3 text-center">
                                <label class="col-sm-3 col-form-label">Total Amount:</label>
                                <div class="col-sm-9">
                                        <p class="form-control-static">Rs.{{$product->price}}</p>
                                        <input type="hidden" name="price" value="">
                                </div>
                            </div>
                        </div>
                        @if(!$add)
                        <div class="checkout-right-basket">
                            <a data-bs-toggle="modal" href="#exampleModalToggle" role="button" class="btn btn-sm btn-primary float-left">Order Now</a>
                        </div>
                        @else
                        <div class="checkout-right-basket">
                            <a href="#" class="btn btn-sm btn-primary float-left buy_now">Order Now</a>
                            <input type="hidden" id="abc" value="{{$product->price}}">
                            <input type="hidden" id="price" value="{{$product->price}}">
                            <input type="hidden" id="pid" value="{{$product->id}}">
                        </div>
                    @endif
                    
                </div>
            </>
            <!--Plug-in Initialisation-->
        </div>
    </div>
</div>

<!-- //payment page -->


<!-- pop up address -->

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border:none;">
      <div class="p-2">
      <svg class="float-right" data-bs-dismiss="modal" aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
      <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
      <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
    </svg>
      </div>
      <div class="modal-body">
        
      <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Add Address Details</h4>
                <form method="POST" action="{{url('addAddress')}}">
                    @csrf
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls form-group">
                                    <input class="billing-address-name form-control" type="text" name="name" placeholder="Name" value="{{session()->get('name')}}" readonly>
                                </div>
                                <input type="hidden" class="form-control"  name="email" value="{{session()->get('mail')}}">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" class="form-control" placeholder="Town/City" name="city" required="">
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="address" required="">
                                        <option>Select Address type</option>
                                        <option value="Office">Office</option>
                                        <option vlaue="Home">Home</option>
                                        <option value="Commercial">Commercial</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">Save Address</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var SITEURL = '{{URL::to(' ')}}';
         $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         }); 
         $('body').on('click', '.buy_now', function(e){
           var totalAmount = $("#abc").val();
           var priceData = $('#price').val();
           var quantityData = 1;
           var product_id =  $('#pid').val();

           var options = {
           "key": "rzp_test_nC5kxY1iKaQcLp",
           "amount": (totalAmount*100), // 2000 paise = INR 20
           "name": "Tutsmake",
           "description": "Payment",
           "image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
             "handler": function (response){
             
               window.location.href = '/paysuccess?payment_id='+response.razorpay_payment_id+'&product_id='+product_id+'&amount='+totalAmount+'&price='+priceData+'&quantity='+quantityData;
            },
          "prefill": {
               "contact": '9988665544',
               "email":   'tutsmake@gmail.com',
           },
           "theme": {
               "color": "#528FF0"
           }
         };
         var rzp1 = new Razorpay(options);
         rzp1.open();
         e.preventDefault();
         });
      </script>

@endsection