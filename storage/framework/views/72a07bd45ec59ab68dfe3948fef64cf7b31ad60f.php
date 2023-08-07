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
                        'categoryActive'=>$categoryProductActive ?? null,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



   

</div>


<?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/frontend/components/sidebar.blade.php ENDPATH**/ ?>