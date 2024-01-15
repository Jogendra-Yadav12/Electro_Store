<!-- log in -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('login')}}" method="post">
					@csrf
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" id="email" required="" onchange="validateEmail()">
							<div id="emailError" class="btn-warning mt-3"></div>
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password" id="password" required="" onchange="validatePassword()">
							<div class="btn-warning mt-2"><span id="passwordError"></span></div>
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Register Now</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
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
</script>