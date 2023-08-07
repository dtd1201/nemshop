
<li class="">
    <a href="<?php echo e(makeLink($type,$childs->id,$childs->slug)); ?>"><span><?php echo e($childs->name); ?> (<?php echo e($childs->count_product); ?>)</span>
        <?php if($childs->childs->count()): ?>
        <i class="fa fa-angle-right pt_icon_right"></i>
        <?php endif; ?>
    </a>

    <?php if($childs->childs->count()): ?>
        <ul class="">
            <?php $__currentLoopData = $childs->setAppends(['count_product'])->childs()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('frontend.components.category-child', ['childs' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>

<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/components/category-product-child.blade.php ENDPATH**/ ?>