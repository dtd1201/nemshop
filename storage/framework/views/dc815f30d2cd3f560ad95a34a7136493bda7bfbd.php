<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <div class="text-left wrap-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="<?php echo e(makeLink('home')); ?>">Trang chủ</a>
                                </li>
                                <li class="breadcrumbs-item active"><a href="#" class="currentcat">Compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-compare">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <?php if(isset($data)): ?>
                                <div class="wrap-list-compare">
                                    <div class="list-compare">
                                        <div class="row compare-wrapper">
                                            <div class="col-md-12">
                                                <?php if($data->count()>0): ?>
                                                    <h2 class="title-compare">Tổng số <?php echo e($data->count()); ?> sản phẩm <a data-url="<?php echo e(route('compare.clear')); ?>" class="clear-compare btn btn-danger">Xóa all</a></h2>
                                                <?php endif; ?>
                                            </div>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6 col-compare">
                                                <div class="compare-card">
                                                    <div class="box">
                                                        <div class="image">
                                                            <a href="<?php echo e($product->slug_full); ?>"><img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e(asset($product->name)); ?>"></a>
                                                            <?php if($product->sale): ?>
                                                            <span class="sale">-<?php echo e($product->sale); ?>%</span>
                                                            <?php endif; ?>
                                                            <a data-url="<?php echo e(route('compare.remove',['id'=>$product->id])); ?>" class="remove-compare"><i class="fas fa-times-circle"></i></a>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="name"><a href="<?php echo e($product->slug_full); ?>"><?php echo e($product->name); ?></a></h3>
                                                            <div class="view-more"><a href="<?php echo e($product->slug_full); ?>" class="btn btn-primary">Xem ngay</a></div>
                                                            <div class="box-price">
                                                                <span class="new-price"><?php echo e($product->price_after_sale?number_format($product->price_after_sale)." ".$unit:"Liên hệ"); ?> </span>
                                                                <?php if($product->sale>0): ?>
                                                                <span class="old-price"><?php echo e($product->price); ?> <?php echo e($unit); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <hr>
                                                            <div class="info">
                                                                <h3>Thông tin chính</h3>
                                                                <ul>
                                                                    <li>
                                                                        <strong>Model:</strong> <?php echo e($product->model?$product->model:"Chưa xác định"); ?>

                                                                    </li>
                                                                    <li>
                                                                        <strong>Tình trạng:</strong> <?php echo e($product->tinhtrang?$product->tinhtrang:"Chưa xác định"); ?>

                                                                    </li>
                                                                    <li>
                                                                        <strong>Bảo hành:</strong> <?php echo e($product->baohanh?$product->baohanh:"Chưa xác định"); ?>

                                                                    </li>
                                                                    <li>
                                                                        <strong>Xuất sứ:</strong> <?php echo e($product->xuatsu?$product->xuatsu:"Chưa xác định"); ?>

                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <hr>
                                                            <div class="info">
                                                                <h3>Thuộc tính</h3>
                                                                <ul>
                                                                    <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <strong><?php echo e($item->name); ?></strong>
                                                                        <?php
                                                                            $tex="Chưa xác định";
                                                                        ?>
                                                                        <?php $__currentLoopData = $item->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                                if($product->attributes()->get()->pluck('id')->contains($attr->id)){
                                                                                    $tex=$attr->name ;
                                                                                }
                                                                            ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php echo e($tex); ?>

                                                                    </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(function(){

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/frontend/pages/compare.blade.php ENDPATH**/ ?>