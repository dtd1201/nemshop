<style>
    .sub-nav-product-list .box-price span{
        padding: 0;
    }
    .sub-nav-product-list .box-price span.old-price{
        display: block;
        width: 100%;
    }
    .sub-nav-product-list .box-price span.new-price{
        font-weight: 500;
        font-size: 16px;
        line-height: 24px;
        height: auto;
        margin-right: 3px;
    }
    .sub-nav-product-list .box-price{
        text-align: left;
        font-size: 14px;
        line-height: 24px;
        padding: 0;
        align-items: unset;
        vertical-align: baseline;
        height: 44px;
    }
</style>

<div class="menu_fix_mobile">
    <div class="close-menu">
        <p>Danh mục Menu</p>
        <a href="javascript:;" id="close-menu-button">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
    <ul class="nav-main">

        <li class="nav-item">
            <a href="<?php echo e(makeLinkToLanguage('about-us', null, null, App::getLocale())); ?>">
                <span> Giới thiệu</span>
            </a>
        </li>
        
        <?php if(isset($header['hangNoiDia']) && $header['hangNoiDia']): ?>
            <li class="nav-item">
                <a href="<?php echo e($header['hangNoiDia']->slug_full); ?>">
                    <span><?php echo e($header['hangNoiDia']->name); ?></span>
                    <?php if(isset($header['hangNoiDia']->childs)): ?>
                        <?php if(count($header['hangNoiDia']->childs)>0): ?>
                            <i class="fa fa-angle-down mn-icon"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
                <ul class="nav-sub">
                    <?php if(isset($header['hangNoiDia']->childs)): ?>
                        <?php if(count($header['hangNoiDia']->childs)>0): ?>
                            <?php $__currentLoopData = $header['hangNoiDia']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="">
                                <a href="<?php echo e($value->slug_full); ?>">
                                    <span><?php echo e($value->name); ?></span>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(isset($header['hangNgoaiDia']) && $header['hangNgoaiDia']): ?>
            <li class="nav-item">
                <a href="<?php echo e($header['hangNgoaiDia']->slug_full); ?>">
                    <span><?php echo e($header['hangNgoaiDia']->name); ?></span>
                    <?php if(isset($header['hangNgoaiDia']->childs)): ?>
                        <?php if(count($header['hangNgoaiDia']->childs)>0): ?>
                            <i class="fa fa-angle-down mn-icon"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
                <ul class="nav-sub">
                    <?php if(isset($header['hangNgoaiDia']->childs)): ?>
                        <?php if(count($header['hangNgoaiDia']->childs)>0): ?>
                            <?php $__currentLoopData = $header['hangNgoaiDia']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="">
                                <a href="<?php echo e($value->slug_full); ?>">
                                    <span><?php echo e($value->name); ?></span>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(isset($header['hangNgoaiDia1']) && $header['hangNgoaiDia1']): ?>
            <li class="nav-item">
                <a href="<?php echo e($header['hangNgoaiDia1']->slug_full); ?>">
                    <span><?php echo e($header['hangNgoaiDia1']->name); ?></span>
                    <?php if(isset($header['hangNgoaiDia1']->childs)): ?>
                        <?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
                            <i class="fa fa-angle-down mn-icon"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
                <ul class="nav-sub">
                    <?php if(isset($header['hangNgoaiDia1']->childs)): ?>
                        <?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
                            <?php $__currentLoopData = $header['hangNgoaiDia1']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="">
                                <a href="<?php echo e($value->slug_full); ?>">
                                    <span><?php echo e($value->name); ?></span>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(isset($header['hangNgoaiDia2']) && $header['hangNgoaiDia2']): ?>
            <li class="nav-item">
                <a href="<?php echo e($header['hangNgoaiDia2']->slug_full); ?>">
                    <span><?php echo e($header['hangNgoaiDia2']->name); ?></span>
                    <?php if(isset($header['hangNgoaiDia2']->childs)): ?>
                        <?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
                            <i class="fa fa-angle-down mn-icon"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
                <ul class="nav-sub">
                    <?php if(isset($header['hangNgoaiDia2']->childs)): ?>
                        <?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
                            <?php $__currentLoopData = $header['hangNgoaiDia2']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="">
                                <a href="<?php echo e($value->slug_full); ?>">
                                    <span><?php echo e($value->name); ?></span>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(isset($header['menuNew']) && $header['menuNew']): ?>
            <?php $__currentLoopData = $header['menuNew']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a href="<?php echo e($value->slug_full); ?>">
                        <span><?php echo e($value->name); ?></span>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
    </ul>
    
</div>

