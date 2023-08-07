<?php
if(!isset($urlActive)){
    $urlActive=url()->current();
}



?>
<div id="side-bar">
    <?php if(isset($product)): ?>
        <?php if($product): ?>
            <div class="side-bar">
                <?php $__currentLoopData = $categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="title-sider-bar">
                    <?php echo e($categoryItem->name); ?> (<?php echo e($categoryItem->count_product); ?>)
                </div>
                <div class="list-category">
                    <?php echo $__env->make('frontend.components.category-product',[
                        'data'=>$categoryItem->setAppends(['count_product'])->childs()->orderby('order')->orderByDesc('created_at')->get(),
                        'type'=>"category_products",
                        //  $modelCategory=new \App\Models\CategoryProduct(),
                        'categoryActive'=>$categoryProductActive,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($post)): ?>
        <?php if($post): ?>
            <div class="side-bar">
                <?php $__currentLoopData = $categoryPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="title-sider-bar">
                    <?php echo e($categoryItem->name); ?>

                </div>
                <div class="list-category">
                    <?php echo $__env->make('frontend.components.category',[
                        'data'=>$categoryItem->childs()->orderby('order')->orderByDesc('created_at')->get(),
                        'type'=>"category_posts",
                         $modelCategory=new \App\Models\CategoryPost(),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($fill)): ?>
        <?php if($fill): ?>
        <div class="side-bar">
            <div class="title-sider-bar">
                Lọc sản phẩm
            </div>
            <div class="list-fill">
                

                <?php if(isset($sidebar['attribute'])): ?>
                    <?php $__currentLoopData = $sidebar['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="box-list-fill">
                        <div class="title-s">
                        <?php echo e($attributeItem->name); ?> <i class="fas fa-minus btn-sb-toogle"></i>
                        </div>
                        <ul class="fill-list-item" style="display: block;">
                            <?php $__currentLoopData = $attributeItem->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="attribute_id[<?php echo e($attributeItem->id); ?>][]" form="formfill" class="form-check-input field-form" value="<?php echo e($item->id); ?>"> <?php echo e($item->name); ?>

                                    </label>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

                
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    

</div>


<?php /**PATH /var/www/vhosts/demo.dkcauto.net/httpdocs/resources/views/frontend/components/sidebar.blade.php ENDPATH**/ ?>