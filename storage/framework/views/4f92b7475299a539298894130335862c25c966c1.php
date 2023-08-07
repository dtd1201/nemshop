
<?php $__env->startSection('title', $header['seo_home']->name); ?>
<?php $__env->startSection('image', asset($header['seo_home']->image_path)); ?>
<?php $__env->startSection('keywords', $header['seo_home']->slug); ?>
<?php $__env->startSection('description', $header['seo_home']->value); ?>
<?php $__env->startSection('abstract', $header['seo_home']->slug); ?>

<?php $__env->startSection('content'); ?>
<div class="lc__mask lc__mask_search_suggest"></div>
<div class="content-wrapper">
    <div class="main">
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
        </div>
        <div class="bg_hoa section-search">
            <div class="container">
                <div class="box-form-slide">
                    <div class="tim-tour-title">
                        Nhập từ khóa tìm kiếm trên Kingphar...
                    </div>
                    <form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET">
                        <div class="content-search-tour">
                            <div id="vnt-sidebar">
                                <div class="boxFilterSearch">
                                    <div class="content">
                                        <div class="form-group s-item form-input">
                                            <div class="formFa">
                                                <input name="keyword" class="form-control js-input-search" placeholder="Nhập từ khóa tìm kiếm" />
                                                <button type="submit" class="btn-search-slide"> <i class="fas fa-search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($header['search_top']) && $header['search_top']): ?>
                            <div class="section-keywords bg-while">
                                <div class="container p-x-md-0">
                                    <div class="box-title text-center p-l-md-10 m-b-16 m-b-md-12">
                                        <div class="u-flex justify-between align-items-center">
                                            <h2 class="u-flex align-items-center fs-p-20 fs-p-md-16 txt-gray-900">
                                                <i class="fas fa-poll m-r-8"></i>
                                                <?php echo e($header['search_top']->name); ?>

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section-keywords-body p-l-md-10">
                                        <div class="keywords-group block-none">
                                            <div class="swiper-container slide-wrapper label-group-slide">
                                                <div class="label-group swiper-wrapper">
                                                    <?php $__currentLoopData = $header['search_top']->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="label-group-item">
                                                            <a href="<?php echo e(makeLink('search')); ?>?keyword=<?php echo e($value->name); ?>">
                                                                <label class="circle label fs-p-16"><?php echo e($value->name); ?></label>
                                                            </a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        

        <div class="section_category_products">
			<div class="ss04_category_product">
				<div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="group-title">
                                <div class="title title-img">Danh mục nổi bật</div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($categories)&&$categories): ?>
                    <div class="box-ovf-x">
                        <?php
                            $categories2 = $categories->split(2);
                            $k = 0;
                        ?>
                        <?php $__currentLoopData = $categories2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $k++;
                            ?>
                            <div class="row list-<?php echo e($k); ?>">
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $categoryProduct = new App\Models\CategoryProduct;
                                        $product = new App\Models\Product;
                                        $listIdCate = $categoryProduct->getALlCategoryChildrenAndSelf($category->id);
                                        $count = $product->whereIn('category_id', $listIdCate)->where('active', 1)->get()->count();
                                        $link=$category->slug_full;
                                    ?>
                                    <div class="col-2 col-reset">
                                        <div class="product-item">
                                            <div class="box">
                                                <div class="image">
                                                    <a href="<?php echo e($link); ?>">
                                                        <img src="<?php echo e($category->icon_path != null ? asset($category->icon_path) : '../frontend/images/noimage.png'); ?>" alt="<?php echo e($category->name); ?>">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h3><a href="<?php echo e($link); ?>"><?php echo e($category->name); ?></a></h3>
                                                    <div class="count-product text-center">
                                                        <p><?php echo e($count); ?> sản phẩm</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
				</div>
			</div>
		</div>

        <div class="section-hau-covid">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="col-inner">
                            <div class="section-title-container">
                                <h2 class="section-title section-title-center">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>Sản Phẩm Hậu Covid
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
						<?php if( isset($productsBest) && $productsBest->count()>0 ): ?>
                            <div class="list_feedback1 autoplay6-tintuc category-slide-1">
                                <?php $__currentLoopData = $productsBest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tran=$product->translationsLanguage()->first();
                                    $link=$product->slug_full;
                                ?>
                                <div class="box-product-item">
                                    <div class="product-item">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e($link); ?>">
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($tran->name); ?>">
                                                    <?php if($product->old_price && $product->price): ?>
                                                        <span class="sale"><?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                    <?php endif; ?>
                                                    <?php if($product->baohanh): ?>
                                                        <div class="km">
                                                            <?php echo e($product->baohanh); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </a>
                                                <?php if($product->old_price && $product->price): ?>
                                                    <div class="cart">
                                                        <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                            <img class="lazy" src="<?php echo e(asset('images/icon_add_cart.png')); ?>" width="30" height="35"> Thêm vào giỏ
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="ss03_product">
			<div class="container">
				<div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="col-inner">
                            <div class="section-title-container">
                                <h2 class="section-title section-title-center">
                                    <i class="fa fa-fire" aria-hidden="true"></i> Bán Chạy Nhất
                                </h2>
                            </div>
                        </div>
                    </div>
					<div class="col-12 col-sm-12">
						<?php if( isset($productHot) && $productHot->count()>0 ): ?>
                            <div class="row list_feedback1">
                                <?php $__currentLoopData = $productHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tran=$product->translationsLanguage()->first();
                                    $link=$product->slug_full;
                                ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6 box_sp_home">
                                    <div class="product-item">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e($link); ?>">
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg')); ?>" alt="<?php echo e($tran->name); ?>">
                                                    <?php if($product->old_price && $product->price): ?>
                                                        <span class="sale"><?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                    <?php endif; ?>
                                                    <?php if($product->baohanh): ?>
                                                        <div class="km">
                                                            <?php echo e($product->baohanh); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </a>
                                                <?php if($product->old_price && $product->price): ?>
                                                    <div class="cart">
                                                        <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                            <img class="lazy" src="<?php echo e(asset('images/icon_add_cart.png')); ?>" width="30" height="35"> Thêm vào giỏ
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
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
                        <?php endif; ?>
                    </div>
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
                            <div class="row">
                                <?php if($supports->childs()->count() > 0): ?>
                                    <?php $__currentLoopData = $supports->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-sm-12 col-md-4 item">
                                            <div class="box_item">
                                                <div class="icon">
                                                    <img src="<?php echo e(asset($value->image_path)); ?>" alt="<?php echo e($value->name); ?>">
                                                </div>
                                                <div class="info">
                                                    <div class="title"><?php echo e($value->name); ?></div>
                                                    <div class="desc">
                                                        <p><a href="<?php echo e(asset($value->slug)); ?>">Tìm hiểu thêm <i class="fas fa-angle-right"></i></a></p>
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
        <?php if(isset($products)&&$products): ?>
            <div class="ss05_product">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="title_home_in">
                                <h2><i class="fas fa-users"></i> Sản phẩm theo đối tượng</h2>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="lc__box-filter">
                                <div class="lc__box-filter-item">
                                    <div class="lc__box-filter-title">
                                        <span>Lọc theo</span>
                                    </div>
                                    <?php if(isset($attributes) && $attributes): ?>
                                        <div class="lc__box-filter-desc">
                                            <ul class="filter-main">
                                                <?php $__currentLoopData = $attributes->childs()->where('active', 1)->orderBy('order')->latest()->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="item-filter-desc <?php if($loop->first): ?> active <?php endif; ?>" data-id="<?php echo e($attributeItem->id); ?>"><?php echo e($attributeItem->name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($products)&&$products): ?>
                            <div class="col-sm-12 col-12">
                                <div class="list-product list_feedback1">
                                    <div class="row" id="dataProductSearch">
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
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>	
        <?php endif; ?>
        
			
        <?php if(isset($post_home)): ?>
            <section class="section section-3">
                <div class="container">
                    <div class="row row-element">
                        <div class="">
                            <div class="title_home_in">
                                <h2><i class="fas fa-users"></i> Tin tức mới nhất</h2>
                            </div>
                        </div>
                        <?php if(isset($postTitle)): ?>
                            <div class="">
                                <div class="title_home_in_xemthe">
                                    <a href="<?php echo e($postTitle->slug_full); ?>">Xem Tất Cả</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        
                        
						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="list-news2">
                                <?php $__currentLoopData = $post_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <?php else: ?>
                                <?php
                                    $tran=$post->translationsLanguage()->first();
                                    $link=$post->slug_full;
                                ?>
                                <div class="list-news2-item">
                                    
                                        <div class="image">
                                            <a href="<?php echo e($link); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>"></a>
                                        </div>
                                        <div class="info">
                                            <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
                                            <p><i class="fas fa-clock"></i> <?php echo e(Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')); ?></p>
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
                <div class="modal-content"  image="">

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
                                <form action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
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
        $(function(){
            //search
            var width = $(window).width();
            function search_scroll() {
                let input = $('.js-input-search');

                input.click(function () {
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

            $('.lc__mask_search_suggest').click(function () {
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
        $(function(){
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
              $('.autoplay4-pro').slick('setPosition');
            });
        });
        // setTimeout(() => $('#modal-add-cart').modal('show'), 10000);
    </script>
    <script>
        $(function() {
            var now = new Date();
            var date = now.getDate();
            var month = (now.getMonth()+1);
            var year =  now.getFullYear();
            var timer;
                var then = year+'/'+month+'/'+date+' 23:59:59';
                var now = new Date();
                var compareDate = new Date(then) - now.getDate();
                timer = setInterval(function () {
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kingphar.vn/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>