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
        <?php
            $vechungtoi = \App\Models\Setting::find(304);
        ?>
        <div class="slide">
            <?php if(isset($slider)): ?>
                <div class="box-slide faded cate-arrows-1">
                    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-slide">
                        <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>     
		<div class="ss03_product">
			<div class="container">
				<div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="group-title">
                            <div class="title title-img"><?php echo e(__('home.san_pham_moi')); ?></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <?php if( isset($productsBest) && $productsBest->count()>0 ): ?>
                        <div class="list-product">
                            <div class="row">
                                <?php $__currentLoopData = $productsBest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tran=$product->translationsLanguage()->first();
                                    $link=$product->slug_full;
                                ?>
                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="product-item">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e($link); ?>">
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                    <?php if($product->old_price && $product->price): ?>
                                                        <span class="sale">   <?php echo e(ceil(100 -($product->price)*100/($product->old_price))." %"); ?> </span>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
         </div>
		<div class="ss03_product" style="background: #eee;">
			<div class="container">
				<div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="group-title">
                            <div class="title title-img"><?php echo e(__('home.san_pham_moi1')); ?></div>
                        </div>
                    </div>
                    
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
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                    <?php if($product->old_price && $product->price): ?>
                                                        <span class="sale">  <?php echo e(ceil(100 -($product->price)*100/($product->old_price))." %"); ?></span>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
         </div>
		<div class="ss03_product">
			<div class="container">
				<div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="group-title">
                            <div class="title title-img"><?php echo e(__('home.san_pham_moi2')); ?></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <?php if( isset($productsHeart) && $productsHeart->count()>0 ): ?>
                        <div class="list-product">
                            <div class="row">
                                <?php $__currentLoopData = $productsHeart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tran=$product->translationsLanguage()->first();
                                    $link=$product->slug_full;
                                ?>
                                <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="product-item">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e($link); ?>">
                                                    <img src="<?php echo e($product->avatar_path != null ?  asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                    <?php if($product->old_price && $product->price): ?>
                                                        <span class="sale">  <?php echo e(ceil(100 -($product->price)*100/($product->old_price))." %"); ?> </span>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
         </div>	
		<div class="banner-home">
            <div class="container">
                <div class="row">
                    <?php if(isset($categoryProductHome)&&$categoryProductHome): ?>
                    <?php $__currentLoopData = $categoryProductHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 menu_home">
                        <div class="product-transition1">
                              <div class="product-image-in">
                                  <div class="images_menu">
                                      <a href="<?php echo e($item->slug_full); ?>"><img src="<?php echo e(asset($item->avatar_path)); ?>" alt="<?php echo e($item->name); ?>"></a>
                                  </div>
                                  <h2><a href="<?php echo e($item->slug_full); ?>"><?php echo e($item->name); ?></a></h2>
                              </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php endif; ?>
                </div>
            </div>
        </div>
			
        <div class="section_news">
			<div class="ss04_tintuc">
				<div class="container">
					<div class="row">
						
						<?php if($post_home): ?>
							<div class="col-lg-12 col-sm-12">
                                <div class="list">
                                    <div class="row">
                                        <?php $__currentLoopData = $post_home->take(-3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="list_news2">
                                                    <div class="item">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e(makeLink('post',$value->id,$value->slug)); ?>" title="<?php echo e($value->nameL); ?>">
                                                                    <img src="<?php echo e($value->avatar_path != null ? asset($value->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($value->name); ?>">
                                                                </a>
                                                            </div>
                                                            <div class="info">
                                                                <h3 class="post_title">
                                                                    <a href="<?php echo e(makeLink('post',$value->id,$value->slug)); ?>" title="<?php echo e($value->nameL); ?>">
                                                                        <?php echo e($value->name); ?>

                                                                    </a>
                                                                </h3>  
                                                                <div class="desc_home_in">
                                                                    <?php echo $value->description; ?>

                                                                </div>
																<a class="btn_timhieuthem" href="<?php echo e($link); ?>">Tìm hiểu thêm ></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
           
			
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>