    <div class="menu_fix_mobile">
        <div class="close-menu">
			<p>Danh mục Menu</p>
            <a href="javascript:;" id="close-menu-button">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <ul class="nav-main">
			<li class="nav-item <?php echo e(Request::url() == url('/') ? 'active_menu' : ''); ?>">
                <a href="<?php echo e(makeLink('home')); ?>"><span>Trang chủ</span></a>
            </li>
            
            
          <?php echo $__env->make('frontend.components.menu',[
            'limit'=>3,
            'icon_d'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'icon_r'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'data'=>$header['menu_mobile'],
            'active'=>false
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        

        </ul>
		<?php if(isset($header['socialParent']) && $header['socialParent']): ?>
		<div class="social-menu-mb">
			<div class="title">
				<?php echo e($header['socialParent']->name); ?>

			</div>
			<div class="social-menu-main">
				<ul class="social">
					<?php $__currentLoopData = $header['socialParent']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e($item->slug); ?>"><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
    </div>

    <div class="header2">
		<div class="header-top">
			<div class="container-fluid">
				<div class="box-header-top">
					<nav class="top-nav top-nav-left">
                        <ul>
                            <li><a class="smooth">
                                <img src="/frontend/images/icon-store.png" style="vertical-align: text-bottom"> 
								<?php echo e($header['tai_sao']->value); ?></a>
                            </li>
							<li class="mobile_mb"><a class="smooth" href="/danh-muc-tin-tuc/he-thong-cua-hang" fixed-sn="" title="">
                                <img src="/frontend/images/icon-store.png" style="vertical-align: text-bottom"> 
								Hệ thống cửa hàng</a>
                            </li>
                        </ul>
                    </nav>
					<nav class="top-nav">
                        <ul>
                            <li><a class="smooth" href="/danh-muc-tin-tuc/gioi-thieu">Về chúng tôi</a>
                                
                            </li>
                            <li><a class="smooth" href="/danh-muc-tin-tuc/phuong-thuc-thanh-toan" title="">Phương thức thanh toán</a></li>
                        </ul>
                    </nav>
				</div>
			</div>
		</div>
		<div class="header_home">
            <div class="container-fluid">
                <div class="row">
					<div class="list-bar">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <div class="col-lg-2 col-auto col-log-mobi pl-0">
                        <div class="logo-head">
							<div class="image">
								<a href="<?php echo e(makeLink('home')); ?>"><img src="<?php echo e($header['logo']->image_path); ?>" alt="Logo"></a>
							</div>
						</div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="header-top-right">
							<ul>
								<form action="<?php echo e(makeLink('search')); ?>" method="GET" class="cart_header">
								<li>
									<input type="text" name="keyword" class="header-top-search" placeholder="Tìm kiếm trên Min's Kitchen">
									<div class="search_mobile" type="submit"><a>Tìm kiếm</a></div>
								</li>
								</form>
							</ul>
						</div>
                    </div>
                    <div class="col-auto col-lg-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8 contact-top text-center position-relative d-none d-lg-block">
                                <div class="phone">
                                    <a href="tel:<?php echo e($header['tai_sao1']->slug); ?>"><?php echo e($header['tai_sao1']->slug); ?></a>
                                    <span><?php echo e($header['tai_sao1']->value); ?></span>
                                    <a href="tel:<?php echo e($header['tai_sao1']->slug); ?>" class="icon-phone"><i class="fas fa-phone-alt"></i></a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-auto cart d-flex justify-content-end pr-1">
                                <div class="d-flex justify-content-between top-account-wrap">
                                    <div class="h-cart dropdown show" id="li_desktop_cart">
                                        <a class="smooth d-flex" href="<?php echo e(route('cart.list')); ?>">
                                            <img src="/frontend/images/cart.png" alt="cart" title="cart">
                                            <span>Giỏ hàng</span>
                                            <strong class="cart-badge-number" id="desktop-quick-cart-badge"><?php echo e($header['totalQuantity']); ?></strong>
                                            <label class="d-block d-lg-none cart-badge-number" id="desktop-quick-cart-mobi"><?php echo e($header['totalQuantity']); ?></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div id="header" class="header">
            <div class="container-fluid">
				<div class="row">
					<div class="box-header-main">
						<div class="box_padding">
							<div class="menu menu-desktop">
								<ul class="nav-main">
									<li class="nav-item active_menu" style="background: #fbb03b">
										<a href="<?php echo e(makeLink('home')); ?>"><span><i class="fas fa-home"></i></span></a>
									</li>
									

									

									

									

									
									<?php echo $__env->make('frontend.components.menu',[
										'limit'=>3,
										'icon_d'=>'<i class="fa fa-angle-down"></i>',
										'icon_r'=>"<i class='fa fa-angle-right'></i>",
										'data'=>$header['menu_mobile'],
										'active'=>false
									], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									
								</ul>
							</div>
							
							<div class="search" id="search">
								<div class="form-s-mobile">
									<form action="<?php echo e(makeLink('search')); ?>" method="GET">
										<div class="input-group">
										  <input type="text" class="form-control" name="keyword" placeholder="Từ khóa">
										  <div class="input-group-append">
											<button class="input-group-text"  type="submit"><i class="fas fa-search"></i></button>
										  </div>
										</div>
									</form>
									<span class="close-search"><i class="fas fa-times"></i></span>
								</div>
							</div>
							<?php
								$listCategoryId = \App\Models\CategoryProduct::getALlCategoryChildrenAndSelf(185);
								// dd($listCategoryId);
								$categoryProducts =  \App\Models\CategoryProduct::whereIn('id' , $listCategoryId)->where([
								["id", "<>", 185],
							])->get();
								// dd($data);
							?>

						</div>
					</div>
					<div class="col-lg-12 search_mb1">
                        <div class="header-top-right">
							<ul>
								<form action="<?php echo e(makeLink('search')); ?>" method="GET" class="cart_header">
								<li>
									<input type="text" name="keyword" class="header-top-search" placeholder="Tìm kiếm trên Min's Kitchen">
									<div class="search_mobile" type="submit"><a>Tìm kiếm</a></div>
								</li>
								</form>
							</ul>
						</div>
                    </div>
				</div>
            </div>
        </div>
        
    </div>
<?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>