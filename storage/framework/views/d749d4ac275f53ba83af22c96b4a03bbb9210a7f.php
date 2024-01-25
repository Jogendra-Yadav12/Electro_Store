<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Template</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles can be added here */
  </style>
</head>
<body>
<div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo e($data['name']); ?></h2>
                        <p class="card-text">
                            <strong>Email:</strong><?php echo e($data['email']); ?><br>
                            <?php echo e($data['message']); ?><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Bootstrap JS Bundle (Optional) -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH E:\practice\e-commerce\resources\views/email.blade.php ENDPATH**/ ?>