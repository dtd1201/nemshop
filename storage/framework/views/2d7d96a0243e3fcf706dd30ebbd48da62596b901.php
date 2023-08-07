<div class="text-left wrap-breadcrumbs">
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <ul>
                        <li class="breadcrumbs-item">
                            <a href="<?php echo e(makeLink('home')); ?>"><?php echo e(__('home.home')); ?></a>
                        </li>
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->last): ?>
                        <li class="breadcrumbs-item active"><a href="<?php echo e(makeLink($type,$item['id']??'',$item['slug']??'')); ?>" class="currentcat"><?php echo e($item['name']); ?></a></li>
                        <?php else: ?>
                        <li class="breadcrumbs-item"><a href="<?php echo e(makeLink($type,$item['id']??'',$item['slug'])??''); ?>" class="currentcat"><?php echo e($item['name']); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/components/breadcrumbs.blade.php ENDPATH**/ ?>