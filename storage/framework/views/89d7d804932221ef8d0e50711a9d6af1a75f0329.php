<?php echo $__env->make('Admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(Session::has('status')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success !!',
                text: '<?php echo e(Session::get('status')); ?>',
                showConfirmButton: false,
                timer: 3000  // Auto-close after 3 seconds
            });
        });
    </script>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
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
								<h2 class="main-content-title tx-24 mg-b-5">Products</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Products</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm container">
							<div class="col-md-12 col-lg-12">
								<div class="row row-sm">
									<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
											<div class="card custom-card">
												<div class="p-0 ht-100p">
													<div class="product-grid">
														<div class="product-image">
															<a href="pdetails/<?php echo e($value->id); ?>" class="image">
																<img class="pic-1 p-3" style="height:300px;border-radius:2vw;object-fit:contain" alt="product-image-1" src="<?php echo e(asset($value->img)); ?>">
															</a>
															<a class="product-like-icon" href="pdetails/<?php echo e($value->id); ?>"><i class="bi bi-ticket-detailed"></i></i></a>
															<div class="product-link">
																<a href="product/<?php echo e($value->id); ?>">
																	<i class="bi bi-pencil-fill"></i>
																</a>
																<a href="/removeproduct/<?php echo e($value->id); ?>">
																	<i class="bi bi-trash"></i>
																</a>
															</div>
														</div>
														<div class="product-content">
															<h3 class="title"><?php echo e($value->name); ?></h3>
															<div class="price"><span class="old-price"></span><span class="text-danger">Rs <?php echo e($value->price); ?></span></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						<!-- End Row -->

						<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
							
								<?php if($product->onFirstPage()): ?>
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								<?php else: ?>
									<li class="page-item"><a class="page-link" href="<?php echo e($product->previousPageUrl()); ?>" rel="prev">Previous</a></li>
								<?php endif; ?>

								<?php $__currentLoopData = $product->getUrlRange($product->currentPage(), $product->currentPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($page == $product->currentPage()): ?>
										<li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
									<?php else: ?>
										<li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php if($product->hasMorePages()): ?>
									<li class="page-item"><a class="page-link" href="<?php echo e($product->nextPageUrl()); ?>" rel="next">Next</a></li>
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
		
<?php echo $__env->make('Admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/Admin/product.blade.php ENDPATH**/ ?>