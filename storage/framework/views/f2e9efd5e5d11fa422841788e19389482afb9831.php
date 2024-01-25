
<?php echo $__env->make('Admin/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Admin/nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Admin/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Session::has('status')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo e(Session::get('status')); ?>',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
            });
        });
    </script>
<?php endif; ?>
<?php if(Session::has('error')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?php echo e(Session::get('error')); ?>',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
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
                timer: 3000  // Auto-close after 3 seconds
            });
        });
    </script>
<?php endif; ?>
		<!-- MAIN-CONTENT -->
        <div class="main-content side-content pt-0">
                <div class="main-container container-fluid">
                    <div class="inner-body"> 
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Orders</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Orders</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12 col-lg-12">
								<div class="card custom-card">
									<div class="card-header  border-bottom-0 pb-0">
										<div>
											<div class="d-flex">
												<label class="main-content-label my-auto pt-2">All Orders</label>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border border-bottom-0">
											<table class="table mb-0 text-nowrap text-md-nowrap">
												<thead>
													<tr class="border-bottom">
														<th>ID</th>
														<th>Product</th>
														<th>Payment Id</th>
														<th>Total Price</th>
														<th>Details</th>
													</tr>
												</thead>
												<tbody>
                                                 <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr class="border-bottom">
														<td><?php echo e($y); ?></td>
														<td><img src="<?php echo e($data[$x]); ?>" alt="" style="height:100px;width:80px" class="img-responsive"></td>
														<td><?php echo e($value['r_payment_id']); ?></td>
														<td><?php echo e($value['quantity'] * $value['price']); ?></td>
														<td>
															<div class="button-list">
															<a href="adminorderview/<?php echo e($value['id']); ?>"><button class="btn btn-secondary">View</button></a>	
															</div>
														</td>
														</tr>
														<input type="hidden" value="<?php echo e($x++); ?>">
														<input type="hidden" value="<?php echo e($y++); ?>">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
								<?php if($order->onFirstPage()): ?>
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								<?php else: ?>
									<li class="page-item"><a class="page-link" href="<?php echo e($order->previousPageUrl()); ?>" rel="prev">Previous</a></li>
								<?php endif; ?>

								<?php $__currentLoopData = $order->getUrlRange($order->currentPage(), $order->currentPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($page == $order->currentPage()): ?>
										<li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
									<?php else: ?>
										<li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php if($order->hasMorePages()): ?>
									<li class="page-item"><a class="page-link" href="<?php echo e($order->nextPageUrl()); ?>" rel="next">Next</a></li>
								<?php else: ?>
									<li class="page-item disabled"><span class="page-link">Next</span></li>
								<?php endif; ?>
							</ul>
						</nav>
						<!-- End Navigation -->

                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
            <!-- END MAIN-CONTENT -->
	<?php echo $__env->make('Admin/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


			<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple --><?php /**PATH E:\practice\e-commerce\resources\views/Admin/orders.blade.php ENDPATH**/ ?>