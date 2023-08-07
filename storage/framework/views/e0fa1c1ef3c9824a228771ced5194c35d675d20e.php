<?php
   $i=1;
   if (!isset($limit)) {
     $limit=99;
   }

?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item">
        <a href="<?php echo e($value['slug_full']); ?>">
            <span> <?php echo e($value['name']); ?></span>
            <?php if(isset($value['childs'])): ?>
                <?php if(count($value['childs'])>0&&$limit>=$i+1): ?>
                    <?php echo $icon_d??""; ?>

                <?php endif; ?>
            <?php endif; ?>
        </a>
        <?php if(isset($value['childs'])): ?>
            <?php if(count($value['childs'])>0&&$limit>=$i+1): ?>
                <div class="menu-dropdown">
                    <div class="row no-gutters">
                        <div class="col-3">
                            <ul class="sub-nav-left p-b-16">
                                <?php $__currentLoopData = $value['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-sub-item <?php if($loop->first): ?> active  <?php endif; ?>" data-id="li<?php echo e($childValue->id); ?>">
                                        <a href="">
                                            <div class="sub-nav-picture m-r-8">
                                                <picture>
                                                    <img alt="<?php echo e($childValue['name']); ?>" srcset="" class="loaded" src="" />
                                                </picture>
                                            </div>
                                            <div class="sub-nav-name fs-p-14">
                                                <span><?php echo e($childValue['name']); ?> </span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </ul>
                        </div>
                        <div class="col-9">
                            <div class="sub-nav-right active" id="li1">

                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                    <div class="sub-nav-title m-b-12">
                                        <div class="u-flex justify-between align-items-center">
                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                <i class="fab fa-gripfire"></i>
                                                Bán chạy nhất
                                            </div>
                                            <a class="link p-t-2" href="">Xem tất cả</a>
                                        </div>
                                    </div>
                                    <div class="sub-nav-product-list">
                                        <div class="row row-cols-5">
                                            <div class="col p-x-8">
                                                <div class="sub-nav-product-item">
                                                    <a href="">
                                                        <div class="sub-nav-product-picture m-b-12">
                                                            <picture>
                                                                <img
                                                                    alt="Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)"
                                                                    class="loaded"
                                                                    src="<?php echo e(asset('frontend/images/product-test.webp')); ?>"
                                                                />
                                                            </picture>
                                                        </div>
                                                        <div class="sub-nav-product-info">
                                                            <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)
                                                            </div>
                                                            <div class="product-info-price txt-gray-700 m-t-4 fs-p-16">
                                                                <span class="fs-p-18 txt-primary-700 f-w-500 fs-p-md-14">110.000đ</span>
                                                                / Hộp
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-nav-right" id="li2">
                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                    <div class="sub-nav-title m-b-12">
                                        <div class="u-flex justify-between align-items-center">
                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                <i class="fab fa-gripfire"></i>
                                                Bán chạy nhất
                                            </div>
                                            <a class="link p-t-2" href="">Xem tất cả</a>
                                        </div>
                                    </div>
                                    <div class="sub-nav-product-list">
                                        <div class="row row-cols-5">
                                            <div class="col p-x-8">
                                                <div class="sub-nav-product-item">
                                                    <a href="">
                                                        <div class="sub-nav-product-picture m-b-12">
                                                            <picture>
                                                                <img alt="Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)" class="loaded" src="<?php echo e(asset('storage/product/2/e1.webp')); ?>" />
                                                            </picture>
                                                        </div>
                                                        <div class="sub-nav-product-info">
                                                            <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)
                                                            </div>
                                                            <div class="product-info-price txt-gray-700 m-t-4 fs-p-16">
                                                                <span class="fs-p-18 txt-primary-700 f-w-500 fs-p-md-14">110.000đ</span>
                                                                / Hộp
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-nav-right" id="li3">
                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                    <div class="sub-nav-title m-b-12">
                                        <div class="u-flex justify-between align-items-center">
                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                <i class="fab fa-gripfire"></i>
                                                Bán chạy nhất
                                            </div>
                                            <a class="link p-t-2" href="">Xem tất cả</a>
                                        </div>
                                    </div>
                                    <div class="sub-nav-product-list">
                                        <div class="row row-cols-5">
                                            <div class="col p-x-8">
                                                <div class="sub-nav-product-item">
                                                    <a href="">
                                                        <div class="sub-nav-product-picture m-b-12">
                                                            <picture>
                                                                <img alt="Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)" class="loaded" src="<?php echo e(asset('storage/product/2/r1.webp')); ?>" />
                                                            </picture>
                                                        </div>
                                                        <div class="sub-nav-product-info">
                                                            <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)
                                                            </div>
                                                            <div class="product-info-price txt-gray-700 m-t-4 fs-p-16">
                                                                <span class="fs-p-18 txt-primary-700 f-w-500 fs-p-md-14">110.000đ</span>
                                                                / Hộp
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-nav-right" id="li4">
                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                    <div class="sub-nav-title m-b-12">
                                        <div class="u-flex justify-between align-items-center">
                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                <i class="fab fa-gripfire"></i>
                                                Bán chạy nhất
                                            </div>
                                            <a class="link p-t-2" href="">Xem tất cả</a>
                                        </div>
                                    </div>
                                    <div class="sub-nav-product-list">
                                        <div class="row row-cols-5">
                                            <div class="col p-x-8">
                                                <div class="sub-nav-product-item">
                                                    <a href="">
                                                        <div class="sub-nav-product-picture m-b-12">
                                                            <picture>
                                                                <img alt="Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)" class="loaded" src="<?php echo e(asset('storage/product/2/w1.webp')); ?>" />
                                                            </picture>
                                                        </div>
                                                        <div class="sub-nav-product-info">
                                                            <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)
                                                            </div>
                                                            <div class="product-info-price txt-gray-700 m-t-4 fs-p-16">
                                                                <span class="fs-p-18 txt-primary-700 f-w-500 fs-p-md-14">110.000đ</span>
                                                                / Hộp
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-nav-right" id="li5">
                                <div class="sub-nav-cate p-t-16 p-b-4 p-x-16">
                                    <div class="row row-cols-4 flex-wrap sub-nav-cate-wrap">
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col sub-nav-cate-item p-x-8">
                                            <a href="" class="u-flex align-items-center bg-white txt-gray-800 circle p-y-4 p-l-4 p-r-16 box-full">
                                                <div class="sub-nav-cate-picture m-r-8">
                                                    <picture>
                                                        <img alt="Huyết áp" srcset="" class="loaded" src="<?php echo e(asset('frontend/images/icon-test-menu.webp')); ?>" />
                                                    </picture>
                                                </div>
                                                <div class="sub-nav-cate-name">
                                                    <span>Huyết áp</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-nav-product box-t-2 p-x-16 p-t-12 p-b-16">
                                    <div class="sub-nav-title m-b-12">
                                        <div class="u-flex justify-between align-items-center">
                                            <div class="u-flex align-items-center fs-p-16 txt-gray-800 f-w-500">
                                                <i class="fab fa-gripfire"></i>
                                                Bán chạy nhất
                                            </div>
                                            <a class="link p-t-2" href="">Xem tất cả</a>
                                        </div>
                                    </div>
                                    <div class="sub-nav-product-list">
                                        <div class="row row-cols-5">
                                            <div class="col p-x-8">
                                                <div class="sub-nav-product-item">
                                                    <a href="">
                                                        <div class="sub-nav-product-picture m-b-12">
                                                            <picture>
                                                                <img
                                                                    alt="Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)"
                                                                    class="loaded"
                                                                    src="<?php echo e(asset('frontend/images/product-test.webp')); ?>"
                                                                />
                                                            </picture>
                                                        </div>
                                                        <div class="sub-nav-product-info">
                                                            <div class="sub-nav-product-name fs-p-16 truncate2 txt-gray-700">
                                                                Viên Uống Sâm Nhung Bổ Thận Nv Dolexphar Giúp Tráng Dương, Mạnh Gân Cốt (30 Viên)
                                                            </div>
                                                            <div class="product-info-price txt-gray-700 m-t-4 fs-p-16">
                                                                <span class="fs-p-18 txt-primary-700 f-w-500 fs-p-md-14">110.000đ</span>
                                                                / Hộp
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/vhosts/cus05.largevendor.com/httpdocs/resources/views/frontend/components/menu-san-pham.blade.php ENDPATH**/ ?>