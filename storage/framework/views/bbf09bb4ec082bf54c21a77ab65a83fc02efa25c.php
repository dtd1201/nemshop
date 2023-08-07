
<li class="">
    <a href="<?php echo e(makeLink($type,$childs->id,$childs->slug)); ?>"><span><?php echo e($childs->name); ?></span>
        <?php if($childs->childs->count()): ?>
        <i class="fa fa-angle-right pt_icon_right"></i>
        <?php endif; ?>
    </a>

    <?php if($childs->childs->count()): ?>
        <ul class="">
            <?php $__currentLoopData = $childs->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('frontend.components.category-child', ['childs' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>

<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/components/category-child.blade.php ENDPATH**/ ?>