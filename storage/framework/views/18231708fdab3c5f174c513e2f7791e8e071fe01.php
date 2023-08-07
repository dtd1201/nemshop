<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">
    .wrap-breadcrumbs{
        margin-bottom: 0;
    }

    .title-template-in .title-inner{
        padding-top: 30px;
        display: block;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if($category->id==13): ?>

            <?php else: ?>
                <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                    <?php echo $__env->make('frontend.components.breadcrumbs',[
                        'breadcrumbs'=>$breadcrumbs,
                        'type'=>$typeBreadcrumb,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
                <div class="block-news">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <h1 class="title-template-in">
                                    <?php if($category->id==13): ?>

                                    <div class="img_about">
                                        <a href="<?php echo e($category->description); ?>">
                                            <img class="d-none d-md-block" src="<?php echo e(asset($category->avatar_path)); ?>" alt="<?php echo e($category->name); ?>">
                                            <img class="d-block d-md-none" src="<?php echo e(asset($gioiThieuM->image_path)); ?>" alt="<?php echo e($category->name); ?>">
                                        </a>
                                    </div>

                                    <span class="title-inner"> NaBei - Trao giá trị, vững niềm tin </span>
                                    <?php else: ?>
                                    <span class="title-inner"> <?php echo e($category->name??""); ?> </span>
                                    <?php endif; ?>

                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12  block-content-right">

                                <?php if(isset($data)): ?>
                                    <div class="wrap-list-news">
                                        <div class="list-card-news-horizontal">
                                            <div class="row">
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-card-news-horizontal col-sm-4">
                                                    <div class="card-news-horizontal card-news-horizontal-2">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>"><img src="<?php echo e(asset($post_item->avatar_path)); ?>" alt="<?php echo e($post_item->name); ?>"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>"><?php echo e($post_item->name); ?></a></h3>
                                                                 <div class="date"><i class="far fa-calendar-alt"></i> <?php echo e(Illuminate\Support\Carbon::parse($post_item->created_at)->format('d/m/Y')); ?> - Đăng bởi Admin</div>
                                                                <div class="desc">
                                                                    <?php echo e($post_item->description); ?>

                                                                </div>
                                                               <div class="text-right">
                                                                <a href="<?php echo e(makeLink('post',$post_item->id,$post_item->slug)); ?>" class="btn-viewmore btn btn-light"><i class="fas fa-angle-double-right"></i> Xem thêm</a>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php if(count($data)): ?>
                                            <?php echo e($data->appends(request()->all())->links()); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($category->content): ?>
                                <div class="content-category" id="wrapSizeChange">
                                    <?php echo $category->content; ?>

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

    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/pages/post-by-category.blade.php ENDPATH**/ ?>