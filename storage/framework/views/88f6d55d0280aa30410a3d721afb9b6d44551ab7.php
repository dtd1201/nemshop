

<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                <?php echo $__env->make('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            

            <div class="blog-product">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title title-red">
                                    Danh mục các dịch vụ
                                </div>
                            </div>
                            <?php if(isset($data)): ?>
                            <div class="list-service-2">
                                <div class="row p-75 d-flex before-after-unset justify-center">
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-service-item-2 col-md-4 col-sm-6 col-xs-12 p-75">
                                        <div class="service-item-2">
                                            <a class="box" href="<?php echo e($product->slug_full); ?>">
                                                <div class="icon">
                                                    <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($product->name); ?>">
                                                </div>
                                                <h3 class="name">
                                                    <?php echo e($product->name); ?>

                                                </h3>
                                                <div class="desc">
                                                    <?php echo $product->description; ?>

                                                </div>
                                                <div class="line-div-2"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php if(count($data)): ?>
                                <?php echo e($data->links()); ?>

                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <a href="<?php echo e(URL::to('/lien-he.html')); ?>" class="btn-view"><i class="fa fa-paper-plane" aria-hidden="true"></i> Nhận tư vấn</a>
                            </div>
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
        $(document).on('click','.pt_icon_right',function(){
            event.preventDefault();
            $(this).parentsUntil('ul','li').children("ul").slideToggle();
            $(this).parentsUntil('ul','li').toggleClass('active');
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/product.blade.php ENDPATH**/ ?>