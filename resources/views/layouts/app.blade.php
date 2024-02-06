<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/28-08-2018/electro_store-demo_Free/1204782700/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 12:09:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<!-- hryrki and modules in pdf -->
	<title>Electro Store</title>
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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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


	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
					<li class="text-center border-right text-white">
							
						</li>
					<li class="text-center border-right text-white">
							
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 894 234 5678
						</li>
						@if(!session()->get('mail'))
							<li class="text-center border-right text-white">
								<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
									<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
							</li>
							<li class="text-center text-white">
								<a href="/register" data-toggle="modal" data-target="#exampleModal2" class="text-white">
									<i class="fas fa-sign-out-alt mr-2"></i> Register </a>
							</li>
						@else
							<li class="text-center border-right text-white">
								<a href="/logout" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log Out </a>
							</li>
							<li class="text-center text-white">
								@if(session()->get('type') === "admin")
									<a href="/home" class="text-white">
										{{session()->get('name')}} </a>
								@else
									<a href="/profile" class="text-white">
										{{session()->get('name')}} </a>
								</li>
								@endif
						@endif
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

	<!-- login & registration -->
	@include('login')
	@include('register')
	<!-- End login & registration -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.html" class="font-weight-bold font-italic">
							<img src="{{asset('asset/images/logo2.png')}}" alt="Logo" class="img-fluid">Electro Store
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bottom -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="{{url('search')}}" method="GET">
								<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" id="search">
								<button class="btn my-2 my-sm-0" type="search">Search</button>
							</form>
						</div>
						<!-- //search -->
						@if(session()->get('mail'))
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<a href="/checkout">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
										<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
										@if(!$countCart)
										0
										@else
										{{$countCart}}
										@endif	
									</span>
									</button></a>
							</div>
						</div>
						<!-- //cart details -->
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //header-bottom -->

	@include('nav')
    @yield('content')

    <!-- footer -->
<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Electronics :</h2>
				<p class="footer-main mb-4">
					If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we make it easy to
					find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs, laptops, cell phones, tablets
					and iPads, video games, desktop computers, cameras and camcorders, audio, video and more.</p>
				<!-- //footer first section -->

				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Free Shipping</h3>
								<p>on orders over Rs.500</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Fast Delivery</h3>
								<p>World Wide</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Big Choice</h3>
								<p>of Products</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-4 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Categories</h3>
						<ul>
							<li class="mb-3">
								<a href="/mobile">Mobiles </a>
							</li>
							<li class="mb-3">
								<a href="/computer">Computer Accessories</a>
							</li>
							<li class="mb-3">
								<a href="/tv">TV, Audio</a>
							</li>
							<li class="mb-3">
								<a href="/laptop">Laptops</a>
							</li>
							<li class="mb-3">
								<a href="/cc">Case & Cover</a>
							</li>
							<li class="mb-3">
								<a href="/tablet">Tablets</a>
							</li>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-4 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
						<ul>
							<li class="mb-3">
								<a href="/about">About Us</a>
							</li>
							<li class="mb-3">
								<a href="/contact">Contact Us</a>
							</li>
							<li class="mb-3">
								<a href="/help">Help</a>
							</li>
							<li class="mb-3">
								<a href="/faqs">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="/terms">Terms of use</a>
							</li>
							<li>
								<a href="/privacy">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> 123 Sebastian, USA.</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 333 222 3333 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +222 11 4444 </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="https://p.w3layouts.com/cdn-cgi/l/email-protection#92f7eaf3ffe2fef7d2fff3fbfebcf1fdff"> mail <span class="__cf_email__" data-cfemail="724332170a131f021e175c111d1f">[email&#160;protected]</span></a>
							</li>
							<li>
								<i class="fas fa-envelope-open"></i>
								<a href="https://p.w3layouts.com/cdn-cgi/l/email-protection#bfdac7ded2cfd3daffd2ded6d391dcd0d2"> mail <span class="__cf_email__" data-cfemail="fccebc99849d918c9099d29f9391">[email&#160;protected]</span></a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>

		<!-- //footer third section -->
	</footer>
	<!-- //footer -->
	
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">© 2023 Electro Store. All rights reserved | Design by
				<a href="https://riveyrainfotech.com/" target="_blank">Riveyra Infotech Pvt.</a>
			</p>
		</div>
	</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script data-cfasync="false" src="{{asset('asset/js/email-decode.min.js')}}"></script><script src="{{asset('asset/js/jquery-2.2.3.min.js')}}"></script>
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