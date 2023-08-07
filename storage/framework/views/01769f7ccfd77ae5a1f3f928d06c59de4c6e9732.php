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
                        $modelCategory=new \App\Models\CategoryProduct(),
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
                <?php if(isset($sidebar['supplier'])): ?>
                <div class="list-supplier">
                    <div class="title-s">
                        Thương hiệu
                    </div>
                    <ul>
                        <?php $__currentLoopData = $sidebar['supplier']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplierItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="supplier_id[]" form="formfill" class="form-check-input field-form" value="<?php echo e($supplierItem->id); ?>"
                                    <?php if(request()->has('supplier_id')&&collect(request()->input('supplier_id'))->contains($supplierItem->id)): ?>
                                    selected
                                    <?php endif; ?>>
                                    <img src="<?php echo e($supplierItem->logo_path); ?>" alt="<?php echo e($supplierItem->name); ?>">
                                </label>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if(isset($sidebar['attribute'])): ?>
                <?php $__currentLoopData = $sidebar['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-supplier">
                    <div class="title-s">
                    <?php echo e($attributeItem->name); ?>

                    </div>
                    <ul>
                        <?php $__currentLoopData = $attributeItem->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="attribute_id[<?php echo e($attributeItem->id); ?>][]" form="formfill" class="form-check-input field-form" value="<?php echo e($item->id); ?>"> <?php echo e($item->name); ?>

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
    <?php if(isset($sidebar['product'])&&$sidebar['product']): ?>
    <div class="side-bar">
        <div class="title-sider-bar">
            Sản phẩm được quan tâm
        </div>
        <div class="list-trending">
            <ul>
                <?php $__currentLoopData = $sidebar['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="box">
                        <div class="icon">
                            <a href="<?php echo e($item->slug_full); ?>"><img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                        <div class="content">
                            <h3 class="name"><a href="<?php echo e($item->slug_full); ?>">
                                <?php echo e($item->name); ?> </a>
                            </h3>
                            <div class="price">
                                <?php if($item->price_after_sale): ?>
                                <?php echo e(number_format($item->price_after_sale)); ?> đ
                                <?php else: ?>
                                Liên hệ
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>



    <?php if(isset($sidebar['uudiem'])&&$sidebar['uudiem']): ?>
    <div class="side-bar">

        <div class="list-uudiem">
            <ul>
                <?php $__currentLoopData = $sidebar['uudiem']->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="uudiem-item">
                    <div class="icon">
                        <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                    </div>
                    <div class="content">
                        <h3><?php echo e($item->name); ?></h3>
                        <div class="desc">
                            <?php echo e($item->value); ?>

                        </div>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>
    <?php if(isset($sidebar['banner'])&&$sidebar['banner']): ?>
    <div class="side-bar-banner">
        <a href="<?php echo e($sidebar['banner']->slug); ?>"><img src="<?php echo e($sidebar['banner']->image_path); ?>" alt="<?php echo e($sidebar['banner']->name); ?>"></a>
    </div>
    <?php endif; ?>

</div>


<?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/components/sidebar.blade.php ENDPATH**/ ?>