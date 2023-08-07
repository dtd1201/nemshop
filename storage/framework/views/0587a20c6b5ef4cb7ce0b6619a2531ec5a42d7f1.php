<?php $__env->startSection('title', $header['seo_home']->name); ?>
<?php $__env->startSection('image', asset($header['seo_home']->image_path)); ?>
<?php $__env->startSection('keywords', $header['seo_home']->slug); ?>
<?php $__env->startSection('description', $header['seo_home']->value); ?>
<?php $__env->startSection('abstract', $header['seo_home']->slug); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <!-- <h1 class="d-none">
                {h1trangchu}
            </h1>
            <h2 class="d-none">
                {h2trangchu}
            </h2> -->
			<div class="container">
				<div class="row">
					
					<div class="col-sm-9 col-12 padding_in block-content-right">
						<div class="slide">
							<?php if(isset($slider)): ?>
							<div class="box-slide faded cate-arrows-1 d-none d-md-block">
								<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="item-slide">
									<a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<?php endif; ?>
							<?php if(isset($slidersM)): ?>
							<div class="box-slide faded cate-arrows-1 d-block d-md-none" >
								<?php $__currentLoopData = $slidersM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="item-slide">
									<a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<?php endif; ?>
						</div>
						
                        <div class="wrap-pro-tab-home">
                            <aside class="styled_header use_icon">
                                <h3><?php echo e(__('home.san_pham_ban_chay')); ?></h3>
                            </aside>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <?php if( isset($productHot) && $productHot->count()>0 ): ?>
                                        <div class="list-product">
                                            <div class="row">
                                                <?php $__currentLoopData = $productHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
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
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="wrap-pro-tab-home">
                            <aside class="styled_header use_icon">
                                <h3><?php echo e(__('home.san_pham_moi')); ?></h3>
                            </aside>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <?php if( isset($productNew) && $productNew->count()>0 ): ?>
                                        <div class="list-product">
                                            <div class="row">
                                                <?php $__currentLoopData = $productNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
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
                                            <div class="row">
                                                
                                                <?php if(isset($cateProduct)): ?>
                                                <div class="col-sm-12 col-12 pull-center center ">
                                                    <a class="btn btn-readmore" href="<?php echo e($cateProduct->slug_full); ?>" role="button"><?php echo e(__('home.xem_tat_ca')); ?></a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

					</div>
					<div class="col-sm-3 col-12 block-content-left">
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
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
              $('.autoplay4-pro').slick('setPosition');
            });
        });

       /*setTimeout(() => $('#modal-first').modal('show'), 10000);*/
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kimvietplywood.com/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>