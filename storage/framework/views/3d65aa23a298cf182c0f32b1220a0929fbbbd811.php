
  <ul class="menu-side-bar">


    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
    if(isset($categoryActive)){
        $active =collect($categoryActive);
    }else{
        $active=collect();
    }

    
        // $listIdChildren = $modelCategory->getALlCategoryChildrenAndSelf($value->id);
        // $listItem=$modelCategory->select(['id'])->whereIn('id',$listIdChildren)->get();

        // $listItemSlugFull = $listItem->map(function ($item, $key) {
        //     return $item->slug_full;
        // });
    //   dd($listItemSlugFull->contains($urlActive));
    ?>
        
            <li class="nav_item <?php if($loop->first): ?> active <?php endif; ?>">
            <a href="<?php echo e(makeLink($type,$value->id,$value->slug)); ?>"><span><?php echo e($value->name); ?> (<?php echo e($value->count_product); ?>)</span>
                <?php if($value->childs->count()): ?>
                <i class="fa fa-angle-right pt_icon_right"></i>
                <?php endif; ?>
            </a>

            <?php if($value->childs->count()): ?>
                <ul class="menu-side-bar-leve-2" style="display: block">
                    
                    <?php $__currentLoopData = $value->setAppends(['count_product'])->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.components.category-product-child', ['childs' => $childValue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>





<?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/frontend/components/category-product.blade.php ENDPATH**/ ?>