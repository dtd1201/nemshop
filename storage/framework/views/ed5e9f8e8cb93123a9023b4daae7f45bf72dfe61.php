<?php
   $i=1;
   if (!isset($limit)) {
     $limit=99;
   }

?>


  
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li class="nav-item nav-megamenu <?php if($loop->first&&$active): ?> active <?php endif; ?>">
        <a class="nav-link" href="<?php echo e($mega['slug_full']); ?>"><span><?php echo $mega['name']; ?></span>
            <?php if(isset($mega['childs'])): ?>
                <?php if(count($mega['childs'])): ?>
                
                <?php echo $icon_d; ?>

                <?php endif; ?>
            <?php endif; ?>
        </a>
        <?php if(isset($mega['childs'])): ?>
            <?php if(count($mega['childs'])): ?>

            <div class="megamenu-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-megamenu">
                                <?php $__currentLoopData = $mega['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="megamenu-item">
                                    <div class="megamenu-title">
                                        <a href="<?php echo e($item['slug_full']); ?>"> <?php echo e($item['name']); ?></a>
                                    </div>
                                    <?php if(isset($item['childs'])): ?>
                                        <?php if(count($item['childs'])): ?>
                                            <ul class="list-megamenu-sub">
                                                <?php $__currentLoopData = $item['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="megamenu-item-sub">
                                                    <a href="<?php echo e($item2['slug_full']); ?>"><?php echo e($item2['name']); ?></a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>









<?php /**PATH /var/www/vhosts/demo15.dkcauto.net/httpdocs/resources/views/frontend/components/menu-2.blade.php ENDPATH**/ ?>