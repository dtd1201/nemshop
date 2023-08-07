
  <ul class="menu-side-bar">


    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <?php

            $listIdChildren = $modelCategory->getALlCategoryChildrenAndSelf($value->id);
            $listItem=$modelCategory->select(['id'])->whereIn('id',$listIdChildren)->get();

            $listItemSlugFull = $listItem->map(function ($item, $key) {
                return $item->slug_full;
            });
         //   dd($listItemSlugFull->contains($urlActive));
        ?>
        <li class="nav_item <?php if($listItemSlugFull->contains($urlActive)): ?> active <?php endif; ?>">
            <a href="<?php echo e(makeLink($type,$value->id,$value->slug)); ?>"><span><?php echo e($value->name); ?> (<?php echo e($value->count_product); ?>)</span>
                <?php if($value->childs->count()): ?>
                <i class="fa fa-angle-right pt_icon_right"></i>
                <?php endif; ?>
            </a>

            <?php if($value->childs->count()): ?>
                <ul class="menu-side-bar-leve-2" <?php if($listItemSlugFull->contains($urlActive)): ?> style="display:block" <?php endif; ?>>
                    <?php $__currentLoopData = $value->setAppends(['count_product'])->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.components.category-product-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>





<?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/components/category-product.blade.php ENDPATH**/ ?>