<div class="header2">
    <?php if(isset($header['header_top']) && $header['header_top']): ?>
        <div class="header-top">
            <div class="header-top-nofication">
                <div class="box-header-top">
                    <nav class="top-nav nofication-block">
                        <div class="nofication-item text-center">
                            <span class="circle-ripple"></span>
                            <span class="nofication-text"><?php echo e($header['header_top']->name); ?></span>
                            <a href="<?php echo e(asset($header['header_top']->slug)); ?>" class="guide-btn"><?php echo e($header['header_top']->value); ?></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="header_home">
        <div class="container">
            <div class="row">
                <div class="list-bar">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="logo-head">
                        <div class="image">
                            <a href="<?php echo e(makeLink('home')); ?>">
                                <img src="<?php echo e(asset($header['logo']->image_path)); ?>"
                                    alt="Logo">
                            </a>
                        </div>
                    </div>                    
                    <div class="h-cart dropdown show" id="li_desktop_cart">
                        <a class="smooth d-flex" href="<?php echo e(route('cart.list')); ?>">
                            <img src="<?php echo e(asset('/frontend/images/cart.png')); ?>" alt="cart" title="cart">
                            <span>Giỏ hàng</span>
                            <strong class="cart-badge-number"
                                id="desktop-quick-cart-badge"><?php echo e($header['totalQuantity']); ?></strong>
                            <label class="d-block d-lg-none cart-badge-number"
                                id="desktop-quick-cart-mobi"><?php echo e($header['totalQuantity']); ?></label>
                        </a>
                    </div>
                    <div class="contact-top">
                        <div class="phone">
                            <a href="tel:<?php echo e($header['tai_sao1']->slug); ?>"><?php echo e($header['tai_sao1']->slug); ?></a>
                            <span><?php echo e($header['tai_sao1']->value); ?></span>
                            <a href="tel:<?php echo e($header['tai_sao1']->slug); ?>" class="icon-phone"><i
                                    class="fas fa-phone-alt"></i></a>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
    </div>

