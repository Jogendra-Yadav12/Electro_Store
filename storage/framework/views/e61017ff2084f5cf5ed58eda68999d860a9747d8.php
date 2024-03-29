

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/profile">Profile</a>
                </li>
                <li class="list-group-item">
                    <a href="user-address">Address</a>
                </li>
                <li class="list-group-item">
                    <a href="/customerOrder">Orders</a>
                </li>
            </ul>
        </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center">Order List</h3>
          </div>
          <div class="card-body">
           <h4>Name : <?php echo e(session()->get('name')); ?></h4>
           <p>Email : <?php echo e(session()->get('mail')); ?></p>
           <hr>
            
              <?php if($order): ?>
                <li class="list-group-item">
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
														<th>Quantity</th>
														<th>Price</th>
														<th>Sub_Total</th>
														<th>Details</th>
													</tr>
												</thead>
												<tbody>
                        						<?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr class="border-bottom">
														<td><?php echo e($y); ?></td>
														<td><img src="<?php echo e($data[$x]); ?>" alt="" style="height:100px;width:80px" class="img-responsive"></td>
														<td><?php echo e($value['quantity']); ?></td>
														<td><?php echo e($value['price']); ?></td>
														<td><?php echo e($value['quantity'] * $value['price']); ?></td>
														<td>
															<div class="button-list">
															<a href="orderview/<?php echo e($value['id']); ?>"><button class="btn btn-secondary">View</button></a>	
															</div>
														</td>
														</tr>
														<input type="hidden" value="<?php echo e($y++); ?>">
														<input type="hidden" value="<?php echo e($x++); ?>">
                          						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						<?php else: ?>
						<li class="list-group-item">
							Nothing ordered !!
							</li>
						<?php endif; ?>
			 <!-- Navigation -->
			 <nav aria-label="Page navigation" class="mt-3">
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
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/order.blade.php ENDPATH**/ ?>