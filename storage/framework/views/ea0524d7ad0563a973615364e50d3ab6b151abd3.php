<?php
   $i=1;
   if (!isset($limit)) {
     $limit=99;
   }

?>


    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


    <li class="nav-item <?php echo e(Request::url() == url($value['slug_full']) ? 'active_menu' : ''); ?>  <?php if($loop->first&&$active): ?> active <?php endif; ?>">
        <a href="<?php echo e($value['slug_full']); ?>"><span> <?php echo $value['name']; ?></span>
            <?php if(isset($value['childs'])): ?>
            <?php if(count($value['childs'])>0&&$limit>=$i+1): ?>
            <?php echo $icon_d??""; ?>

            <?php endif; ?>
            <?php endif; ?>
        </a>
        <?php if(isset($value['childs'])): ?>
            <?php if(count($value['childs'])>0&&$limit>=$i+1): ?>
                <ul class="nav-sub">
                    <?php $__currentLoopData = $value['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.components.menu-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
    </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






<?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/components/menu.blade.php ENDPATH**/ ?>