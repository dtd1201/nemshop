<?php $__env->startSection('title', $header['seo_home']->name); ?>
<?php $__env->startSection('image', asset($header['seo_home']->image_path)); ?>
<?php $__env->startSection('keywords', $header['seo_home']->slug); ?>
<?php $__env->startSection('description', $header['seo_home']->value); ?>
<?php $__env->startSection('abstract', $header['seo_home']->slug); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="main">
        <div class="slide">
			<div class="container-fluid">
				<div class="row">
                    <div class="col-12 col-sm-9">
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
					<?php if(isset($slidesub)&&$slidesub): ?>
					<div class="col-12 col-sm-3 padding_slide">
                          <?php $__currentLoopData = $slidesub->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $tran=$item->translationsLanguage()->first();
                        ?>
                          <div class="slide_sub_home">
							  <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path != null ?  asset($item->image_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>"></a>
                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
					<?php endif; ?>
				</div>
			</div>
        </div>
		<?php if(isset($hotro)&&$hotro): ?>
		<div class="support">
			<div class="container-fluid">
				<div class="row">
                    <?php $__currentLoopData = $hotro->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $tran=$item->translationsLanguage()->first();
                        ?>
                        <div class="col-xs-3 item">
                            <div class="box_item">
                                <div class="icon">
                                    <img src="<?php echo e($item->image_path != null ?  asset($item->image_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                </div>
                                <div class="info">
                                    <div class="title"><?php echo e($tran->name); ?></div>
                                    <div class="desc">
                                        <p><?php echo $tran->value; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
        <?php endif; ?>
		<div class="ss03_product">
			<div class="container-fluid">
				<div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="group-title">
                            <div class="title title-img">GIÁ TỐT MỖI TUẦN</div>
                        </div>
                    </div>
					<div class="col-12 col-sm-12">
						<?php if( isset($productsBest) && $productsBest->count()>0 ): ?>
                            <div class="list_feedback1 autoplay6-tintuc category-slide-1">
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
                                                <div class="cart">
                                                    <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                        <img class="lazy" src="https://gofood.vn/images/icon_add_cart.png" width="30" height="35"> Thêm vào giỏ hàng
                                                    </span>
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
                                            </div>
                                            <div class="content">
                                                <h3><a href="<?php echo e($link); ?>"><?php echo e($tran->name); ?></a></h3>
												<div class="countdown1">
													<div class="tiles1">
														<div class="item1">
															<span class="days1">08</span>
															<div class="labels1">Ngày</div>
														</div>
														<div class="item1">
															<span class="hours1">0</span>
															<div class="labels1">Giờ</div>
														</div>
														<div class="item1">
															<span class="minutes1">0</span>
															<div class="labels1">Phút</div>
														</div>
														<div class="item1">
															<span class="seconds1">0</span>
															<div class="labels1">Giây</div>
														</div>
													</div>
												</div>
                                                <div class="box-price">
                                                    <span class="new-price"><?php echo e($product->price?number_format($product->price)." /".$product->size ?? $unit:"Liên hệ"); ?></span>
                                                    <?php if($product->old_price>0): ?>
                                                        <span class="old-price"><?php echo e(number_format($product->old_price)); ?> /<?php echo e($product->size ?? $unit); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        </div>
                </div>
            </div>
         </div>
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
						//$(".days1").text(days);
						$(".hours1").text(hours);
						$(".minutes1").text(minutes);
						$(".seconds1").text(seconds);
					}
				}
			});
	</script>
  <?php if(isset($categoryProductHome)&&$categoryProductHome): ?>
      <?php $__currentLoopData = $categoryProductHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="ss04_product">
			<div class="container-fluid">
				<div class="row">
					<?php if($item->icon_path): ?>
					<div class="col-12 col-sm-12">
						<div class="images_danhmuc">
							<a href="<?php echo e($item->slug_full); ?>"><img src="<?php echo e(asset($item->icon_path)); ?>" alt="<?php echo e($item->name); ?>"></a>
						</div>
                    </div>
					<?php endif; ?>
                    <div class="col-12 col-sm-12">
						<div class="group_title">
                            <h3 class="title title-underline"><a href="<?php echo e($item->slug_full); ?>"><?php echo e($item->name); ?></a></h3>
							<div class="xemthem_home"><a href="<?php echo e($item->slug_full); ?>">Xem tất cả <i class="fas fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <?php if( isset($item) && $item->count()>0 ): ?>
						<?php
							$categoryProduct = 	new App\Models\CategoryProduct;
							$product = new App\Models\Product;
							$listIdProduct = $categoryProduct->getALlCategoryChildrenAndSelf($item->id);
							$datProducts = $product->whereIn('category_id', $listIdProduct)->where('active',1)->limit(10)->get();
						?>
                        <div class="list-product list_feedback1">
                            <div class="row">
                                <?php $__currentLoopData = $datProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <div class="cart">
                                                    <?php if(isset($data->price) && $data->price > 0): ?>  
                                                    <span class="addCart add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id])); ?>" data-start="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                        <img class="lazy" src="https://gofood.vn/images/icon_add_cart.png" width="30" height="35"> Thêm vào giỏ hàng
                                                    </span>
                                                    <?php else: ?>
                                                        <span class="addCart" data-toggle="modal" data-target="#modal-add-cart_<?php echo e($product->id); ?>">
                                                            <img class="lazy" src="https://gofood.vn/images/icon_add_cart.png" width="30" height="35"> Thêm vào giỏ hàng
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                
                                                <div class="modal fade modal-First" id="modal-add-cart_<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content"  image="">
                                                            <div class="modal-body">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                </button>
                                                                <div class="image-modal">
                                                                    <div class="info_product_modal">
                                                                        <div class="title">
                                                                            <?php echo e($product->name); ?>

                                                                        </div>
                                                                        <div class="image">
                                                                            <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($product->name); ?>">
                                                                        </div>
                                                                        <div class="list-attr">
                                                                            <div class="attr-item">
                                                                                <div class="price">
                                                                                    <?php if($product->price): ?>
                                                                                        <?php if($product->price_after_sale): ?>
                                                                                            <span id="priceChange">Giá: <?php echo e(number_format($product->price_after_sale)); ?> <span class="donvi">đ</span></span>
                                                                                        <?php endif; ?>
                                                                                        <?php if($product->sale>0): ?>
                                                                                            <span class="title_giacu">Giá cũ: </span>
                                                                                            <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                
                                                                                            <div class="tiet_kiem">
                                                                                                <div class="g2">(Tiết kiệm: <b><?php echo e(number_format(
                                                                                                    ($product->price - $product->price_after_sale))); ?></b>)</div>
                                                                                                <div class="tk">
                                                                                                    <b>-<?php echo e($product->sale); ?>%</b>
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
                                                                            <input type="text" class="form-control" name="content" placeholder="Sản phẩm muốn xem *" value="<?php echo e($product->name); ?>" required>
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
                                                    <span class="new-price"><?php echo e($product->price?number_format($product->price)." /".$product->size ?? $unit:"Liên hệ"); ?></span>
                                                    <?php if($product->old_price>0): ?>
                                                        <span class="old-price"><?php echo e(number_format($product->old_price)); ?> /<?php echo e($product->size ?? $unit); ?></span>
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
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 <?php endif; ?>

 

		
<div class="wrap-partner">
    <div class="container-fluid">
        <div class="row">
			<div class="col-12 col-sm-12">
                <div class="group-title">
                    <div class="title title-img">ĐỐI TÁC CHIẾN LƯỢC</div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="list-item autoplay5-doitac category-slide-1">
                    <?php if($footer['doitac']): ?>
                    <?php $__currentLoopData = $footer['doitac']->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="box">
                            <a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
			
        <div class="section_news">
			<div class="ss04_tintuc">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="group-title">
								<div class="title title-img"><?php echo e(__('home.tin_tuc_moi')); ?></div>
							</div>
						</div>
						<div class="col-12 col-sm-12">
                            <div class="list_feedback autoplay6-tintuc category-slide-1">
                                <?php if($post_home): ?>
                        			<?php $__currentLoopData = $post_home->take(-8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="item news_home">
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
								<?php endif; ?>
                            </div>
                        </div>
						
                            
						</div>
				</div>
			</div>
		</div>
        <div class="wrap-ykkh">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="group-title">
                                <div class="title title-img">Video clip</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="list_feedback autoplay6-video category-slide-1">
                                <?php if($post_home_video): ?>
                        		<?php $__currentLoopData = $post_home_video->take(-7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="post-cate">
									<a data-fancybox="" class="hv-over" href="<?php echo $value->description; ?>" title="<?php echo e($value->name); ?>" tabindex="0">
										<img class="lazy" src="<?php echo e($value->avatar_path != null ? asset($value->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($value->name); ?>" title="<?php echo e($value->name); ?>" data-a="<?php echo e($value->avatar_path != null ? asset($value->avatar_path) : '../frontend/images/no-images.jpg'); ?>" style="width: 100%; height: auto; opacity: 1;">
										<div class="flex-center mfw-absolute-full d-flex justify-content-center align-items-center">
											<img src="../frontend/images/icon-play-youtube.png" width="80px" height="80px">
										</div>
									</a>
									<h3 class="title title-video">
										<a data-fancybox="" class="smooth" href="<?php echo $value->description; ?>" title="<?php echo e($value->name); ?>" tabindex="0"><?php echo e($value->name); ?></a>
									</h3>
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
        // setTimeout(() => $('#modal-add-cart').modal('show'), 10000);
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>