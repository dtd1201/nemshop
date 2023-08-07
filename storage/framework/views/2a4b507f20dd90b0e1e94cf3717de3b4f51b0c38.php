<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .content_mucluc .box-link-paragraph ul li a.active, .content_mucluc .box-link-paragraph ul li a:hover {
        background-color: #fff;
        box-shadow: 0 0 0 1px #e4eaf1;
        border-radius: 12px;
        font-weight: 500;
        padding: 6px 16px;
    }

    .product-relate{
        background-color: #dfeed4;
        padding: 32px 0;
    }

    .product-relate .title{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .block-content-left{
        width: 100%;
    }

    .product-relate .title h2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 500;
        font-size: 20px;
        line-height: 28px;
        color: #1e293b;
        margin: 0;
    }

    .product-relate h2 i{
        width: 24px;
        height: 24px;
        margin-right: 8px;
        line-height: 24px;
        background: #22924e;
        border-radius: 100px;
        font-size: 12px;
        color: #fff;
        text-align: center;
        font-weight: 700;
    }

    .product-relate .product-item {
        transition: all .3s ease-out;
        box-shadow: none!important;
        border: 1px solid #d8e0e8;
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 12px;
    }

    .product-item .box .content h3 {
        margin-left: 0;
        font-size: 15px;
        font-weight: 500;
        text-align: left;
        text-transform: none;
        position: relative;
        line-height: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin: 5px 0;
        padding: 0 10px;
        height: 40px;
        margin-bottom: 8px;
    }

    .product-relate .product-info__price{
        color: #000;
        margin-bottom: 8px;
        font-size: 12px;
    }

    .product-relate .product-info__price span{
        font-size: 16px;
        line-height: 24px;
        color: #22924e;
        font-weight: 500;
    }

    .product-relate .product-info__price strike{
        font-size: 16px;
        line-height: 24px;
        display: block;
        color: #22924e;
    }

   .product-relate .product-item .box .content h3{
        padding: 0;
    }

    .product-relate .product-btn{
        display: flex;
        flex-wrap: wrap;
        align-items: baseline;
        justify-content: space-between;
    }

    .product-relate .product-btn button {
        cursor: pointer;
        outline: none;
        font-weight: 400;
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
        color: #333;
        background: #fff;
        border: solid 1px #696c70;
        padding: 0 20px;
        height: 32px;
        font-size: 16px;
        line-height: 16px;
        border-radius: 100px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .product-relate .product-btn a:hover {
        color: #fff;
        background: #d8e0e8;
        border: solid 1px #d8e0e8;
    }

    .product-relate .product-btn span{
        font-weight: 500;
        color: #52637a!important;
    }

    @media (max-width: 991px){
        .content_mucluc{
            position: relative;
        }
    }

    @media (max-width: 550px){
        .product-relate {
            padding: 15px 0;
        }
    }

</style>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/xzoom/xzoom.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/xzoom.min.js')); ?>"></script>
    <?php if(Session::has('msg')): ?>
    <script type="text/javascript">
        alert("<?php echo e(Session::get('msg')); ?>");
    </script>
    <?php endif; ?>
    <div class="content-wrapper">
        <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
        <?php echo $__env->make('frontend.components.breadcrumbs',[
            'breadcrumbs'=>$breadcrumbs,
            'type'=>$typeBreadcrumb,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <?php if(isset($slider)): ?>
                        
                        <?php endif; ?>
                        <div class="blog-product-detail" data-id="<?php echo e($data->id); ?>">
                   
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 block-content-left">
                                    <div class="row" >
                                        <div class="" id="dataProductSearch" style="width: 100%;">
                                            <div class="box-product-main">
                                                <div class="row" >
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        
                                                        <div class="title_sp_detail d-lg-none">
                                                            <div class="name"><?php echo e($data->name); ?></div>
                                                            <div class="pcd-rating">
                                                                <div class="pdc-title_serial txt-gray-400">
                                                                    (<span id="copy"><?php echo e($data->masp); ?></span>)
                                                                </div>
                                                                <?php if($data->comments()->count()>0): ?>
                                                                    <ul class="rating-star pro-item-start-rating">
                                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                                            <?php if($i <= $avgRating): ?>
                                                                                <i class="star-bold far fa-star"></i>
                                                                            <?php else: ?>
                                                                                <i class="far fa-star"></i>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                      
                                                                        <li class="txt-gray">
                                                                            <a class="link scroll-to-review">
                                                                                <span class="total-reviews"><?php echo e($countRating); ?></span> Đánh giá
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="box-image-product">
                                                            <div id="img_<?php echo e($data->id); ?>" class="image-main active">
                                                                <a class="hrefImg" href="<?php echo e(asset($data->avatar_path)); ?>" data-lightbox="image">
                                                                    <i class="fas fa-expand-alt"></i>
                                                                    <img class="expandedImg" src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                                </a>
                                                                <?php if($data->images()->count()): ?>
                                                                <div class="list-small-image">
                                                                    <div class="pt-box autoplay5-product-detail-new">
                                                                        <div class="small-image column">
                                                                            <img src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e(asset($data->name)); ?>">
                                                                        </div>
                                                                        <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="small-image column" data-id_option="<?php echo e($image->id); ?>">
                                                                            <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                                        </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php if($data->options()->count()): ?>
                                                                <?php $__currentLoopData = $data->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div id="img_<?php echo e($item->id); ?>" class="image-main">
                                                                    <a class="hrefImg" href="<?php echo e(asset($item->avatar_type)); ?>" data-lightbox="image">
                                                                        <i class="fas fa-expand-alt"></i>
                                                                        <img class="expandedImg" src="<?php echo e(asset($item->avatar_type)); ?>" alt="<?php echo e($data->name); ?>">
                                                                    </a>
                                                                    <?php if($item->images()->count()): ?>
                                                                    <div class="list-small-image">
                                                                        <div class="pt-box autoplay5-product-detail-new">
                                                                            <div class="small-image column">
                                                                                <img src="<?php echo e(asset($item->avatar_type)); ?>" alt="<?php echo e(asset($data->name)); ?>">
                                                                            </div>
                                                                            <?php $__currentLoopData = $item->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="small-image column" data-id_option="<?php echo e($image->id); ?>">
                                                                                <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                                            </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
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

                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 product-detail-infor">
                                                        <div class="box-infor">
                                                            
                                                            <div class="title_sp_detail d-lg-block d-none">
                                                                <h1 class="name"><?php echo e($data->name); ?></h1>
                                                                <div class="pcd-rating">
                                                                    <div class="pdc-title_serial txt-gray-400">
                                                                        (<span id="copy"><?php echo e($data->masp); ?></span>)
                                                                    </div>
                                                                    <?php if($data->comments()->count()>0): ?>
                                                                        <ul class="rating-star pro-item-start-rating">
                                                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                                                <?php if($i <= $avgRating): ?>
                                                                                    <i class="star-bold far fa-star"></i>
                                                                                <?php else: ?>
                                                                                    <i class="far fa-star"></i>
                                                                                <?php endif; ?>
                                                                            <?php endfor; ?>
                                                                          
                                                                            <li class="txt-gray">
                                                                                <a class="link scroll-to-review">
                                                                                    <span class="total-reviews"><?php echo e($countRating); ?></span> Đánh giá
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="detail-line"></div>
                                                            <div class="pcd-price">
                                                                <?php if($data->old_price>0): ?>
                                                                <strike class="detailPrice">
                                                                    <?php echo e(number_format($data->old_price)); ?>đ
                                                                </strike>
                                                                <?php endif; ?>

                                                                <?php if($data->price): ?>
                                                                <span class="detailFinalPrice">
                                                                    <?php echo e(number_format($data->price)); ?>đ
                                                                </span>
                                                                
                                                                    <?php if($data->size): ?>
                                                                    <span class="unit"><?php echo e('/'.$data->size); ?></span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                <span class="detailFinalPrice">
                                                                    Liên hệ
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="detail_category">
                                                                Danh mục: <a href="<?php echo e($data->category->slug_full); ?>"><?php echo e($data->category->name); ?></a>
                                                            </div>
                                                            <div class="info-desc">
                                                                <div class="col_2_desc">
                                                                    <div class="desc">
                                                                        <?php echo $data->description; ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if($data->content3 != null): ?>
                                                            <div class="quatang">
                                                                <div class="title">
                                                                    Quà tặng khi mua sản phẩm
                                                                </div>
                                                                <div class="box_quatang">
                                                                    <?php echo $data->content3; ?>

                                                                </div>
                                                            </div>
                                                            <?php endif; ?>

                                                            
                                                            <div class="wrap-price">
                                                                    <div class="attr-item" style="display: inline-block;">
                                                                        <div class="form-group">
                                                                            <label for=""><?php echo e(__('product.so_luong')); ?></label>
                                                                            <div class="wrap-add-cart" id="product_add_to_cart">
                                                                                <div class="box-add-cart">
                                                                                    <div class="pro_mun">
                                                                                        <a class="cart_qty_reduce cart_reduce">
                                                                                            <span class="iconfont icon fas fa-minus" aria-hidden="true"></span>
                                                                                        </a>
                                                                                        <input type="text" value="1" class="optionChange" name="cart_quantity" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" maxlength="5" min="1" id="cart_quantity" disabled="disabled">
                                                                                        <a class="cart_qty_add">
                                                                                            <span class="iconfont icon fas fa-plus" aria-hidden="true"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                              
                                                            <div class="single_variation_wrap">
                                                                <?php if(isset($data->price) && $data->price > 0): ?>
                                                                    <button type="submit" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $data->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>" class="add-to-cart single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">Chọn mua</button>
                                                                <?php else: ?>
                                                                    <button data-toggle="modal" data-target="#modal-add-cart" class="single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">Chọn mua</button>
                                                                <?php endif; ?>
                                                                <a class="find_address" href="<?php echo e(route('home.drugStore')); ?>">
                                                                    Tìm nhà thuốc
                                                                </a>
                                                            </div>

                                                            <?php if(isset($camket) && $camket): ?>
                                                                <div class="pdc-feature">
                                                                    <div class="pdc-feature_top">
                                                                        <div class="pdc-feature_top--head">
                                                                            <?php echo e($camket->name); ?>

                                                                        </div>
                                                                        <div class="pdc-feature_top--content">
                                                                            <?php if($camket->childs()->count() > 0): ?>
                                                                                <?php $__currentLoopData = $camket->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <div class="feature-item">
                                                                                        <div class="icon">
                                                                                            <img src="<?php echo e(asset($value->image_path)); ?>" alt="<?php echo e($value->name); ?>">
                                                                                        </div>
                                                                                        
                                                                                        <div class="item-text">
                                                                                            <p><?php echo e($value->name); ?></p>
                                                                                            <p><?php echo e($value->value); ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            <?php endif; ?>
                                                            

                                                            

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="modal fade modal-First" id="modal-add-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content"  image="">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            </button>
                                                            <div class="image-modal">
                                                                <div class="info_product_modal">
                                                                    <div class="title">
                                                                        <?php echo e($data->name); ?>

                                                                    </div>
                                                                    <div class="image">
                                                                        <img src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e($data->name); ?>">
                                                                    </div>
                                                                    <div class="list-attr">
                                                                        <div class="attr-item">
                                                                            <div class="price">
                                                                                <?php if($data->price): ?>
                                                                                    <?php if($data->price_after_sale): ?>
                                                                                        <span id="priceChange">Giá: <?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi">đ</span></span>
                                                                                    <?php endif; ?>
                                                                                    <?php if($data->sale>0): ?>
                                                                                        <span class="title_giacu">Giá cũ: </span>
                                                                                        <span class="old-price"><?php echo e(number_format($data->price)); ?> <?php echo e($unit); ?></span>
                
                                                                                        <div class="tiet_kiem">
                                                                                            <div class="g2">(Tiết kiệm: <b><?php echo e(number_format(
                                                                                                ($data->price - $data->price_after_sale))); ?></b>)</div>
                                                                                            <div class="tk">
                                                                                                <b>-<?php echo e($data->sale); ?>%</b>
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
                                                                        <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="<?php echo e($data->name); ?>" required>
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

                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
              
                        </div>
                    
                </div>
            </div>

            <div class="info_detail">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 col-12">
                                    <div class="content_mucluc">
                                        <?php $__currentLoopData = config('paragraph.posts.type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeParagraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->paragraphs()->where([['type', $typeKey], ['active', 1]])->count() > 0): ?>
                                                <div class="title_mucluc">
                                                    <i class="fas fa-list"></i>
                                                    <span>THÔNG TIN SẢN PHẨM</span>
                                                </div>
                                                <div class="box-link-paragraph">
                                                    <ul>
                                                        <?php echo $__env->make('frontend.components.paragraph',['typeKey'=>$typeKey,'data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-sm-12 col-12">
                                    <div class="content">
                                        <?php echo $data->content; ?>

                                        <?php $__currentLoopData = config('paragraph.posts.type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeParagraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->paragraphs()->where([['type', $typeKey], ['active', 1]])->count() > 0): ?>
                                                <div class="list-content-paragraph">
                                                    <?php echo $__env->make('frontend.components.paragraph-content',['typeKey'=>$typeKey,'data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="btn-overlay-top txt-center load-more-attr load-more-cate">
                                        <a class="load-more-cate-btn2 btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500">
                                            Xem thêm
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			

            <div class="block-comment">
				
                        <div class="col-sm-12 col-12 mt-4">
                            <div class="ls-comments">
                                <div class="row">
                                    <?php if(!empty($data->questions) && count($data->questions) > 0): ?>
                                        <div class="col-sm-12 col-12 mt-4">
                                            <div class="single-start">
                                                <div class="container">
                                                    <div class="single-start-title">
                                                        Câu hỏi thường gặp
                                                    </div>
                                                    <div class="single-start-top fleft txt-left p-3">
                                                        <div class="accordion">
                                                            <div class="row">
                                                                <?php $__currentLoopData = $data->questions()->where('active', 1)->orderBy('order')->orderBy('id', 'desc')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-md-12 col-sm-12 col-12">
                                                                        <div class="accordion-header" id="headingSix<?php echo e($item->id); ?>">
                                                                            <button class="accordion-button plain collapsed lb-toggle" type="button" data-toggle="collapse" data-target="#collapseSix<?php echo e($item->id); ?>" aria-expanded="false" aria-controls="collapseSix<?php echo e($item->id); ?>">
                                                                               <span class="item-vote-user"><i class="fa fa-question-circle"></i><?php echo e($item->name); ?></span> 
                                                                               <?php if($loop->first): ?> 
                                                                                    <i class="fa fa-angle-up"></i>
                                                                               <?php else: ?>
                                                                                    <i class="fa fa-angle-down"></i>
                                                                               <?php endif; ?>
                                                                            </button>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <div id="collapseSix<?php echo e($item->id); ?>" class="accordion-collapse collapse <?php if($loop->first): ?> show <?php endif; ?>" aria-labelledby="headingSix<?php echo e($item->id); ?>" data-bs-parent="#accordionExample<?php echo e($item->id); ?>" style="">
                                                                                <div class="accordion-body">
                                                                                    <?php echo $item->value; ?>

                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cboth"></div>
                                                </div>
                                
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <div class="single-start">
                    <div class="container">
                        <div class="single-start-title">
                            Bình luận
                        </div>
                        <div class="single-start-top ls-comment">
                            <div class="form-comment">
                                <div class="form-group">
                                    <textarea id="contentComment" name="contentComment" rows="4" cols="5" placeholder="Nhập nội dung câu hỏi (Vui lòng gõ tiếng Việt có dấu)…" class="form-control cps-textarea comment_content "></textarea>
                                </div>
                                
                                <div class="lc-reply-button">
                                    <div class="btn btn-md btn-primary txt-red btn-modal-create-comment show-modal-create-comment" id="openModalCreateComment" data-target="#modal-comment" data-type="1">
                                        GỬI BÌNH LUẬN
                                    </div>
                                  </div>
                                  
                            </div>
                            <div class="error-comment">
                                <div class="alert alert-md alert-danger alert-des" id="errorContentComment" style="display: none;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Mời bạn viết bình luận. (Tối thiểu 3 ký tự)</span>
                                </div>
                            </div>
                            
                        </div>

                        <div class="single-start-bottom">
                            <form action="">
                                <?php echo csrf_field(); ?>
                                <div class="block-item-content" id="comments">
                                    
                                </div>
                                <!--load-more item-vote -->
                                    <div class="container-btn-show-all" id="lcViewMoreCm">
                                        <input type="hidden" value="1" id="pageComment">
                                        <input type="hidden" value="" id="countLoadMoreCm">
                                        <a href="javascript:void(0)" class="load-more-cate-btn2 btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500" id="loadMoreComments">
                                            Xem thêm bình luận
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                    </div>
                                <!-- end load-more item-vote -->
                            </form>
                        </div>
                        <div class="cboth"></div>
                    </div>
    
                </div>
            </div>

            <div class="block-star">
                <div class="single-start">
                    <div class="container">
                        <div class="single-start-title">
                            Đánh giá &amp; nhận xét 
                        </div>
                        <div class="single-start-top">
                            <div class="single-start-top-right">
                                <p class="rating-average" id="avgRating"><?php echo e(!empty($avgRating) ? $avgRating : -5); ?>/5</p>
                                <div class="pro-item-start-rating">
                                    <i class="star-bold far fa-star"></i>
                                    <i class="star-bold far fa-star"></i>
                                    <i class="star-bold far fa-star"></i>
                                    <i class="star-bold far fa-star"></i>
                                    <i class="star-bold far fa-star"></i>
                                </div>
                                <div class="single-start-top-total"><strong id="countRating"><?php echo e($countRating); ?></strong> đánh giá &amp; nhận xét</div>
                            </div>
                            <div class="single-start-top-left">
                                <p class="single-vote-sub-title">Bạn đánh giá sao sản phẩm này?</p>
                                <a class="single-vote-btn btn-modal-create-comment" data-toggle="modal" data-target="#modal-danh-gia" data-type="2">Đánh giá ngay</a>
                            </div>
                            <div class="cboth"></div>
                        </div>
                        <div class="single-start-bottom">
                            <form action="">
                                <?php echo csrf_field(); ?>
                                <div class="block-item-review" id="reviews">
                                    
                                </div>
                                <!--load-more item-vote -->
                                    <div class="container-btn-show-all" id="lcViewMoreRv">
                                        <input type="hidden" value="1" id="pageReview">
                                        <input type="hidden" value="" id="countLoadMoreRv">
                                        <a href="javascript:void(0)" class="load-more-cate-btn2 btn btn-sm btn-rounded btn-outline-gray btn-icon btn-icon-right f-w-500" id="loadMoreReviews">
                                            Xem thêm đánh giá
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                    </div>
                                <!-- end load-more item-vote -->
                            </form>
                        </div>
                        <div class="cboth"></div>
                    </div>
                    <!--end container-->
                </div>
            </div>

            <?php if(isset($dataRelate)): ?>
                <?php if($dataRelate->count()): ?>
                    <div class="product-relate">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="title">
                                        <h2>
                                            <i class="far fa-star"></i>
                                            <?php echo e(__('product.san_pham_lien_quan')); ?>

                                        </h2>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-12">
                                    <div class="row">
                                        <div class="list-product-card autoplay6-spkhac category-slide-1" style="width:100%;">
                                            <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $tran=$product->translationsLanguage()->first();
                                                    $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                                                ?>
                                                <div class="col-product-item">
                                                    <div class="product-item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e($link); ?>">
                                                                    <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>">
                                                                    <?php if($product->old_price && $product->price): ?>
                                                                        <span class="sale">   <?php echo e(ceil(100 -($product->price)*100/($product->old_price))." %"); ?> </span>
                                                                    <?php endif; ?>

                                                                    <?php if($product->baohanh): ?>
                                                                        <div class="km">
                                                                            <?php echo e($product->baohanh); ?>

                                                                        </div>
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            

                                                            <div class="content">
                                                                <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
                                                                <div class="product-info__price">
                                                                    <?php if($product->price): ?>
                                                                    <span class=""><?php echo e(number_format($product->price)); ?>đ</span>
                                                                        <?php if($product->size): ?>
                                                                        <?php echo e('/ '.$product->size); ?>

                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                    <span class="">Liên hệ</span>
                                                                    <?php endif; ?>
                                                                    <?php if($product->old_price>0): ?>
                                                                    <strike class=""><?php echo e(number_format($product->old_price)); ?>đ</strike>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php if(isset($product->price) && $product->price > 0): ?>  
                                                                    <div class="product-btn">
                                                                        <button type="submit" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>" class="add-to-cart single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">Chọn mua</button>
                                                                    </div>
                                                                <?php endif; ?>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal send commnet-->
    <div class="dklt modal fade modal-First" id="modal-comment" tabindex="-1"
	 aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
	<div class="bg-overlay"></div>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title single-start-title">Thông Tin Người Gửi</div>
                  <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body txt-center">
                    <div class="form-info">
                        <div class="row">
                            <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>" id="productId">
                            <input type="hidden" name="type_comment" value="1" id="type_comment">
                            <div class="col-12">
                                <div class="u-flex flex-wrap no-gutters check-form-create-comment">
                                    <div class="radio radio-sm danh-xung-comment">
                                        <label class="d-flex align-items-center">
                                            <input type="radio" name="danhXungComment" value="1">
                                            Anh
                                        </label>
                                    </div>
                                    <div class="radio radio-sm danh-xung-comment" data-id="2">
                                        <label class="d-flex align-items-center">
                                            <input type="radio" name="danhXungComment" value="2">
                                            Chị
                                        </label>
                                    </div>
                                </div>
                                <div class="form-err txt-left" id="errorDanhXungComment" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Thông tin bắt buộc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nameComment" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameComment" maxlength="50">
                                </div>
                                <div class="form-err txt-left" id="errorNameComment" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Thông tin bắt buộc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="tel" maxlength="10" name="phoneComment" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneComment">
                                </div>
                                <div class="form-err txt-left" id="errorPhoneComment" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="email" name="emailComment" id="emailComment" class="form-control" placeholder="Nhập email (Không bắt buộc)">
                                </div>
                                <div class="form-err txt-left email-error" id="errorEmailComment" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Email không hợp lệ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="sendComment" data-url="<?php echo e(route('product.create.comment')); ?>" class="button_plus txt-red">
                        Gửi bình luận
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal danh gia-->
    <div class="dklt modal fade modal-First" id="modal-danh-gia" tabindex="-1"
	 aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
	<div class="bg-overlay"></div>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title single-start-title">Đánh giá &amp; nhận xét</div>
                  <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body txt-center">
                    <div class="form-info">
                        <div class="row">
                            <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>" id="productId">
                            <div class="col-12">
                                <div class="u-flex flex-wrap no-gutters check-form-create-review">
                                    <div class="radio radio-sm danh-xung-review">
                                        <label class="d-flex align-items-center">
                                            <input type="radio" name="danhXungReview" value="1">
                                            Anh
                                        </label>
                                    </div>
                                    <div class="radio radio-sm danh-xung-review" data-id="2">
                                        <label class="d-flex align-items-center">
                                            <input type="radio" name="danhXungReview" value="2">
                                            Chị
                                        </label>
                                    </div>
                                </div>
                                <div class="form-err txt-left" id="errorDanhXungReview" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                         
                                        <span class="">Thông tin bắt buộc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nameReview" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameReview" maxlength="50">
                                </div>
                                <div class="form-err txt-left" id="errorNameReview" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Thông tin bắt buộc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="tel" maxlength="10" name="phoneReview" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneReview">
                                </div>
                                <div class="form-err txt-left" id="errorPhoneReview" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="email" name="emailReview" id="emailReview" class="form-control" placeholder="Nhập email (Không bắt buộc)">
                                </div>
                                <div class="form-err txt-left email-error" id="errorEmailReview" style="display: none;">
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                         <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Email không hợp lệ</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group m-t-12">
                                    <textarea id="contentReview" name="contentReview" class="form-control" rows="3" placeholder="Nhập nội dung đánh giá (Vui lòng gõ tiếng Việt có dấu)…"></textarea>
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md txt-left p-t-10" id="errorContentReview" style="display: none;">
                                        <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Mời bạn viết bình luận. (Tối thiểu 3 ký tự)</span>
                                    </div>
                                </div>
                                <div class="lc__reviews-rating txt-center m-t-16">
                                    <p class="fs-p-18 txt-gray-700 f-w-500 m-b-8 fs-p-md-16">
                                        Bạn chấm sản phẩm này bao nhiêu sao?
                                    </p>
                                    <div class="u-flex align-items-center justify-center relative">
                                        <ul class="lc__rating-star row no-gutters justify-center align-center m-b-4 js-rating create-rating">
                                            <li class="m-r-8" data-num="1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="m-r-8" data-num="2">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="m-r-8" data-num="3">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="m-r-8" data-num="4">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="m-r-8" data-num="5">
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                        <span class="messrating fs-p-16 txt-gray-700" id="messrating"></span>
                                    </div>
                                    <div class="alert alert-md alert-danger alert-des alert-sm-md m-t-16 m-t-md-0 error-star" style="display: none;">
                                        <i class="fas fa-minus alert-ic bg-danger"></i>
                                        <span class="">Vui lòng đánh giá của bạn về sản phẩm này</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="sendReview" data-url="<?php echo e(route('product.create.comment')); ?>" class="button_plus txt-red">
                        Gửi đánh giá
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal replay commnet-->
    <div class="dklt modal fade modal-First" id="modalReplyComment" tabindex="-1"
	 aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
	    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-title single-start-title">Trả Lời “<span id="replyNameComment" class="f-w-500"></span>”</div>
            <input type="hidden" id="replyIdComment">
            <input type="hidden" id="replyTypeComment">
            <div class="modal-body txt-center txt-gray-700 p-t-0 p-x-md-16">
                <div class="form-info">
                    <div class="row">
                        <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>" id="productId">
                        <input type="hidden" name="type_comment" value="1" id="type_comment">
                        <div class="col-12">
                            <div class="u-flex flex-wrap no-gutters check-form-reply-comment">
                                <div class="radio radio-sm danh-xung-reply-comment">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungReplyComment" value="1">
                                        Anh
                                    </label>
                                </div>
                                <div class="radio radio-sm danh-xung-comment" data-id="2">
                                    <label class="d-flex align-items-center">
                                        <input type="radio" name="danhXungReplyComment" value="2">
                                        Chị
                                    </label>
                                </div>
                            </div>
                            <div class="form-err txt-left" id="errorDanhXungReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="nameReplyComment" class="form-control radius-8-mb" placeholder="Nhập họ và tên" id="nameReplyComment" maxlength="50">
                            </div>
                            <div class="form-err txt-left" id="errorNameReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="tel" maxlength="10" name="phoneReplyComment" class="form-control radius-8-mb" placeholder="Nhập số điện thoại" id="phoneReplyComment">
                            </div>
                            <div class="form-err txt-left" id="errorPhoneReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md ">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="text-phone-error-comment">Thông tin bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" name="emailReplyComment" id="emailReplyComment" class="form-control" placeholder="Nhập email (Không bắt buộc)">
                            </div>
                            <div class="form-err txt-left email-error" id="errorEmailReplyComment" style="display: none;">
                                <div class="alert alert-md alert-danger alert-des alert-sm-md " style="display: inline;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Email không hợp lệ</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group m-t-12">
                                <textarea id="contentReplyComment" name="contentReplyComment" class="form-control" rows="3" placeholder="Nhập nội dung câu hỏi (Vui lòng gõ tiếng Việt có dấu)…"></textarea>
                                <div class="alert alert-md alert-danger alert-des alert-sm-md txt-left p-t-10" id="errorContentReplyComment" style="display: none;">
                                    <i class="fas fa-minus alert-ic bg-danger"></i>
                                    <span class="">Mời bạn viết bình luận. (Tối thiểu 3 ký tự)</span>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
            <div class="modal-footer">
                <button id="sendReplyComment" data-url="<?php echo e(route('product.create.comment')); ?>" class="button_plus txt-red">
                    GỬI NGAY
                </button>
            </div>
		</div>
        </div>
    </div>

<div id="modal_ajax">

</div>



    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/setup.js')); ?>"></script>
    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    
    <script type="text/javascript">
        // js  show childs category Ä‘á»‡ quy
            $(document).on('click', '.lb-toggle', function() {
                $('.accordion-button').removeClass('plain ');
                $(this).toggleClass('active ');
                $(this).find('i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
            });
        // end js  show childs category Ä‘á»‡ quy

        $(document).ready(function() {
            $('.autoplay1').slick({
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                speed: 300,
                autoplaySpeed: 3000,
            });
            // $('.column').click(function() {
            //     var src = $(this).find('img').attr('src');
            //     $(".hrefImg").attr("href", src);
            //     $("#expandedImg").attr("src", src);
            // });
            $('.column').click(function() {
                var src = $(this).find('img').attr('src');
                let parent = $(this).parents('.image-main');
                parent.find(".hrefImg").attr("href", src);
                parent.find(".expandedImg").attr("src", src);
            });
            $('.slide_small').slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });


            $(document).on('click','.tab-link ul li a',function(){
                    $('.tab-link ul li a').removeClass('active');
                    $(this).addClass('active');
            });

            $('.autoplay5-product-detail-new').slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 3000,
                responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 551,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 425,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
       
                        }
                    }
                ]
            });

            //tạm đóng lại do không dùng đến
            if(0){
                $(document).on('change','.field-form',function(){
              // $( "#formfill" ).submit();
    
                    let contentWrap = $('#dataProductSearch');
    
                    let urlRequest = '<?php echo e(makeLinkById('category_products',$data->category->id)); ?>';
                    let data=$("#formfill").serialize();
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        data:data,
                        success: function(data) {
                            if (data.code == 200) {
                                let html = data.html;
                                contentWrap.html(html);
                            }
                        }
                    });
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
                        success: function (response) {
                            let html = response.html;
    
                            contentWrap.html(html);
                        }
                    });
                });
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var boxnumber = $('.box-add-cart input').val();
            parseInt(boxnumber);
            $('.cart_qty_add').click(function() {
                if ($(this).parent().parent().find('input').val() < 50) {
                    var a = $(this).parent().parent().find('input').val(+$(this).parent().parent().find(
                        'input').val() + 1);

                        console.log('+');

                        //  let url = $('#addCart').data('start');
                        //  url += "?quantity=" + $('#cart_quantity').val();
                        //  $('#addCart').attr('data-url',url);

                        //  let url2 = $('#buyCart').attr('href');
                        //  url2 += "?quantity=" + $('#cart_quantity').val();
                        //  $('#buyCart').attr('href',url2);
                        $(".optionChange").trigger('change');
                }
            });

            $('.cart_qty_reduce').click(function() {
                if ($(this).parent().parent().find('input').val() > 1) {
                    if ($(this).parent().parent().find('input').val() > 1) $(this).parent().parent().find(
                        'input').val(+$(this).parent().parent().find('input').val() - 1);

                        console.log('-');

                        //   let url = $('#addCart').data('start');
                        //  url += "?quantity=" + $('#cart_quantity').val();

                        //  $('#addCart').attr('data-url',url);

                        //  let url2 = $('#buyCart').attr('href');
                        //  url2 += "?quantity=" + $('#cart_quantity').val();
                        //  $('#buyCart').attr('href',url2);
                        $(".optionChange").trigger('change');
                }
            });
            

            $(document).on('change','#cart_quantity',function(){
                if ($(this).parent().parent().find('input').val() > 1) {
                    var a = $(this).val();
                       $(".optionChange").trigger('click');
                    // let url = $('#addCart').data('start');
                    // url += "?quantity=" + $('#cart_quantity').val();
                    // $('#addCart').attr('data-url',url);
                    
                    // let url2 = $('#buyCart').attr('href');
                    //      url2 += "?quantity=" + $('#cart_quantity').val();
                    //      $('#buyCart').attr('href',url2);
                }
            });

            //Add Cart Pro 
            // $(document).on('change','.optionChange',function(){
            //     // let val= ($(this).val());
            //     let val= $('input[name=size]:checked').val() ?? $(this).val();
            //     let arrPriceAndId = val.split("-").map(function(value,index){
            //         return parseInt(value);
            //     });
            //     //Giá cũ
            //     let old_price = $(this).data('old_price');
            //     let name_option = $(this).data('tooltop-title');
            //     let arrPriceAndId2 = old_price.split("-").map(function(value2,index){
            //         return parseInt(value2);
            //     });
 
            //     var nf = Intl.NumberFormat();

            //     let text= 'Liên hệ';
            //     let text2= '';
            //     let url = $('#addCart').data('start');
            //     url += "?quantity=" + $('#cart_quantity').val();
            //     if(arrPriceAndId[1]){
            //         url += "&option=" + arrPriceAndId[1];
            //     }

            //     if(arrPriceAndId[0]>0){
            //         let price= nf.format(arrPriceAndId[0]);
            //         text=price+' /' + name_option;
            //     }
            //     if(arrPriceAndId2[0]>0){
            //         let price2= nf.format(arrPriceAndId2[0]);
            //         // text2=price2+' <span>₫</span>';
            //         text2=price2+' /' + name_option;
            //     }

            //     console.log('url', url);
            //     $('#addCart').attr('data-url',url);
            //     $('#priceChange').html(text);
            //     $('#name_option').html(name_option);
            //     $('#old_priceChange').html(text2);
            // });

            
            $(document).on('change ','.optionChange',function(){
                let val= ($(this).val()) ;
                let arrPriceAndId = val.split("-").map(function(value,index){
                    return parseInt(value);
                });
 
                var nf = Intl.NumberFormat();

                let text= 'Liên hệ';
                let url = $('#addCart').data('start');
                url += "?quantity=" + $('#cart_quantity').val();
                if(arrPriceAndId[1]){
                    url += "&option=" + arrPriceAndId[1];
                }
                if(arrPriceAndId[0]>0){
                    let price= nf.format(arrPriceAndId[0]);
                    text=price+'<span class="donvi"> <?php echo e($unit); ?></span>';
                }
                $('#addCart').attr('data-url',url);
                $('#priceChange').html(text);
            });

            

            
        });

        $(function () {
            let width;
            width = $(window).width();
            
            if (width>991) {
                (function () {
                    var inc = 0;
                    $('.name-p').each(function () {
                        $(this).attr('data-scsp', "data" + inc)
                        inc++;
                    });
                })();
                (function () {
                    var inc = 0;
                    $('.scrollLink').each(function (ev) {
                        $(this).attr('data-scsp', "data" + inc)
                        inc++;
                    });
                })();

                $(window).on("load scroll", function () {
                    var windowScroll = $(this).scrollTop();
                    $(".name-p").each(function () {
                        var thisOffsetTop = Math.round($(this).offset().top - 30);

                        if (windowScroll >= thisOffsetTop) {
                            var thisAttr = $(this).attr('data-scsp');
                            $('.scrollLink').removeClass("active");
                            $('.scrollLink[data-scsp="' + thisAttr + '"]').addClass("active");
                        }
                    });
                });
            }

            $(window).resize(function() {
                width = $(window).width();
                if (width>991) {
                    (function () {
                        var inc = 0;
                        $('.name-p').each(function () {
                            $(this).attr('data-scsp', "data" + inc)
                            inc++;
                        });
                    })();
                    (function () {
                        var inc = 0;
                        $('.scrollLink').each(function (ev) {
                            $(this).attr('data-scsp', "data" + inc)
                            inc++;
                        });
                    })();

                    $(window).on("load scroll", function () {
                        var windowScroll = $(this).scrollTop();
                        $(".name-p").each(function () {
                            var thisOffsetTop = Math.round($(this).offset().top - 30);

                            if (windowScroll >= thisOffsetTop) {
                                var thisAttr = $(this).attr('data-scsp');
                                $('.scrollLink').removeClass("active");
                                $('.scrollLink[data-scsp="' + thisAttr + '"]').addClass("active");
                            }
                        });
                    });
                }
            });
        });
    </script>

    <script>
        $(function(){
            //get id product
            let idProduct = $('.blog-product-detail').attr('data-id');

            let products = localStorage.getItem("products");

            if(!products){
                arrayProduct = new Array();
                arrayProduct.push(idProduct);

                localStorage.setItem('products', JSON.stringify(arrayProduct));
            }else{
                //chuyen ve arr
                products = $.parseJSON(products);

                if(products.indexOf(idProduct) == -1){

                    products.push(idProduct);
                    localStorage.setItem('products', JSON.stringify(products));
                }   
            }
            // console.log(products);
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>