
<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginal6c2e8d98e2901d520bcf4bceb9075b3bd4de8f01 = $component; } ?>
<?php $component = App\View\Components\Productdetail::resolve(['product' => $tab,'title' => 'Tablets','brand' => $brand,'wish' => $wish,'count' => $count] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('productdetail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Productdetail::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c2e8d98e2901d520bcf4bceb9075b3bd4de8f01)): ?>
<?php $component = $__componentOriginal6c2e8d98e2901d520bcf4bceb9075b3bd4de8f01; ?>
<?php unset($__componentOriginal6c2e8d98e2901d520bcf4bceb9075b3bd4de8f01); ?>
<?php endif; ?>
<?php echo $__env->make('bannerbottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\practice\e-commerce\resources\views/tablet.blade.php ENDPATH**/ ?>