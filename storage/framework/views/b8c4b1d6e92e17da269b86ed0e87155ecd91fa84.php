<?php $__env->startSection('title', 'VISION SHIPPING'); ?>

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
                            <div class="col-md-8">
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
                                <div class="col-md-4">
                                    <?php $__currentLoopData = $bannerHome->childs()->orderby('order')->limit(2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item-banner-home">
                                        <a class="d-block" href="<?php echo e($item->slug); ?>"  target="_self">
                                            <div class="hover-effect <?php if($loop->first): ?> hover-effect-2 <?php else: ?> hover-effect-10 <?php endif; ?>">
                                                <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->name); ?>">
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <div class="group-title">
                                <div class="title">Top deals in this week</div>
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
                                <div class="row autoplay5-pro">
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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

            <div class="wrap-product-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" >Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tab2" role="tab" >Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab3" role="tab" >Contact</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" >

                                    <div class="row autoplay4-pro cate-arrows-2">
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                    <div class="row autoplay4-pro cate-arrows-2">
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-product-card">
                                            <div class="product-card">
                                                <div class="box">
                                                    <div class="image">
                                                        <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                        <span class="hot">New</span>
                                                        <span class="sale">20%</span>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="name"><a href="">Tên</a></h3>
                                                        <div class="box-price">
                                                            <span class="new-price">30.000đ</span>
                                                            <span class="old-price">40.000đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <ul>
                                                            <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                            <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                            <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap-product-home">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="group-title">
                                <div class="title">Latest Products</div>
                            </div>
                            <div class="list-product-home">
                                <div class="row autoplay5-pro cate-arrows-1">
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-product-card">
                                        <div class="product-card">
                                            <div class="box">
                                                <div class="image">
                                                    <a href=""><img src="https://demo.poco-theme.com/1/image/cache/catalog/maza/demo/mz_poco/megastore-3/product/3-222x248.jpg" alt=""></a>
                                                    <span class="hot">New</span>
                                                    <span class="sale">20%</span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name"><a href="">Tên</a></h3>
                                                    <div class="box-price">
                                                        <span class="new-price">30.000đ</span>
                                                        <span class="old-price">40.000đ</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <ul>
                                                        <li class="a-cart"><a href=""><i class="fas fa-cart-plus"></i></a></li>
                                                        <li class="a-view"><a href=""><i class="fas fa-eye"></i></a></li>
                                                        <li class="a-view"><a href="">   <svg viewBox="-5 0 459 459.648" xmlns="http://www.w3.org/2000/svg"><path d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0"></path><path d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0"></path></svg></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap-news-home wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="group-title">
                                <div class="title">
                                    From the blog
                                </div>
                            </div>
                            <?php if(isset($postNew)): ?>
                            <div class="list-news-home autoplay3-news cate-dot-1 cate-arrows-1 row">
                                <?php $__currentLoopData = $postNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="fo-03-news col-sm-12">
                                    <div class="box">
                                        <div class="image">
                                            <a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>">
                                                <img src="<?php echo e(asset($post_item->avatar_path)); ?>" alt="<?php echo e($post_item->name); ?>">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="caption">
                                                <span class="time">10 May 2019</span>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\mayphotophuson.vn\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>