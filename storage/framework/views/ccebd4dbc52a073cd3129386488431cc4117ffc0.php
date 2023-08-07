<div id="side-bar">
    <div class="side-bar">
        <?php $__currentLoopData = $categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="title-sider-bar">
            <?php echo e($categoryItem->name); ?> (<?php echo e($categoryItem->count_product); ?>)
        </div>
        <div class="list-category">
            
            <?php echo $__env->make('frontend.components.category-product',[
                'data'=>$categoryItem->setAppends(['count_product'])->childs()->get(),
                'type'=>"category_products",
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="side-bar">
        <?php $__currentLoopData = $categoryPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="title-sider-bar">
            <?php echo e($categoryItem->name); ?>

        </div>
        <div class="list-category">
            <?php echo $__env->make('frontend.components.category',[
                'data'=>$categoryItem->childs,
                'type'=>"category_posts",
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="side-bar">

        <div class="title-sider-bar">
            Lọc sản phẩm
        </div>
        <div class="list-supplier">
            <ul>
                <?php $__currentLoopData = $sidebar['supplier']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplierItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="supplier_id" class="form-check-input" value="<?php echo e($supplierItem->id); ?>"> <img src="<?php echo e($supplierItem->logo_path); ?>" alt="<?php echo e($supplierItem->name); ?>">
                        </label>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

    </div>
</div>
<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/components/sidebar.blade.php ENDPATH**/ ?>