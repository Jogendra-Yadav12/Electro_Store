
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
                title: 'Error !',
                text: '<?php echo e(Session::get('error')); ?>',
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
								<h2 class="main-content-title tx-24 mg-b-5">Users</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12 col-lg-9">
								<div class="card custom-card">
									<div class="card-header  border-bottom-0 pb-0">
										<div>
											<div class="d-flex">
												<label class="main-content-label my-auto pt-2">All Users</label>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border border-bottom-0">
											<table class="table mb-0 text-nowrap text-md-nowrap">
												<thead>
													<tr class="border-bottom">
														<th>ID</th>
														<th>Name</th>
														<th>Email</th>
														<th>Type</th>
														<th>status</th>
														<th>methods</th>
													</tr>
												</thead>
												<tbody>
                                                 <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr class="border-bottom">
														<td><?php echo e($x); ?></td>
														<td><?php echo e($value->name); ?></td>
														<td><?php echo e($value->email); ?></td>
														<td><?php echo e($value->type); ?></td>
														<td>
															<?php if($value->status === 1): ?>
															<a href="/active/<?php echo e($value->id); ?>"><span class="alert alert-success py-1" role="alert">
																Activate
															</span></a>
															<?php else: ?>
															<a href="/active/<?php echo e($value->id); ?>"><span class="alert alert-danger py-1" role="alert">
																Blocked
															</span></a>
															<?php endif; ?>
														</td>
														<td>
															<div class="button-list">
															<a href="/update/<?php echo e($value->id); ?>"><i class="ti ti-pencil"></i></a>
															<a href="removeuser/<?php echo e($value->id); ?>"><i class="ti ti-trash"></i></a>	
															</div>
														</td>
														</tr>
                                                        <input type="hidden" value="<?php echo e($x += 1); ?>">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-12 col-md-12">
								<form class="card custom-card" action="<?php echo e(url('add_user')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
									<div class="card-body">
										<div class="form-group">
											<label class="tx-medium">User Name</label>
											<input type="text" class="form-control" placeholder="Name" name="name" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Password</label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" required>
										</div>
										<div class="form-group">
											<label class="tx-medium">Category</label>
											<select class="form-control select2" name="type" required>
												<option label="Choose one">
												</option>
												<option value="admin">
													admin
												</option>
												<option value="customer">
													customer
												</option>
											</select>
										</div>
									</div>
									<div class="card-footer mb-1">
										<button class="btn btn-primary">Add User</button>
										<button class="btn btn-danger">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						<!-- End Row -->
						<!-- Navigation -->
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-center">
								<?php if($user->onFirstPage()): ?>
									<li class="page-item disabled"><span class="page-link">Previous</span></li>
								<?php else: ?>
									<li class="page-item"><a class="page-link" href="<?php echo e($user->previousPageUrl()); ?>" rel="prev">Previous</a></li>
								<?php endif; ?>

								<?php $__currentLoopData = $user->getUrlRange($user->currentPage(), $user->currentPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($page == $user->currentPage()): ?>
										<li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
									<?php else: ?>
										<li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php if($user->hasMorePages() && $user->nextPage()->count() > 0): ?>
									<li class="page-item"><a class="page-link" href="<?php echo e($user->nextPageUrl()); ?>" rel="next">Next</a></li>
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


			<!-- accept="image/jpg, image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple --><?php /**PATH E:\practice\e-commerce\resources\views/Admin/user.blade.php ENDPATH**/ ?>