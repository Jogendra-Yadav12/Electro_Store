@include('header')
@include('nav')

@if (Session::has('status'))

<div class="container p-2">
	<div class="alert alert-success alert-dismissible">
		<strong>{{ Session::get('status') }}</strong>
		<svg class="float-right" data-bs-dismiss="alert" xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
		<path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
		<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
		</svg>
	</div>
</div>
@endif
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
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!---728x90--->

<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>heckout
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                <span> {{$count}} Products</span>
            </h4>
            
            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <!-- <th>Price</th> -->
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        static $x = 1;
                        $amount = 0;
                        $i = [];
                        @endphp
                    @if($count==0)
                    <tr>
                        <td  colspan='6' class="p-5"><h1>Cart is Empty</h1></td>
                    </tr>
                    @else

                    @foreach($product as $key=>$value)
                        <tr class="rem1">
                            <td class="invert">{{$x}}</td>
                            <td class="invert-image">
                                <a href="/singlepage">
                                    <img src="{{asset($value['img'])}}" alt="" style="height:150px;width:150px" class="img-responsive">
                                </a>
                            </td>
                            <td class="cart-product-quantity" width="130px">
                                <div class="input-group quantity">
                               <strong>Price</strong><input type="text" style="width:100px;border:none;" class="container price-sub form-control" value="{{$value['price']}}" readonly>
                               <input type="hidden" name="price[]" class="xyz" value="{{$value['price']}}">
                               <input type="hidden" name="quantity[]" class="abc" value="{{$value['quantity']}}">
                                    <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" class="qty-input form-control" maxlength="2" max="10" value="{{$value['quantity']}}" readonly>
                                    <div class="input-group-append increment-btn" style="cursor: pointer">
                                        <span class="input-group-text" data-id="{{ $x }}">+</span>
                                    </div>
                                </div>
                            </td>      
                            <td class="invert">{{$value['name']}}
                            </td>
                            @php
                            $i = $value['p_id'];
                            @endphp
                            <!-- <td>
                            <input type="text" style="width:100px;border:none;"  class="container total-{{ $x }} form-control" value="{{$value['price']}}" readonly>
                            </td> -->
                            <input type="hidden" name="p_id[]" class="ghi" value="{{$i}}">
                            <td class="invert">
                                <div class="rem">
                                   
                                    <a href='{{url("/remove/$i")}}'>
                                    <!-- Button trigger modal -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
                                    <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                                    </svg></a>
                                </div>
                            </td>
                        </tr>
                            @php
                            $amount+=$value['price'];

                            $x++;
                            @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div>
                @if(!$add)
                <div class="checkout-right-basket">
                    <a data-bs-toggle="modal" href="#exampleModalToggle" role="button" class="btn btn-sm btn-primary float-left">Order Now</a>
                </div>
                @else
                <div class="checkout-right-basket">
                    <a href="#" class="btn btn-sm btn-primary float-left buy_now">Order Now</a>
                    <input type="hidden" id="abc" value="{{$amount}}">
                </div>
            </div>
            @endif
            <div class="checkout-right-basket">
                <strong class="btn-sm btn-secondary float-right p-3">Grand Total :-<span  class="amount fs-5">{{$amount}}</span></strong>
            </div>    
        </div>
        </div>
        
        

    <!-- pop up address -->

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="p-2">
      <svg class="float-right" data-bs-dismiss="modal" aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
      <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
      <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
    </svg>
      </div>
      <div class="modal-body">
        
      <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Add a new Details</h4>
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
<!-- //checkout page -->

<script type="text/javascript">
    $(document).ready(function () {
        
    

    });
</script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script>

        $('.increment-btn').click(function (e) {
                e.preventDefault();

                var amount = parseInt($('.amount').text());
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var price = $(this).parents('.quantity').find('.price-sub').val();
            
                var value = parseInt(incre_value, 10);
                var sub_total = parseInt(price,10);
                value = isNaN(value) ? 0 : value;
                sub_total = isNaN(sub_total) ? 0 : sub_total;
                sub_total /= value;
                
                

                if(value<10){
                    value++;

                    amount = amount + sub_total;
                    total = sub_total * value;

                    $(this).parents('.quantity').find('.qty-input').val(value);
                    $(this).parents('.quantity').find('.price-sub').val(total);
                    $('.amount').text(amount);
                    $('#abc').val(amount);
                    $(this).parents('.quantity').find('.xyz').val(sub_total);
                    $(this).parents('.quantity').find('.abc').val(value);
                
                }
                
            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var amount = parseInt($('.amount').text());
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var price = $(this).parents('.quantity').find('.price-sub').val();

                var value = parseInt(decre_value, 10);
                var sub_total = parseInt(price,10);

                value = isNaN(value) ? 0 : value;
                sub_total = isNaN(sub_total) ? 0 : sub_total;
                sub_total /= value;

                if(value>1){
                    value--;

                    amount = amount - sub_total;
                    total = sub_total * value;

                    $(this).parents('.quantity').find('.qty-input').val(value);
                    $(this).parents('.quantity').find('.price-sub').val(value);
                    $('#abc').val(amount);
                    $('.amount').text(amount);
                    $(this).parents('.quantity').find('.xyz').val(sub_total);
                    $(this).parents('.quantity').find('.abc').val(value);
                }
            });


         var SITEURL = '{{URL::to(' ')}}';
         $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         }); 
         $('body').on('click', '.buy_now', function(e){
           var totalAmount = $("#abc").val();
           var priceData = $('input[name="price[]"]').serializeArray();
           var quantityData = $('input[name="quantity[]"]').serializeArray();
           var product_id =  $('input[name="p_id[]"]').serializeArray();;

           var options = {
           "key": "rzp_test_nC5kxY1iKaQcLp",
           "amount": (totalAmount*100), // 2000 paise = INR 20
           "name": "Tutsmake",
           "description": "Payment",
           "image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
             "handler": function (response){
             
               window.location.href = '/paysuccess?payment_id='+response.razorpay_payment_id+'&product_id='+JSON.stringify(product_id)+'&amount='+totalAmount+'&price='+JSON.stringify(priceData)+'&quantity='+JSON.stringify(quantityData);
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

@include('footer')
