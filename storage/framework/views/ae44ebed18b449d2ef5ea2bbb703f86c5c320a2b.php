<div id="side-bar">
    <div class="side-bar">
        <?php $__currentLoopData = $categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="title-sider-bar">
            <?php echo e($categoryItem->name); ?>

        </div>
        <div class="list-category">
            
            <?php echo $__env->make('frontend.components.category',[
                'data'=>$categoryItem->childs()->get(),
                'type'=>"category_products",
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="side-bar">
        <?php $__currentLoopData = $categoryPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="title-sider-bar">
            <?php echo e($categoryItem->name); ?>

        </div>
        <div class="list-category">
            <?php echo $__env->make('frontend.components.category',[
                'data'=>$categoryItem->childs,
                'type'=>"category_posts",
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/frontend/components/sidebar.blade.php ENDPATH**/ ?>