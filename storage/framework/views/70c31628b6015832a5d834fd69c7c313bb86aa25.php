<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<style>
</style>
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/xzoom/xzoom.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/xzoom.min.js')); ?>"></script>
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
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 block-content-right">
                            <div class="row" >
                                <div class="col-sm-12" id="dataProductSearch">
                                    <div class="box-product-main">
                                        <div class="row" >
                                            <div class="col-md-6 col-sm-12 col-12">
												
                                                <div class="box-image-product">
                                                    <div class="xzoom-container">
                                                        <img class="xzoom3" src="<?php echo e(asset($data->avatar_path)); ?>" xoriginal="<?php echo e(asset($data->avatar_path)); ?>" />
                                                        
                                                        <?php if($data->images()->count()): ?>
                                                        <div class="xzoom-thumbs">
                                                            <a href="<?php echo e(asset($data->avatar_path)); ?>"><img class="xzoom-gallery3" width="80" src="<?php echo e(asset($data->avatar_path)); ?>"  xpreview="<?php echo e(asset($data->avatar_path)); ?>" title="<?php echo e($data->name); ?>"></a>
                                                            <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(asset($image->image_path)); ?>"><img class="xzoom-gallery3" width="80" src="<?php echo e(asset($image->image_path)); ?>" title="<?php echo e(asset($image->name)); ?>"></a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div> 
                                                    
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
                                                                    <?php if($data->price_after_sale): ?>
                                                                        <span id="priceChange"><?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi"><?php echo e($unit); ?></span></span>
                                                                    <?php endif; ?>

                                                                    <?php if($data->sale>0): ?>
                                                                        <span class="title_giacu"><?php echo e(__('product.gia_cu')); ?>: </span>
                                                                        <span class="old-price"><?php echo e(number_format($data->price)); ?> <?php echo e($unit); ?></span>
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

                                                        <div class="list-attr1">
                                                            
                                                            <div class="attr-item" style="display: inline-block;">
                                                                <div class="form-group">
                                                                    <label for=""><?php echo e(__('product.so_luong')); ?></label>
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
                                                                <a class="add-to-cart" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-start="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>"><?php echo e(__('product.cho_vao_gio_hang')); ?></a>
                                                                <a class="btn-buynow addnow" id="buyCart" href="<?php echo e(route('cart.buy',['id' => $data->id,])); ?>">
                                                                    <?php echo e(__('product.mua_ngay')); ?>

                                                                </a>
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
                                                  <a class="nav-link active"  data-toggle="tab" href="#mota" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__('product.chi_tiet_san_pham')); ?></a>
                                                </li>
                                                
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade  show active" id="mota" role="tabpanel" aria-labelledby="profile-tab">
                                                    <?php echo $data->content; ?>

                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <?php if(isset($dataRelate)): ?>
                                        <?php if($dataRelate->count()): ?>
        									<div class="product-relate">
                                                <div class="title_sp_lienquan">
                                                    <h2><?php echo e(__('product.san_pham_lien_quan')); ?></h2>
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
                                                                                <?php if($product->sale): ?>
                                                                                <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                                <?php endif; ?>

                                                                                <?php if($product->baohanh): ?>
                                                                                    <div class="km">
                                                                                        <?php echo e($product->baohanh); ?>

                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            </a>
                                                                            <div class="actionss">
                                                                                <div class="btn-cart-products">
                                                                                    <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                                                        <i class="fas fa-cart-plus"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="view-details">
                                                                                    <a href="<?php echo e($link); ?>" class="view-detail"> 
                                                                                        <span>
                                                                                            <i class="far fa-clone"></i>
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="content">
                                                                            <h3>
                                                                                <a href="<?php echo e($link); ?>">
                                                                                   <?php echo e($tran->name); ?>

                                                                                </a>
                                                                            </h3>
                                                                            <div class="box-price">
                                                                                <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit: __('home.lien_he')); ?></span>
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
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-12 block-content-left">
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
    </div>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/setup.js')); ?>"></script>
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
                         let url = $('#addCart').data('start');
                         url += "?quantity=" + $('#cart_quantity').val();
                         $('#addCart').attr('data-url',url);

                         let url2 = $('#buyCart').attr('href');
                         url2 += "?quantity=" + $('#cart_quantity').val();
                         $('#buyCart').attr('href',url2);
                        //$(".optionChange").trigger('change');
                }
            });
            $('.cart_qty_reduce').click(function() {
                if ($(this).parent().parent().find('input').val() > 1) {
                    if ($(this).parent().parent().find('input').val() > 1) $(this).parent().parent().find(
                        'input').val(+$(this).parent().parent().find('input').val() - 1);
                          let url = $('#addCart').data('start');
                         url += "?quantity=" + $('#cart_quantity').val();

                         $('#addCart').attr('data-url',url);

                         let url2 = $('#buyCart').attr('href');
                         url2 += "?quantity=" + $('#cart_quantity').val();
                         $('#buyCart').attr('href',url2);
                        //$(".optionChange").trigger('change');
                }
            });

            $(document).on('change','#cart_quantity',function(){
                if ($(this).parent().parent().find('input').val() > 1) {
                    var a = $(this).val();
                     //   $(".optionChange").trigger('change');


                    let url = $('#addCart').data('start');
                    url += "?quantity=" + $('#cart_quantity').val();
                    $('#addCart').attr('data-url',url);
                    
                    let url2 = $('#buyCart').attr('href');
                         url2 += "?quantity=" + $('#cart_quantity').val();
                         $('#buyCart').attr('href',url2);
                }
            });

            $(document).on('change','.optionChange',function(){
                let val= ($(this).val()) ;
                let arrPriceAndId = val.split("-").map(function(value,index){
                    return parseInt(value);
                });
 
                var nf = Intl.NumberFormat();

                let text= 'ຕິດຕໍ່';
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
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kimvietplywood.com/httpdocs/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>