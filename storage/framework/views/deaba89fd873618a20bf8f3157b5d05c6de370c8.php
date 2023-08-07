<?php $__env->startSection('title', $header['seo_home']->name); ?>
<?php $__env->startSection('image', asset($header['seo_home']->image_path)); ?>
<?php $__env->startSection('keywords', $header['seo_home']->slug); ?>
<?php $__env->startSection('description', $header['seo_home']->value); ?>
<?php $__env->startSection('abstract', $header['seo_home']->slug); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    @media(max-width: 991px) {
        .list-bar {
            top: 50%;
        }
    }
</style>
<div class="lc__mask lc__mask_search_suggest"></div>
<div class="content-wrapper">
    <div class="main">
        <div class="slider-top">
            <div class="wrap-slide-home">
                <div class="slide">
                    <?php if(isset($slider)): ?>
                    <div class="box-slide faded cate-arrows-1">
                        <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slide">
                            <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="container">
                    <?php if(isset($slide_in_in)&&$slide_in_in): ?>
                    <div class="box-right-tr">
                        <?php $__currentLoopData = $slide_in_in->childs()->where('active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-top-tr">
                            <a href="<?php echo e($item->slug); ?>">
                                <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>">
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <div class="uick-access">
                                <a class="item-suggest">

                                    <div class="img">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/48x48/https://cms-prod.s3-sgn09.fptcloud.com/mua_thuoc_theo_don_44c4a5e961.png" alt="">
                                    </div>
                                    <h5>
                                        Cần mua thuốc
                                    </h5>

                                </a>
                                <a class="item-suggest">

                                    <div class="img">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/48x48/https://cms-prod.s3-sgn09.fptcloud.com/mua_thuoc_theo_don_44c4a5e961.png" alt="">
                                    </div>
                                    <h5>
                                        Cần mua thuốc
                                    </h5>

                                </a>
                                <a class="item-suggest">

                                    <div class="img">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/48x48/https://cms-prod.s3-sgn09.fptcloud.com/mua_thuoc_theo_don_44c4a5e961.png" alt="">
                                    </div>
                                    <h5>
                                        Cần mua thuốc
                                    </h5>

                                </a>
                            </div> -->
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="wrap-slide-home1">
            <div class="slide">
                <?php if(isset($slide_in)&&$slide_in): ?>
                <div class="box-slide faded cate-arrows-1">
                    <?php $__currentLoopData = $slide_in->childs()->where('active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-slide">
                        <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>"></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="box_flash_sale">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="col-inner">
                            <div class="section-title-container">
                                <img src="https://nhathuocphuongchinh.com/static/title-flash-sale.png" alt="">
                            </div>
                            <div class="PromotionPeriod">
                                <div class="text__Promotion"> Kết thúc trong</div>
                                <ul class="list__time">
                                    <li class="item__time dp-none">
                                        <span id="day">00</span>
                                    </li>
                                    <li class="item__time">
                                        <span id="hour">00</span>
                                    </li>
                                    <li class="item__time">
                                        <span id="minute">19</span>
                                    </li>
                                    <li class="item__time">
                                        <span id="seconds">19</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 pd-0">
                        <?php if( isset($productsBest) && $productsBest->count()>0 ): ?>
                        <div class="list_feedback1 autoplay6-tintuc category-slide-1">
                            <?php $__currentLoopData = $productsBest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-product-item">
                                <div class="product-item">
                                    <div class="box">
                                        <div class="image">
                                            <a href="<?php echo e($product->slug); ?>">
                                                <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($product->name); ?>">
                                                <?php if($product->old_price && $product->price): ?>
                                                <span class="sale"><?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                <?php endif; ?>
                                                <?php if($product->baohanh): ?>
                                                <div class="km">
                                                    <?php echo e($product->baohanh); ?>

                                                </div>
                                                <?php endif; ?>
                                            </a>
                                            <?php if($product->option_status == 0): ?>
                                                
                                            <?php elseif($product->option_status == 1): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Bán chạy</p>
                                            </span>
                                            <?php elseif($product->option_status == 2): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Freeship</p>
                                            </span>
                                            <?php elseif($product->option_status == 3): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Yêu thích</p>
                                            </span>
                                            <?php elseif($product->option_status == 4): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Giảm sốc</p>
                                            </span>
                                            <?php endif; ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u"><?php echo e($product->size); ?></p>
                                            </span>
                                            
                                        
                                    </div>
                                    <div class="content">
                                        <h3><a href="<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a></h3>
                                        <?php if($product->attributes->count()): ?>
                                        <?php $__currentLoopData = $product->attributes()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->parent->order == 1 or $item->parent->order == 2): ?>
                                        <div class="ProductInfo">
                                            <span class="ProductInfo__title__origin"><?php echo e($item->parent->name); ?>:</span>
                                            <span class="ProductInfo__origin__details"><?php echo e($item->name); ?></span>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
                                        <div class="pro-item-start-rating">
                                            
                                            <?php
                                            $avgRating = 0;
                                            $sumRating = array_sum(array_column($product->productStars->where('hot', 1)->toArray(), 'star'));
                                            $countRating = count($product->productStars->where('hot', 1));
                                            if ($countRating != 0) {
                                            $avgRating = $sumRating / $countRating;
                                            }
                                            ?>
                                            <?php if($countRating>0): ?>
                                                <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i <= $avgRating): ?> <span class="StarRating__span"> 
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M4.6582 0.438543C4.79802 0.155251 5.20198 0.155251 5.3418 0.438544L6.5916 2.97093C6.64712 3.08342 6.75444 3.16139 6.87859 3.17943L9.67324 3.58552C9.98587 3.63095 10.1107 4.01514 9.88448 4.23566L7.86225 6.20684C7.77242 6.29441 7.73143 6.42057 7.75263 6.54421L8.23002 9.32757C8.28342 9.63894 7.9566 9.87638 7.67698 9.72937L5.17737 8.41525C5.06633 8.35688 4.93367 8.35688 4.82263 8.41525L2.32302 9.72937C2.0434 9.87638 1.71658 9.63894 1.76998 9.32757L2.24737 6.54421C2.26857 6.42057 2.22758 6.29441 2.13775 6.20684L0.115521 4.23566C-0.110701 4.01514 0.0141305 3.63095 0.326763 3.58552L3.12141 3.17943C3.24556 3.16139 3.35288 3.08342 3.4084 2.97093L4.6582 0.438543Z" fill="#FFC53D"></path></svg>
                                                    </span>
                                                    <?php else: ?>
                                                        <span class="StarRating__span"> 
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M0.377276 3.96712L0.115521 4.23566L0.377276 3.96712C0.376131 3.96601 0.375417 3.96517 0.375004 3.96464C0.375017 3.96391 0.375138 3.9626 0.375718 3.96081C0.376297 3.95903 0.376974 3.95789 0.377392 3.95729C0.378038 3.95711 0.379106 3.95685 0.380687 3.95662L3.17533 3.55054C3.42162 3.51475 3.63453 3.36006 3.74467 3.13689L4.99448 0.604506C4.99519 0.603073 4.99576 0.602136 4.99614 0.601579C4.99683 0.601366 4.99812 0.601074 5 0.601074C5.00187 0.601074 5.00317 0.601366 5.00386 0.601579C5.00424 0.602136 5.00481 0.603073 5.00552 0.604506L6.25533 3.13689C6.36547 3.36006 6.57838 3.51475 6.82466 3.55054L9.61931 3.95662C9.62089 3.95685 9.62196 3.95711 9.62261 3.95729C9.62302 3.95789 9.6237 3.95903 9.62428 3.96081C9.62486 3.9626 9.62498 3.96392 9.625 3.96464C9.62458 3.96518 9.62387 3.96601 9.62272 3.96712L7.6005 5.93831C7.42228 6.11202 7.34096 6.36231 7.38303 6.60761L7.86041 9.39096C7.86068 9.39254 7.86077 9.39363 7.86079 9.3943C7.86035 9.39488 7.85948 9.39588 7.85796 9.39698C7.85645 9.39808 7.85523 9.39861 7.85454 9.39884C7.85391 9.39862 7.8529 9.39819 7.85148 9.39745L5.35187 8.08333C5.13158 7.96752 4.86842 7.96752 4.64813 8.08333L4.82263 8.41525L4.64813 8.08333L2.14852 9.39745C2.14711 9.39819 2.14609 9.39862 2.14546 9.39884C2.14477 9.39861 2.14355 9.39808 2.14204 9.39698C2.14052 9.39588 2.13965 9.39488 2.13921 9.3943C2.13923 9.39363 2.13932 9.39253 2.13959 9.39096L2.61697 6.6076C2.65904 6.36231 2.57772 6.11202 2.3995 5.93831L0.377276 3.96712Z" stroke="#FFC53D" stroke-width="0.75"></path></svg>
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <label for=""> (<?php echo e($countRating); ?> lượt đánh giá)</label>
                                               
                                            <?php endif; ?>
                                        </div>
                                        <div class="Wapper__Phan-Tram">
                                            <span class="PhanTramCon"></span>
                                            <span class="text__PhanTram">còn 0 ngày 06:12:03 (27%) </span>
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

    

    <div class="section-hau-covid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="col-inner">
                        <div class="section-title-container">
                            <img src="https://nhathuocphuongchinh.com/assets/images/sales-up-lg.png" alt="">
                            <h2 class="section-title section-title-center">
                                Sản phẩm bán chạy
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <?php if( isset($productHot) && $productHot->count()>0 ): ?>
                    <div class="list_feedback1  category-slide-1">
                        <div class="SellingProducts">
                            <?php $__currentLoopData = $productHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="SellingProducts__item">
                                <div class="box-product-item">
                                    <div class="product-item">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e($product->slug); ?>">
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($product->name); ?>">
                                                    <?php if($product->old_price && $product->price): ?>
                                                    <span class="sale"><?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                    <?php endif; ?>
                                                    <?php if($product->baohanh): ?>
                                                    <div class="km">
                                                        <?php echo e($product->baohanh); ?>

                                                    </div>
                                                    <?php endif; ?>
                                                </a>
                                                <?php if($product->option_status == 0): ?>
                                                
                                                <?php elseif($product->option_status == 1): ?>
                                                <span class="ant-tagt">
                                                    <p class="css-tm7i6u">Bán chạy</p>
                                                </span>
                                                <?php elseif($product->option_status == 2): ?>
                                                <span class="ant-tagt">
                                                    <p class="css-tm7i6u">Freeship</p>
                                                </span>
                                                <?php elseif($product->option_status == 3): ?>
                                                <span class="ant-tagt">
                                                    <p class="css-tm7i6u">Yêu thích</p>
                                                </span>
                                                <?php elseif($product->option_status == 4): ?>
                                                <span class="ant-tagt">
                                                    <p class="css-tm7i6u">Giảm sốc</p>
                                                </span>
                                                <?php endif; ?>
                                                <span class="ant-tagt">
                                                    <p class="css-tm7i6u"><?php echo e($product->size); ?></p>
                                                </span>
                                                
                                    
                                        </div>
                                        <div class="content">
                                            <h3><a href="<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a></h3>
                                            <?php if($product->attributes->count()): ?>
                                            <?php $__currentLoopData = $product->attributes()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->parent->order == 1 or $item->parent->order == 2): ?>
                                            <div class="ProductInfo">
                                                <span class="ProductInfo__title__origin"><?php echo e($item->parent->name); ?>:</span>
                                                <span class="ProductInfo__origin__details"><?php echo e($item->name); ?></span>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
                                            <div class="pro-item-start-rating">
                                            
                                                <?php
                                                $avgRating = 0;
                                                $sumRating = array_sum(array_column($product->productStars->where('hot', 1)->toArray(), 'star'));
                                                $countRating = count($product->productStars->where('hot', 1));
                                                if ($countRating != 0) {
                                                $avgRating = $sumRating / $countRating;
                                                }
                                                ?>
                                                <?php if($countRating>0): ?>
                                                    <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i <= $avgRating): ?> <span class="StarRating__span"> 
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M4.6582 0.438543C4.79802 0.155251 5.20198 0.155251 5.3418 0.438544L6.5916 2.97093C6.64712 3.08342 6.75444 3.16139 6.87859 3.17943L9.67324 3.58552C9.98587 3.63095 10.1107 4.01514 9.88448 4.23566L7.86225 6.20684C7.77242 6.29441 7.73143 6.42057 7.75263 6.54421L8.23002 9.32757C8.28342 9.63894 7.9566 9.87638 7.67698 9.72937L5.17737 8.41525C5.06633 8.35688 4.93367 8.35688 4.82263 8.41525L2.32302 9.72937C2.0434 9.87638 1.71658 9.63894 1.76998 9.32757L2.24737 6.54421C2.26857 6.42057 2.22758 6.29441 2.13775 6.20684L0.115521 4.23566C-0.110701 4.01514 0.0141305 3.63095 0.326763 3.58552L3.12141 3.17943C3.24556 3.16139 3.35288 3.08342 3.4084 2.97093L4.6582 0.438543Z" fill="#FFC53D"></path></svg>
                                                        </span>
                                                        <?php else: ?>
                                                            <span class="StarRating__span"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M0.377276 3.96712L0.115521 4.23566L0.377276 3.96712C0.376131 3.96601 0.375417 3.96517 0.375004 3.96464C0.375017 3.96391 0.375138 3.9626 0.375718 3.96081C0.376297 3.95903 0.376974 3.95789 0.377392 3.95729C0.378038 3.95711 0.379106 3.95685 0.380687 3.95662L3.17533 3.55054C3.42162 3.51475 3.63453 3.36006 3.74467 3.13689L4.99448 0.604506C4.99519 0.603073 4.99576 0.602136 4.99614 0.601579C4.99683 0.601366 4.99812 0.601074 5 0.601074C5.00187 0.601074 5.00317 0.601366 5.00386 0.601579C5.00424 0.602136 5.00481 0.603073 5.00552 0.604506L6.25533 3.13689C6.36547 3.36006 6.57838 3.51475 6.82466 3.55054L9.61931 3.95662C9.62089 3.95685 9.62196 3.95711 9.62261 3.95729C9.62302 3.95789 9.6237 3.95903 9.62428 3.96081C9.62486 3.9626 9.62498 3.96392 9.625 3.96464C9.62458 3.96518 9.62387 3.96601 9.62272 3.96712L7.6005 5.93831C7.42228 6.11202 7.34096 6.36231 7.38303 6.60761L7.86041 9.39096C7.86068 9.39254 7.86077 9.39363 7.86079 9.3943C7.86035 9.39488 7.85948 9.39588 7.85796 9.39698C7.85645 9.39808 7.85523 9.39861 7.85454 9.39884C7.85391 9.39862 7.8529 9.39819 7.85148 9.39745L5.35187 8.08333C5.13158 7.96752 4.86842 7.96752 4.64813 8.08333L4.82263 8.41525L4.64813 8.08333L2.14852 9.39745C2.14711 9.39819 2.14609 9.39862 2.14546 9.39884C2.14477 9.39861 2.14355 9.39808 2.14204 9.39698C2.14052 9.39588 2.13965 9.39488 2.13921 9.3943C2.13923 9.39363 2.13932 9.39253 2.13959 9.39096L2.61697 6.6076C2.65904 6.36231 2.57772 6.11202 2.3995 5.93831L0.377276 3.96712Z" stroke="#FFC53D" stroke-width="0.75"></path></svg>
                                                            </span>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <label for="">(<?php echo e($countRating); ?> lượt đánh giá)</label>
                                                <?php endif; ?>
                                            </div>
                                            <button class="buy-now addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">Chọn mua</button>
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
</div>
</div>
<div class="ss03_product">
    <?php
    $modelProduct = new App\Models\Product;
    $modelCategoryProduct = new App\Models\CategoryProduct;
    ?>
    <div class="container">
        <div class="row">
            <?php if(isset($listCate)&&$listCate->count()>0): ?>
            <?php $__currentLoopData = $listCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-12">
                <div class="col-inner">
                    <div class="section-title-container">
                        <h2 class="section-title1 section-title-center">
                            <a href="<?php echo e($item->slug_full); ?>"><?php echo e($item->name); ?></a>
                        </h2>
                    </div>
                    <div class="list-lik">
                        <?php if($item->childs()->count()>0): ?>
                        <ul>
                            <?php $__currentLoopData = $item->childs()->where('active',1)->orderBy('order')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($itemChild->slug_full); ?>"><?php echo e($itemChild->name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($item->slug_full); ?>">Xem thêm <i class="ti-angle-right" style="    margin-left: 10px;"></i></a>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12">
                <?php
                $listIdCate = $modelCategoryProduct->getALlCategoryChildrenAndSelf($item->id);
                $listId_productCate = \App\Models\ProductForCategory::where('category_id', $item->id)->get()->pluck('product_id');
                $productForCate = $modelProduct->where('active',1)->whereIn('id', $listId_productCate)->orderByDesc('created_at')->limit(5)->get();
                ?>
                <?php if( isset($productForCate) && $productForCate->count()>0 ): ?>
                <div class="list_feedback1 category-slide-1">
                    <div class="SellingProducts">
                        <?php $__currentLoopData = $productForCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="SellingProducts__item">
                            <div class="box-product-item">
                                <div class="product-item">
                                    <div class="box">
                                        <div class="image">
                                            <a href="<?php echo e($product->slug); ?>">
                                                <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($product->name); ?>">
                                                <?php if($product->old_price && $product->price): ?>
                                                <span class="sale"><?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                <?php endif; ?>
                                                <?php if($product->baohanh): ?>
                                                <div class="km">
                                                    <?php echo e($product->baohanh); ?>

                                                </div>
                                                <?php endif; ?>
                                            </a>
                                            <?php if($product->option_status == 0): ?>
                                                
                                            <?php elseif($product->option_status == 1): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Bán chạy</p>
                                            </span>
                                            <?php elseif($product->option_status == 2): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Freeship</p>
                                            </span>
                                            <?php elseif($product->option_status == 3): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Yêu thích</p>
                                            </span>
                                            <?php elseif($product->option_status == 4): ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u">Giảm sốc</p>
                                            </span>
                                            <?php endif; ?>
                                            <span class="ant-tagt">
                                                <p class="css-tm7i6u"><?php echo e($product->size); ?></p>
                                            </span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a></h3>
                                            <?php if($product->attributes->count()): ?>
                                            <?php $__currentLoopData = $product->attributes()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->parent->order == 1 or $item->parent->order == 2): ?>
                                            <div class="ProductInfo">
                                                <span class="ProductInfo__title__origin"><?php echo e($item->parent->name); ?>:</span>
                                                <span class="ProductInfo__origin__details"><?php echo e($item->name); ?></span>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <div class="box-price">
                                                <?php if($product->price): ?>
                                                <span class="new-price"><?php echo e(number_format($product->price)); ?>đ</span>
                                                <!-- <?php if($product->size): ?>
                                                    <?php echo e('/ '.$product->size); ?>

                                                    <?php endif; ?> -->
                                                <?php else: ?>
                                                <span class="new-price">Liên hệ</span>
                                                <?php endif; ?>
                                                <?php if($product->old_price>0): ?>
                                                <span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="pro-item-start-rating">
                                            
                                                <?php
                                                $avgRating = 0;
                                                $sumRating = array_sum(array_column($product->productStars->where('hot', 1)->toArray(), 'star'));
                                                $countRating = count($product->productStars->where('hot', 1));
                                                if ($countRating != 0) {
                                                $avgRating = $sumRating / $countRating;
                                                }
                                                ?>
                                                <?php if($countRating>0): ?>
                                                    <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i <= $avgRating): ?> <span class="StarRating__span"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M4.6582 0.438543C4.79802 0.155251 5.20198 0.155251 5.3418 0.438544L6.5916 2.97093C6.64712 3.08342 6.75444 3.16139 6.87859 3.17943L9.67324 3.58552C9.98587 3.63095 10.1107 4.01514 9.88448 4.23566L7.86225 6.20684C7.77242 6.29441 7.73143 6.42057 7.75263 6.54421L8.23002 9.32757C8.28342 9.63894 7.9566 9.87638 7.67698 9.72937L5.17737 8.41525C5.06633 8.35688 4.93367 8.35688 4.82263 8.41525L2.32302 9.72937C2.0434 9.87638 1.71658 9.63894 1.76998 9.32757L2.24737 6.54421C2.26857 6.42057 2.22758 6.29441 2.13775 6.20684L0.115521 4.23566C-0.110701 4.01514 0.0141305 3.63095 0.326763 3.58552L3.12141 3.17943C3.24556 3.16139 3.35288 3.08342 3.4084 2.97093L4.6582 0.438543Z" fill="#FFC53D"></path></svg>
                                                        </span>
                                                        <?php else: ?>
                                                            <span class="StarRating__span"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M0.377276 3.96712L0.115521 4.23566L0.377276 3.96712C0.376131 3.96601 0.375417 3.96517 0.375004 3.96464C0.375017 3.96391 0.375138 3.9626 0.375718 3.96081C0.376297 3.95903 0.376974 3.95789 0.377392 3.95729C0.378038 3.95711 0.379106 3.95685 0.380687 3.95662L3.17533 3.55054C3.42162 3.51475 3.63453 3.36006 3.74467 3.13689L4.99448 0.604506C4.99519 0.603073 4.99576 0.602136 4.99614 0.601579C4.99683 0.601366 4.99812 0.601074 5 0.601074C5.00187 0.601074 5.00317 0.601366 5.00386 0.601579C5.00424 0.602136 5.00481 0.603073 5.00552 0.604506L6.25533 3.13689C6.36547 3.36006 6.57838 3.51475 6.82466 3.55054L9.61931 3.95662C9.62089 3.95685 9.62196 3.95711 9.62261 3.95729C9.62302 3.95789 9.6237 3.95903 9.62428 3.96081C9.62486 3.9626 9.62498 3.96392 9.625 3.96464C9.62458 3.96518 9.62387 3.96601 9.62272 3.96712L7.6005 5.93831C7.42228 6.11202 7.34096 6.36231 7.38303 6.60761L7.86041 9.39096C7.86068 9.39254 7.86077 9.39363 7.86079 9.3943C7.86035 9.39488 7.85948 9.39588 7.85796 9.39698C7.85645 9.39808 7.85523 9.39861 7.85454 9.39884C7.85391 9.39862 7.8529 9.39819 7.85148 9.39745L5.35187 8.08333C5.13158 7.96752 4.86842 7.96752 4.64813 8.08333L4.82263 8.41525L4.64813 8.08333L2.14852 9.39745C2.14711 9.39819 2.14609 9.39862 2.14546 9.39884C2.14477 9.39861 2.14355 9.39808 2.14204 9.39698C2.14052 9.39588 2.13965 9.39488 2.13921 9.3943C2.13923 9.39363 2.13932 9.39253 2.13959 9.39096L2.61697 6.6076C2.65904 6.36231 2.57772 6.11202 2.3995 5.93831L0.377276 3.96712Z" stroke="#FFC53D" stroke-width="0.75"></path></svg>
                                                            </span>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <label for="">(<?php echo e($countRating); ?> lượt đánh giá)</label>
                                                <?php endif; ?>
                                            </div>

                                            <button class="buy-now addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">Chọn mua</button>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if(isset($supports) && $supports): ?>
