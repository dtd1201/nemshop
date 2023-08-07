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
    <?php if(Session::has('msg')): ?>
    <script type="text/javascript">
        alert("<?php echo e(Session::get('msg')); ?>");
    </script>
    <?php endif; ?>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 block-content-left">
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
                                                    
                                                    
                                                    <div class="box-price">
                                                        <span class="new-price"><?php echo e($data->price?number_format($data->price)." ".$unit:"Liên hệ"); ?></span>
                                                        <?php if($data->old_price>0): ?>
                                                            <span class="old-price"><?php echo e(number_format($data->old_price)); ?> <?php echo e($unit); ?></span>
                                                        <?php endif; ?>
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
                                                  <a class="nav-link active"  data-toggle="tab" href="#mota" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__('product.chi_tiet_san_pham')); ?> <?php echo e($data->name); ?></a>
                                                </li>
                                                
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade  show active" id="mota" role="tabpanel" aria-labelledby="profile-tab">
                                                    <?php echo $data->content; ?>

													
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
                                                            <div class="newsletter-content">
                                                                <h2>DỰ BÁO CHI PHÍ</h2>
                                                                <form action="<?php echo e(route('contact.storeAjax2')); ?>"  data-url="<?php echo e(route('contact.storeAjax2')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-round">
                                                                    <?php echo csrf_field(); ?>
																	<div class="row">
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="content" placeholder="Sản phẩm" value="<?php echo e($data->name); ?>" required>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="name" placeholder="Họ tên *">
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="chieudai" placeholder="Chiều dài công trình *">
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="email" placeholder="Địa chỉ Email *">
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="name" placeholder="Chiều rộng công tình *">
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="phone" placeholder="Số điện thoại *" required>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="phone" placeholder="Chiều cao công trình *" required>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                    		<input type="text" class="form-control" name="phone" placeholder="Địa chỉ" required>
																		</div>
																		<div class="col-md-12 col-sm-12 col-xs-12">
                                                                    		<textarea name="content" class="form-control" placeholder="<?php echo e(__('contact.content')); ?>" id="noidung" cols="30" rows="7"></textarea>
																		</div>
																		<div class="col-md-12 col-sm-12 col-xs-12">
                                                                    		<button><?php echo e(__('contact.send_info')); ?></button>
																		</div>
																	</div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            <?php if(count($data->productStars) > 0): ?>
                                                <div class="rate_comments" id="comments">
                                                    
                                                </div>
                                            <?php else: ?>
                                                Chưa có đánh giá nào.
                                            <?php endif; ?>

                                        
                                        

                                        
                                        
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
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/xzoom/setup.js')); ?>"></script>
    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    <script>
        $(document).ready(function(){
            load_comment();

            function load_comment(){
                var product_id = $('.product_id').val();
                //var user_id = $('.user_id').val();
                var _token = $('input[name = "_token"]').val();

                $.ajax({
                    url : '<?php echo e(route('product.loadComment')); ?>',
                    method : 'POST',
                    data : {product_id : product_id , _token : _token},
                    success : function(data){
                        $('#comments').html(data);
                    } 
                });
            }

            $('.send_comment').click(function(){
                var product_id = $('.product_id').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var title = $('.title').val();
                var content = $('.content').val();
                var rating = $("input[name='rating']:checked").val();
                
                var _token = $('input[name = "_token"]').val();

                $.ajax({
                    url : '<?php echo e(route('product.sendComment')); ?>',
                    method : 'POST',
                    data : {product_id : product_id , email : email ,phone : phone,title : title , content : content ,  rating: rating, _token : _token},
                    success : function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Gửi đánh giá thành công',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        load_comment();
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>