<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/28-08-2018/electro_store-demo_Free/1204782700/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 12:09:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
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
<div class="d-flex align-items-center justify-content-center mt-5 py-5">
<div class=" mt-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center px-5 ml-5 mr-5">Reset Password</h3>
          </div>
          <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item mt-3">
                    <form method="post" action="{{url('/reset')}}">
                    @csrf
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                    <div class="controls form-group">
                                </div>
                                        <div class="controls">
                                            <strong>New Password</strong>
                                            <input type="password" placeholder="New Password" name="newpass" required="" >
                                        </div>
                                        <div class="controls">
                                            <strong>Re-enter Password</strong>
                                            <input type="password" placeholder="Re-enter Password" name="repass" required="" >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    Reset Password
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
</body>
</html>