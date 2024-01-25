<div class="search-hotel border-bottom py-2">
	<h3 class="agileits-sear-head mb-3">Category</h3>
		<form action="/brand" method="get">		
			<div class="left-side py-2">
				<ul>
					<?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<input type="checkbox" class="checked" name="filter[]" value="<?php echo e($value['brand']); ?>" id="<?php echo e($value['brand']); ?>" />
							<label class="span" for="<?php echo e($value['brand']); ?>" ><?php echo e($value['brand']); ?></label>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</form>
	</div>
					<!-- price -->
						<div class="range py-2">
							<h3 class="agileits-sear-head mb-3">Price</h3>
							<div class="w3l-range">
								<ul>
								<li>
									<input type="checkbox" class="checked" value="0-1000">
										<a href="#">Under Rs. 1,000</a>
									</li>
									<li class="my-1">
									<input type="checkbox" class="checked" value="1000-5000">
										<a href="#">Rs. 1,000 - Rs. 5,000</a>
									</li>
									<li>
										<input type="checkbox" class="checked" value="5000-10000">
										<a href="#">Rs. 5,000 - Rs. 10,000</a>
									</li>
									<li class="my-1">
									<input type="checkbox" class="checked" value="10000-20000">
										<a href="#">Rs. 10,000 - Rs. 20,000</a>
									</li>
									<li>
									<input type="checkbox" class="checked" value="20000-30000">
										<a href="#">Rs. 20,000 Rs. 30,000</a>
									</li>
									<li class="mt-1">
									<input type="checkbox" class="checked" value="30000-100000">
										<a href="#">Above Rs. 30,000</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	$(document).ready(function() {
    $('.checked').change(function() {
        var selectedBrands = []; 
        var selectedPrices = []; 

        // Loop through all checked checkboxes and store their values (brands/prices) in the respective arrays
        $('.checked:checked').each(function() {
            var value = $(this).val();
            if (value.includes('-')) {
                selectedPrices.push(value);
            } else {
                selectedBrands.push(value);
            }
        });

        // Filter products based on selected brands
        if (selectedBrands.length > 0) {
            $('.product-item').hide(); 

            
            selectedBrands.forEach(function(brand) {
                $('.product-item[data-brand="' + brand + '"]').show();
            });
        } else {
            $('.product-item').show(); 
        }

        // Filter products based on selected prices
        if (selectedPrices.length > 0) {
            $('.product-item').each(function() {
                var price = parseInt($(this).find('.item_price').text().replace('Rs. ', '').trim());
                var showProduct = false;

                selectedPrices.forEach(function(priceRange) {
                    var range = priceRange.split('-');
                    if (price >= parseInt(range[0]) && price <= parseInt(range[1])) {
                        showProduct = true;
                    }
                });

                showProduct ? $(this).show() : $(this).hide();
            });
        }
    });
});

</script><?php /**PATH E:\practice\e-commerce\resources\views/brand.blade.php ENDPATH**/ ?>