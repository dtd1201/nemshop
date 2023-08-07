 <div class="breadcrumbs clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <ol class="breadcrumb mb-0" style="font-size: 12px;">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(makeLink("home")); ?>" >Trang chủ</a>
                        </li>
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->last): ?>
                        <li class="breadcrumb-item active "><a href="<?php echo e(makeLink($type,$item['id']??'',$item['slug']??'')); ?>"><?php echo e($item['name']); ?></a></li>
                        <?php else: ?>
                        <li class="breadcrumb-item"><a href="<?php echo e(makeLink($type,$item['id']??'',$item['slug'])??''); ?>"><?php echo e($item['name']); ?></a></li>
                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/components/breadcrumbs.blade.php ENDPATH**/ ?>