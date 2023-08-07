<div class="ss06_product">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="title_home_in">
                    <h2><i class="fas fa-eye"></i> Sản phẩm vừa xem</h2>
                </div>
            </div>
            <div class="col-sm-12 col-12">
                <?php if( isset($products) && $products->count()>0 ): ?>
                <div class="list-product">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $tran=$product->translationsLanguage()->first();
                    // $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                    ?>
                    <div class="col-product-item">
                        <div class="product-item">
                            <div class="box">
                                <div class="image">
                                    <a href="#">
                                        <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($tran->name); ?>">
                                        <?php if($product->old_price && $product->price): ?>
                                        <span class="sale"> <?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                        <?php endif; ?>
                                        <?php if($product->baohanh): ?>
                                        <div class="km">
                                            <?php echo e($product->baohanh); ?>

                                        </div>
                                        <?php endif; ?>
                                    </a>

                                </div>
                                <div class="content">
                                    <h3><a href="#"><?php echo e($tran->name); ?></a></h3>
                                    <div class="box-price">
                                        <?php if($product->price): ?>
                                        <span class="new-price"><?php echo e(number_format($product->price)); ?>đ</span>

                                        <?php else: ?>
                                        <span class="new-price">Liên hệ</span>
                                        <?php endif; ?>
                                        <?php if($product->old_price>0): ?>
                                        <span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                    <button class="buy-now addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">Chọn mua</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('.list-product').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1500,
        pauseOnHover: true,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,

                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
</script><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/components/load-view-product.blade.php ENDPATH**/ ?>