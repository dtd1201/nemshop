

<?php
    $i++;
?>
<?php if($limit>=$i): ?>
<li class="">
    <a href="<?php echo e($childs['slug_full']); ?>"><span><?php echo e($childs['name']); ?></span>
        <?php if(isset($childs['childs'])): ?>
            <?php if(count($childs['childs'])>0&&$limit>=$i+1): ?>
            <?php echo $icon_r??""; ?>

            <?php endif; ?>
        <?php endif; ?>
    </a>
    <?php if(isset($childs['childs'])): ?>
        <?php if(count($childs['childs'])&&$limit>=$i+1): ?>
            <ul class="nav-sub-c<?php echo e($i); ?>">
                <?php $__currentLoopData = $childs['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('frontend.components.menu-child', ['childs' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</li>
<?php endif; ?>


<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/components/menu-child.blade.php ENDPATH**/ ?>