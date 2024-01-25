<?php if(Session::has('error')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?php echo e(Session::get('error')); ?>',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
<?php endif; ?>

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
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12" id="1">
					<div class="wrapper">
					
					<!-- first section -->
					<?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['product' => $mobile,'title' => 'Mobiles','wish' => $wish,'count' => $count] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0)): ?>
<?php $component = $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0; ?>
<?php unset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0); ?>
<?php endif; ?>

					<!-- second section -->
						

						<!-- third section -->
						<div class="product-sec1 product-sec2 px-sm-5 px-3">
							<div class="row">
								<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
								<p class="w3l-nut-middle">Get Extra 10% Off</p>
								<div class="col-md-8 bg-right-nut">
									<img src="<?php echo e(asset('asset/images/image1.png')); ?>" alt="">
								</div>
							</div>
						</div>
						<!-- //third section -->
						<?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['product' => $laptop,'title' => 'Laptops','wish' => $wish,'count' => $count] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0)): ?>
<?php $component = $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0; ?>
<?php unset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0); ?>
<?php endif; ?>
						<!-- fourth section -->
						<?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['product' => $tv,'title' => 'TV & Audio','wish' => $wish,'count' => $count] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0)): ?>
<?php $component = $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0; ?>
<?php unset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0); ?>
<?php endif; ?>
						<!-- //fourth section -->

					</div>
				</div>
				<!-- //product left -->
				</div>
			</div>
		</div>
	</div><?php /**PATH E:\practice\e-commerce\resources\views/homeproduct.blade.php ENDPATH**/ ?>