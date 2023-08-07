<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                <?php echo $__env->make('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="blog-news-detail">
                <div class="container">
                    <div class="row p-75 d-flex before-after-unset">
                        <div class="col-md-8 col-sm-12 col-xs-12 block-content-left p-75">
                            <div class="news-detail shadow padding-content">
                                <div class="title-detail">
                                    <?php echo e($data->name); ?>

                                </div>
                                <div class="author">
                                    <div class="date">
                                        <div class="year"><?php echo e(date_format($data->created_at,"d/m/Y")); ?></div>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src=" <?php echo e($data->avatar_path); ?>" alt="<?php echo e($data->name); ?>">
                                </div>
                                <div class="box_content">

                                    <div class="content-news">

                                        <?php echo $data->content; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 block-content-right p-75" id="side-bar">
                            <div class="fix-sidebar">
                                <div class="side-bar shadow">
                                    <div class="title-sider-bar">
                                        <span><?php echo e(__('post-detail.tin_tuc_noi_bat')); ?></span>
                                    </div>
                                    <div class="list-trending">

                                        <ul>
                                            <?php if(isset($post_hot)): ?>
                                            <?php $__currentLoopData = $post_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="box">
                                                    <div class="icon">
                                                        <a href="<?php echo e(makeLink('post',$item->id,$item->slug)); ?>"><img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                                                    </div>
                                                    <div class="content">

                                                        <h3 class="name">
                                                            <a href="<?php echo e(makeLink('post',$item->id,$item->slug)); ?>"><?php echo e($item->name); ?></a>
                                                        </h3>
                                                        <div class="desc">
                                                            <?php echo e($item->description); ?>

                                                        </div>
                                                        <div class="text-right">
                                                            <div class="date">
                                                                <?php echo e(date_format($item->created_at,"d/m/Y")); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php if(isset($dataRelate)): ?>
                        <?php if($dataRelate): ?>
                            <?php if($dataRelate->count()): ?>
                                <div class="row p-75">
                                    <div class="col-xs-12  p-75">
                                        <div class="side-bar wrap-relate shadow">
                                            <div class="title-sider-bar">
                                                <span><?php echo e(__('post-detail.tin_tuc_lien_quan')); ?></span>
                                            </div>
                                            <div class="list-trending">
                                                <ul class="d-flex">
                                                    <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="col-sm-6 col-xs-12">
                                                        <div class="box">
                                                            <div class="icon">
                                                                <a href="<?php echo e(makeLink('post',$item->id,$item->slug)); ?>"><img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>"></a>
                                                            </div>
                                                            <div class="content">

                                                                <h3 class="name">
                                                                    <a href="<?php echo e(makeLink('post',$item->id,$item->slug)); ?>"><?php echo e($item->name); ?></a>
                                                                </h3>
                                                                <div class="desc">
                                                                    <?php echo e($item->description); ?>

                                                                </div>
                                                                <div class="text-right">
                                                                    <div class="date">
                                                                        <?php echo e(date_format($item->created_at,"d/m/Y")); ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
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
<script src="<?php echo e(asset('frontend/js/Comment.js')); ?>">
</script>
<script>
    console.log($('div').createFormComment());
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/frontend/pages/post-detail.blade.php ENDPATH**/ ?>