<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo e(url('customer')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password" id="password1" required="">
						</div>
						<div class="right-w3l">
							<button class="form-control btn-primary">Register</button>
						</div>
						<p class="text-center dont-do mt-3">Do have an account?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Login in</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div><?php /**PATH E:\practice\e-commerce\resources\views/register.blade.php ENDPATH**/ ?>