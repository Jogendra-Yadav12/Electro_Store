@extends('layouts.app')

@section('content')

@if (Session::has('status'))

<div class="container p-2 slide-in">
	<div class="alert alert-success alert-dismissible">
		<strong>{{ Session::get('status') }}</strong>
		<svg class="float-right" data-bs-dismiss="alert" xmlns="http://www.w3.org/2000/svg" width="40" height="30" cursor="pointer" fill="currentColor" class="bi bi-file-excel btn-close" viewBox="0 0 16 16">
		<path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
		<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
		</svg>
	</div>
</div>

<style>
    .slide-in {
        animation: slideIn 2s ease-in-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-100%);
        }
        to {
            transform: translateY(0);
        }
    }
</style>
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
                    <a href="/">Home</a>
                    <i>|</i>
                </li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!---728x90--->

<!-- contact -->
<div class="contact py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>ontact
            <span>U</span>s
        </h3>
        <!-- //tittle heading -->
        <div class="row contact-grids agile-1 mb-5">
            <div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
                <div class="contact-grid1 text-center">
                    <div class="con-ic">
                        <i class="fas fa-map-marker-alt rounded-circle"></i>
                    </div>
                    <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Address</h4>
                    <p>1PO Box 8568954 Melbourne
                        <label>Australia.</label>
                    </p>
                </div>
            </div>
            <div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
                <div class="contact-grid1 text-center">
                    <div class="con-ic">
                        <i class="fas fa-phone rounded-circle"></i>
                    </div>
                    <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Call Us</h4>
                    <p>+(0121) 121 121
                    </p>
                </div>
            </div>
            <div class="col-sm-4 contact-grid agileinfo-6">
                <div class="contact-grid1 text-center">
                    <div class="con-ic">
                        <i class="fas fa-envelope-open rounded-circle"></i>
                    </div>
                    <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
                    <p>
                        <a href="https://p.w3layouts.com/cdn-cgi/l/email-protection#a2cbccc4cde2c7dac3cfd2cec78cc1cdcf"><span class="__cf_email__" data-cfemail="650c0b030a25001d0408150900544b060a08">[email&#160;protected]</span></a>
                    </p>
                </div>
            </div>
        </div>
        <!-- form -->
        <form action="/mail" method="post">
            @csrf
            <div class="contact-grids1 w3agile-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6 contact-form1 form-group">
                        <label class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required="">
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form1 form-group">
                        <label class="col-form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required="">
                    </div>
                </div>
                <div class="contact-me animated wow slideInUp form-group">
                    <label class="col-form-label">Message</label>
                    <textarea name="message" class="form-control" placeholder="Message" required=""> </textarea>
                </div>
                <div class="contact-form">
                    <input type="submit" value="Send">
                </div>
            </div>
        </form>
        <!-- //form -->
    </div>
</div>
<!-- //contact -->
<!---728x90--->
<!-- map -->
<div class="map mt-sm-0 mt-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805196.5077734194!2d144.49270863101745!3d-37.97015423820711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne+VIC%2C+Australia!5e0!3m2!1sen!2sin!4v1474020956974"
        allowfullscreen></iframe>
</div>
<!-- //map -->
@include('bannerbottom')

@endsection