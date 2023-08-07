<?php
     $listIdChildren = $modelCategory->getALlCategoryChildrenAndSelf($childs->id);
        $listItem=$modelCategory->select(['id'])->whereIn('id',$listIdChildren)->get();
        $listItemSlugFull = $listItem->map(function ($item, $key) {
            return $item->slug_full;
    });
?>
<li class="<?php if($listItemSlugFull->contains($urlActive)): ?> active <?php endif; ?>">
    <a href="<?php echo e(makeLink($type,$childs->id,$childs->slug)); ?>"><span><?php echo e($childs->name); ?></span>
        <?php if($childs->childs->count()): ?>
        <i class="fa fa-angle-right pt_icon_right"></i>
        <?php endif; ?>
    </a>

    <?php if($childs->childs->count()): ?>
        <ul class="" <?php if($listItemSlugFull->contains($urlActive)): ?> style="display:block" <?php endif; ?>>
            <?php $__currentLoopData = $childs->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('frontend.components.category-child', ['childs' => $childValue2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>

<?php /**PATH /var/www/vhosts/cus05.largevendor.com/httpdocs/resources/views/frontend/components/category-child.blade.php ENDPATH**/ ?>