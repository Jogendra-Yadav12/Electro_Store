<!-- second section -->
<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic"><?php echo e($title); ?></h3>
							<div class="row">
								<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<?php $check = false; ?>

									<!-- Check to  -->

									<?php $__currentLoopData = $wish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($item->p_id == $value->id): ?>
												<?php $check = true; ?>
												<?php break; ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="<?php echo e(asset($value->img)); ?>" alt="Product-Images" style="height:160px;width:200px;object-fit:contain">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="/singlepage/<?php echo e($value->id); ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href=""><?php echo e($value->name); ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">Rs. <?php echo e($value->price); ?></span>
											</div>
											<a href="/checkout/<?php echo e($value->id); ?>"><button name="submit" class="button btn btn-primary">Add to cart</button></a>
											<?php if(!(session()->get('mail'))): ?>
												<a href="/wishlist/<?php echo e($value->id); ?>"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											<?php elseif($count === 0): ?>
												<a href="/wishlist/<?php echo e($value->id); ?>"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											<?php elseif($check == true): ?>
												<a href="/wishlist/<?php echo e($value->id); ?>"><button class="button btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											<?php else: ?>
												<a href="/wishlist/<?php echo e($value->id); ?>"><button class="button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
												<path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
												</svg></button></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
						<!-- //second section -->
						<?php /**PATH E:\practice\e-commerce\resources\views/components/product.blade.php ENDPATH**/ ?>