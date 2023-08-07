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
                        <div class="col-lg-12 col-sm-12  block-content-right">
                            <div class="row" >
                                <div class="col-sm-12" id="dataProductSearch">
                                    <div class="box-product-main">
                                        <div class="row" >
                                            <div class="col-md-6 col-sm-12 col-xs-12 ">
                                                <div class="box-image-product">
                                                    <div class="image-main block">
                                                        <a class="hrefImg" href="<?php echo e(asset($data->avatar_path)); ?>" data-lightbox="image">
                                                            <i class="fas fa-expand-alt"></i>
                                                            <img id="expandedImg" src="<?php echo e(asset($data->avatar_path)); ?>">
                                                        </a>
                                                        <?php if($data->sale): ?>
                                                            <span class="sale"> <?php echo e($data->sale." %"); ?></span>
                                                        <?php endif; ?>
														<div class="desc-pro-detail-sm">
                                                    ***Lưu Ý: Hình ảnh chỉ mang tính chất minh hoạ. Sản phẩm là đá tự nhiên nên vân đá có thể thay đổi.
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
                                            <div class="col-md-6 col-sm-12 col-xs-12 product-detail-infor">
                                                <div class="box-infor">
                                                    <h2>Sản phẩm: <?php echo e($data->name); ?></h2>
                                                    <div class="masp"><strong>Mã sản phẩm:</strong> <?php echo e($data->masp); ?></div>
                                                    <?php if( $data->model ): ?>
                                                    <div class="status">
                                                        <strong><i class="fas fa-gem"></i> Thương hiệu: </strong>
                                                       <span> <?php echo e($data->model); ?> </span>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if( $data->tinhtrang ): ?>
                                                    <div class="status">
                                                        <strong><i class="fas fa-gem"></i> Trạng thái: </strong>
                                                        <span> <?php echo e($data->tinhtrang); ?> </span>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $data->attributes()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="status">
                                                        <strong><i class="fas fa-gem"></i> <?php echo e(optional($item->parent)->name); ?>: </strong>
                                                       <span> <?php echo e($item->name); ?> </span>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if( $data->baohanh ): ?>
                                                    <div class="status">
                                                        <strong><i class="fas fa-gem"></i> Màu sắc: </strong>
                                                        <span> <?php echo e($data->baohanh); ?> </span>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if( $data->xuatsu ): ?>
                                                    <div class="status">
                                                        <strong><i class="fas fa-gem"></i> Phụ kiện kèm theo: </strong>
                                                        <span> <?php echo e($data->xuatsu); ?> </span>
                                                    </div>
                                                    <?php endif; ?>


                                                    <div class="info-desc">
                                                        <div class="desc">
                                                            <?php echo $data->description; ?>

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="wrap-price">

                                                        <div class="list-attr">
                                                            
                                                            <div class="attr-item">
                                                                <h3>Chọn loại giá để xem giá sản phẩm</h3>
                                                                <div class="price">
                                                                    <?php if($data->price_after_sale): ?>
                                                                    <span>Giá:</span> <span id="priceChange"><?php echo e(number_format($data->price_after_sale)); ?> <span class="donvi">VNĐ</span></span>
                                                                    <?php else: ?>
                                                                    Liên hệ
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="attr-item">
                                                                <div class="form-group">
                                                                    <label for="">Phân loại giá</label>
                                                                    <select name="" id="optionChange" class="form-control optionChange" required="required" >
                                                                        <option value="<?php echo e($data->price_after_sale??0); ?>-0"><?php echo e($data->size??'Mặc định '.$data->size); ?></option>
                                                                        <?php $__currentLoopData = $data->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <option value="<?php echo e($item->price_after_sale??0); ?>-<?php echo e($item->id); ?>"><?php echo e($item->size); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="attr-item">
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
                                                                <a class="add-to-cart" id="addCart" data-url="<?php echo e(route('cart.add',['id' => $data->id,])); ?>" data-start="<?php echo e(route('cart.add',['id' => $data->id,])); ?>">Thêm vào giỏ hàng</a>
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
												<li class="nav-item">
                                                    <a class="nav-link"  data-toggle="tab" href="#kichthuoc" role="tab" aria-controls="tabkichthuoc" aria-selected="true">Hướng Dẫn Đo Size</a>
                                                  </li>
                                              </ul>
                                              <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade  show active" id="mota" role="tabpanel" aria-labelledby="profile-tab">
                                                    <?php echo $data->content; ?>

                                                </div>
                                                <div class="tab-pane fade" id="chinhsach" role="tabpanel" aria-labelledby="home-tab">
                                                    <?php echo optional($chinhSach)->description; ?>

                                                </div>
												  <div class="tab-pane fade" id="kichthuoc" role="tabpanel" aria-labelledby="tabkichthuoc-tab">
                                                    <?php echo optional($huongDan)->description; ?>

                                                </div>
                                              </div>


                                        </div>



                                        
                                    </div>
									<div class="product-relate">
                                        <div class="group-title">
                                            <div class="title title-img">Sản phẩm liên quan</div>
                                            <div class="img-title">
                                                <img src="<?php echo e(asset('frontend/images/bg-title.png')); ?>" alt="">
                                            </div>

                                    </div>
                                <?php if(isset($dataRelate)): ?>
                                    <?php if($dataRelate->count()): ?>
                                        <div class="list-product-card autoplay4-pro category-slide-1" style="width:100%;">
                                            <!-- START BLOCK : cungloai -->

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
                                                                        <a href="<?php echo e($link); ?>">
                                                                            <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <?php if($product->price_after_sale): ?>
                                                                        <span><?php echo e(number_format($product->price_after_sale)); ?> vnđ</span>
                                                                        <?php else: ?>
                                                                        <span>Liên hệ</span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <!-- END BLOCK : cungloai -->
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
                let arrPriceAndId= val.split("-").map(function(value,index){
                    return parseInt(value);
                });
                console.log(arrPriceAndId);
                var nf = Intl.NumberFormat();

                let text= 'Liên hệ';
                let url = $('#addCart').data('start');
                url += "?quantity=" + $('#cart_quantity').val();
                if(arrPriceAndId[1]){
                    url += "&option=" + arrPriceAndId[1];
                }
                if(arrPriceAndId[0]>0){
                    let price= nf.format(arrPriceAndId[0]);
                    text=price+'<span class="donvi"> vnđ</span>';
                }
                $('#addCart').attr('data-url',url);
                $('#priceChange').html(text);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>