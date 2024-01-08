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
            <h3 class="card-title text-center">Address</h3>
          </div>
          <div class="card-body">
           <h4>Name : <?php echo e(session()->get('name')); ?></h4>
           <p>Email : <?php echo e(session()->get('mail')); ?></p>
           <hr>
            <h5>Addresses:</h5>
            <ul class="list-group">
              
                <li class="list-group-item mt-3">
                <?php if($double): ?>
                <form method="post" action="<?php echo e(url('user-address')); ?>">
                    <?php echo csrf_field(); ?>
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
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="number" required="" value="<?php echo e($user[0]['number']); ?>">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Landmark" name="landmark" required="" value="<?php echo e($user[0]['landmark']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" class="form-control" placeholder="Town/City" name="city" required="" value="<?php echo e($user[0]['city']); ?>">
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="address" required="" value="<?php echo e($user[0]['address']); ?>">
                                        <option value="<?php echo e($user[0]['address']); ?>">Select Address type</option>
                                        <option value="Office">Office</option>
                                        <option vlaue="Home">Home</option>
                                        <option value="Commercial">Commercial</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    Update
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                    <?php else: ?>
                    <form method="post" action="<?php echo e(url('user-address')); ?>">
                    <?php echo csrf_field(); ?>
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
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="number" required="" >
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Landmark" name="landmark" required="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" class="form-control" placeholder="Town/City" name="city" required="" >
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="address" required="" >
                                        <option>Select Address type</option>
                                        <option value="Office">Office</option>
                                        <option vlaue="Home">Home</option>
                                        <option value="Commercial">Commercial</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    Add Address
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                    <?php endif; ?>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/useraddress.blade.php ENDPATH**/ ?>