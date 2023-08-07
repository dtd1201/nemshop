<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<style>
</style>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                <?php echo $__env->make('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="blog-product-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12  block-content-right">
                            <div class="row" >
                                <div class="col-sm-12" id="dataProductSearch">
                                    <div class="box-product-main">
                                        <div class="row" >
                                            <div class="col-md-7 col-sm-12 col-xs-12">
												<div class="title_sp_detail">
                                                    <h1><?php echo e($data->name); ?></h1>
												</div>	
                                                <div class="box-image-product">
                                                    <div class="image-main block">
                                                        <a class="hrefImg" href="<?php echo e(asset($data->avatar_path)); ?>" data-lightbox="image">
                                                            <i class="fas fa-expand-alt"></i>
                                                            <img id="expandedImg" src="<?php echo e(asset($data->avatar_path)); ?>">
                                                        </a>
														<div class="desc-pro-detail-sm">
                                                            ***Lưu Ý: Hình ảnh chỉ mang tính chất minh hoạ.
                                                        </div>
                                                    </div>
                                                    
                                                    <?php if($data->images()->count()): ?>
                                                    <div class="list-small-image">
                                                        <div class="pt-box autoplay5-product-detail">
                                                            <div class="small-image column">
                                                                <img src="<?php echo e(asset($data->avatar_path)); ?>" alt="<?php echo e(asset($data->name)); ?>">
                                                            </div>
                                                            <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="small-image column">
                                                                <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e(asset($image->name)); ?>">
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-12 col-xs-12 product-detail-infor">
                                                <div class="box-infor">
                                                    <div class="list-attr">
                                                        <div class="attr-item">
                                                            
                                                            <div class="price">
                                                                <?php if($data->price): ?>
                                                                    <?php if($data->price_after_sale): ?>
                                                                        <span id="priceChange"><?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi">đ</span></span>
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
                                                        </div>
                                                    </div>
                                                    
                                                    <?php if( $data->model ): ?>
                                                    <div class="status"><i class="far fa-check-square"></i> Thương hiệu:
                                                       <span> <strong><?php echo e($data->model); ?></strong> </span>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if( $data->tinhtrang ): ?>
                                                    <div class="status"><i class="far fa-check-square"></i> Trạng thái:
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
                                                    <hr>
                                                    <div class="wrap-price">

                                                        <div class="list-attr1">
                                                            
															
                                                            <div class="attr-item" style="width: auto;display: inline-block;">
                                                                <div class="form-group" style="display: flex;align-items: center;">
                                                                    <label for="" style="white-space: nowrap;margin-bottom: 0;font-size: 15px;">Chọn kích thước</label>
                                                                    <select name="" id="optionChange" class="form-control optionChange" required="required" style="font-size: 14px;padding: 6px 12px 6px 4px;margin-left: 10px;">
                                                                        <option value="<?php echo e($data->price_after_sale??0); ?>-0"><?php echo e($data->size??'Mặc định '.$data->size); ?></option>
                                                                        <?php $__currentLoopData = $data->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <option value="<?php echo e($item->price_after_sale??0); ?>-<?php echo e($item->id); ?>"><?php echo e($item->size); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="attr-item" style="display: inline-block; margin-left: 20px;">
                                                                <div class="form-group">
                                                                    <label for="">Số lượng</label>
                                                                    <div class="wrap-add-cart" id="product_add_to_cart">
                                                                        <div class="box-add-cart">

                                                                            <div class="pro_mun">
                                                                                <a class="cart_qty_reduce cart_reduce">
                                                                                    <span class="iconfont icon fas fa-minus" aria-hidden="true"></span>
                                                                                </a>
                                                                                <input type="text" value="1" class="" name="cart_quantity" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" maxlength="5" min="1" id="cart_quantity" placeholder="">

                                                                                <a class="cart_qty_add">
                                                                                    <span class="iconfont icon fas fa-plus" aria-hidden="true"></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                        </div>
                                                        <div class="text-left">
                                                            <div class="box-buy">
                                                                <a class="add-to-cart" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-start="<?php echo e(route('cart.add',['id' => $data->id,])); ?>">Thêm giỏ hàng</a>
                                                            </div>
                                                            <div class="hen_lich">
                                                                <a href="javascript" data-toggle="modal" data-target="#modal-first">
                                                                    Hẹn lịch đến xem
                                                                </a>
                                                            </div>
                                                            <div class="sign_now">
                                                                <a href="javascript" data-toggle="modal" data-target="#sign_now">
                                                                    Đăng ký ngay
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="modal fade modal-First" id="modal-first" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                                                <span id="priceChange"><?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi">đ</span></span>
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="newsletter-content">
                                                                            <h2>ĐẶT LỊCH ĐẾN SHOWROOM</h2>
                                                                            <div class="dec">(Để chúng tôi phục vụ chu đáo hơn)</div>
                                                                            <form action="<?php echo e(route('contact.storeAjax2')); ?>"  data-url="<?php echo e(route('contact.storeAjax2')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="<?php echo e($data->name); ?>" required>
                                                                                <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                                                                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                                                                                <label>Ngày đến</label>
                                                                                <input type="date" class="form-control ngay_den" name="date_start" placeholder="Ngày đến xem" required>
                                                                                
                                                                                <button>Đăng ký ngay</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade modal-First" id="sign_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                                                <span id="priceChange"><?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi">đ</span></span>
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="newsletter-content">
                                                                            <h2>ĐĂNG KÝ NGAY</h2>
                                                                            <div class="dec">(Điền đầy thủ thông tin vào ô nhập thông tin)</div>
                                                                            <form action="<?php echo e(route('contact.storeAjax1')); ?>"  data-url="<?php echo e(route('contact.storeAjax1')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="<?php echo e($data->name); ?>" required>
                                                                                <input type="text" class="form-control" name="name" placeholder="Họ tên *">
                                                                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                                                                                <input type="text" class="form-control" name="address_detail" placeholder="Địa chỉ" required>
                                                                                
                                                                                <textarea class="form-control" name="content2" placeholder="Nội dung"></textarea>
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
                                    <div class="tab-product">
                                        <div role="tabpanel">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                                <li class="nav-item">
                                                  <a class="nav-link active"  data-toggle="tab" href="#mota" role="tab" aria-controls="profile" aria-selected="false">Chi Tiết Sản Phẩm</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"  data-toggle="tab" href="#chinhsach" role="tab" aria-controls="home" aria-selected="true">Bảo Hành Đổi Trả</a>
                                                </li>
                                                
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade  show active" id="mota" role="tabpanel" aria-labelledby="profile-tab">
                                                    <?php echo $data->content; ?>

                                                </div>
                                                <div class="tab-pane fade" id="chinhsach" role="tabpanel" aria-labelledby="home-tab">
                                                    <?php echo $data->content2; ?>

                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
									<div class="product-relate">
                                        <div class="title_sp_lienquan">
                                            <h2>Sản phẩm liên quan</h2>
                                        </div>
                                        <div class="row">
                                            <?php if(isset($dataRelate)): ?>
                                                <?php if($dataRelate->count()): ?>
                                                    <div class="list-product-card autoplay_height category-slide-1" style="width:100%;">
                                                        <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $tran=$product->translationsLanguage()->first();
                                                                $link=$product->slug_full;
                                                            ?>
                                                            <div class="col-product-item">
                                                                <div class="product-item">
                                                                    <div class="box">
                                                                        <div class="image">
                                                                            <a href="<?php echo e($link); ?>">
                                                                                <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>">
                                                                                <?php if($product->sale): ?>
                                                                                <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                                <?php endif; ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="content">
                                                                            <h3>
                                                                                <a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a>
                                                                            </h3>
                                                                            <div class="box-price">
                                                                                <span class="new-price">Giá: <?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?></span>
                                                                                <?php if($product->sale>0): ?>
                                                                                    <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
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
    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
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
            $('.column').click(function() {
                var src = $(this).find('img').attr('src');
                $(".hrefImg").attr("href", src);
                $("#expandedImg").attr("src", src);
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
            $('.autoplay5-product-detail').slick({
                dots: false,
                vertical:true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 551,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            vertical: false,
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
                        // let url = $('#addCart').data('start');
                        // url += "?quantity=" + $('#cart_quantity').val();
                        // $('#addCart').attr('data-url',url);
                        $("#optionChange").trigger('change');
                }
            });
            $('.cart_qty_reduce').click(function() {
                if ($(this).parent().parent().find('input').val() > 1) {
                    if ($(this).parent().parent().find('input').val() > 1) $(this).parent().parent().find(
                        'input').val(+$(this).parent().parent().find('input').val() - 1);
                      //  let url = $('#addCart').data('start');
                       // url += "?quantity=" + $('#cart_quantity').val();

                       // $('#addCart').attr('data-url',url);
                        $("#optionChange").trigger('change');
                }
            });
            $(document).on('change','.optionChange',function(){
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
                    text=price+'<span class="donvi"> đ</span>';
                }
                $('#addCart').attr('data-url',url);
                $('#priceChange').html(text);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/largevendor.com/demo4.largevendor.com/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>