    <div class="menu_fix_mobile">
        <div class="close-menu">
            <a href="javascript:;" id="close-menu-button">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <ul class="nav-main">
            <li class="nav-item <?php echo e(Request::url() == url('/') ? 'active_menu' : ''); ?>">
                <a href="<?php echo e(makeLink('home')); ?>"><span>Trang chủ</span></a>
            </li>
            
            <?php if(isset($header['menuM'])): ?>
                <?php $__currentLoopData = $header['menuM']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item <?php echo e(Request::segment(1) == 'danh-muc' ? 'active_menu' : ''); ?>">
                        <a href="<?php echo e($value['slug_full']); ?>"><span><?php echo $value['name']; ?></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <?php if(isset($value['childs'])): ?>
                            <?php if(count($value['childs'])>0): ?>
                                <ul class="nav-sub">
                                    <?php $__currentLoopData = $value['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-sub-item">
                                            <a href="<?php echo e($childValue['slug_full']); ?>"><span><?php echo e($childValue['name']); ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
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
        <div class="header-main">
            <div class="container">
                <div class="box-header-main">
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
                    <?php
                        $listCategoryId = \App\Models\CategoryProduct::getALlCategoryChildrenAndSelf(185);
                        // dd($listCategoryId);
                        $categoryProducts =  \App\Models\CategoryProduct::whereIn('id' , $listCategoryId)->where([
                        ["id", "<>", 185],
                    ])->get();
                        // dd($data);
                    ?>
                    <div class="search_kh">
                        <form class="box_search_kh" method="get" action="<?php echo e(makeLink('search')); ?>">
                            <select class="select-search" name="category_id" id="">
                                <?php if(isset($categoryProducts)): ?>
                                <option value=""> <?php echo e(__('header.product')); ?> </option>
                                    <?php $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="flex-form-search">
                                <div class="input-search">
                                    <input type="text" autocomplete="off" name="keyword" placeholder="<?php echo e(__('header.title_search')); ?>">
                                </div>
                                <div class="btn-search">
                                    <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                                    <div><?php echo e(__('header.search')); ?></div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="hotline_kh">
						<div class="navholder">
							<nav id="subnav">
								<ul>
									<li><a href="#"><img src="<?php echo e(asset('frontend/images/phone.png')); ?>" alt="phone"> <?php echo $header['hotline_top']->description; ?></a></li>
									<li><a href="mail:"><img src="<?php echo e(asset('frontend/images/zaloo.png')); ?>" alt="zaloo"> <?php echo e($header['hotline_top']->slug); ?> <strong><?php echo e($header['hotline_top']->value); ?></strong></a></li>
								</ul>
							</nav>
						</div>
                    </div>
                    <div class="box-header-main-right box-header-main-right-mobile">
                        <ul>
                            <li class="icon-search show_search"><a><i class="fas fa-search"></i></a></li>
                            <li class="cart">
                                <a href="<?php echo e(route('cart.list')); ?>">
                                    
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                                        <g>
                                        <g id="Bag">
                                        <g>
                                        <path d="M27.996,8.91C27.949,8.395,27.519,8,27,8h-5V6c0-3.309-2.69-6-6-6c-3.309,0-6,2.691-6,6v2H5
                                        C4.482,8,4.051,8.395,4.004,8.91l-2,22c-0.025,0.279,0.068,0.557,0.258,0.764C2.451,31.882,2.719,32,3,32h26
                                        c0.281,0,0.549-0.118,0.738-0.326c0.188-0.207,0.283-0.484,0.258-0.764L27.996,8.91z M12,6c0-2.206,1.795-4,4-4s4,1.794,4,4v2h-8
                                        V6z M4.096,30l1.817-20H10v2.277C9.404,12.624,9,13.262,9,14c0,1.104,0.896,2,2,2s2-0.896,2-2c0-0.738-0.404-1.376-1-1.723V10h8
                                        v2.277c-0.596,0.347-1,0.984-1,1.723c0,1.104,0.896,2,2,2c1.104,0,2-0.896,2-2c0-0.738-0.403-1.376-1-1.723V10h4.087l1.817,20
                                        H4.096z"></path>
                                    </svg>
                                    <span class="number-cart"><?php echo e($header['totalQuantity']); ?></span>
                                </a>
                                <span class="d-none">Giỏ hàng</span>
                            </li>
                        </ul>
                    </div>
                    <div class="language_mobile">
                        <ul>
                            <?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('language.index',['language'=>$lang['value']])); ?>"><img src="<?php echo e(asset($lang['image'])); ?>" alt="<?php echo e(asset($lang['name'])); ?>"></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="box-header-bottom">
                    <div class="menu menu-desktop">
                        

                        <ul class="nav-main">
                            

                            

                            <li class="nav-item <?php echo e(Request::url() == url('/') ? 'active_menu' : ''); ?>">
                                <a href="<?php echo e(makeLink('home')); ?>"><span><i class="fas fa-circle"></i>Trang chủ</span></a>
                            </li>
                            
                            <?php if(isset($header['menuM'])): ?>
                                <?php $__currentLoopData = $header['menuM']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item <?php echo e(Request::segment(1) == 'danh-muc' ? 'active_menu' : ''); ?>">
                                        <a href="<?php echo e($value['slug_full']); ?>"><span><i class="fas fa-circle"></i><?php echo $value['name']; ?></span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <?php if(isset($value['childs'])): ?>
                                            <?php if(count($value['childs'])>0): ?>
                                                <ul class="nav-sub">
                                                    <?php $__currentLoopData = $value['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="nav-sub-item">
                                                            <a href="<?php echo e($childValue['slug_full']); ?>"><span><?php echo e($childValue['name']); ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php echo $__env->make('frontend.components.menu',[
                                'limit'=>3,
                                'icon_d'=>'<i class="fa fa-angle-down"></i>',
                                'icon_r'=>"<i class='fa fa-angle-right'></i>",
                                'data'=>$header['menu_mobile'],
                                'active'=>false
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            
                        </ul>
                    </div>
					
                    
					
                    <div class="language">
						<ul>
							<?php $__currentLoopData = $langConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(route('language.index',['language'=>$lang['value']])); ?>"><img src="<?php echo e(asset($lang['image'])); ?>" alt="<?php echo e(asset($lang['name'])); ?>"></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
                </div>

            </div>
        </div>
        <div  id="search">
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
<?php /**PATH /var/www/vhosts/demo15.dkcauto.net/httpdocs/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>