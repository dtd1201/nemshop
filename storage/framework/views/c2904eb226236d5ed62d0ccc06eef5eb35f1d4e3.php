<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('content'); ?>

<style>
    p.title-filter-result.block-none{
        font-size: 14px;
    }
    .fillter-tags.u-flex.align-items-center.flex-wrap {
        margin-left: 15px;
    }
    .badge-xs:not([class*="badge-sub"]){
        border-radius: 15px;
        border: 1px solid #d8e0e8;
        font-size: 13px;
        font-weight: 400;
    }
    .badge-circle .icon-right {
        border-radius: 0 100px 100px 0;
        margin-left: 12px;
    }

</style>
    <div class="lc__load" style="display: none;">
        <div class="block-none">
            <div class="wrap-spinner txt-center border">
                <div class="spinner spinner-primary spinner-big"></div>
                <span class="spinner-text">Đang cập nhật...</span>
            </div>
        </div>
        <div class="none-block">
            <div class="wrap-spinner txt-center border">
                <div class="spinner spinner-primary"></div>
                <span class="spinner-text">Đang cập nhật...</span>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                <?php echo $__env->make('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="block-product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 col-xs-12 block-content-right filterDesk">

                            <?php if(isset($sidebar['attribute'])): ?>
                                <?php $__currentLoopData = $sidebar['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box-list-fill js-box-search m-b-15">
                                    <div class="title-s">
                                    <?php echo e($attributeItem->name); ?>

                                    </div>
                                    
                                    <div class="m-b-5 form-search form-search-sm radius-8 search-<?php echo e(\Str::slug($attributeItem->name)); ?>">
                                        <span class="form-search-icon-cate m-r-4">
                                            <i class="fas fa-search icon-md"></i>
                                        </span>
                                        <input type="text" class="form-search-input m-r-4" placeholder="Tìm theo tên" />
                                        <span class="form-search-icon-cate form-search-close" style="display: none;">
                                            <i class="fa fa-times icon-sm"></i>
                                        </span>
                                    </div>
                                    
                                    <ul class="group-checkbox fill-list-item action_show_more">
                                        <?php $__currentLoopData = $attributeItem->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="checkbox filterNormal m-t-0">
                                            <div class="form-check p-l-5">
                                                
                                                <label for="<?php echo e(\Str::slug($item->name)); ?>" class="checkbox label label-sm">
                                                    <input type="checkbox" form="formfill" class="field-form m-r-5" value="<?php echo e($item->id); ?>" name="attribute_id[<?php echo e($attributeItem->id); ?>][]" id="<?php echo e(\Str::slug($item->name)); ?>" data-tag="<?php echo e(\Str::slug($item->name)); ?>" data-search="<?php echo e(\Str::slug($item->name)); ?>">
                                                    <span class="label-text l-h-16"><?php echo e($item->name); ?></span>
                                                </label>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>


                            <div class="box-list-fill">
                                <div class="title-s">
                                    Giá Bán 
                                </div>
                            </div>

                            <div class="list-fill js-box-search">
                                <div class="group-checkbox form-group action_show_more">
                                    <?php $__currentLoopData = $priceSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="price_check checkbox filterNormal">
                                        <div class="form-check">
                                            
                                            <label for="<?php echo e(\Str::slug($item['name'])); ?>" class="label label-sm">
                                                <input type="checkbox" form="formfill" class="field-form" value="<?php echo e($item['value']); ?>" name="price" id="<?php echo e(\Str::slug($item['name'])); ?>" data-tag="<?php echo e(\Str::slug($item['name'])); ?>" data-search="<?php echo e(\Str::slug($item['name'])); ?>" <?php echo e($item['value']==($priceS??'')?'checked':''); ?>>
                                                <span class="label-text"><?php echo e($item['name']); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                            </div>

                            <?php if(isset($banner)&&$banner->childs()->count() > 0): ?>
                                <?php $__currentLoopData = $banner->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="side-bar">
                                        <div class="banner_right">
                                            <div class="banner_home">
                                                <a><img src="<?php echo e(asset($value->image_path)); ?>" alt="<?php echo e($value->name); ?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 block-content-left">
                            <?php if(isset($category) && $category->childs()->count() > 0 ): ?>
                                <div class="cate-right" id="cate-top">
                                    <div class="info-count-pro ">
                                        <div class="count-pro">
                                            <?php echo e($category->name); ?>

                                        </div>
                                    </div>                                    
                                    <?php if(isset($category) && $category->childs()->count() > 0 ): ?>
                                        <?php if($category->id == 258 || $category->id == 259): ?>                                        
                                            <div class="cate-right-item flex-wrap relative u-flex radius-8 cate-right-top">
                                                <div class="row">
                                                    <?php $__currentLoopData = $category->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $categoryProduct = new App\Models\CategoryProduct;
                                                        $product = new App\Models\Product;
                                                        $listIdCate = $categoryProduct->getALlCategoryChildrenAndSelf($categoryChild->id);
                                                        $count = $product->whereIn('category_id', $listIdCate)->where('active', 1)->get()->count();
                                                        $link=$categoryChild->slug_full;
                                                        ?>
                                                        <div class="cate-right-item-main">
                                                            <div class="cate-right-item-box box-full u-flex">
                                                                <a href="<?php echo e($link); ?>" class=" align-items-center txt-gray-800 p-y-4 bg-gray-100 ">
                                                                    <div class="cate-right-item-img">
                                                                        <picture>
                                                                            <img alt="<?php echo e($categoryChild->name); ?>" srcset="" class="loaded" src="<?php echo e($categoryChild->icon_path?asset($categoryChild->icon_path):asset('frontend/images/noimage.jpg')); ?>" />
                                                                        </picture>
                                                                    </div>
                                                                    <div class="cate-right-item-name p-x-10 text-center">
                                                                        <span class="fs-p-16 f-w-500"><?php echo e($categoryChild->name); ?></span>
                                                                        <p class="fs-p-14"><?php echo e($count); ?> sản phẩm</p>
                                                                    </div>
                                                                </a>
                                                                <div class="cate-left-item ">
                                                                    <ul class="column-display u-flex flex-wrap">
                                                                        <?php if(isset($categoryChild) && $categoryChild->childs()->count() > 0): ?>
                                                                            <?php $__currentLoopData = $categoryChild->childs()->where('active', 1)->orderBy('order')->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="u-flex justify-between align-baseline p-t-8">
                                                                                    <h2 class="fs-p-14 f-w-400 txt-primary">
                                                                                        <a href="<?php echo e($childValue->slug_full); ?>" class="link m-r-8"><?php echo e($childValue->name); ?></a>
                                                                                    </h2>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="btn-overlay-top txt-center load-more-attr load-more-cate">
                                                        <a class="load-more-cate-btn btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500">
                                                            Xem thêm
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="row reset-row cate-right-top relative full">
                                                    <?php $__currentLoopData = $category->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-6 col-md-4 col-lg-3 col-cate-right-top">
                                                            <div class="top-item">
                                                                <a href="<?php echo e($value->slug_full); ?>">
                                                                    <div class="top-item-img">
                                                                        <picture>
                                                                            <img alt="<?php echo e($value->name); ?>" class="loaded" src="<?php echo e(asset($value->icon_path)); ?>">
                                                                        </picture>
                                                                    </div>
                                                                    <p class="tmp-item-text fs-p-14 fs-p-md-13 txt-gray-800"><?php echo e($value->name); ?></p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="btn-overlay-top txt-center load-more-attr load-more-cate">
                                                    <a class="load-more-cate-btn btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500">
                                                        Xem thêm
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16" id="hot-product">
                                        <div class="sub-nav-title m-b-12">
                                            <div class="u-flex justify-between align-items-center">
                                                <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                    <i class="fab fa-gripfire"></i>
                                                    Bán chạy nhất
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(isset($dataHot) && $dataHot): ?>
                                            <div class="sub-nav-product-list">
                                                <div class="list_feedback1 autoplay4-ban-chay category-slide-1">
                                                    <?php $__currentLoopData = $dataHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $tran=$product->translationsLanguage()->first();
                                                            $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                                                        ?>
                                                        <div class="p-r-10">
                                                            <div class="product-item">
                                                                <div class="box">
                                                                    <div class="image">
                                                                        <a href="<?php echo e($link); ?>">
                                                                            <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                                            <?php if($product->old_price && $product->price): ?>
                                                                                <span class="sale"><?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                                            <?php endif; ?>
                                                                            <?php if($product->baohanh): ?>
                                                                                <div class="km">
                                                                                    <?php echo e($product->baohanh); ?>

                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </a>
                                                                        <div class="cart">
                                                                            <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                                                <img class="lazy" src="<?php echo e(asset('images/icon_add_cart.png')); ?>" width="30" height="35"> Thêm vào giỏ
                                                                            </span>
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
                            <?php endif; ?>
                            
                            
                           <div class="info-count-pro">
                               <div class="count-pro">
                                    Sản phẩm nổi bật
                               </div>
                                <div class="orderby">
                                    <select name="orderby" id="" class="form-control field-form" form="formfill">
                                        <option value="0"><?php echo e(__('product.sap_xep_theo')); ?></option>
                                        <option value="1"><?php echo e(__('product.gia_tang_dan')); ?></option>
                                        <option value="2"><?php echo e(__('product.gia_giam_dan')); ?></option>
                                        
                                        <option value="5"><?php echo e(__('product.moi_nhat')); ?></option>
                                        <option value="6"><?php echo e(__('product.cu_nhat')); ?></option>
                                        <option value="7"><?php echo e(__('product.sp_noi_bat')); ?></option>
                                    </select>
                                </div>
                           </div>
                            <div class="cate-hightlight_fillters">
                                <div class="wrapFilterTag" style="display: none;">
                                    <p class="title-filter-result block-none">Lọc theo</p>
                                    <div class="fillter-tags u-flex align-items-center flex-wrap">
                                        <a class="link f-w-500 m-l-8 m-b-8 btn-delete">Xoá tất cả</a>
                                    </div>
                                </div>
                            </div>
                        
							<?php if($category->content): ?>
                            <div class="content-category" id="wrapSizeChange">
                                <?php echo $category->content; ?>

                            </div>
                            <?php endif; ?>
                            <?php if(isset($data)): ?>
                                <div class="wrap-list-product" id="dataProductSearch">
                                    <div class="list-product-card">
                                        <div class="row">
                                            <?php if(isset($data)&&$data): ?>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $tran=$product->translationsLanguage()->first();
                                                        $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                                                    ?>
                                                    <div class="col-product-item2 col-lg-4 col-md-6 col-sm-6 col-6">
                                                        <div class="product-item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="<?php echo e($link); ?>">
                                                                        <img src="<?php echo e($product->avatar_path != null ? asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                                        <?php if($product->old_price && $product->price): ?>
                                                                            <span class="sale">   <?php echo e(ceil(100 -($product->price)*100/($product->old_price))."%"); ?> </span>
                                                                        <?php endif; ?>

                                                                        <?php if($product->baohanh): ?>
                                                                            <div class="km">
                                                                                <?php echo e($product->baohanh); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                    
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
                                                                    <h3>
                                                                        <a href="<?php echo e($link); ?>">
                                                                           <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
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
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php if(count($data)): ?>
                                        <?php echo e($data->appends(request()->all())->onEachSide(1)->links()); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <form action="#" method="get" name="formfill" id="formfill" data-ajax="submit" class="d-none">
                <?php echo csrf_field(); ?>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('.action_show_more').showMoreItems({
        startNum: 6,
        afterNum: 5,
        original: true,
        moreText: 'Xem thêm',
        customBtnShowMore: [
            '<a class="link cs-btn">',
            '</a>'
        ],
        backMoreText: 'Thu gọn'
    });

    $(document).ready(function () {

        function search_cate() {
            var convertToAscii = function (str) {
                str = str.toLowerCase();
                str = str
                .replace(/ /g, '-')
                .replace(/Ä‘/g, 'd')
                .replace(/Ä/g, 'D')
                .replace(/-+-/g, '-')
                .replace(/ + /g, '-')
                .replace(/^\-+|\-+$/g, '')
                .replace(/^\-+|\-+$/g, '')
                .replace(/Ă¬|Ă­|á»‹|á»‰|Ä©/g, 'i')
                .replace(/á»³|Ă½|á»µ|á»·|á»¹/g, 'y')
                .replace(/ĂŒ|Ă|á»|á»ˆ|Ä¨/g, 'I')
                .replace(/á»²|Ă|á»´|á»¶|á»¸/g, 'Y')
                .replace(/Ă¨|Ă©|áº¹|áº»|áº½|Ăª|á»|áº¿|á»‡|á»ƒ|á»…/g, 'e')
                .replace(/Ă¹|Ăº|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g, 'u')
                .replace(/Ăˆ|Ă‰|áº¸|áºº|áº¼|Ă|á»€|áº¾|á»†|á»‚|á»„/g, 'E')
                .replace(/Ă™|Ă|á»¤|á»¦|Å¨|Æ¯|á»ª|á»¨|á»°|á»¬|á»®/g, 'U')
                .replace(/Ă |Ă¡|áº¡|áº£|Ă£|Ă¢|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g, 'a')
                .replace(/Ă²|Ă³|á»|á»|Ăµ|Ă´|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»|á»›|á»£|á»Ÿ|á»¡/g, 'o')
                .replace(/Ă€|Ă|áº |áº¢|Ăƒ|Ă‚|áº¦|áº¤|áº¬|áº¨|áºª|Ä‚|áº°|áº®|áº¶|áº²|áº´/g, 'A')
                .replace(/Ă’|Ă“|á»Œ|á»|Ă•|Ă”|á»’|á»|á»˜|á»”|á»–|Æ |á»œ|á»|á»¢|á»|á» /g, 'O')
                .replace(
                    /!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\:|\'| |\"|\&|\#|\[|\]|~/g,
                    ' '
                )
                .replace(
                    /!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,
                    ' '
                );
            return str; 
        };

        //input search
        var box_search = $('.js-box-search');
        box_search.each(function () {

            var $that = $(this), input_search = $that.find('.form-search-input');
            var checkbox = $that.find('.checkbox');
            var clearBtn = $that.find('.form-search-close');

            // console.log(input_search, checkbox, clearBtn);
            clearBtn.hide();

            add_token_filter(checkbox);

        input_search.off('keyup').on('keyup', function () {

            var $that = $(this), value = convertToAscii($that.val().trim());

            var data_filter = $that.closest('.js-box-search').find('.checkbox:not(".filterAll")');

            var data_all = $that.closest('.js-box-search').find('.checkbox.filterAll');

            var valueInput = input_search.val();

            let js_box_search = $that.closest('.js-box-search');


            // console.log('valueInput',valueInput);
            if (valueInput == '') {
                clearBtn.hide();
                data_all.show();
            } else {
                clearBtn.show();
                data_all.hide();
            };

            clearBtn.click(function () {
                input_search.val('');
                $(this).hide();
                data_all.show();

                data_filter.addClass('customShowMore').show();

                js_box_search.find('.link.cs-btn').remove();
                js_box_search.find('.search_action_show_more').showMoreItems({
                startNum: 4,
                afterNum: 5,
                original: true,
                moreText: 'Xem thêm',
                customBtnShowMore: [
                    '<a class="link cs-btn">',
                    '</a>'
                ],
                backMoreText: 'Thu gọn',
                searchFilter: true,
                });
                if ($(".group-checkbox .filterNormal").hasClass("checked")) {
                $(".group-checkbox .filterNormal.checked").css('display', '');
                }
            })

            data_filter.removeClass('customShowMore').hide();

            tokenFilter(data_filter, value);

            js_box_search.find('.link.cs-btn').remove();

            !js_box_search.find('.action_show_more').hasClass('search_action_show_more') && js_box_search.find('.action_show_more').addClass('search_action_show_more');

            js_box_search.find('.search_action_show_more').showMoreItems({
                startNum: 4,
                afterNum: 5,
                original: true,
                moreText: 'Xem thêm',
                customBtnShowMore: [
                '<a class="link cs-btn">',
                '</a>'
                ],
                backMoreText: 'Thu gọn',
                searchFilter: true,
            });

            if ($(".group-checkbox .filterNormal").hasClass("checked")) {    
                $(".group-checkbox .filterNormal.checked").css('display', '');
            }
            
            });
        });

        function add_token_filter(item) {
            item.each(function () {

            var $that = $(this), checkbox = $that.not('.filterAll'), input = checkbox.find('input');

            var token_filter = convertToAscii(checkbox.find('.label-text').text());

            input.attr('data-search', token_filter);

            });
        } 

        tokenFilter = function (nameFilter, searchSplit) {
            return nameFilter.filter(function () {
                var result = $(this).find('input[type="checkbox"]').attr('data-search').toLowerCase().indexOf(searchSplit) > -1;
                return result;
                }).closest('.checkbox').addClass('customShowMore').show();
            };

            $('.cate__brand--text p').addClass('fs-p-16 fs-p-md-14 txt-gray-700 js-more');
        }

        search_cate();
    });

    $(document).ready(function () {
        var btnDeleteAll = $('a.link.btn-delete');
        // count checkbox filter
        $('.filterDesk .group-checkbox').each(function(){

            let checkbox = $(this).find('.checkbox.filterNormal'),
                checkLength = checkbox.length
            ;
            // console.log('checkLength', checkLength);
            checkbox.css('order',`${checkLength}`);
        })

        //change input checkbox
        $('body').on('change', '.filterDesk .group-checkbox .checkbox.filterNormal input[type="checkbox"]', function (e) {

            let label = $(this).next('span.label-text').text();
            let dataTag = $(this).attr('data-tag');
            
            let tag = $(`span.badge[data-id="${dataTag}"]`);
            let checkboxLength = $(this).closest('.group-checkbox').find('.checkbox.filterNormal').length;

            if (this.checked) {
                $(this).closest('.checkbox').addClass('checked');
                let checked = $(this).closest('.group-checkbox').find('.checked').length;

                $(this).parent().parent().css('order',`${checkboxLength - checked}`);
                $(`input[data-tag="${dataTag}"]`).prop('checked', true);
                addTag(label, dataTag);
               
            } else {
                $(`input[data-tag="${dataTag}"]`).prop('checked', false);
                removeTag(tag);
                $(this).closest('.checkbox').removeClass('checked');
                $(this).parent().parent().css('order',`${checkboxLength}`);
            }
        });

        //delete all tag
        btnDeleteAll.click(function () {
            if($('.filterDesk .group-checkbox .checkbox.filterNormal input[type="checkbox"]').is(":checked")){
                $('.group-checkbox .checkbox.filterNormal input[type="checkbox"]').prop("checked", false);
                $('.filterDesk .group-checkbox').each(function(){
                    let checkbox = $(this).find('.checkbox.filterNormal'),
                        checkLength = checkbox.length
                    ;

                    checkbox.css('order',`${checkLength}`);
                })
            }
            removeAllTag();
            $('.wrapFilterTag').hide();
            $('#cate-top').show();
        });

        //add tag
        function addTag(title, id) {
            btnDeleteAll.before(
                `<span class="badge badge-outline-gray badge-circle badge-xs tag tag_filter" data-id="${id}">
                    ${title}
                        <i class="fa fa-times icon-sm icon-right"></i>
                </span>`
            );
            if ($('span.badge').length > 0) {
                btnDeleteAll.closest('.wrapFilterTag').attr('style', '');
            }

            $.ajax({
                type: "GET",
                url: urlRequest,
                data:data,
                beforeSend: function () {
                    $('.lc__load').show();
                },
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                        
                    }
                    $('#hot-product').remove();
                    $('#cate-top').hide();
                    $('.lc__load').hide();
                }
            });
        }

        //xoa tag item
        function removeTag($elTag) {
            let dataTag = $elTag.attr('data-id');
            var lc_filter =$('.filterDesk');
            $elTag.remove();

            lc_filter.find(`input[data-tag="${dataTag}"]`).prop('checked', false);
                checkIsCheckedCheckBox(lc_filter.find(`input[data-tag="${dataTag}"]`));

            if ($('span.badge.tag').length === 0) {
                btnDeleteAll.closest('.wrapFilterTag').attr('style', 'display: none !important');
                $('#cate-top').show();
            }

            let contentWrap = $('#dataProductSearch');
            let urlRequest = '<?php echo e(url()->current()); ?>';
            let data=$("#formfill").serialize();

            $.ajax({
                type: "GET",
                url: urlRequest,
                data:data,
                beforeSend: function () {
                    $('.lc__load').show();
                },
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                    $('.lc__load').hide();
                }
            });

        }

        //on click tag item
        $('body').on('click', '.tag_filter', function (e) {
            let dataTag = $(this).attr('data-id');

            if($('.filterDesk .group-checkbox .checkbox.filterNormal input[type="checkbox"]').is(":checked")){
                let checkboxLength =   $(`input[data-tag="${dataTag}"]`).closest('.group-checkbox').find('.checkbox.filterNormal').length;
                
                $(`input[data-tag="${dataTag}"]`).prop('checked', false);
                $(`input[data-tag="${dataTag}"]`).parent().parent().removeClass('checked');
                $(`input[data-tag="${dataTag}"]`).parent().parent().css('order',`${checkboxLength / 2}`);
        
            }
            removeTag($(this));
        });

        //xóa all tag
        function removeAllTag() {
            $('span.badge.tag_filter').each(function () {
                removeTag($(this)); 
            });
        }

        //is_checkbox
        function checkIsCheckedCheckBox(checkbox) {
            let flag = false;
            let groupCheckbox = checkbox.closest('.group-checkbox');

            groupCheckbox.find('.checkbox.filterNormal').each(function () {
                if ($(this).find('input[type="checkbox"]').is(':checked'))
                    flag = true;
            });
            if (flag === true) {
                groupCheckbox.find('.checkbox.filterAll').find('input[type="checkbox"]').prop('checked', false);
            } else {
                groupCheckbox.find('.checkbox.filterAll').find('input[type="checkbox"]').prop('checked', true);
            }
        }

        //AJAX

        $(document).on('change','.field-form',function(){
          // $( "#formfill" ).submit();
            let stt = 0;
            stt = parseInt(stt);
            $(".field-form").each(function() {
                let is_check = $(this).is(':checked');
                if(is_check){
                    stt++;
                }
            });
            if(stt>0){
                $(".wrapFilterTag").show();
            }
            else{
                $(".wrapFilterTag").hide();
            }

           let contentWrap = $('#dataProductSearch');

            let urlRequest = '<?php echo e(url()->current()); ?>';

            let data=$("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data:data,
                beforeSend: function () {
                    $('.lc__load').show();
                },
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                    $('#hot-product').remove();
                    $('#cate-top').hide();
                    $('.lc__load').hide();
                }
            });
        });

        $(document).on('click','.btn-search',function(event){
          event.preventDefault();

           let contentWrap = $('#dataProductSearch');

            let urlRequest = '<?php echo e(url()->current()); ?>';

            let data=$("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data:data,
                beforeSend: function () {
                    $('.lc__load').show();
                },
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                    $('#hot-product').remove();
                    $('#cate-top').hide();
                    $('.lc__load').hide();
                }
            });
        });

        $(document).on('submit',"[data-ajax='submit']",function(event){
          // $( "#formfill" ).submit();
          event.preventDefault();

           let contentWrap = $('#dataProductSearch');

            let urlRequest = '<?php echo e(url()->current()); ?>';

            let data=$("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data:data,
                beforeSend: function () {
                    $('.lc__load').show();
                },
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                    $('#hot-product').remove();
                    $('#cate-top').hide();
                    $('.lc__load').hide();
                }
            });
        });

        $(document).on('change','.field-change-link',function(){
          // $( "#formfill" ).submit();

           let link=$(this).val();
           if(link){
               window.location.href=link;
           }
        });
        // load ajax phaan trang
        $(document).on('click','.pagination a',function(){
            event.preventDefault();
            let contentWrap = $('#dataProductSearch');
            let href=$(this).attr('href');
            //alert(href);
            $.ajax({
                type: "Get",
                url: href,
            // data: "data",
                dataType: "JSON",
                beforeSend: function () {
                    $('.lc__load').show();
                },
                success: function (response) {
                    let html = response.html;
                    contentWrap.html(html);
                    $('.lc__load').hide();
                }
            });
        });
    });
    
</script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo5.tiemthietke.com/httpdocs/resources/views/frontend/pages/product-by-category.blade.php ENDPATH**/ ?>