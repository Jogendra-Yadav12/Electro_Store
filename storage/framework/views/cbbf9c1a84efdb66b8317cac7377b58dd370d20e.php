

<?php $__env->startSection('content'); ?>

<?php if(Session::has('status')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo e(Session::get('status')); ?>',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: '<?php echo e(Session::get('warning')); ?>',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
<?php endif; ?>

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
            <?php echo csrf_field(); ?>
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
    <iframe src="https://www.google.com/maps/?q=Kanpur,India&output=embed"
        allowfullscreen></iframe>
</div>
<!-- //map -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/contact.blade.php ENDPATH**/ ?>