<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/xzoom/xzoom.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/xzoom.min.js')); ?>"></script>
    <?php if(Session::has('msg')): ?>
    <script type="text/javascript">
        alert("<?php echo e(Session::get('msg')); ?>");
    </script>
    <?php endif; ?>
    <style>
        @media(min-width:1500px){
            .container-fluid{
                padding-left:100px;
                padding-right:100px;
            }
        }
        @media(max-width:1200px){
            .container-fluid{
                padding-left:32px;
                padding-right:32px;
            }
        }
    </style>
    <div class="content-wrapper">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                        <?php echo $__env->make('frontend.components.breadcrumbs',[
                            'breadcrumbs'=>$breadcrumbs,
                            'type'=>$typeBreadcrumb,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if(isset($slider)): ?>
                            <div class="slide-product-detail">
                                <div class="slider-product-detail faded-detail">
                                    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="slider-product-detail-item">
                                        <div class="slider-item-image">
                                            <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="blog-product-detail">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 block-content-left">
                                        <div class="row" >
                                            <div class="" id="dataProductSearch">
                                                <div class="box-product-main">
                                                    <div class="row" >
                                                        <div class="col-md-6 col-sm-12 col-12">
                                                            
                                                                

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
                                                                        <i class="mli-phone"></i> <b>GỌI MUA HÀNG</b> <br>
                                                                        <span style="color: #c0392b; font-weight: bold;"><a style="color: #c0392b;" href="tel:0869889086">086.9889.086</a> - <a style="color: #c0392b;" href="tel:0398878586">0398.87.85.86</a></span>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-12 product-detail-infor">
                                                            <div class="box-infor">
                                                                
                                                                <div class="title_sp_detail">
                                                                    <h1><?php echo e($data->name); ?></h1>
                                                                </div>  
                                                                
                                                                <div class="list-attr">
                                                                    <div class="attr-item">
                                                                        <div class="price">
                                                                            <?php if($data->price): ?>
                                                                                <?php if($data->price): ?>
                                                                                    <span id="priceChange"><?php echo e(number_format($data->price)); ?> <span class="donvi"><?php echo e($unit); ?></span></span>
                                                                                <?php endif; ?>

                                                                                <?php if($data->old_price>0): ?>
                                                                                    <span class="title_giacu"><?php echo e(__('product.gia_cu')); ?>: </span>
                                                                                    <span id="old_priceChange" class="old-price"><?php echo e(number_format($data->old_price)); ?> <?php echo e($unit); ?></span>
                                                                                <?php endif; ?>                                   
                                                                            <?php else: ?>
                                                                            <?php echo e(__('product.gia')); ?>: <?php echo e(__('home.lien_he')); ?>

                                                                            <?php endif; ?>                                                         
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                                                <?php if( $data->model ): ?>
                                                                <div class="status"><i class="far fa-check-square"></i> <?php echo e(__('product.brand')); ?>:
                                                                <span> <strong><?php echo e($data->model); ?></strong> </span>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php if( $data->tinhtrang ): ?>
                                                                <div class="status"><i class="far fa-check-square"></i> <?php echo e(__('product.status')); ?>:
                                                                    <span> <strong><?php echo e($data->tinhtrang); ?></strong> </span>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php $__currentLoopData = $data->attributes()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="status">
                                                                    <strong><i class="far fa-check-square"></i> <?php echo e(optional($item->parent)->name); ?>: </strong>
                                                                <span> <?php echo e($item->name); ?> </span>
                                                                </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $data->xuatsu ): ?>
                                                                <div class="status">
                                                                    <strong><i class="far fa-check-square"></i> Phụ kiện kèm theo: </strong>
                                                                    <span> <?php echo e($data->xuatsu); ?> </span>
                                                                </div>
                                                                <?php endif; ?>
                                                                <div class="info-desc">
                                                                    <div class="col_2_desc">
                                                                        <div class="desc">
                                                                            <?php echo $data->description; ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col_2_desc">
                                                                        <div class="desc">
                                                                            <?php echo $data->content4; ?>

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
                                                                                            <input type="text" value="1" class="" name="cart_quantity" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" maxlength="5" min="1" id="cart_quantity" disabled="disabled">
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

                                                                <style>

                                                                    .gtt-variation-radios {
                                                                        display: flex;
                                                                        flex-wrap: wrap;
                                                                    }
                                                                    .gtt-variation-radios input[type="radio"] {
                                                                        display: none;
                                                                    }
                                                                    .gtt-variation-radios label {
                                                                        height: 30px;
                                                                        border: 1px solid #d7d7d7;
                                                                        line-height: 30px;
                                                                        padding: 0 10px;
                                                                        margin-right: 10px;
                                                                        margin-bottom: 10px;
                                                                        cursor: pointer;
                                                                        text-align: center;
                                                                        position: relative;
                                                                    }

                                                                    /* tooltip */
                                                                    .gtt-variation-radios label:before,
                                                                    .gtt-variation-radios label:after {
                                                                        visibility: hidden;
                                                                        opacity: 0;
                                                                        pointer-events: none;
                                                                        box-sizing: inherit;
                                                                        position: absolute;
                                                                        bottom: 130%;
                                                                        left: 50%;
                                                                        z-index: 999;
                                                                        -webkit-transform: translateZ(0);
                                                                        transform: translateZ(0);
                                                                        box-shadow: 0 7px 15px rgb(0 0 0 / 5%);
                                                                        transition: opacity .3s linear,bottom .3s linear;
                                                                    }
                                                                    .gtt-variation-radios label:before {
                                                                        content: attr(data-tooltop-title);
                                                                        margin-bottom: 5px;
                                                                        -webkit-transform: translateX(-50%);
                                                                        transform: translateX(-50%);
                                                                        padding: 7px;
                                                                        border-radius: 3px;
                                                                        background-color: #000;
                                                                        background-color: rgba(51,51,51,.9);
                                                                        color: #fff;
                                                                        text-align: center;
                                                                        font-size: 14px;
                                                                        line-height: 1.2;
                                                                        min-width: 100px;
                                                                        font-size: 13px;
                                                                    }
                                                                    .gtt-variation-radios label:after {
                                                                        margin-left: -5px;
                                                                        width: 0;
                                                                        border-top: 5px solid #000;
                                                                        border-top: 5px solid rgba(51,51,51,.9);
                                                                        border-right: 5px solid transparent;
                                                                        border-left: 5px solid transparent;
                                                                        content: " ";
                                                                        font-size: 0;
                                                                        line-height: 0;
                                                                    }

                                                                    .gtt-variation-radios label:hover:before,
                                                                    .gtt-variation-radios label:hover:after {
                                                                        bottom: 120%;
                                                                        visibility: visible;
                                                                        opacity: 1;
                                                                    }

                                                                    .gtt-variation-radios label.image_label {
                                                                        padding: 5px;
                                                                        /* height: 65.8px; */
                                                                        /* width: 60px; */
                                                                    }

                                                                    .gtt-variation-radios label.image_label .image-variable-item {
                                                                        width: 100%;
                                                                        height: 100%;
                                                                    }
                                                                    .gtt-variation-radios input:checked+label {
                                                                        border-radius: 4px;
                                                                        box-shadow: 0 0 0 2px rgb(192 57 43) !important
                                                                    }

                                                                    .select_size 
                                                                    /* active-sticker */
                                                                    .gtt-variation-radios label .active-sticker {	
                                                                        width: 0;
                                                                        height: 0;
                                                                        padding: 0;
                                                                        border-width: 10px;
                                                                        border-style: solid;
                                                                        border-color: transparent transparent transparent #55acee;
                                                                        background: 0 0;
                                                                        position: absolute;
                                                                        right: -10px;
                                                                        bottom: -10px;
                                                                        transform: rotateZ(45deg);
                                                                        display: block;
                                                                    }

                                                                    .gtt-variation-radios label.image_label .active-sticker {
                                                                        border-radius: 100%;
                                                                        border: 0;background: #55acee;width: 6px;height: 6px;position: absolute;
                                                                        top: unset;
                                                                        left: 50%;
                                                                        bottom: -10px;
                                                                        transform: translate(-50%,0);
                                                                    }
                                                                </style>
                                                                
                                                                <form class="variations_form cart wvs-loaded">
                                                                    
                                                                    <?php if(isset($data->options) && $data->options()->count() > 0): ?>
                                                                    <?php
                                                                        $colorActive = $data->options[0]->color;
                                                                    ?>
                                                                    <table class="variations" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="label"><label for="pa_mau-sac">CHỌN MÀU</label>
                                                                                    <span class="woo-selected-variation-item-name" id="name_option" data-default="">: <?php echo e($colorActive); ?></span>
                                                                                </td>
                                                                                <td class="value woo-variation-items-wrapper">
                                                                                    <div class="gtt-variation-radios">
                                                                                        
                                                                                        <?php $__currentLoopData = $data->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <input type="radio" class="optionChange inputColor<?php echo e($item->price??0); ?>-<?php echo e($item->id); ?>" id="attribute_pa_color-<?php echo e(Str::slug($item->color)); ?>" name="attribute_pa_color" data-type="<?php echo e($item->color); ?>" value="<?php echo e($item->price??0); ?>-<?php echo e($item->id); ?>" data-old_price="<?php echo e($item->old_price??0); ?>-<?php echo e($item->id); ?>" data-id_option="<?php echo e($item->id); ?>" <?php if($loop->first): ?> checked <?php endif; ?> />
                                                                                                <label for="attribute_pa_color-<?php echo e(Str::slug($item->color)); ?>" class=" image_label change_size <?php echo e($item->price??0); ?>-<?php echo e($item->id); ?>" data-tooltop-title="<?php echo e($item->color); ?>" data-id_option="<?php echo e($item->id); ?>">
                                                                                                    <?php echo e($item->color); ?>

                                                                                                </label>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </div>
                                                                                    
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <?php
                                                                                    $item = $data->options->first();
                                                                                    $dataSize = $item->optionVarients->where('variant_id', 1);
                                                                                ?>
                                                                                <td class="label"><label for="pa_size">CHỌN SIZE</label>
                                                                                    <span class="woo-selected-variation-item-name" data-default="">: <?php echo e($dataSize[0]->variant_value_name); ?></span>
                                                                                </td>
                                                                                
                                                                                

                                                                                <td class="value woo-variation-items-wrapper">
                                                                                    <ul class="variable-items-wrapper button-variable-wrapper" id="dataSizeProductM">
                                                                                        <?php $__currentLoopData = $dataSize; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <li class="variable-item button-variable-item button-variable-item-35 btn-select-variant <?php if($loop->first): ?> selected <?php endif; ?>" data-size="<?php echo e($value['variant_value_name']); ?>">
                                                                                                <div class="variable-item-contents"><span class="variable-item-span variable-item-span-button"><?php echo e($value['variant_value_name']); ?></span></div>
                                                                                            </li>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </ul>				
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <?php endif; ?>

                                                                    <div class="single_variation_wrap">
                                                                        <button type="submit" class="add-to-cart" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $data->id])); ?>&quantity=1&color=<?php echo e($item->color); ?>&size=<?php echo e($dataSize[0]->variant_value_name); ?>" data-start="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>" class="single_add_to_cart_button button alt wow bounce" data-wow-duration="3s" data-wow-delay="2s">ĐẶT HÀNG NGAY<br><span>Giao Hàng Nhanh Toàn Quốc Miễn Phí</span></button>
                                                                    </div>
                                                                </form>
                                                                
                                                                
                                                                <?php if(isset($featuredelly)): ?>
                                                                    <div class="pt_list_contact">
                                                                        <ul>
                                                                            <?php $__currentLoopData = $featuredelly->childs()->where('active', 1)->orderBy('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li>
                                                                                    <div class="pt_icon">
                                                                                        <?php echo $value->slug; ?>

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
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="tab-product">
                                                    <div role="tabpanel">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
            
                                                            <li class="nav-item">
                                                              <a class="nav-link active"  data-toggle="tab" href="#mota" role="tab" aria-controls="tabmoto" aria-selected="false">Mô tả</a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"  data-toggle="tab" href="#danhgiasao" role="tab" aria-controls="tabdanhgiasao" aria-selected="false">Đánh giá sao (<?php echo e($data->stars()->count()); ?>)</a>
                                                              </li>
                                                            
                                                            <li class="nav-item">
                                                                <a class="nav-link"  data-toggle="tab" href="#huongdanmuahang" role="tab" aria-controls="tabhuongdanmuahang" aria-selected="true">Hướng dẫn mua hàng</a>
                                                            </li>
                                                            
                                                            <li class="nav-item">
                                                                <a class="nav-link"  data-toggle="tab" href="#quydinhdoihang" role="tab" aria-controls="tabquydinhdoihang" aria-selected="true">Quy định đổi hàng</a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"  data-toggle="tab" href="#huongdanchonsize" role="tab" aria-controls="tabhuongdanchonsize" aria-selected="true">Hướng dẫn chọn size</a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#hethongshowroom" role="tab" aria-controls="tabhethongshowroom" aria-selected="true">Hệ thống ShowRoom</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            
                                                            <div class="tab-pane fade  show active" id="mota" role="tabpanel" aria-labelledby="tabmota-tab">
                                                                <?php echo $data->content; ?>

                                                            </div>

                                                            <div class="tab-pane fade" id="danhgiasao" role="tabpanel" aria-labelledby="tabdanhgiasao-tab">
                                                                <?php if($data->stars()->count()>0): ?>
                                                                    <div class="list-star js-list-star">
                                                                        <div class="js-load" style="display: none;">
                                                                            <div class="spinner-border text-info"></div>
                                                                        </div>
                                                                        
                                                                        <?php $__currentLoopData = $data->stars()->where('active',1)->orderBy('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="item-star">
                                                                            <div class="box">
                                                                                <div class="auth-star">
                                                                                    <div class="icon"><?php echo e($item->name_tat($item->name)); ?></div>
                                                                                    <div class="text-star">
                                                                                        <div class="name"><?php echo e($item->name); ?></div>
                                                                                        <div class="date-create"><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="content-star">
                                                                                    <h3><?php echo e($item->title); ?></h3>
                                                                                    <div class="desc">
                                                                                        <?php echo e($item->content); ?>

                                                                                    </div>
                                                                                </div>
                                                                                <?php if($item->star): ?>
                                                                                <div class="point-star">
                                                                                    <?php echo e($item->star); ?>

                                                                                    <span class="point">
                                                                                        <i class="fas fa-star"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="pagination-star js-pagination-ajax mt-3">
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <div id="danhgia" class="danhgia_sao">
                                                                        <div class="contact-form">
                                                                            <div class="form">
                                                                                <form action="<?php echo e(route('product.rating',['id' => $data->id])); ?>" method="POST" method="POST">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <div class="form_danhgia">
                                                                                        <label>Đánh giá <span>*</span></label>
                                                                                        
                                                                                        <div id="rating">
                                                                                            <input type="radio" id="star5" name="rating" value="5" />
                                                                                            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star4half" name="rating" value="4.5" />
                                                                                            <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star4" name="rating" value="4" />
                                                                                            <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star3half" name="rating" value="3.5" />
                                                                                            <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star3" name="rating" value="3" />
                                                                                            <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star2half" name="rating" value="2.5" />
                                                                                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                                                            <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star1half" name="rating" value="1.5" />
                                                                                            <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                                            
                                                                                            <input type="radio" id="star1" name="rating" value="1" />
                                                                                            <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                                                            
                                                                                            <input type="radio" id="starhalf" name="rating" value="0.5" />
                                                                                            <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form_danhgia">
                                                                                        <label>Khách hàng <span>*</span></label>
                                                                                        <input type="text" placeholder="Khách hàng" required="required" name="name">
                                                                                    </div>
                                                                                    <div class="form_danhgia">
                                                                                        <label>Email</label>
                                                                                        <input type="email" placeholder="Email" required="required" name="email">
                                                                                    </div>
                                                                                    <div class="form_danhgia">
                                                                                        <label>Điện thoại <span>*</span></label>
                                                                                        <input type="number" placeholder="Điện thoại" required="required" name="phone">
                                                                                    </div>
                                                                                    <div class="form_danhgia">
                                                                                        <label>Tiêu đề <span>*</span></label>
                                                                                        <input type="text" placeholder="Tiêu đề" required="required" name="title">
                                                                                    </div>
                                                                                    <div class="form_danhgia">
                                                                                        <label>Nội dung <span>*</span></label>
                                                                                        <textarea name="content" placeholder="Nội dung" id="noidung" cols="30" rows="5"></textarea>
                                                                                    </div>
                                                                                    <div class="form_danhgia">
                                                                                        <label></label>
                                                                                        <div class="sao_danhgia">
                                                                                            <button type="submit" name="submit">Đánh giá</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="huongdanmuahang" role="tabpanel" aria-labelledby="tabhuongdanmuahang-tab">
                                                                <?php if(isset($huongDanMuaHang)): ?>
                                                                <?php echo $huongDanMuaHang->description; ?>

                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="tab-pane fade" id="quydinhdoihang" role="tabpanel" aria-labelledby="tabquydinhdoihang-tab">
                                                                <?php if(isset($quyTrinh)): ?>
                                                                <?php echo $quyTrinh->description; ?>

                                                                <?php endif; ?>

                                                            </div>

                                                            <div class="tab-pane fade" id="huongdanchonsize" role="tabpanel" aria-labelledby="tabhuongdanchonsize-tab">
                                                                <?php if(isset($huongDanChonSize)): ?>
                                                                <?php echo $huongDanChonSize->description; ?>

                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="tab-pane fade" id="tabhethongshowroom" role="tabpanel" aria-labelledby="tabtabhethongshowroom-tab">
                                                                Đang cập nhật!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
            
                                                    
                                                    
                                                </div>

                                                <?php if(isset($dataRelate)): ?>
                                                    <?php if($dataRelate->count()): ?>
                                                        <div class="product-relate">
                                                            <div class="product">
                                                                <div class="title">
                                                                    <h2><img src="/frontend/images/san-pham-tieu-bieu.png" alt="Chuyên mục liên quan" title="Chuyên mục liên quan"><?php echo e(__('product.san_pham_lien_quan')); ?></h2>
                                                                </div>
                                                            </div>
                                                            <div class="list-product-card" style="width:100%;">
                                                                <div class="row">
                                                                    <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $tran=$product->translationsLanguage()->first();
                                                                            $link=$product->slug_full;
                                                                        ?>
                                                                        <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
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
                                                                                    <div class="content">
                                                                                        <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
                                                                                        <div class="box-price">
                                                                                            <span class="new-price"><?php echo e($product->price?number_format($product->price)." ".$unit:"Liên hệ"); ?></span>
                                                                                            <?php if($product->old_price>0): ?>
                                                                                                <span class="old-price"><?php echo e(number_format($product->old_price)); ?> <?php echo e($unit); ?></span>
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
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    
                    <div class="col-12 col-lg-3" >
                       

                        <?php if(isset($sidebar)): ?>
                            <?php echo $__env->make('frontend.components.sidebar',[
                                "categoryProduct"=>$sidebar['categoryProduct'],
                                "categoryPost"=>$sidebar['categoryPost'],
                                "categoryProductActive"=>$categoryProductActive  ?? null,
                                "postsHot"=>$sidebar['postsHot'],
                                "support_online"=>$sidebar['support_online'],
                                'fill'=>true,
                                'product'=>true,
                                'post'=>false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/setup.js')); ?>"></script>
    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    <script>
        $(document).ready(function(){
            $('.change_size').click(function(){
                var option_id = $(this).data('id_option');
                // alert(option_id);
                $.ajax({
                    url : '<?php echo e(route('option.changeSize')); ?>',
                    method : 'Get',
                    data : {option_id : option_id},
                    success : function(data){
                        // load_size();
                        $('#dataSizeProductM').html(data);

                    } 
                });
            })
        });
    </script>
    <script type="text/javascript">
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
                        //   let url = $('#addCart').data('start');
                        //  url += "?quantity=" + $('#cart_quantity').val();

                        //  $('#addCart').attr('data-url',url);

                        //  let url2 = $('#buyCart').attr('href');
                        //  url2 += "?quantity=" + $('#cart_quantity').val();
                        //  $('#buyCart').attr('href',url2);
                        $(".optionChange").trigger('change');
                }
            });
            

            // $(document).on('change','#cart_quantity',function(){
            //     if ($(this).parent().parent().find('input').val() > 1) {
            //         var a = $(this).val();
            //            $(".optionChange").trigger('click');


            //         // let url = $('#addCart').data('start');
            //         // url += "?quantity=" + $('#cart_quantity').val();
            //         // $('#addCart').attr('data-url',url);
                    
            //         // let url2 = $('#buyCart').attr('href');
            //         //      url2 += "?quantity=" + $('#cart_quantity').val();
            //         //      $('#buyCart').attr('href',url2);
            //     }
            // });

            //add class active
            $(document).on('click','.btn-select-variant',function(){
                $(this).parent().find('.btn-select-variant').removeClass('selected');
                $(this).addClass('selected');

                let name_option2 = $(this).data('size');

                console.log('name_option2', name_option2);

                $(".optionChange").trigger('change');
            });
            
                
            $(document).on('change','.optionChange ',function(){
                    
                    let val= $('input[name=attribute_pa_color]:checked').val();
                    // $('.'+val + '-color').parent().find('.optionChange').removeClass('selected');
                    // $(this).parent().find('.optionChange').removeClass('selected');
                    // $(this).addClass('selected');
                    // $('.'+val + '-color').parent().find('.optionChange').addClass('disabled');
                    // $('.'+val+ '-color').addClass('selected');


                    let arrPriceAndId = val.split("-").map(function(value,index){
                        return parseInt(value);
                    });

                    //Giá cũ
                    let old_price = $(this).data('old_price');
                    if(old_price){
                            arrPriceAndId2 = old_price.split("-").map(function(value2,index){
                            return parseInt(value2);
                        });
                    }
    
                    var nf = Intl.NumberFormat();

                    let text= 'Liên hệ';
                    let name_option = $('input[name=attribute_pa_color]:checked').data('type');
                    let name_option2 = $("li.variable-item.button-variable-item.button-variable-item-35.btn-select-variant.selected").data('size') ?? '';

                    let url = $('#addCart').data('start');
                    url += "?quantity=" + $('#cart_quantity').val() + "&color=" + name_option + "&size=" + name_option2;
                    if(arrPriceAndId[1]){
                        url += "&option=" + arrPriceAndId[1];
                    }
                    if(arrPriceAndId[0]>0){
                        let price= nf.format(arrPriceAndId[0]);
                        text=price+'<span class="donvi"> <?php echo e($unit); ?></span>';
                    }
                    if(arrPriceAndId2){
                        if(arrPriceAndId2[0]>0){
                            let price2= nf.format(arrPriceAndId2[0]);
                            text2=price2+' ₫';
                        }
                    }
                    $('#addCart').attr('data-url',url);
                    $('#priceChange').html(text);
                    $('#name_option').html(name_option);
                    $('#old_priceChange').html(text2);
            });

            

            $(document).on('click','.optionChange',function(){
                let val= ($(this).val());
                $('.image_label').removeClass('checked')
                $( this ).prop('checked', false); 
                $('.inputColor' + val).prop('checked', true);
                //Tab change image Product
                let option_id = $(this).data('id_option');
                    $('.box-image-product .image-main').removeClass('active');
                    $('#img_'+option_id).addClass('active');

                    //Set position slide image
                    $('.autoplay5-product-detail-new').slick('setPosition');
            });

            
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>