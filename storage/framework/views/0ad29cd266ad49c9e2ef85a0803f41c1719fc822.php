<!-- log in -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="border: none;">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo e(url('login')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required="" onchange="validateEmail()">
							<div id="emailError" class="btn-warning mt-3"></div>
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<div class="input-group">
							<input type="password" class="form-control" placeholder="Enter password" name="password" id="password" required="" onchange="validatePassword()">
							<div class="input-group-append">
								<button class="btn btn-secondary" type="button" id="toggle">
									<i class="bi bi-eye" aria-hidden="true"></i>
								</button>
							</div>
						</div>
							<div class="btn-warning mt-2"><span id="passwordError"></span></div>
						</div>
						<a href="/forget">Forget Password ?</a>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal2">
							Register Now</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>

document.getElementById('toggle').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        var passError = document.getElementById('passError');
        var icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });

	function validateEmail() {

        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('emailError');
        var email = emailInput.value;

        // Basic email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerHTML = 'Invalid email address.';
        } else {
            emailError.innerHTML = '';
        }
    }
	function validatePassword() {
        var passwordInput = document.getElementById('password');
        var passwordError = document.getElementById('passwordError');
        var password = passwordInput.value;

       
        if (password.length < 8) {
            passwordError.innerHTML = ' Password must be at least 8 characters long.';
        } else {
            
            passwordError.innerHTML = '';
        }
    }
</script><?php /**PATH E:\practice\e-commerce\resources\views/login.blade.php ENDPATH**/ ?>