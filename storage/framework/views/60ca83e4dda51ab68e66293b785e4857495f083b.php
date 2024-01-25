
<?php $__env->startSection('content'); ?>

    <!-- banner-2 -->
	<!-- <div class="page-head_agile_info_w3l">

	</div> -->
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
					<li>Search Products</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>S</span>earch
                <span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-5 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
                            <?php if($count==0): ?>
                                <h1 class="p-5">Data Not Found!!</h1>
                            <?php else: ?>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-4 product-men mb-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="<?php echo e(asset($value->img)); ?>" alt="" style="height:160px;width:200px;">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="/singlepage/<?php echo e($value->id); ?>" class="link-product-add-cart">Quick View</a>
												</div> 
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="/singlepage"><?php echo e($value->name); ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">Rs. <?php echo e($value->price); ?></span>
												
											</div>
											<a href="/checkout/<?php echo e($value->id); ?>"><button name="submit" class="button btn btn-primary">Add to cart</button></a>
										</div>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->
    
<?php echo $__env->make('bannerbottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/search.blade.php ENDPATH**/ ?>