

<?php $__currentLoopData = $listStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($status['status']==$dataStatus->status): ?>
        <span data-status="<?php echo e($dataStatus->status); ?>" class="badge badge-<?php if($dataStatus->status<=0): ?>danger <?php else: ?><?php echo e($dataStatus->status); ?><?php endif; ?>">
            <?php echo e($status['name']); ?>

        </span>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/admin/components/status-2.blade.php ENDPATH**/ ?>