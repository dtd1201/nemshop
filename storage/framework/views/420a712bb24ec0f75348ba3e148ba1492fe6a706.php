    <div class="menu_fix_mobile">
        <div class="close-menu">
            <a href="javascript:;" id="close-menu-button">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <ul class="nav-main">
            
            
          <?php echo $__env->make('frontend.components.menu',[
            'limit'=>3,
            'icon_d'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'icon_r'=>'<i class="fa fa-angle-down mn-icon"></i>',
            'data'=>$header['menu_mobile'],
            'active'=>false
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        

        </ul>
    </div>

    <div id="header" class="header">
		<div class="header-top">
			<div class="container">
				<div class="box-header-top">
					<div class="header-contact-top">
						<div class="hotline-top-header"><?php echo e($header['tai_sao']->value); ?></div>
					</div>
					<div class="header-top-right">
						<ul>
							<form action="<?php echo e(makeLink('search')); ?>" method="GET" class="cart_header">
							<li>
								<input type="text" name="keyword" class="header-top-search" placeholder="Tìm kiếm">
								<div class="search_mobile" type="submit"><a><i class="fas fa-search"></i></a></div>
							</li>
							</form>
							
							<li>
								<a href="<?php echo e(route('cart.list')); ?>">
									<div class="box-image">
										<img src="../frontend/images/cart-header-top.png" alt="">
									</div>
									<span>Giỏ hàng</span>
									<div class="number-cart"> (<?php echo e($header['totalQuantity']); ?>)</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="header-main">
            <div class="container">
                <div class="box-header-main">
					<div class="box_padding">
						<div class="list-bar">
							<div class="bar1"></div>
							<div class="bar2"></div>
							<div class="bar3"></div>
						</div>
						<div class="logo-head">
							<div class="image">
								<a href="<?php echo e(makeLink('home')); ?>"><img src="<?php echo e($header['logo']->image_path); ?>" alt="Logo"></a>
							</div>
						</div>
						<div class="menu menu-desktop">
							<ul class="nav-main">
								

								

								

								

								
								<?php echo $__env->make('frontend.components.menu',[
									'limit'=>3,
									'icon_d'=>'<i class="fa fa-angle-down"></i>',
									'icon_r'=>"<i class='fa fa-angle-right'></i>",
									'data'=>$header['menu_mobile'],
									'active'=>false
								], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

								
							</ul>
						</div>
						<div class="box-header-main-right box-header-main-right-mobile">
							<ul>
								<div class="search_mobile" type="submit"><a><i class="fas fa-search"></i></a></div>
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
            </div>
        </div>
        <div id="search">
            <div class="wrap-search-header-main  search-mobile" >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box-search-header-main">
                                <div class="search-header">
                                    <form id="formSearchMb" name="formSearchMb" method="GET" action="<?php echo e(makeLink('search')); ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default"  type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button class="form-control close-search" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
<?php /**PATH /var/www/vhosts/demo9.dkcauto.net/httpdocs/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>