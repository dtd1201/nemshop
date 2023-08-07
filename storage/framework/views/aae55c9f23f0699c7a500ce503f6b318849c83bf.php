<?php
if(!isset($urlActive)){
    $urlActive=url()->current();
}

?>
<div id="side-bar">
	<div class="title-sider-bar">
        Tư vấn đặt hàng
    </div>
	<div class="product_sharing">
        <ul class="fastcontact" style="text-align: center;">
            <li>
                <?php if(isset($header['hotline_top22'])): ?>
                    <i class="mli-phone"></i> <b><?php echo e($header['hotline_top22']->name); ?></b> <br>
                    <span style="color: #f00; font-weight: bold;">
                    <a style="color: #f00;" href="tel:<?php echo $header['hotline_top22']->value; ?>"><?php echo $header['hotline_top22']->slug; ?></a> 
                <?php endif; ?>
            </li>
        </ul>
    </div>
	<?php if(isset($featuredelly)): ?>
        <div class="pt_list_contact">
            <ul>
				
                <?php $__currentLoopData = $featuredelly->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="pt_icon">
                             <img src="<?php echo e($value->image_path != null ?  asset($value->image_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($value->name); ?>">
                        </div>
                        <div class="pt_infor_contact">
                            <div class="pt_name"><?php echo e($value->name); ?></div>
                            <div class="pt_contact">
                                <?php echo e($value->value); ?>

                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</div>


    
    

    <?php if(isset($sidebar['product'])&&$sidebar['product']): ?>
    <div class="side-bar">
        <div class="title-sider-bar">
            Sản phẩm bán chạy
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

    <?php if(isset($sidebar['productViewHot'])&&$sidebar['productViewHot']): ?>
        <div class="side-bar">
            <div class="title-sider-bar">
                Sản phẩm xem nhiều
            </div>
            <div class="list-trending">
                <ul>
                    <?php $__currentLoopData = $sidebar['productViewHot']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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


<?php /**PATH /var/www/vhosts/cus05.largevendor.com/httpdocs/resources/views/frontend/components/sidebar.blade.php ENDPATH**/ ?>