<div id="header3" class="header3">
    <div class="container">
        <div class="row">
            <div class="box-header-main">
                <div class="box_padding">
                    <div class="menu menu-desktop">
                        <ul class="nav-main">

                            <li class="nav-item">
                                <a href="<?php echo e(makeLinkToLanguage('about-us', null, null, App::getLocale())); ?>">
                                    <span> Giới thiệu</span>
                                </a>
                            </li>

                            <?php if(isset($header['hangNoiDia']) && $header['hangNoiDia']): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e($header['hangNoiDia']->slug_full); ?>">
                                        <span> <?php echo e($header['hangNoiDia']->name); ?></span>
                                        <?php if(isset($header['hangNoiDia']->childs)): ?>
                                            <?php if(count($header['hangNoiDia']->childs)>0): ?>
                                            <i class="fa fa-angle-down mn-icon"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                    <?php if(isset($header['hangNoiDia']->childs)): ?>
                                        <?php if(count($header['hangNoiDia']->childs)>0): ?>
                                            <div class="menu-dropdown">
                                                <div class="row no-gutters">
                                                    <div class="col-3">
                                                        <ul class="sub-nav-left p-b-16">
                                                            <?php $__currentLoopData = $header['hangNoiDia']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNoiDia<?php echo e($childValue->id); ?>">
                                                                    <a href="<?php echo e($childValue['slug_full']); ?>">
                                                                        <div class="sub-nav-picture m-r-8">
                                                                            <picture>
                                                                                <img alt="<?php echo e($childValue['name']); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValue['icon_path'])); ?>" />
                                                                            </picture>
                                                                        </div>
                                                                        <div class="sub-nav-name fs-p-14">
                                                                            <span><?php echo e($childValue['name']); ?> </span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-9">
                                                        <?php $__currentLoopData = $header['hangNoiDia']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNoiDia<?php echo e($childValue->id); ?>">
                                                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                                                        <?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col sub-nav-cate-item p-x-8">
                                                                                <a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                                                    <div class="sub-nav-cate-picture m-r-8">
                                                                                        <picture>
                                                                                            <img alt="<?php echo e($childValueItem->name); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValueItem->icon_path)); ?>" />
                                                                                        </picture>
                                                                                    </div>
                                                                                    <div class="sub-nav-cate-name">
                                                                                        <span><?php echo e($childValueItem->name); ?></span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    $categoryProduct = new \App\Models\CategoryProduct();
                                                                    $product = new  \App\Models\Product();
                                                                    $listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

                                                                    $dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
                                                                ?>
                                                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                                                    <div class="sub-nav-title m-b-12">
                                                                        <div class="u-flex justify-between align-items-center">
                                                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                                                <i class="fab fa-gripfire"></i>
                                                                                Bán chạy nhất
                                                                            </div>
                                                                            <a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sub-nav-product-list">
                                                                        <div class="row row-cols-5">
                                                                            <?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    $tran=$product->translationsLanguage()->first();
                                                                                    $link=$product->slug_full;
                                                                                ?>
                                                                                <div class="col p-x-8">
                                                                                    <div class="sub-nav-product-item">
                                                                                        <a href="<?php echo e($link); ?>">
                                                                                            <div class="sub-nav-product-picture m-b-12">
                                                                                                <picture>
                                                                                                    <img
                                                                                                        alt="<?php echo e($tran->name); ?>"
                                                                                                        class="loaded"
                                                                                                        src="<?php echo e(asset($product->avatar_path)); ?>"
                                                                                                    />
                                                                                                </picture>
                                                                                            </div>
                                                                                            <div class="sub-nav-product-info">
                                                                                                <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                                                    <?php echo e($tran->name); ?>

                                                                                                </div>
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
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>

                            <?php if(isset($header['hangNgoaiDia']) && $header['hangNgoaiDia']): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e($header['hangNgoaiDia']->slug_full); ?>">
                                        <span> <?php echo e($header['hangNgoaiDia']->name); ?></span>
                                        <?php if(isset($header['hangNgoaiDia']->childs)): ?>
                                            <?php if(count($header['hangNgoaiDia']->childs)>0): ?>
                                            <i class="fa fa-angle-down mn-icon"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                    <?php if(isset($header['hangNgoaiDia']->childs)): ?>
                                        <?php if(count($header['hangNgoaiDia']->childs)>0): ?>
                                            <div class="menu-dropdown">
                                                <div class="row no-gutters">
                                                    <div class="col-3">
                                                        <ul class="sub-nav-left p-b-16">
                                                            <?php $__currentLoopData = $header['hangNgoaiDia']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNgoaiDia<?php echo e($childValue->id); ?>">
                                                                    <a href="<?php echo e($childValue['slug_full']); ?>">
                                                                        <div class="sub-nav-picture m-r-8">
                                                                            <picture>
                                                                                <img alt="<?php echo e($childValue['name']); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValue['icon_path'])); ?>" />
                                                                            </picture>
                                                                        </div>
                                                                        <div class="sub-nav-name fs-p-14">
                                                                            <span><?php echo e($childValue['name']); ?> </span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-9">
                                                        <?php $__currentLoopData = $header['hangNgoaiDia']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNgoaiDia<?php echo e($childValue->id); ?>">
                                                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                                                        <?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col sub-nav-cate-item p-x-8">
                                                                                <a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                                                    <div class="sub-nav-cate-picture m-r-8">
                                                                                        <picture>
                                                                                            <img alt="<?php echo e($childValueItem->name); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValueItem->icon_path)); ?>" />
                                                                                        </picture>
                                                                                    </div>
                                                                                    <div class="sub-nav-cate-name">
                                                                                        <span><?php echo e($childValueItem->name); ?></span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                    $categoryProduct = new \App\Models\CategoryProduct();
                                                                    $product = new \App\Models\Product();
                                                                    $listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

                                                                    $dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
                                                                ?>
                                                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                                                    <div class="sub-nav-title m-b-12">
                                                                        <div class="u-flex justify-between align-items-center">
                                                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                                                <i class="fab fa-gripfire"></i>
                                                                                Bán chạy nhất
                                                                            </div>
                                                                            <a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sub-nav-product-list">
                                                                        <div class="row row-cols-5">
                                                                            <?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    $tran=$product->translationsLanguage()->first();
                                                                                    $link=$product->slug_full;
                                                                                ?>
                                                                                <div class="col p-x-8">
                                                                                    <div class="sub-nav-product-item">
                                                                                        <a href="<?php echo e($link); ?>">
                                                                                            <div class="sub-nav-product-picture m-b-12">
                                                                                                <picture>
                                                                                                    <img
                                                                                                        alt="<?php echo e($tran->name); ?>"
                                                                                                        class="loaded"
                                                                                                        src="<?php echo e(asset($product->avatar_path)); ?>"
                                                                                                    />
                                                                                                </picture>
                                                                                            </div>
                                                                                            <div class="sub-nav-product-info">
                                                                                                <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                                                    <?php echo e($tran->name); ?>

                                                                                                </div>
                                                                                                <div class="box-price">
                                                                                                    <?php if($product->size != null): ?>
                                                                                                        <span class="new-price"><?php echo e($product->price?number_format($product->price)."đ/".$product->size :"Liên hệ"); ?></span>
                                                                                                        <?php if($product->old_price>0): ?>
                                                                                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?> đ/<?php echo e($product->size); ?></span>
                                                                                                        <?php endif; ?>
                                                                                                    <?php else: ?>
                                                                                                        <span class="new-price"><?php echo e($product->price?number_format($product->price)."đ" :"Liên hệ"); ?></span>
                                                                                                        <?php if($product->old_price>0): ?>
                                                                                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
                                                                                                        <?php endif; ?>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>

                            <?php if(isset($header['hangNgoaiDia1']) && $header['hangNgoaiDia1']): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e($header['hangNgoaiDia1']->slug_full); ?>">
                                        <span> <?php echo e($header['hangNgoaiDia1']->name); ?></span>
                                        <?php if(isset($header['hangNgoaiDia1']->childs)): ?>
                                            <?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
                                            <i class="fa fa-angle-down mn-icon"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                    <?php if(isset($header['hangNgoaiDia1']->childs)): ?>
                                        <?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
                                            <div class="menu-dropdown">
                                                <div class="row no-gutters">
                                                    <div class="col-3">
                                                        <ul class="sub-nav-left p-b-16">
                                                            <?php $__currentLoopData = $header['hangNgoaiDia1']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNgoaiDia1_<?php echo e($childValue->id); ?>">
                                                                    <a href="<?php echo e($childValue['slug_full']); ?>">
                                                                        <div class="sub-nav-picture m-r-8">
                                                                            <picture>
                                                                                <img alt="<?php echo e($childValue['name']); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValue['icon_path'])); ?>" />
                                                                            </picture>
                                                                        </div>
                                                                        <div class="sub-nav-name fs-p-14">
                                                                            <span><?php echo e($childValue['name']); ?> </span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-9">
                                                        <?php $__currentLoopData = $header['hangNgoaiDia1']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNgoaiDia1_<?php echo e($childValue->id); ?>">
                                                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                                                        <?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col sub-nav-cate-item p-x-8">
                                                                                <a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                                                    <div class="sub-nav-cate-picture m-r-8">
                                                                                        <picture>
                                                                                            <img alt="<?php echo e($childValueItem->name); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValueItem->icon_path)); ?>" />
                                                                                        </picture>
                                                                                    </div>
                                                                                    <div class="sub-nav-cate-name">
                                                                                        <span><?php echo e($childValueItem->name); ?></span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    $categoryProduct = new \App\Models\CategoryProduct();
                                                                    $product = new  \App\Models\Product();
                                                                    $listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

                                                                    $dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
                                                                ?>
                                                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                                                    <div class="sub-nav-title m-b-12">
                                                                        <div class="u-flex justify-between align-items-center">
                                                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                                                <i class="fab fa-gripfire"></i>
                                                                                Bán chạy nhất
                                                                            </div>
                                                                            <a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sub-nav-product-list">
                                                                        <div class="row row-cols-5">
                                                                            <?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    $tran=$product->translationsLanguage()->first();
                                                                                    $link=$product->slug_full;
                                                                                ?>
                                                                                <div class="col p-x-8">
                                                                                    <div class="sub-nav-product-item">
                                                                                        <a href="<?php echo e($link); ?>">
                                                                                            <div class="sub-nav-product-picture m-b-12">
                                                                                                <picture>
                                                                                                    <img
                                                                                                        alt="<?php echo e($tran->name); ?>"
                                                                                                        class="loaded"
                                                                                                        src="<?php echo e(asset($product->avatar_path)); ?>"
                                                                                                    />
                                                                                                </picture>
                                                                                            </div>
                                                                                            <div class="sub-nav-product-info">
                                                                                                <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                                                    <?php echo e($tran->name); ?>

                                                                                                </div>
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
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>

                            <?php if(isset($header['hangNgoaiDia2']) && $header['hangNgoaiDia2']): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e($header['hangNgoaiDia2']->slug_full); ?>">
                                        <span> <?php echo e($header['hangNgoaiDia2']->name); ?></span>
                                        <?php if(isset($header['hangNgoaiDia2']->childs)): ?>
                                            <?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
                                            <i class="fa fa-angle-down mn-icon"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                    <?php if(isset($header['hangNgoaiDia2']->childs)): ?>
                                        <?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
                                            <div class="menu-dropdown">
                                                <div class="row no-gutters">
                                                    <div class="col-3">
                                                        <ul class="sub-nav-left p-b-16">
                                                            <?php $__currentLoopData = $header['hangNgoaiDia2']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNgoaiDia2_<?php echo e($childValue->id); ?>">
                                                                    <a href="<?php echo e($childValue['slug_full']); ?>">
                                                                        <div class="sub-nav-picture m-r-8">
                                                                            <picture>
                                                                                <img alt="<?php echo e($childValue['name']); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValue['icon_path'])); ?>" />
                                                                            </picture>
                                                                        </div>
                                                                        <div class="sub-nav-name fs-p-14">
                                                                            <span><?php echo e($childValue['name']); ?> </span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-9">
                                                        <?php $__currentLoopData = $header['hangNgoaiDia2']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNgoaiDia2_<?php echo e($childValue->id); ?>">
                                                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                                                        <?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col sub-nav-cate-item p-x-8">
                                                                                <a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                                                    <div class="sub-nav-cate-picture m-r-8">
                                                                                        <picture>
                                                                                            <img alt="<?php echo e($childValueItem->name); ?>" srcset="" class="loaded" src="<?php echo e(asset($childValueItem->icon_path)); ?>" />
                                                                                        </picture>
                                                                                    </div>
                                                                                    <div class="sub-nav-cate-name">
                                                                                        <span><?php echo e($childValueItem->name); ?></span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                    $categoryProduct = new \App\Models\CategoryProduct();
                                                                    $product = new \App\Models\Product();
                                                                    $listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

                                                                    $dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
                                                                ?>
                                                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                                                    <div class="sub-nav-title m-b-12">
                                                                        <div class="u-flex justify-between align-items-center">
                                                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                                                <i class="fab fa-gripfire"></i>
                                                                                Bán chạy nhất
                                                                            </div>
                                                                            <a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sub-nav-product-list">
                                                                        <div class="row row-cols-5">
                                                                            <?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    $tran=$product->translationsLanguage()->first();
                                                                                    $link=$product->slug_full;
                                                                                ?>
                                                                                <div class="col p-x-8">
                                                                                    <div class="sub-nav-product-item">
                                                                                        <a href="<?php echo e($link); ?>">
                                                                                            <div class="sub-nav-product-picture m-b-12">
                                                                                                <picture>
                                                                                                    <img
                                                                                                        alt="<?php echo e($tran->name); ?>"
                                                                                                        class="loaded"
                                                                                                        src="<?php echo e(asset($product->avatar_path)); ?>"
                                                                                                    />
                                                                                                </picture>
                                                                                            </div>
                                                                                            <div class="sub-nav-product-info">
                                                                                                <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                                                    <?php echo e($tran->name); ?>

                                                                                                </div>
                                                                                                <div class="box-price">
                                                                                                    <?php if($product->size != null): ?>
                                                                                                        <span class="new-price"><?php echo e($product->price?number_format($product->price)."đ/".$product->size :"Liên hệ"); ?></span>
                                                                                                        <?php if($product->old_price>0): ?>
                                                                                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?> đ/<?php echo e($product->size); ?></span>
                                                                                                        <?php endif; ?>
                                                                                                    <?php else: ?>
                                                                                                        <span class="new-price"><?php echo e($product->price?number_format($product->price)."đ" :"Liên hệ"); ?></span>
                                                                                                        <?php if($product->old_price>0): ?>
                                                                                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
                                                                                                        <?php endif; ?>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>


                            

                            <?php if(isset($header['menuNew']) && $header['menuNew']): ?>
                                <?php $__currentLoopData = $header['menuNew']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e($value['slug_full']); ?>">
                                            <span> <?php echo e($value['name']); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(isset($header['heThongNhaThuoc']) && $header['heThongNhaThuoc']): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(makeLinkToLanguage('drug-store', null, null, App::getLocale())); ?>">
                                        <span> <?php echo e($header['heThongNhaThuoc']->name); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            

                            


                            
                        </ul>
                    </div>

                    <div class="search" id="search">
                        <div class="form-s-mobile">
                            <form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Từ khóa" />
                                    <div class="input-group-append">
                                        <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <span class="close-search"><i class="fas fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <div class="hover-menu-mask hover-nav"></div>
            </div>
            <div class="col-lg-12 search_mb1">
                <div class="header-top-right">
                    <ul>
                        <form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET" class="cart_header">
                            <li>
                                <input type="text" name="keyword" class="header-top-search" placeholder="Tìm kiếm trên Min's Kitchen" />
                                <div class="search_mobile" type="submit"><a>Tìm kiếm</a></div>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</div>
<?php /**PATH /var/www/vhosts/kingphar.vn/httpdocs/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>