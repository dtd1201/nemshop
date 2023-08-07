<style>
	.sub-nav-product-list .box-price span {
		padding: 0;
	}

	.sub-nav-product-list .box-price span.old-price {
		display: block;
		width: 100%;
	}

	.sub-nav-product-list .box-price span.new-price {
		font-weight: 500;
		font-size: 16px;
		line-height: 24px;
		height: auto;
		margin-right: 3px;
	}

	.sub-nav-product-list .box-price {
		text-align: left;
		font-size: 14px;
		line-height: 24px;
		padding: 0;
		align-items: unset;
		vertical-align: baseline;
		height: 44px;
	}

	.ues .item_ueas-tr::before {
		display: none;
	}
</style>

<div class="menu_fix_mobile">
	<div class="close-menu">
		<p><a href="<?php echo e(makeLink('home')); ?>">
				<img src="<?php echo e(asset($header['logo']->image_path ??'')); ?>" alt="Logo">
			</a></p>
		<a href="javascript:;" id="close-menu-button">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
	</div>
	<ul class="nav-main">
		<li class="nav-item">
			<a href="<?php echo e(makeLink('home')); ?>">
				<span> Trang chủ</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo e(makeLinkToLanguage('about-us', null, null, App::getLocale())); ?>">
				<span> Giới thiệu</span>
			</a>
		</li>
		<?php if(isset($header['hangNoiDia']) && $header['hangNoiDia']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['hangNoiDia']->slug_full); ?>">
				<span><?php echo e($header['hangNoiDia']->name); ?></span>
				<?php if(isset($header['hangNoiDia']->childs)): ?>
				<?php if(count($header['hangNoiDia']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['hangNoiDia']->childs)): ?>
				<?php if(count($header['hangNoiDia']->childs)>0): ?>
				<?php $__currentLoopData = $header['hangNoiDia']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="">
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(isset($header['hangNgoaiDia']) && $header['hangNgoaiDia']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['hangNgoaiDia']->slug_full); ?>">
				<span><?php echo e($header['hangNgoaiDia']->name); ?></span>
				<?php if(isset($header['hangNgoaiDia']->childs)): ?>
				<?php if(count($header['hangNgoaiDia']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['hangNgoaiDia']->childs)): ?>
				<?php if(count($header['hangNgoaiDia']->childs)>0): ?>
				<?php $__currentLoopData = $header['hangNgoaiDia']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="">
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(isset($header['meVaBe']) && $header['meVaBe']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['meVaBe']->slug_full); ?>">
				<span><?php echo e($header['meVaBe']->name); ?></span>
				<?php if(isset($header['meVaBe']->childs)): ?>
				<?php if(count($header['meVaBe']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['meVaBe']->childs)): ?>
				<?php if(count($header['meVaBe']->childs)>0): ?>
				<?php $__currentLoopData = $header['meVaBe']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="">
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(isset($header['hangNgoaiDia1']) && $header['hangNgoaiDia1']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['hangNgoaiDia1']->slug_full); ?>">
				<span><?php echo e($header['hangNgoaiDia1']->name); ?></span>
				<?php if(isset($header['hangNgoaiDia1']->childs)): ?>
				<?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['hangNgoaiDia1']->childs)): ?>
				<?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
				<?php $__currentLoopData = $header['hangNgoaiDia1']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="">
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>

		<?php if(isset($header['hangNgoaiDia2']) && $header['hangNgoaiDia2']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['hangNgoaiDia2']->slug_full); ?>">
				<span><?php echo e($header['hangNgoaiDia2']->name); ?></span>
				<?php if(isset($header['hangNgoaiDia2']->childs)): ?>
				<?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['hangNgoaiDia2']->childs)): ?>
				<?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
				<?php $__currentLoopData = $header['hangNgoaiDia2']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="">
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(isset($header['hangNgoaiDia3']) && $header['hangNgoaiDia3']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['hangNgoaiDia3']->slug_full); ?>">
				<span><?php echo e($header['hangNgoaiDia3']->name); ?></span>
				<?php if(isset($header['hangNgoaiDia3']->childs)): ?>
				<?php if(count($header['hangNgoaiDia3']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['hangNgoaiDia3']->childs)): ?>
				<?php if(count($header['hangNgoaiDia3']->childs)>0): ?>
				<?php $__currentLoopData = $header['hangNgoaiDia3']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="">
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(isset($header['hangNgoaiDia4']) && $header['hangNgoaiDia4']): ?>
		<li class="nav-item">
			<a href="<?php echo e($header['hangNgoaiDia4']->slug_full); ?>">
				<span><?php echo e($header['hangNgoaiDia4']->name); ?></span>
				<?php if(isset($header['hangNgoaiDia4']->childs)): ?>
				<?php if(count($header['hangNgoaiDia4']->childs)>0): ?>
				<i class="fa fa-angle-down mn-icon"></i>
				<?php endif; ?>
				<?php endif; ?>
			</a>
			<ul class="nav-sub">
				<?php if(isset($header['hangNgoaiDia4']->childs)): ?>
				<?php if(count($header['hangNgoaiDia4']->childs)>0): ?>
				<?php $__currentLoopData = $header['hangNgoaiDia4']->childs()->where('active', 1)->orderBy('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li>
					<a href="<?php echo e($value->slug_full); ?>">
						<span><?php echo e($value->name); ?></span>
					</a>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php if(isset($header['menuNew']) && $header['menuNew']): ?>
		<?php $__currentLoopData = $header['menuNew']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li class="nav-item">
			<a href="<?php echo e($value->slug_full); ?>">
				<span><?php echo e($value->name); ?></span>
			</a>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
		
	</ul>
	<?php if(isset($header['socialParent']) && $header['socialParent']): ?>
	<div class="social-menu-mb">
		<div class="title">
			<?php echo e($header['socialParent']->name); ?>

		</div>
		<div class="social-menu-main">
			<ul class="social">
				<?php $__currentLoopData = $header['socialParent']->childs()->where('active',1)->orderby('order')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><a href="<?php echo e($item->slug_full); ?>"><img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>"></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<h2><?php echo e($header['socialParent']->slug_full); ?></h2>
		<p><?php echo e($header['socialParent']->value); ?></p>
	</div>
	<?php endif; ?>

</div>

<div class="header2">

	<div class="header_home">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="list-bar">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>
					<div class="logo-head">
						<div class="image">
							<a href="<?php echo e(makeLink('home')); ?>">
								<img src="<?php echo e(asset($header['logo']->image_path)); ?>" alt="Logo">
							</a>
						</div>
					</div>
					<div class="search_desktop">
						<form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kếm..." />
								<div class="input-group-append">
									<button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					<div class="ues">
						<div class="item_ueas item_ueas-tr">
							<ul>
								<?php if(auth()->guard()->guest()): ?>
								<li class="link_sign_in">
									<a class="nav-link btn-sign_in">
										<span><img src="<?php echo e(asset('/frontend/images/list.png')); ?>" alt="list"></span>
										<span> Tra cứu </br><strong style="font-weight: 600;">Đơn hàng</strong></span>
									</a>
								</li>
								<?php if(Route::has('register')): ?>
								<!-- <li class="link_sign_up btn-sign_up">
								<a class="nav-link">
									<span size="24" class="css-pfmvnv" fill="#fff"><svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M24 4C18.4772 4 14 8.47715 14 14C14 19.5228 18.4772 24 24 24C29.5228 24 34 19.5228 34 14C34 8.47715 29.5228 4 24 4ZM12.2499 28C9.90326 28 8.00002 29.9013 8 32.2489L8 33C8 36.7555 9.94167 39.5669 12.9202 41.3802C15.8491 43.1633 19.7861 44 24 44C28.2139 44 32.1509 43.1633 35.0798 41.3802C38.0583 39.5669 40 36.7555 40 33L40 32.2487C40 29.9011 38.0967 28 35.7502 28H12.2499Z" fill="currentColor"></path>
										</svg></span>
									<span>Đăng ký</span>
								</a>
							</li> -->
								<?php endif; ?>
								<?php else: ?>
								<?php if(Auth::guard('web')->check()): ?>
								<li>
									<div class="dropdown-login">
										<a class="dropdown-toggle" href="javascrip:;">
											<i class="fas fa-user"></i> <?php echo e(auth()->user()->name); ?>

										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="<?php echo e(route('profile.editInfo')); ?>"> <i class="fas fa-user"></i> Tài khoản</a>
											<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												<i class="fas fa-sign-out-alt"></i> Thoát </a>
											<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
												<?php echo csrf_field(); ?>
											</form>
										</div>
									</div>
								<li>
									<?php endif; ?>
									<?php endif; ?>
							</ul>
						</div>
					</div>
					<div class="h-cart dropdown show" id="li_desktop_cart">
						<span class="estore-icon  css-1usv4xi" fill="#fff" style="font-size: 24px;"><svg viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.9414 1.93125C5.98269 1.93125 1.94336 5.97057 1.94336 10.9293C1.94336 15.888 5.98269 19.9352 10.9414 19.9352C13.0594 19.9352 15.0074 19.193 16.5469 17.9606L20.2949 21.7066C20.4841 21.888 20.7367 21.988 20.9987 21.9853C21.2607 21.9826 21.5112 21.8775 21.6966 21.6923C21.882 21.5072 21.9875 21.2569 21.9906 20.9949C21.9936 20.7329 21.8939 20.4801 21.7129 20.2907L17.9648 16.5427C19.1983 15.0008 19.9414 13.0498 19.9414 10.9293C19.9414 5.97057 15.9001 1.93125 10.9414 1.93125ZM10.9414 3.93128C14.8192 3.93128 17.9395 7.05148 17.9395 10.9293C17.9395 14.8071 14.8192 17.9352 10.9414 17.9352C7.06357 17.9352 3.94336 14.8071 3.94336 10.9293C3.94336 7.05148 7.06357 3.93128 10.9414 3.93128Z" fill="currentColor"></path>
							</svg></span>
						<a class="smooth d-flex" href="<?php echo e(route('cart.list')); ?>">
							<img src="<?php echo e(asset('/frontend/images/cart.png')); ?>" alt="cart" title="cart">
							<span>Giỏ hàng</span>
							<strong class="cart-badge-number" id="desktop-quick-cart-badge"><?php echo e($header['totalQuantity']); ?></strong>
							<label class="d-block d-lg-none cart-badge-number" id="desktop-quick-cart-mobi"><?php echo e($header['totalQuantity']); ?></label>
						</a>
						<?php if($header['data-cart']): ?>
						<div class="list-product css-19k9yp8" style="">
							<div class="wrapper">
								<h3 class="title__cart">Giỏ hàng</h3>
								<div class="body">
									<?php $__currentLoopData = $header['data-cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="card-item ">
										<div class="img ">
											<a href="/cham-soc-ca-nhan/yen-sao-va-dong-trung-ha-thao-greenbird-6-chai-x-185ml-33046.html">
												<picture class="picture__cart">
													<img alt="img__cart" class="" src="<?php echo e($item['avatar_path']); ?>">
												</picture>
											</a>
										</div>
										<div class="info__cart">
											<a href="<?php echo e($item['slug_full']); ?>" class="cursor-pointer">
												<h3 class="name-product text-text-primary line-clamp-2 mb-[4px] css-gxcydh">Ngọc Linh FT cao cấp</h3>
											</a>
											<div class="info__cart--bottom">
												<div class="prices__cart  ">
													<span class="price__cart prices--new"><?php echo e(number_format($item['price'])); ?>đ</span>
													<?php if($item['old_price']): ?>
													<span class="prices__cart prices--old"><?php echo e(number_format($item['old_price'])); ?>đ</span>
													<?php endif; ?>
												</div>
												<span class="info__quantity"><?php echo e($item['quantity']); ?> (<?php echo e($item['size']); ?>)</span>
											</div>
										</div>
										<div class="trash column ml-[16px] inline-flex cursor-pointer items-center">
											<span class="estore-icon text-[18px] css-1le061m" fill="var(--gray-600)">
												<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M2.91602 7.03125L4.16144 22.0657C4.25069 23.1499 5.17422 24 6.26256 24H17.7378C18.8261 24 19.7497 23.1499 19.8389 22.0657L21.0843 7.03125H2.91602ZM8.48387 21.1875C8.11581 21.1875 7.80616 20.9012 7.78281 20.5283L7.07969 9.18455C7.05564 8.79661 7.3502 8.46291 7.73748 8.43886C8.13916 8.41069 8.45847 8.70872 8.48317 9.09666L9.1863 20.4404C9.21119 20.8421 8.89333 21.1875 8.48387 21.1875ZM12.7033 20.4844C12.7033 20.873 12.3888 21.1875 12.0002 21.1875C11.6115 21.1875 11.297 20.873 11.297 20.4844V9.14062C11.297 8.75198 11.6115 8.4375 12.0002 8.4375C12.3888 8.4375 12.7033 8.75198 12.7033 9.14062V20.4844ZM16.9206 9.18459L16.2175 20.5283C16.1944 20.8974 15.8867 21.205 15.4718 21.1861C15.0845 21.1621 14.79 20.8284 14.814 20.4405L15.5171 9.0967C15.5412 8.70877 15.8811 8.42653 16.2628 8.43891C16.6501 8.46295 16.9447 8.79666 16.9206 9.18459Z" fill="#020B27"></path>
													<path d="M21.1406 2.8125H16.9219V2.10938C16.9219 0.946219 15.9757 0 14.8125 0H9.1875C8.02434 0 7.07812 0.946219 7.07812 2.10938V2.8125H2.85938C2.0827 2.8125 1.45312 3.44208 1.45312 4.21875C1.45312 4.99533 2.0827 5.625 2.85938 5.625C9.32653 5.625 14.6737 5.625 21.1406 5.625C21.9173 5.625 22.5469 4.99533 22.5469 4.21875C22.5469 3.44208 21.9173 2.8125 21.1406 2.8125ZM15.5156 2.8125H8.48438V2.10938C8.48438 1.72144 8.79956 1.40625 9.1875 1.40625H14.8125C15.2004 1.40625 15.5156 1.72144 15.5156 2.10938V2.8125Z" fill="#020B27"></path>
												</svg>
											</span>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								<div class="cart__bottom">
									<div class="cart__bottom-box">
										<span class="cart__total-count"><?php echo e($header['totalQuantity']); ?> sản phẩm</span>
										<a href="<?php echo e(route('cart.list')); ?>">
											<button type="button" class="cart__btn-more">
												<span>Xem giỏ hàng</span>
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>

					<div class="contact-top">
						<div class="phone">
							<a href="tel:<?php echo e($header['tai_sao1']->slug_full); ?>"><?php echo e($header['tai_sao1']->slug); ?></a>
							<span><?php echo e($header['tai_sao1']->value); ?></span>
							<a href="tel:<?php echo e($header['tai_sao1']->slug_full); ?>" class="icon-phone"><i class="fas fa-phone-alt"></i></a>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="search_desktop search_mobi">
						<form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kếm..." />
								<div class="input-group-append">
									<button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="header3" class="header3">
		<div class="container">
			<div class="row">
				<div class="box-header-main">
					<div class="box_padding">
						<div class="menu menu-desktop">
							<ul class="nav-main">
								<li class="nav-item">
									<a href="<?php echo e(makeLink('home')); ?>"><span>Trang Chủ</span></a>
								</li>
								<li class="nav-item">
									<a href="<?php echo e(makeLinkToLanguage('about-us', null, null, App::getLocale())); ?>">
										<span> Giới thiệu</span>
									</a>
								</li>
								
								<?php if(isset($header['hangNoiDia']) && $header['hangNoiDia']): ?>
								<li class="nav-item">
									<a href="<?php echo e($header['hangNoiDia']->slug_full); ?>">
										<span> <?php echo e($header['hangNoiDia']->name); ?></span>
										<?php if(isset($header['hangNoiDia']->childs)): ?>
										<?php if(count($header['hangNoiDia']->childs)>0): ?>
										<i class="fa fa-angle-down mn-icon"></i>
										<?php endif; ?>
										<?php endif; ?>
									</a>
									<?php if(isset($header['hangNoiDia']->childs)): ?>
									<?php if(count($header['hangNoiDia']->childs)>0): ?>
									<div class="menu-dropdown">
										<div class="row no-gutters">
											<div class="col-3">
												<ul class="sub-nav-left p-b-16">
													<?php $__currentLoopData = $header['hangNoiDia']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNoiDia<?php echo e($childValue->id); ?>">
														<a href="<?php echo e($childValue['slug_full']); ?>">
															
											<div class="sub-nav-name fs-p-14">
												<span><?php echo e($childValue['name']); ?> </span>
											</div>
											</a>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								
							</ul>
						</div>
						<div class="col-9">
							<?php $__currentLoopData = $header['hangNoiDia']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNoiDia<?php echo e($childValue->id); ?>">
								<div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
									<div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
										<?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col sub-nav-cate-item p-x-8">
											<a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
												
										<div class="sub-nav-cate-name">
											<span><?php echo e($childValueItem->name); ?></span>
										</div>
										</a>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
							<?php
							$categoryProduct = new \App\Models\CategoryProduct();
							$product = new \App\Models\Product();
							$listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

							$dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
							?>
							<div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
								<div class="sub-nav-title m-b-12">
									<div class="u-flex justify-between align-items-center">
										<div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
											<i class="fab fa-gripfire"></i>
											Bán chạy nhất
										</div>
										<a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
									</div>
								</div>
								<div class="sub-nav-product-list">
									<div class="row row-cols-5">
										<?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<div class="col p-x-8">
											<div class="sub-nav-product-item">
												<a href="<?php echo e($product->slug_full); ?>">
													<div class="sub-nav-product-picture m-b-12">
														<picture>
															<img alt="<?php echo e($product->name); ?>" class="loaded" src="<?php echo e($product->avatar_path?asset($product->avatar_path):asset('frontend/images/noimage.jpg')); ?>" />
														</picture>
													</div>
													<div class="sub-nav-product-info">
														<div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
															<?php echo e($product->name); ?>

														</div>
														<div class="box-price">
															<?php if($product->price): ?>
															<span class="new-price"><?php echo e(number_format($product->price)); ?>đ</span>
															<?php if($product->size): ?>
															<?php echo e('/ '.$product->size); ?>

															<?php endif; ?>
															<?php else: ?>
															<span class="new-price">Liên hệ</span>
															<?php endif; ?>
															<?php if($product->old_price>0): ?>
															<span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
															<?php endif; ?>
														</div>
													</div>
												</a>
											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
			</li>
			<?php endif; ?>
			<?php if(isset($header['tin_tuc'])): ?>
				<li class="nav-item ">
					<a href="<?php echo e($header['tin_tuc']->slug_full); ?>">
						<span><?php echo e($header['tin_tuc']->name); ?></span>
						<?php if(count($header['tin_tuc']->childs) > 0): ?>
							<i class="fa fa-angle-down"></i>
						<?php endif; ?>
					</a>
					<?php if(count($header['tin_tuc']->childs) > 0): ?>
						<ul class="nav-sub">
							<?php $__currentLoopData = $header['tin_tuc']->childs()->where('active', 1)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="">
									<a href="<?php echo e($item->slug_full); ?>">
										<span><?php echo e($item->name); ?></span>
										<?php if(count($item->childs) > 0): ?>
											<i class='fa fa-angle-right'></i>
										<?php endif; ?>
									</a>
									<?php if(count($item->childs) > 0): ?>
										<ul class="nav-sub-c2">
											<?php $__currentLoopData = $item->childs()->where('active', 1)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li class="">
													<a href="<?php echo e($itemChild->slug_full); ?>">
														<span><?php echo e($itemChild->name); ?></span>
													</a>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									<?php endif; ?>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endif; ?>
			<?php if(isset($header['ngu_hanh'])): ?>
				<li class="nav-item ">
					<a href="<?php echo e($header['ngu_hanh']->slug_full); ?>">
						<span><?php echo e($header['ngu_hanh']->name); ?></span>
						<?php if(count($header['ngu_hanh']->childs) > 0): ?>
							<i class="fa fa-angle-down"></i>
						<?php endif; ?>
					</a>
					<?php if(count($header['ngu_hanh']->childs) > 0): ?>
						<ul class="nav-sub">
							<?php $__currentLoopData = $header['ngu_hanh']->childs()->where('active', 1)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="">
									<a href="<?php echo e($item->slug_full); ?>">
										<span><?php echo e($item->name); ?></span>
										<?php if(count($item->childs) > 0): ?>
											<i class='fa fa-angle-right'></i>
										<?php endif; ?>
									</a>
									<?php if(count($item->childs) > 0): ?>
										<ul class="nav-sub-c2">
											<?php $__currentLoopData = $item->childs()->where('active', 1)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li class="">
													<a href="<?php echo e($itemChild->slug_full); ?>">
														<span><?php echo e($itemChild->name); ?></span>
													</a>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									<?php endif; ?>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endif; ?>
			<?php if(isset($header['cskh'])): ?>
				<li class="nav-item ">
					<a href="<?php echo e($header['cskh']->slug_full); ?>">
						<span><?php echo e($header['cskh']->name); ?></span>
						<?php if(count($header['cskh']->childs) > 0): ?>
							<i class="fa fa-angle-down"></i>
						<?php endif; ?>
					</a>
					<?php if(count($header['cskh']->childs) > 0): ?>
						<ul class="nav-sub">
							<?php $__currentLoopData = $header['cskh']->childs()->where('active', 1)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="">
									<a href="<?php echo e($item->slug_full); ?>">
										<span><?php echo e($item->name); ?></span>
										<?php if(count($item->childs) > 0): ?>
											<i class='fa fa-angle-right'></i>
										<?php endif; ?>
									</a>
									<?php if(count($item->childs) > 0): ?>
										<ul class="nav-sub-c2">
											<?php $__currentLoopData = $item->childs()->where('active', 1)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li class="">
													<a href="<?php echo e($itemChild->slug_full); ?>">
														<span><?php echo e($itemChild->name); ?></span>
													</a>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									<?php endif; ?>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endif; ?>
			<li class="nav-item">
				<a href="<?php echo e(makeLink('contact')); ?>"><span>Liên hệ</span></a>
			</li>
			<?php if(isset($header['hangNgoaiDia']) && $header['hangNgoaiDia']): ?>
			<li class="nav-item">
				<a href="<?php echo e($header['hangNgoaiDia']->slug_full); ?>">
					<span> <?php echo e($header['hangNgoaiDia']->name); ?></span>
					<?php if(isset($header['hangNgoaiDia']->childs)): ?>
					<?php if(count($header['hangNgoaiDia']->childs)>0): ?>
					<i class="fa fa-angle-down mn-icon"></i>
					<?php endif; ?>
					<?php endif; ?>
				</a>
				<?php if(isset($header['hangNgoaiDia']->childs)): ?>
				<?php if(count($header['hangNgoaiDia']->childs)>0): ?>
				<div class="menu-dropdown">
					<div class="row no-gutters">
						<div class="col-3">
							<ul class="sub-nav-left p-b-16">
								<?php $__currentLoopData = $header['hangNgoaiDia']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNgoaiDia<?php echo e($childValue->id); ?>">
									<a href="<?php echo e($childValue['slug_full']); ?>">
										
						<div class="sub-nav-name fs-p-14">
							<span><?php echo e($childValue['name']); ?> </span>
						</div>
						</a>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<div class="col-9">
			<?php $__currentLoopData = $header['hangNgoaiDia']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNgoaiDia<?php echo e($childValue->id); ?>">
				<div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
					<div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
						<?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col sub-nav-cate-item p-x-8">
							<a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
								
						<div class="sub-nav-cate-name">
							<span><?php echo e($childValueItem->name); ?></span>
						</div>
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>

			<?php
			$categoryProduct = new \App\Models\CategoryProduct();
			$product = new \App\Models\Product();
			$listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

			$dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
			?>
			<div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
				<div class="sub-nav-title m-b-12">
					<div class="u-flex justify-between align-items-center">
						<div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
							<i class="fab fa-gripfire"></i>
							Bán chạy nhất
						</div>
						<a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
					</div>
				</div>
				<div class="sub-nav-product-list">
					<div class="row row-cols-5">
						<?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<div class="col p-x-8">
							<div class="sub-nav-product-item">
								<a href="<?php echo e($product->slug_full); ?>">
									<div class="sub-nav-product-picture m-b-12">
										<picture>
											<img alt="<?php echo e($product->name); ?>" class="loaded" src="<?php echo e($product->avatar_path?asset($product->avatar_path):asset('frontend/images/noimage.jpg')); ?>" />
										</picture>
									</div>
									<div class="sub-nav-product-info">
										<div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
											<?php echo e($product->name); ?>

										</div>
										<div class="box-price">
											<?php if($product->size != null): ?>
											<span class="new-price"><?php echo e($product->price?number_format($product->price)."đ/".$product->size :"Liên hệ"); ?></span>
											<?php if($product->old_price>0): ?>
											<span class="old-price"><?php echo e(number_format($product->old_price)); ?> đ/<?php echo e($product->size); ?></span>
											<?php endif; ?>
											<?php else: ?>
											<span class="new-price"><?php echo e($product->price?number_format($product->price)."đ" :"Liên hệ"); ?></span>
											<?php if($product->old_price>0): ?>
											<span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
											<?php endif; ?>
											<?php endif; ?>
										</div>
									</div>
								</a>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</li>
<?php endif; ?>

<?php if(isset($header['meVaBe']) && $header['meVaBe']): ?>
<li class="nav-item">
	<a href="<?php echo e($header['meVaBe']->slug_full); ?>">
		<span> <?php echo e($header['meVaBe']->name); ?></span>
		<?php if(isset($header['meVaBe']->childs)): ?>
		<?php if(count($header['meVaBe']->childs)>0): ?>
		<i class="fa fa-angle-down mn-icon"></i>
		<?php endif; ?>
		<?php endif; ?>
	</a>
	<?php if(isset($header['meVaBe']->childs)): ?>
	<?php if(count($header['meVaBe']->childs)>0): ?>
	<div class="menu-dropdown">
		<div class="row no-gutters">
			<div class="col-3">
				<ul class="sub-nav-left p-b-16">
					<?php $__currentLoopData = $header['meVaBe']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_meVaBe<?php echo e($childValue->id); ?>">
						<a href="<?php echo e($childValue['slug_full']); ?>">
							
			<div class="sub-nav-name fs-p-14">
				<span><?php echo e($childValue['name']); ?> </span>
			</div>
			</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<div class="col-9">
	<?php $__currentLoopData = $header['meVaBe']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_meVaBe<?php echo e($childValue->id); ?>">
		<div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
			<div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
				<?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col sub-nav-cate-item p-x-8">
					<a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
						
				<div class="sub-nav-cate-name">
					<span><?php echo e($childValueItem->name); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>

	<?php
	$categoryProduct = new \App\Models\CategoryProduct();
	$product = new \App\Models\Product();
	$listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

	$dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
	?>
	<div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
		<div class="sub-nav-title m-b-12">
			<div class="u-flex justify-between align-items-center">
				<div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
					<i class="fab fa-gripfire"></i>
					Bán chạy nhất
				</div>
				<a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
			</div>
		</div>
		<div class="sub-nav-product-list">
			<div class="row row-cols-5">
				<?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<div class="col p-x-8">
					<div class="sub-nav-product-item">
						<a href="<?php echo e($product->slug_full); ?>">
							
					<div class="sub-nav-product-info">
						<div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
							<?php echo e($product->name); ?>

						</div>
						<div class="box-price">
							<?php if($product->size != null): ?>
							<span class="new-price"><?php echo e($product->price?number_format($product->price)."đ/".$product->size :"Liên hệ"); ?></span>
							<?php if($product->old_price>0): ?>
							<span class="old-price"><?php echo e(number_format($product->old_price)); ?> đ/<?php echo e($product->size); ?></span>
							<?php endif; ?>
							<?php else: ?>
							<span class="new-price"><?php echo e($product->price?number_format($product->price)."đ" :"Liên hệ"); ?></span>
							<?php if($product->old_price>0): ?>
							<span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
							<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
					</a>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</li>
<?php endif; ?>

<?php if(isset($header['hangNgoaiDia1']) && $header['hangNgoaiDia1']): ?>
<li class="nav-item">
	<a href="<?php echo e($header['hangNgoaiDia1']->slug_full); ?>">
		<span> <?php echo e($header['hangNgoaiDia1']->name); ?></span>
		<?php if(isset($header['hangNgoaiDia1']->childs)): ?>
		<?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
		<i class="fa fa-angle-down mn-icon"></i>
		<?php endif; ?>
		<?php endif; ?>
	</a>
	<?php if(isset($header['hangNgoaiDia1']->childs)): ?>
	<?php if(count($header['hangNgoaiDia1']->childs)>0): ?>
	<div class="menu-dropdown">
		<div class="row no-gutters">
			<div class="col-3">
				<ul class="sub-nav-left p-b-16">
					<?php $__currentLoopData = $header['hangNgoaiDia1']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNgoaiDia1_<?php echo e($childValue->id); ?>">
						<a href="<?php echo e($childValue['slug_full']); ?>">
							
			<div class="sub-nav-name fs-p-14">
				<span><?php echo e($childValue['name']); ?> </span>
			</div>
			</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<div class="col-9">
	<?php $__currentLoopData = $header['hangNgoaiDia1']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNgoaiDia1_<?php echo e($childValue->id); ?>">
		<div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
			<div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
				<?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col sub-nav-cate-item p-x-8">
					<a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
						
				<div class="sub-nav-cate-name">
					<span><?php echo e($childValueItem->name); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<?php
	$categoryProduct = new \App\Models\CategoryProduct();
	$product = new \App\Models\Product();
	$listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

	$dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
	?>
	<div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
		<div class="sub-nav-title m-b-12">
			<div class="u-flex justify-between align-items-center">
				<div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
					<i class="fab fa-gripfire"></i>
					Bán chạy nhất
				</div>
				<a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
			</div>
		</div>
		<div class="sub-nav-product-list">
			<div class="row row-cols-5">
				<?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<div class="col p-x-8">
					<div class="sub-nav-product-item">
						<a href="<?php echo e($product->slug_full); ?>">
							
					<div class="sub-nav-product-info">
						<div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
							<?php echo e($product->name); ?>

						</div>
						<div class="box-price">
							<?php if($product->price): ?>
							<span class="new-price"><?php echo e(number_format($product->price)); ?>đ</span>
							<?php if($product->size): ?>
							<?php echo e('/ '.$product->size); ?>

							<?php endif; ?>
							<?php else: ?>
							<span class="new-price">Liên hệ</span>
							<?php endif; ?>
							<?php if($product->old_price>0): ?>
							<span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
							<?php endif; ?>
						</div>
					</div>
					</a>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</li>
<?php endif; ?>

<?php if(isset($header['hangNgoaiDia2']) && $header['hangNgoaiDia2']): ?>
<li class="nav-item">
	<a href="<?php echo e($header['hangNgoaiDia2']->slug_full); ?>">
		<span> <?php echo e($header['hangNgoaiDia2']->name); ?></span>
		<?php if(isset($header['hangNgoaiDia2']->childs)): ?>
		<?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
		<i class="fa fa-angle-down mn-icon"></i>
		<?php endif; ?>
		<?php endif; ?>
	</a>
	<?php if(isset($header['hangNgoaiDia2']->childs)): ?>
	<?php if(count($header['hangNgoaiDia2']->childs)>0): ?>
	<div class="menu-dropdown">
		<div class="row no-gutters">
			<div class="col-3">
				<ul class="sub-nav-left p-b-16">
					<?php $__currentLoopData = $header['hangNgoaiDia2']->childs()->where('active', 1)->orderby('order')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="nav-sub-item <?php if($loop->first): ?> active <?php endif; ?>" data-id="li_hangNgoaiDia2_<?php echo e($childValue->id); ?>">
						<a href="<?php echo e($childValue['slug_full']); ?>">
							
			<div class="sub-nav-name fs-p-14">
				<span><?php echo e($childValue['name']); ?> </span>
			</div>
			</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<div class="col-9">
	<?php $__currentLoopData = $header['hangNgoaiDia2']->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="sub-nav-right <?php if($loop->first): ?> active <?php endif; ?>" id="li_hangNgoaiDia2_<?php echo e($childValue->id); ?>">
		<div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
			<div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
				<?php $__currentLoopData = $childValue->childs()->where('active', 1)->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValueItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col sub-nav-cate-item p-x-8">
					<a href="<?php echo e($childValueItem->slug_full); ?>" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
						
				<div class="sub-nav-cate-name">
					<span><?php echo e($childValueItem->name); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>

	<?php
	$categoryProduct = new \App\Models\CategoryProduct();
	$product = new \App\Models\Product();
	$listIdProductHeader = $categoryProduct->getALlCategoryChildrenAndSelf($childValue->id);

	$dataProductHeader = $product->whereIn('category_id', $listIdProductHeader)->where('active', 1)->orderBy('order')->limit(4)->get();
	?>
	<div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
		<div class="sub-nav-title m-b-12">
			<div class="u-flex justify-between align-items-center">
				<div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
					<i class="fab fa-gripfire"></i>
					Bán chạy nhất
				</div>
				<a class="link p-t-2" href="<?php echo e($childValue->slug_full); ?>">Xem tất cả</a>
			</div>
		</div>
		<div class="sub-nav-product-list">
			<div class="row row-cols-5">
				<?php $__currentLoopData = $dataProductHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<div class="col p-x-8">
					<div class="sub-nav-product-item">
						<a href="<?php echo e($product->slug_full); ?>">
							
					<div class="sub-nav-product-info">
						<div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
							<?php echo e($product->name); ?>

						</div>
						<div class="box-price">
							<?php if($product->size != null): ?>
							<span class="new-price"><?php echo e($product->price?number_format($product->price)."đ/".$product->size :"Liên hệ"); ?></span>
							<?php if($product->old_price>0): ?>
							<span class="old-price"><?php echo e(number_format($product->old_price)); ?> đ/<?php echo e($product->size); ?></span>
							<?php endif; ?>
							<?php else: ?>
							<span class="new-price"><?php echo e($product->price?number_format($product->price)."đ" :"Liên hệ"); ?></span>
							<?php if($product->old_price>0): ?>
							<span class="old-price"><?php echo e(number_format($product->old_price)); ?>đ</span>
							<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
					</a>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</li>
<?php endif; ?>
<?php if(isset($header['hangNgoaiDia4']) && $header['hangNgoaiDia4']): ?>
<li class="nav-item">
	<a href="<?php echo e($header['hangNgoaiDia4']->slug_full); ?>">
		<span> <?php echo e($header['hangNgoaiDia4']->name); ?></span>
		<?php if(isset($header['hangNgoaiDia4']->childs)): ?>
		<?php if(count($header['hangNgoaiDia4']->childs)>0): ?>
		<i class="fa fa-angle-down mn-icon"></i>
		<?php endif; ?>
		<?php endif; ?>
	</a>
</li>
<?php endif; ?>
<?php if(isset($header['hangNgoaiDia3']) && $header['hangNgoaiDia3']): ?>
<li class="nav-item">
	<a href="<?php echo e($header['hangNgoaiDia3']->slug_full); ?>">
		<span> <?php echo e($header['hangNgoaiDia3']->name); ?></span>
		<?php if(isset($header['hangNgoaiDia3']->childs)): ?>
		<?php if(count($header['hangNgoaiDia3']->childs)>0): ?>
		<i class="fa fa-angle-down mn-icon"></i>
		<?php endif; ?>
		<?php endif; ?>
	</a>
</li>
<?php endif; ?>

<?php if(isset($header['menuNew']) && $header['menuNew']): ?>
<?php $__currentLoopData = $header['menuNew']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="nav-item">
	<a href="<?php echo e($value['slug_full']); ?>">
		<span> <?php echo e($value['name']); ?></span>
	</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($header['heThongNhaThuoc']) && $header['heThongNhaThuoc']): ?>
<li class="nav-item">
	<a href="<?php echo e(makeLinkToLanguage('drug-store', null, null, App::getLocale())); ?>">
		<span> <?php echo e($header['heThongNhaThuoc']->name); ?></span>
	</a>
</li>
<?php endif; ?>





</ul>
</div>

<div class="search" id="search">
	<div class="form-s-mobile">
		<form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET">
			<div class="input-group">
				<input type="text" class="form-control" name="keyword" placeholder="Từ khóa" />
				<div class="input-group-append">
					<button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
		<span class="close-search"><i class="fas fa-times"></i></span>
	</div>
</div>
</div>
<div class="hover-menu-mask hover-nav"></div>
</div>
<div class="col-lg-12 search_mb1">
	<div class="header-top-right">
		<ul>
			<form action="<?php echo e(makeLink('search')); ?>" autocomplete="off" method="GET" class="cart_header">
				<li>
					<input type="text" name="keyword" class="header-top-search" placeholder="Tìm kiếm trên Min's Kitchen" />
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
<div class="model-login">
	<div class="overlay_model-login"></div>
	<div class="box_model-login">
		<div class="user-form-card">
			<div class="btn-close-modal">
				<i class="fas fa-times-circle"></i>
			</div>
			<div class="user-form-title">
				<h2>Đăng nhập</h2>
			</div>
			<form action="<?php echo e(route('login')); ?>" data-url="<?php echo e(route('login')); ?>" method="POST" role="form" id="formLogin_header" class="user-form">
				<div id="loadListErrorLogin_header"></div>
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<input type="text" <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> name="username" value="<?php echo e(old('username')); ?>" class="form-control  " placeholder="Tên đăng nhập">
				</div>
				<div class="form-group">
					<input type="password" name="password" value="" class="form-control  " placeholder="Mật khẩu">
				</div>
				<div class="form-check mb-3">
					<input class="form-check-input  " type="checkbox" value="" id="check">
					<label class="form-check-label" for="check">Nhớ mật khẩu</label>
				</div>
				<div class="form-button">
					<button type="submit">Đăng nhập</button>
					<a class="btn btn-link" href="https://demo5.tiemthietke.com/password/reset" target="blank">
						Quên mật khẩu
					</a>
				</div>
			</form>
			<div class="user-form-remind">
				<p>Bạn chưa có tài khoản?<a class="btnshownav-dangky-tr">Đăng ký</a></p>
			</div>
		</div>
	</div>

</div>
<div class="model-register ">
	<div class="overlay_model-login"></div>
	<div class="box_model-login">
		<div class="btn-close-modal btn-close-modal-register">
			<i class="fas fa-times-circle"></i>
		</div>
		<div class="user-form-card">
			<div class="user-form-title">
				<h2>Đăng ký</h2>
			</div>

			<form action="<?php echo e(route('register')); ?>" data-url="<?php echo e(route('register')); ?>" method="POST" role="form" id="formRegister_header" class="user-form">
				<?php echo csrf_field(); ?>
				<div id="loadListErrorRegister_header"></div>
				<div class="form-group">
					<input type="text" name="name" value="" class="form-control" placeholder="Tên của bạn" required>
				</div>
				<div class="form-group">
					<input type="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" value="" class="form-control" name="email" placeholder="Địa chỉ email" required>
				</div>
				<div class="form-group">
					<input type="text" name="username" pattern="^[a-zA-Z0-9]*$" minlength="8" title="8->16 ký tự là chữ viết liền không dấu" value="" class="form-control" placeholder="Tên đăng nhập" required>
				</div>
				<div class="form-group">
					<input type="password" value="" name="password" class="form-control" placeholder="Mật khẩu" title="8 ký tự trở lên" pattern=".{8,}" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" value="" name="password_confirmation" title="8 ký tự trở lên" placeholder="Nhập lại mật khẩu" pattern=".{8,}" required>
				</div>

				<div class="form-button">
					<button type="submit">Đăng ký</button>
				</div>
			</form>
			<div class="user-form-remind">
				<p>Bạn đã có tài khoản?<a class="btnshownav-dangnhap-tr">Đăng nhập</a></p>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('click', '.dropdown-toggle', function() {
		$(this).addClass('show');
		$('.dropdown-menu').addClass('show');
	})
	$(document).on('click', '.dropdown-toggle.show', function() {
		$(this).removeClass('show');
		$('.dropdown-menu').removeClass('show');
	})
</script>

<script>
	$('.user').click(function() {
		$('.login-mobile').slideToggle('show_header_con');
	});

	function Clone() {
		let toggle = false;
		var login = document.querySelector('.showNav-2');
		console.log(login)
		document.querySelectorAll(".btnshownav-2").forEach((element) => {
			element.addEventListener("click", () => {
				toggle = !toggle;
				if (!toggle) {
					login.classList.remove('show_header_con');
				} else {
					login.classList.add('show_header_con');
				}
			})
		});

	}
	Clone();
</script>
<script>
	function Clone() {
		let toggle = false;
		var register = document.querySelector('.showNav-3');
		console.log(register)
		document.querySelectorAll(".btnshownav-3").forEach((element) => {
			element.addEventListener("click", () => {
				toggle = !toggle;
				if (!toggle) {
					register.classList.remove('show_header_con');
				} else {
					register.classList.add('show_header_con');
				}
			})
		});

	}
	Clone();
</script>
<Script>
	function Clone() {
		let toggle = false;
		var menu = document.querySelector('.showNav');
		document.querySelectorAll(".btnshownav").forEach((element) => {
			element.addEventListener("click", () => {
				toggle = !toggle;
				if (!toggle) {
					menu.classList.remove('show_header_con');
				} else {
					menu.classList.add('show_header_con');
				}
			})
		});

	}
	Clone();
</Script>
<script>
	function footera() {
		let toggle = false;
		var images = document.querySelectorAll('.icon_nav');
		images.forEach((element, index) => {
			var li = document.querySelectorAll('.showList')
			element.addEventListener('click', () => {
				toggle = !toggle;
				console.log(toggle);
				if (!toggle) {
					li[index].classList.remove('bg_li');
				} else {
					li[index].classList.add('bg_li');
				}
			})
		})
	}
	footera();
</script>


<script>
	$(document).on('submit', '#formRegister_header', function() {
		event.preventDefault();
		let myThis = $(this);
		let formData = new FormData(this);
		let urlRequest = $(this).data("url");
		//alert(urlRequest);
		$.ajax({
			type: "POST",
			url: urlRequest,
			data: formData,
			dataType: "JSON",
			processData: false,
			contentType: false,
			success: function(response) {
				if (response.code == 200) {

					if (response.messange == 'success') {
						// let formCommentAuth=$('#formCommentAuth');
						//  submitFormCommentAuth('#formCommentAuth'); 
						myThis.find('input:not([name="_token"],textarea)').val('');
						alert('Đăng ký thành công!');
						window.location.reload();
					} else {
						myThis.find('input:not([name="_token"],textarea)').val('');
						alert('Đăng ký không thành công');
					}
				} else {
					myThis.find('input:not([name="_token"],textarea)').val('');
					alert('Đăng ký không thành công');
				}
			}
		});
	});
	$(document).on('submit', '#formLogin_header', function() {
		// alert('a');
		event.preventDefault();
		let myThis = $(this);
		let formData = new FormData(this);
		let urlRequest = $(this).data("url");

		$.ajax({
			type: "POST",
			url: urlRequest,
			data: formData,
			dataType: "JSON",
			processData: false,
			contentType: false,
			success: function(response) {
				if (response.code == 200) {

					if (response.messange == 'success') {

						myThis.find('input:not([name="_token"],textarea)').val('');
						alert('Đăng nhập thành công!');
						window.location.reload();
					} else {

						myThis.find('input:not([name="_token"],textarea)').val('');
						alert('Đăng nhập không thành công');
						//window.location.reload();
					}
				} else {

					myThis.find('input:not([name="_token"],textarea)').val('');
					alert('Đăng nhập không thành công');
				}
			}
		});

	});
</script>
<script>
	let btn_sign_in = document.querySelector('.btn-sign_in')
	// let btn_sign_up = document.querySelector('.btn-sign_up')
	let model_register = document.querySelector(('.model-register'))
	let model_login = document.querySelector('.model-login')
	let btn_close_modal = document.querySelector('.btn-close-modal')
	let btn_close_modal_register = document.querySelector('.btn-close-modal-register')
	let btnshownav_dangky_tr = document.querySelector('.btnshownav-dangky-tr')
	// btn_sign_in.addEventListener('click',()=>{
	//     model_login.classList.remove('active')
	//     model_register.classList.add('active')
	// })
	btn_sign_in.addEventListener('click', () => {
		model_login.classList.add('active')
	})
	// btn_sign_up.addEventListener('click', () => {
	// 	model_register.classList.add('active')
	// })
	btn_close_modal.addEventListener('click', () => {
		model_login.classList.remove('active')
	})
	btn_close_modal_register.addEventListener('click', () => {
		model_register.classList.remove('active')
	})
	let btnshownav_dn = document.querySelector('.btnshownav-dangnhap-tr')
	btnshownav_dn.addEventListener('click', () => {
		document.querySelector('.model-register.active').classList.remove('active')
		document.querySelector('.model-login').classList.add('active')
	})
	btnshownav_dangky_tr.addEventListener('click', () => {
		document.querySelector('.model-login.active').classList.remove('active')
		document.querySelector('.model-register').classList.add('active')

	})
</script><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>