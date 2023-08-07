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
                <div class="list-product list_feedback1">
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $tran=$product->translationsLanguage()->first();
                            $link=$product->slug_full;
                        ?>
                        <div class="col-product-item box_sp_home col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="product-item">
                                <div class="box">
                                    <div class="image">
                                        <a href="<?php echo e($link); ?>">
                                            <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($tran->name); ?>">
                                            <?php if($product->old_price && $product->price): ?>
                                                <span class="sale">  <?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                            <?php endif; ?>
                                            <?php if($product->baohanh): ?>
                                                <div class="km">
                                                    <?php echo e($product->baohanh); ?>

                                                </div>
                                            <?php endif; ?>
                                        </a>
                                        <div class="cart">
                                            <?php if(isset($data->price) && $data->price > 0): ?>  
                                            <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                <img class="lazy" src="<?php echo e(asset('images/icon_add_cart.png')); ?>" width="30" height="35"> Thêm vào giỏ
                                            </span>
                                            <?php else: ?>
                                                <span class="addCart" data-toggle="modal" data-target="#modal-add-cart_<?php echo e($product->id); ?>">
                                                    <img class="lazy" src="<?php echo e(asset('images/icon_add_cart.png')); ?>" width="30" height="35"> Thêm vào giỏ
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="modal fade modal-First" id="modal-add-cart_<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content"  image="">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                        <div class="image-modal">
                                                            <div class="info_product_modal">
                                                                <div class="title">
                                                                    <?php echo e($product->name); ?>

                                                                </div>
                                                                <div class="image">
                                                                    <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($product->name); ?>">
                                                                </div>
                                                                <div class="list-attr">
                                                                    <div class="attr-item">
                                                                        <div class="price">
                                                                            <?php if($product->price): ?>
                                                                                <?php if($product->price_after_sale): ?>
                                                                                    <span id="priceChange">Giá: <?php echo e(number_format($product->price_after_sale)); ?> <span class="donvi">đ</span></span>
                                                                                <?php endif; ?>
                                                                                <?php if($product->sale>0): ?>
                                                                                    <span class="title_giacu">Giá cũ: </span>
                                                                                    <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                        
                                                                                    <div class="tiet_kiem">
                                                                                        <div class="g2">(Tiết kiệm: <b><?php echo e(number_format(
                                                                                            ($product->price - $product->price_after_sale))); ?></b>)</div>
                                                                                        <div class="tk">
                                                                                            <b>-<?php echo e($product->sale); ?>%</b>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                            Liên hệ
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <p>Giá bán lẻ đề xuất chưa bao gồm phí trước bạ và phí đăng ký (bao gồm VAT)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="newsletter-content">
                                                                <h2>YÊU CẦU TƯ VẤN SẢN PHẨM</h2>
                                                                <form action="<?php echo e(route('contact.storeAjax2')); ?>"  data-url="<?php echo e(route('contact.storeAjax2')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="<?php echo e($product->name); ?>" required>
                                                                    <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                                                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                                                                    <input type="text" class="form-control" name="email" placeholder="Email của bạn">
                                                                    <button>Đăng ký ngay</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-item-star">
                                            <span class="pro-item-start-rating">
                                                <?php
                                                    $avgRating = 0;
                                                    $sumRating = array_sum(array_column($product->productStars->toArray(), 'star'));
                                                    $countRating = count($product->productStars);
                                                    if ($countRating != 0) {
                                                        $avgRating = $sumRating / $countRating;
                                                    }
                                                ?>
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php if($i <= $avgRating): ?>
                                                        <i class="star-bold far fa-star"></i>
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
                                        <div class="box-price">
                                            <?php if($product->price): ?>
                                            <span class="new-price"><?php echo e(number_format($product->price)); ?>đ</span>
                                                <?php if($product->size): ?>
                                                <?php echo e('/ '.$product->size); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                            <span class="new-price">Liên hệ</span>
                                            <?php endif; ?>
                                            <?php if($product->old_price>0): ?>
                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div><?php /**PATH /var/www/vhosts/kingphar.vn/httpdocs/resources/views/frontend/components/load-view-product.blade.php ENDPATH**/ ?>