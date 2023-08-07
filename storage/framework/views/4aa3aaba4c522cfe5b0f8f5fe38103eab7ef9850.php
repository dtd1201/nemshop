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
            <div class="bg-home">
                <div class="slide">
                    <?php if(isset($slider)): ?>
                    <div class="box-slide faded cate-arrows-1 d-none d-md-block">
                        <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slide">
                            <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($slidersM)): ?>
                    <div class="box-slide faded cate-arrows-1 d-block d-md-none" >
                        <?php $__currentLoopData = $slidersM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slide">
                            <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="cate_home">
                    <div class="container">
                        <div class="row">
                            <div class="list_cate">
                                <?php if( isset($thongtin_danhmucsp) && $thongtin_danhmucsp->count()>0): ?>
								<div class="cate_info">
									<div class="desc">
									   <?php echo $thongtin_danhmucsp->description; ?>

									</div>
                                    <div class="name"><?php echo e($thongtin_danhmucsp->value); ?></div>
                                    <!-- <div class="line_column"></div> -->
								</div>
                                <?php endif; ?>
                                <div class="slide_cate cate-dot-1">
                                    <?php if(isset($categoryProductHome)&&$categoryProductHome): ?>
                                    <?php $__currentLoopData = $categoryProductHome->childs()->where('active',1)->orderby('order')->latest()->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <a href="<?php echo e($item->slug_full); ?>">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="<?php echo e(asset($item->avatar_path)); ?>" alt="<?php echo e($item->name); ?>">
                                                </div>
                                                <div class="content">
                                                    <h4><?php echo e($item->name); ?></h4>
                                                </div>
                                            </div>
                                        </a>                                        
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="list_cate list_cate2">
                                <?php if(isset($categoryProductHome2)&&$categoryProductHome2): ?>
                                <?php $__currentLoopData = $categoryProductHome2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <div class="box">
                                        <div class="image">
                                            <img src="<?php echo e(asset($item->avatar_path)); ?>" alt="<?php echo e($item->name); ?>">
                                        </div>
                                        <div class="content">
                                            <h4><?php echo e($item->name); ?></h4>
                                            <ul class="category-list">
                                                <?php $__currentLoopData = $item->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e($item2->slug_full); ?>"><?php echo e($item2->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-pro-tab-home">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs" id="" role="tablist">
                                    <?php if(isset($titleSPBanchay)&&$titleSPBanchay): ?>
                                    <div class="group-title">
                                        <div class="title title-img"><?php echo e($titleSPBanchay->name); ?></div>
                                        <div class="img-title">
                                            <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
                                        </div>
                                        <div class="title-b">
                                            <span>
                                               <?php echo $titleSPBanchay->description; ?>

                                            </span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </ul>
                                <div class="tab-content" id="">
                                    <div class="tab-pane fade show active" id="pro-tab-1" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="list-product">
                                            <div class="row">
                                                <?php if(isset($productsBest)&&$productsBest): ?>
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
                                                                </div>
                                                                <div class="content">
                                                                    <h3>
                                                                        <a href="<?php echo e($link); ?>">
                                                                           <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <span class="new-price">Giá: <?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?></span>
                                                                        <?php if($product->sale>0): ?>
                                                                            <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
																	<div class="free"><img src="<?php echo e(asset('frontend/images/vanchuyen.png')); ?>" alt="vanchuyen"> Miễn phí vận chuyển toàn quốc</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-banner-home">
                    <?php if(isset($banner)&&$banner): ?>
                    <div class="item-banner">
                        <a href="<?php echo e($banner->slug); ?>">
                            <img src="<?php echo e(asset($banner->image_path)); ?>" alt="<?php echo e($banner->name); ?>">
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
				<div class="wrap-pro-tab-home">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs" id="" role="tablist">
                                    <?php if(isset($titleSMMoi)&&$titleSMMoi): ?>
                                    <div class="group-title">
                                        <div class="title title-img"><?php echo e($titleSMMoi->name); ?></div>
                                        <div class="img-title">
                                            <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
                                        </div>
                                        <div class="title-b">
                                            <span>
                                               <?php echo $titleSMMoi->description; ?>

                                            </span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </ul>
                                <div class="tab-content" id="">
                                    <div class="tab-pane fade show active" id="pro-tab-1" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="list-product">
                                            <div class="row">
                                                <?php if(isset($productNew)&&$productNew): ?>
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
                                                                </div>
                                                                <div class="content">
                                                                    <h3>
                                                                        <a href="<?php echo e($link); ?>">
                                                                           <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <span class="new-price">Giá: <?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?></span>
                                                                        <?php if($product->sale>0): ?>
                                                                            <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
																	<div class="free"><img src="<?php echo e(asset('frontend/images/vanchuyen.png')); ?>" alt="vanchuyen"> Miễn phí vận chuyển toàn quốc</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($dichvu)&&$dichvu): ?>
                <div class="cam_ket">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="group-title">
                                    <div class="title title-img"><?php echo e($dichvu->name); ?></div>
                                    <div class="img-title">
                                        <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
                                    </div>
                                    <div class="title-b">
                                        <span>
                                           <?php echo e($dichvu->value); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-12">
                                <div class="row">
                                    <div class="list_camket">
                                        <?php $__currentLoopData = $dichvu->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <div class="box">
                                                <div class="image">
                                                    <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>">
                                                </div>
                                                <div class="info">
                                                    <div class="name"><?php echo e($item->name); ?></div>
                                                    <div class="desc"><?php echo e($item->value); ?></div>
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
                <div class="wrap-ykkh">
                    <div class="container">
                        <div class="row">
                            <?php if(isset($camnhan)&&$camnhan): ?>
                            <div class="col-12 col-sm-12">
                                <div class="group-title">
                                    <div class="title title-img"><?php echo e($camnhan->name); ?></div>
                                    <div class="img-title">
                                        <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="">
                                    </div>
                                    <div class="title-b">
										<span>
                                           <?php echo e($camnhan->value); ?>

                                        </span>
									</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="list-ykkh autoplay4-ykkh category-slide-1">
                                    <?php $__currentLoopData = $camnhan->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $tran=$item->translationsLanguage()->first();
                                    ?>
                                    <div class="col-ykkh-item">
                                        <div class="item-ykkh">
                                            <div class="nd_ykien">
                                                <?php echo $tran->description; ?>

                                            </div>
                                            <div class="box">
                                                <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($tran->name); ?>">
                                            </div>
                                            <div class="box_right">
                                                <h2><?php echo e($tran->name); ?></h2>
                                                <p><?php echo e($tran->slug); ?></p>
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
                <div class="parallax-section2"></div>

                <div class="wrap-post-home wow fadeInUp">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <?php if(isset($titlePostNew)&&$titlePostNew): ?>
                                <div class="group-title">
                                    <div class="title title-img"><?php echo e($titlePostNew->name); ?></div>
                                    <div class="img-title">
                                        <img src="<?php echo e(asset('frontend/images/b.png')); ?>" alt="icon">
                                    </div>
                                    <div class="title-b">
                                        <span>
                                           <?php echo $titlePostNew->description; ?>

                                        </span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="list-post-home tin-tuc-home category-slide-1 category-slide-2">
                                    <?php if(isset($postNew)&&$postNew): ?>
                                    <?php $__currentLoopData = $postNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $tran=$post->translationsLanguage()->first();
                                        $link=$post->slug_full;
                                    ?>
                                    <div class="item-post">
                                        <div class="box">
                                         <div class="image">
                                             <a href="<?php echo e($link); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>"></a>
                                             <div class="info">
                                                 <span><?php echo e(date_format($post->created_at,'d/m/Y')); ?></span>
                                             </div>
                                         </div>
                                         <div class="content">
                                             <div class="name"><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></div>
                                             <div class="desc">
                                                 <?php echo $tran->description; ?>

                                             </div>
                                             <div class="text-left">
                                                <a href="<?php echo e($link); ?>" class="link-detail">Chi tiết <i class="fas fa-long-arrow-alt-right"></i></a>
                                             </div>
                                         </div>
                                        </div>
                                     </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

       setTimeout(() => $('#modal-first').modal('show'), 10000);
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/largevendor.com/demo4.largevendor.com/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>