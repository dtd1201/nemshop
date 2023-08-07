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


    <div class="side-bar">
        <div class="title-sider-bar">
            <?php echo e(__('home.tin_noi_bat')); ?>

        </div>
        <?php if( isset($postsHot) && $postsHot->count()>0 ): ?>
        <div class="list-trending">
            <ul>
                <?php $__currentLoopData = $postsHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $postTrans = $item->translationsLanguage()->first();
                ?>
                    <li>
                        <div class="box">
                            <div class="icon">
                                <a href="<?php echo e($item->slug_full); ?>"><img src="<?php echo e(asset($item->avatar_path)); ?>" alt="<?php echo e($postTrans->name); ?>"></a>
                            </div>
                            <div class="content">
                                <h3 class="name"><a href="<?php echo e($item->slug_full); ?>"><?php echo e($postTrans->name); ?></a></h3>
                                <div class="desc"><?php echo e($postTrans->description); ?></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>

    <?php if( isset($support_online) && $support_online->count()>0 ): ?>
        <?php
            $transupport = $support_online->translationsLanguage()->first();
        ?>
        <div class="side-bar">
            <div class="title-sider-bar">
                <?php echo e($transupport->name); ?>

            </div>
            <div class="support1">
                <img src="<?php echo e(asset($support_online->image_path)); ?>">
                <?php $__currentLoopData = $support_online->childs()->where('active',1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $supportItem = $item->translationsLanguage()->first();
                    ?>
                    <div class="support_in">
                        <h2><?php echo e($supportItem->name); ?></h2>
                        <div class="support_in_in">
                            <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($supportItem->name); ?>">
                            <?php echo e($supportItem->slug); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(isset($sidebar['dichvu'])&&$sidebar['dichvu']): ?>
        <?php $__currentLoopData = $sidebar['dichvu']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $serviceItem = $item->translationsLanguage()->first();
            ?>
            <div class="quang_cao_home">
                <a href="<?php echo e($serviceItem->slug); ?>">
                    <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($serviceItem->name); ?>">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php endif; ?>


    
    

    

</div>


<?php /**PATH /var/www/vhosts/cus01.largevendor.com/httpdocs/resources/views/frontend/components/sidebar.blade.php ENDPATH**/ ?>