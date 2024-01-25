<?php echo $__env->make('Admin/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Admin/nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Admin/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div>
<div class="container" style="padding-left:10%;">
        <h1 class="mt-3">Payment Bill</h1>
        <div class="card custom-card">
            <div class="card-body col-md-12 col-lg-12">
                <h5 class="card-title">Invoice Details <p class="float-end text-muted small">Customer Name:- <?php echo e($cus[0]['name']); ?> </p></h5>
                <hr>
				<div class="row">
			<div class="col-sm-9">
			<div class="row">
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Product Name:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static"><?php echo e($img[0]['name']); ?></p>
                        <input type="hidden" name="userName" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Price:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">Rs. <?php echo e($data[0]['price']); ?></p>
                        <input type="hidden" name="price" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Quantity of Product:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">X <?php echo e($data[0]['quantity']); ?></p>
                        <input type="hidden" name="quantity" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Address:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static"><?php echo e($address[0]['landmark']); ?> , <?php echo e($address[0]['city']); ?></p>
                        <input type="hidden" name="totalAmount" value="">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Timing :</label>
                    <div class="col-sm-9">
                        <p class="form-control-static"><?php echo e($data[0]['created_at']); ?></p>
                        <input type="hidden" name="date" value="">
                    </div>
                </div>
                </div>
			</div>
			<div class="col">
				<div class="row mb-3 text-center float-right">
					<img src="<?php echo e(asset($img[0]['img'])); ?>" alt="" style="height:250px;width:200px" class="img-responsive mt-5">
				</div>
			</div>
		</div>
                <hr>
                <div class="row mb-3 text-center">
                    <label class="col-sm-3 col-form-label">Total Amount:</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">Rs. <?php echo e($data[0]['quantity'] * $data[0]['price']); ?></p>
                        <input type="hidden" name="price" value="">
                    </div>
                </div>
        </div>
    </div>

	
</div>
    </div>
    <!-- Bootstrap JS (optional if needed for certain Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <?php echo $__env->make('Admin/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\practice\e-commerce\resources\views/Admin/paymentslip.blade.php ENDPATH**/ ?>