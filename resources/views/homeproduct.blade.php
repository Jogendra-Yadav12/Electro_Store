@if (Session::has('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ Session::get('error') }}',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

@if (Session::has('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('status') }}',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif

@if (Session::has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: '{{ Session::get('warning') }}',
                showConfirmButton: false,
                timer: 2000  // Auto-close after 3 seconds
            });
        });
    </script>
@endif
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
					<x-product :product="$mobile" title="Mobiles" :wish="$wish" :count="$count" />

					<!-- second section -->
						

						<!-- third section -->
						<div class="product-sec1 product-sec2 px-sm-5 px-3">
							<div class="row">
								<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
								<p class="w3l-nut-middle">Get Extra 10% Off</p>
								<div class="col-md-8 bg-right-nut">
									<img src="{{asset('asset/images/image1.png')}}" alt="">
								</div>
							</div>
						</div>
						<!-- //third section -->
						<x-product :product="$laptop" title="Laptops" :wish="$wish" :count="$count" />
						<!-- fourth section -->
						<x-product :product="$tv" title="TV & Audio" :wish="$wish" :count="$count" />
						<!-- //fourth section -->

					</div>
				</div>
				<!-- //product left -->
				</div>
			</div>
		</div>
	</div>