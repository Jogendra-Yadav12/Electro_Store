<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="profile">Profile</a>
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
            <h3 class="card-title text-center">User Profile</h3>
          </div>
          <div class="card-body">
           <h4>Name : <?php echo e(session()->get('name')); ?></h4>
           <p>Email : <?php echo e(session()->get('mail')); ?></p>
           <hr>
            <h5>Addresses:</h5>
            <ul class="list-group">
              <?php if($detail): ?>
                <li class="list-group-item mt-3">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                    <div class="controls form-group">
                                    <input class="billing-address-name form-control" type="hidden" name="name" placeholder="Name" value="<?php echo e(session()->get('name')); ?>" readonly>
                                </div>
                                <input type="hidden" class="form-control"  name="email" value="<?php echo e(session()->get('mail')); ?>">
                                        <div class="controls">
                                            <h5>Mobile No. : <?php echo e($detail[0]['number']); ?></h5>
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                        <h5>Landmark : <?php echo e($detail[0]['landmark']); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                <h5>City : <?php echo e($detail[0]['city']); ?></h5>
                                </div>
                                <div class="controls form-group">
                                    <h5>Residance : <?php echo e($detail[0]['address']); ?></h5>
                                </div>
                            </div>
                        </div>
                        </div>
                </li>
                <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/profile.blade.php ENDPATH**/ ?>