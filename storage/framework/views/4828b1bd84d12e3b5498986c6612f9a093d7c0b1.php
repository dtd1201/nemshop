<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

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
                        <div class="col-lg-9 col-sm-12  block-content-right">
                            <div class="row" >
                                <div class="col-sm-12" id="dataProductSearch">
                                    <div class="box-product-main">
                                        <div class="row" >
                                            <div class="col-md-5 col-sm-12 col-xs-12 box-image-product">
                                                <div class="image-main block">
                                                    <a class="hrefImg" href="<?php echo e(asset($data->avatar_path)); ?>" data-lightbox="image"><img id="expandedImg" src="<?php echo e(asset($data->avatar_path)); ?>"></a>
                                                    <?php if($data->sale): ?>
                                                <span class="sale"> <?php echo e($data->sale." %"); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="share">
                                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-591d2f6c5cc3d5e5"></script>
                                                    <div class="addthis_inline_share_toolbox"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-7 col-sm-12 col-xs-12 product-detail-infor">
                                                <div class="box-infor">
                                                    <h2><?php echo e($data->name); ?></h2>
                                                    <div class="box-price">
                                                        <span class="price price-number">
                                                        <?php echo e(number_format($data->price_after_sale)); ?> <?php echo e($unit); ?>

                                                        </span>
                                                        <?php if($data->sale): ?>
                                                        <span class="price old-price"> <?php echo e(number_format($data->price)); ?> <?php echo e($unit); ?></span>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="desc-product">
                                                        <ul>
                                                            <li><strong>Model</strong> <span>:<?php echo e($data->model?$data->model:"Chưa xác định"); ?></span></li>
                                                            <li><strong>Bảo hành</strong> <span>:<?php echo e($data->baohanh?$data->baohanh:"Chưa xác định"); ?></span></li>
                                                            <li><strong>Tình trạng</strong> <span>:<?php echo e($data->tinhtrang?$data->tinhtrang:"Chưa xác định"); ?></span></li>
                                                            <li><strong>Xuất sứ</strong> <span>:<?php echo e($data->xuatsu?$data->xuatsu:"Chưa xác định"); ?></span></li>
                                                        </ul>
                                                        <div class="dathang"><i class="fas fa-phone-volume"></i> Đặt hàng qua điện thoại: <span class="phone"><?php echo e($header['hotline']->value); ?></span></div>
                                                    </div>
                                                    <div class="box-buy">
                                                        <a class="btn-buynow addnow" href="<?php echo e(route('cart.buy',['id' => $data->id,])); ?>"><span>Mua ngay</span></a>
                                                        <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $data->id,])); ?>"><span>Thêm vào giỏ</span></a>
                                                        <a class="add-compare" data-url="<?php echo e(route('compare.add',['id' => $data->id,])); ?>"><span>Thêm vào so sánh</span></a>
                                                    </div>
                                                    <div class="giaohang">
                                                        <ul>
                                                            <?php if($giaohang): ?>
                                                            <?php $__currentLoopData = $giaohang->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <li>
                                                                <div class="icon"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></div>
                                                                <div class="desc">
                                                                    <?php echo $item->description; ?>

                                                                </div>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                    <div class="list-file">
                                                        <a href="<?php echo e($data->file); ?>" class="btn btn-light"><i class="fas fa-arrow-down"></i> Brochure</a>
                                                        <a href="<?php echo e($data->file2); ?>" class="btn btn-light"><i class="fas fa-arrow-down"></i> Hướng dẫn sử dụng</a>
                                                        <a href="<?php echo e($data->file3); ?>" class="btn btn-light"><i class="fas fa-arrow-down"></i> Drive</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-product">
                                        <div class="tab-link">
                                            <ul>
                                                <li><a href="#mota" class="active">Mô tả sản phẩm</a></li>
                                                <li><a href="#thongso">Thông số kỹ thuật</a></li>
                                                <li><a href="#chinhsachvanchuyen">Chính sách vận chuyển</a></li>
                                                <li><a href="#chinhsachbaohanh">Chính sách bảo hành</a></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pro-content" id="wrapSizeChange">
                                            <div class="tab-item" id="mota">
                                                <?php echo $data->content; ?>

                                            </div>
                                            <div class="tab-item" id="thongso">
                                                <?php echo $data->content2; ?>

                                            </div>
                                            <div class="tab-item" id="chinhsachvanchuyen">
                                                <?php echo $data->content3; ?>

                                            </div>
                                            <div class="tab-item" id="chinhsachbaohanh">
                                                <?php echo $data->content4; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-xs-12 block-content-left">
                            <?php if(isset($sidebar)): ?>
                                <?php echo $__env->make('frontend.components.sidebar',[
                                    "categoryProduct"=>$sidebar['categoryProduct'],
                                    "categoryPost"=>$sidebar['categoryPost'],
                                    'fill'=>true,
                                    'product'=>true,
                                    'post'=>false,
                                    'urlActive'=>makeLink('category_products',$data->category->id,$data->category->slug) ,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

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
                slidesToShow: 5,
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>