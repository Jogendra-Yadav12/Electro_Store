<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/28-08-2018/electro_store-demo_Free/1204782700/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 12:09:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<title>Payment Statement</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="{{asset('asset/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{asset('asset/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{asset('asset/css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('asset/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{{asset('asset/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
</head>
<body>

<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=G-98H8KRKT85'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-98H8KRKT85');
</script>

<meta name="robots" content="noindex">
<body>
	<link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}">
<!-- New toolbar-->
<style>
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

</style>
<script> window.print(); </script>
<div class="container mt-5 py-5">
<div class="card col-md-12">
            <div class="card-body">
                <h5 class="card-title">Invoice Details</h5>
                <div class="row mb-3 text-center float-right">
                    <div class="col-sm-9">
                        <img src="{{asset($img[0]['img'])}}" alt="" style="height:250px;width:200px" class="img-responsive mt-5">
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
                        <p class="form-control-static">Rs. {{$data[0]['price']}}</p>
                        <input type="hidden" name="price" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Quantity of Product:</label>
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
                        <p class="form-control-static">Rs. {{ $data[0]['quantity'] * $data[0]['price']}}</p>
                        <input type="hidden" name="price" value="">
                    </div>
                </div>
        </div>
    </div>

	<!-- js-files -->
	<!-- jquery -->
	<script data-cfasync="false" src="{{asset('asset/js/email-decode.min.js')}}"></scrip><script src="{{asset('asset/js/jquery-2.2.3.min.js')}}"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="{{asset('asset/js/jquery.magnific-popup.js')}}"></script>
	
	<!-- //popup modal (for location)-->


	<!-- //password-script -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	   
	<!-- scroll seller -->
	<script src="{{asset('asset/js/scroll.js')}}"></script>
	<!-- //scroll seller -->
	<!-- Include jQuery via CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<!-- smoothscroll -->
	<script src="{{asset('asset/js/SmoothScroll.min.js')}}"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{asset('asset/js/move-top.js')}}"></script>
	<script src="{{asset('asset/js/easing.js')}}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{asset('asset/js/bootstrap.js')}}"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
(function(){var js = "window['__CF$cv$params']={r:'837f89be1e7c381b',t:'MTcwMjk4Nzc4MS4zMzcwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='{{asset('asset/js/main.js')}}',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};
}})();
</script></body>


<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/28-08-2018/electro_store-demo_Free/1204782700/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 12:10:08 GMT -->
</html>