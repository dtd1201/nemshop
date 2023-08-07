<?php $__env->startSection('title', 'Tổng kho máy Photocopy bãi nhập khẩu | Cho thuê máy Photocopy'); ?>
<?php $__env->startSection('image', asset('frontend/images/logo.jpg')); ?>
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
                <div class="wrap-slide-home">
                    <div class="container">
                        <div class="row">
							<div class="col-xl-3 d-none d-xl-block">
								<div class="nav-vertical">
									<div class="title_danhmuc">
										<h2>Danh mục sản phẩm</h2>
									</div>
                                    <ul class="nav-list">
                                        <?php $__currentLoopData = $menuHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-vertical-item">
                                            <a href="<?php echo e($item->slug_full); ?>"><img src="<?php echo e($item->icon_path); ?>" alt=" <?php echo e($item->name); ?>">  <?php echo e($item->name); ?>  
                                                <?php if($item->childs()->where('active',1)->count()>0): ?>
                                                  <i class="fa fa-caret-right  ver-mega-mn1"></i>
                                                <?php endif; ?>
                                            </a>
                                            <?php if($item->childs()->where('active',1)->count()>0): ?>
                                            <div class="nav-vertical-sub">
                                                <ul>
                                                    <?php $__currentLoopData = $item->childs()->where('active',1)->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li >
                                                    
                                                            <a href="<?php echo e($itemChild->slug_full); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo e($itemChild->name); ?> </a>
                                                     
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                    
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                    </ul>
                                </div>
							</div>
                            <div class="col-xl-6 col-lg-8 col-md-12">
                                <div class="slide">
                                    <?php if(isset($slider)): ?>
                                    <div class="box-slide faded cate-arrows-1">
                                        <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item-slide">
                                            <a href=""><img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
							<?php if($bannerHome): ?>
                                <div class="col-xl-3 col-lg-4 col-md-12 padding_in">
									<div class="video">
										<iframe id="videos" width="560" height="315" src="<?php echo e($video_one->description); ?>" title="<?php echo e($video_one->name); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
                                    <div class="list_image_video">
                                        <div class="slider slide_video">
                                            <?php if(isset($video)): ?>
                                            <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <div class="image">
                                                    <img src="<?php echo e($item->avatar_path); ?>" data-video="<?php echo e($item->description); ?>" alt="<?php echo e($item->name); ?>">
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--<?php $__currentLoopData = $bannerHome->childs()->orderby('order')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-banner-home">
                                        <a class="d-block" href="<?php echo e($item->slug); ?>"  target="_self">
                                            <div class="hover-effect <?php if($loop->first): ?> hover-effect-2 <?php else: ?> hover-effect-10 <?php endif; ?>">
                                                <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if($supportHome): ?>
                    <div class="wrap-support">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box-support">
                                        <div class="row">
                                            <?php $__currentLoopData = $supportHome->childs()->orderby('order')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-2 col-support-item mw-20">
                                                <div class="support-item">
                                                    <div class="box">
                                                        <div class="icon">
                                                            <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                                                        </div>
                                                        <div class="content">
                                                            <h3><?php echo e($item->name); ?></h3>
                                                            <div class="desc"><?php echo e($item->value); ?></div>
                                                        </div>
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
            </div>
            <div class="wrap-product-home">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-h1">
                                <span class="text"><strong>Sản phẩm</strong> hot</span>
                                <div id="countdown">
                                    <div id="tiles">
                                      <span id="days">0</span>
                                      <span id="hours">0</span>
                                      <span id="minutes">0</span>
                                      <span id="seconds">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-product-home">
                                <div class="row">
                                    <div class="slide-pro autoplay5-pro cate-arrows-1">
                                        <?php $__currentLoopData = $productHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href="<?php echo e($product->slug_full); ?>"><img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e(asset($product->name)); ?>"></a>
                                                        <span class="hot">Hot</span>
                                                        <?php if($product->sale): ?>
                                                        <span class="sale">-<?php echo e($product->sale); ?>%</span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?></span>
                                                            <?php if($product->sale>0): ?>
                                                            <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href="<?php echo e($product->slug_full); ?>"><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a class="add-compare" data-url="<?php echo e(route('compare.add',['id' => $product->id,])); ?>">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-12">
                            <div class="title-h1">
                                <div class="text">
                                    <strong>Sản phẩm</strong> mới nhất
                                </div>
                             </div>
                            <div class="list-product-home">
                                <div class="row">
                                    <div class="slide-pro autoplay5-pro cate-arrows-1">
                                        <?php $__currentLoopData = $productNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href="<?php echo e($product->slug_full); ?>"><img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e(asset($product->name)); ?>"></a>
                                                        <span class="hot">New</span>
                                                        <?php if($product->sale): ?>
                                                        <span class="sale">-<?php echo e($product->sale); ?>%</span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?></span>
                                                            <?php if($product->sale>0): ?>
                                                            <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href="<?php echo e($product->slug_full); ?>"><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a class="add-compare" data-url="<?php echo e(route('compare.add',['id' => $product->id,])); ?>">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
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
            </div>
            <div class="wrap-banner-home-2">
                <div class="container">
                    <div class="row">
                        <?php if($banner2Home): ?>
                            <?php $__currentLoopData = $banner2Home->childs()->orderby('order')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="item-banner-home">
                                    <a class="d-block" href="<?php echo e($item->slug); ?>"  target="_self">
                                        <div class="hover-effect hover-effect-4">
                                            <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
               $moC= new App\Models\CategoryProduct();
               $moP= new App\Models\Product();
               $i=1;
            ?>
        <div class="bg-pro-tab">
            <?php $__currentLoopData = $header['categorySearch']->childs()->orderby('order')->orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="wrap-product-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-nav-tab2 mb-5">
                                <h3><?php echo e($cate->name); ?></h3>
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" data-target="#tab-pro-<?php echo e($i); ?>" role="tab" >Tất cả</a>
                                    </li>
                                    <?php $__currentLoopData = $cate->childs()->orderby('order')->orderByDesc('created_at')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item">
                                            <a class="nav-link"  data-toggle="pill" data-target="#tab-pro-<?php echo e($i); ?>-<?php echo e($loop->index); ?>" role="tab" ><?php echo e($categoryChild->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>


                            <div class="tab-content" id="pills-tabContent">
                                <?php
                                    $listId =$moC->getALlCategoryChildrenAndSelf($cate->id);
                                    $pro = $moP->whereIn('category_id', $listId)->orderby('order')->orderByDesc('created_at')->limit(16)->get();
                                ?>
                                <div class="tab-pane fade show active" id="tab-pro-<?php echo e($i); ?>" role="tabpanel" >
                                    <div class="row">
                                        <div class="slide-pro autoplay4-pro cate-arrows-2">
                                            <?php $__currentLoopData = $pro->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-12 col-product-card">
                                                    <div class="product-card">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e($product->slug_full); ?>"><img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e(asset($product->name)); ?>"></a>
                                                                
                                                                <?php if($product->sale): ?>
                                                                <span class="sale">-<?php echo e($product->sale); ?>%</span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="content">
                                                                <h3 class="name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h3>
                                                                <div class="box-price">
                                                                    <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?> </span>
                                                                    <?php if($product->sale>0): ?>
                                                                    <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="action">
                                                                <ul>
                                                                    <li class="a-cart"><a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a></li>
                                                                    <li class="a-view"><a href="<?php echo e($product->slug_full); ?>"><i class="fas fa-eye"></i></a></li>
                                                                    <li class="a-view"><a class="add-compare" data-url="<?php echo e(route('compare.add',['id' => $product->id,])); ?>">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $cate->childs()->orderby('order')->orderByDesc('created_at')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $listIdChild =$moC->getALlCategoryChildrenAndSelf($categoryChild->id);
                                    $proChild = $moP->whereIn('category_id', $listIdChild)->orderby('order')->orderByDesc('created_at')->limit(16)->get();
                                ?>
                                <div class="tab-pane fade" id="tab-pro-<?php echo e($i); ?>-<?php echo e($loop->index); ?>" role="tabpanel">
                                   <div class="row">
                                        <div class="slide-pro autoplay4-pro cate-arrows-2">
                                            <?php $__currentLoopData = $proChild->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-12 col-product-card">
                                                    <div class="product-card">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e($product->slug_full); ?>"><img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e(asset($product->name)); ?>"></a>
                                                                
                                                                <?php if($product->sale): ?>
                                                                <span class="sale">-<?php echo e($product->sale); ?>%</span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="content">
                                                                <h3 class="name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h3>
                                                                <div class="box-price">
                                                                    <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?></span>
                                                                    <?php if($product->sale>0): ?>
                                                                    <span class="old-price"><?php echo e(number_format($product->price)); ?> <?php echo e($unit); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="action">
                                                                <ul>
                                                                    <li class="a-cart"><a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>"><i class="fas fa-cart-plus"></i></a></li>
                                                                    <li class="a-view"><a href="<?php echo e($product->slug_full); ?>"><i class="fas fa-eye"></i></a></li>
                                                                    <li class="a-view"><a class="add-compare" data-url="<?php echo e(route('compare.add',['id' => $product->id,])); ?>">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="item-banner-home">
                                <a class="d-block" href="<?php echo e($cate->slug_full); ?>"  target="_self">
                                    <div class="hover-effect">
                                        <img src="<?php echo e($cate->avatar_path); ?>" alt="<?php echo e($cate->name); ?>">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
             $i++;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>





            <div class="wrap-news-home wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                                <div class="title-h">
                                   <div class="text">
                                    Tin tức nổi bật
                                   </div>
                                </div>

                            <?php if(isset($postsHot)): ?>
                            <div class="row">
                                <div class="list-news-home slide-pro autoplay3-news cate-dot-1 cate-arrows-1 ">
                                    <?php $__currentLoopData = $postsHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="fo-03-news col-sm-12">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>">
                                                    <img src="<?php echo e(asset($post_item->avatar_path)); ?>" alt="<?php echo e($post_item->name); ?>">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="caption">
                                                    <span class="time"><?php echo e(Illuminate\Support\Carbon::parse($post_item->created_at)->format('M d Y')); ?></span>
                                                    <span class="auth"><i class="fas fa-user"></i> admin</span>
                                                </div>
                                                <h3><a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>"><?php echo e($post_item->name); ?></a></h3>
                                                <div class="desc">
                                                    <?php echo e($post_item->description); ?>

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
            

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(function(){
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
              $('.autoplay4-pro').slick('setPosition');
            });
        });
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>