<div class="box_ss_06">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-3">
                <div class="title_box_ss_06">
                    <h2><?php echo e($supports->name); ?></h2>
                    <p><?php echo e($supports->slug); ?></p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-9">
                <div class="row --row">
                    <?php if($supports->childs()->count() > 0): ?>
                    <?php $__currentLoopData = $supports->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4 col-sm-4 col-md-4 item --item">
                        <div class="box_item">
                            <div class="icon">
                                <img src="<?php echo e(asset($value->image_path)); ?>" alt="<?php echo e($value->name); ?>">
                            </div>
                            <div class="info">
                                <div class="title"><?php echo e($value->name); ?></div>
                                <div class="desc">
                                    <p><a href="<?php echo e(asset($value->slug)); ?>">Xem thêm <i class="fas fa-angle-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endif; ?>



<?php if(isset($post_home)): ?>
<section class="section section-3">
    <div class="container">
        <div class="row row-element">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title_home_in">
                    <h2><i class="fas fa-users"></i> Tin tức mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <?php $__currentLoopData = $post_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                <div class="col-inner">
                    <a href="<?php echo e($post->slug); ?>" class="plain">
                        <div class="box box-normal box-text-bottom box-blog-post has-hover">
                            <div class="box-image">
                                <a href="<?php echo e($post->slug); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>">
                            </div>
                            <div class="box-text text-left">
                                <div class="box-text-inner blog-post-inner">
                                    <h5 class="post-title is-large text-left "><?php echo e($post->name); ?></h5>
                                    <div class="TagSubPost">
                                        <a href="<?php echo e($post->category->slug_full); ?>" class="TagSubPost__link">
                                        <?php echo e($post->category->name); ?>

                                        </a>
                                    </div>
                                    <p class="TimePost">
                                        <span class="time"> <?php echo e(Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')); ?></span> 
                                        <a href="javascript:;" class="NameAuthor">Tác giả: <?php echo e($post->getAdmin->name); ?></a>
                                    </p>
                                    <div class="description-post">
                                    <?php echo e($post->description); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="list-news2">
                    <?php $__currentLoopData = $post_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                    <?php else: ?>
                    <div class="list-news2-item">
                        <div class="image">
                            <a href="<?php echo e($post->slug); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                        </div>
                        <div class="info">
                            <h3><a href="<?php echo e($post->slug); ?>"><?php echo e($post->name); ?></a></h3>
                            <p><i class="fas fa-clock"></i> <?php echo e(Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')); ?>

                            <a href="javascript:;" class="NameAuthor">Tác giả: <?php echo e($post->getAdmin->name); ?></a>
                            </p>
                            <div class="cate_news">
                                <a href="<?php echo e($post->category->slug_full); ?>"><?php echo e($post->category->name); ?></a>
                            </div>
                            
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
</div>
</div>


</div>

<?php if(isset($modalHome)&&$modalHome): ?>
<div class="modal fade modal-First" id="modal-first" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" image="">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
                <div class="image-modal">
                    <div class="image">
                        <img src="<?php echo e(asset($modalHome->image_path)); ?>" alt="">
                    </div>
                    <div class="newsletter-content">
                        
                        <h2><?php echo e($modalHome->name); ?></h2>
                        <div class="dec"><?php echo $modalHome->description; ?></div>
                        <form action="<?php echo e(route('contact.storeAjax')); ?>" data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                            <?php echo csrf_field(); ?>
                            <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                            <input type="text" class="form-control" name="content" placeholder="Sản phẩm mua *" required>
                            <button>Đăng ký ngay <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script>
    $(function() {
        //search
        var width = $(window).width();

        function search_scroll() {
            let input = $('.js-input-search');

            input.click(function() {
                previousScrollY = window.scrollY;
                $('.lc__mask').addClass('lc__block').css({
                    'opacity': '1',
                    'z-index': '1049',
                    'visibility': 'visible'
                });
                $('.box-form-slide').css('z-index', 1059);
                $(this).closest('.section-search').addClass('is-open')
                // if (width > 992) {
                //     $('html, body').animate({
                //         scrollTop: $('.section-search').offset().top - 200
                //     }, 800);
                // };
            })
        };

        $('.lc__mask_search_suggest').click(function() {
            $(this).removeClass('lc__block').css({
                'opacity': '0',
                'visibility': 'hidden'
            });
            $('.box-form-slide').css('z-index', 0);
        });

        function init() {
            search_scroll();
        }

        init();
    });
</script>
<script>
    $(function() {
        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            $('.autoplay4-pro').slick('setPosition');
        });
    });
    // setTimeout(() => $('#modal-add-cart').modal('show'), 10000);
</script>
<!-- <script>
    $(function() {
        var now = new Date();
        var date = now.getDate();
        var month = (now.getMonth() + 1);
        var year = now.getFullYear();
        var timer;
        var then = year + '/' + month + '/' + date + ' 23:59:59';
        var now = new Date();
        var compareDate = new Date(then) - now.getDate();
        timer = setInterval(function() {
            timeBetweenDates(compareDate);
        }, 1000);

        function timeBetweenDates(toDate) {
            var dateEntered = new Date(toDate);
            var now = new Date();
            var difference = dateEntered.getTime() - now.getTime();
            if (difference <= 0) {
                clearInterval(timer);
            } else {
                var seconds = Math.floor(difference / 1000);
                var minutes = Math.floor(seconds / 60);
                var hours = Math.floor(minutes / 60);
                var days = Math.floor(hours / 24);
                hours %= 24;
                minutes %= 60;
                seconds %= 60;
                $("#days").text(days);
                $("#hours").text(hours);
                $("#minutes").text(minutes);
                $("#seconds").text(seconds);
            }
        }
    });
</script> -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js' crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.product-item .box .content').matchHeight();
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>