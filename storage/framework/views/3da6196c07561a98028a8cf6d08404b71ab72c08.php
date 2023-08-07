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

            <h1 class="title-template-news hidden"><?php echo e($category->name??""); ?></h1>
                <div class="blog-news">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="group-title">
                                    <div class="title title-red">
                                        <?php echo e(__('post.tin_tuc_noi_bat')); ?>

                                    </div>
                                </div>
                                <?php if(isset($data_hot)): ?>
                                <div class="list-news-2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 right list-news-blog list-news-blog-nb">
                                            <div class="row d-flex before-after-unset">
                                                <?php $__currentLoopData = $data_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="fo-03-col-news  col-xs-12 col-sm-3 col-md-3">
                                                    <div class="fo-03-news">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e(makeLink('post',$post->id,$post->slug)); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="<?php echo e(makeLink('post',$post->id,$post->slug)); ?>"><?php echo e($post->name); ?></a></h3>
                                                                <div class="desc"><?php echo $post->description; ?></div>
                                                                <div class="block-action-news">
                                                                    <a href="<?php echo e(makeLink('post',$post->id,$post->slug)); ?>" class="xemthem"><?php echo e(__('post.xem_them')); ?></a>
                                                                    <span class="date"><?php echo e(date_format($post->updated_at,"d/m/Y")); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>

                                <div class="line-div-long"></div>

                                <div class="group-title">
                                    <div class="title title-red">
                                        <?php echo e($category->name??""); ?>

                                    </div>
                                </div>
                                <?php if(isset($data)): ?>
                                <div class="list-news-2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 right list-news-blog">
                                            <div class="row d-flex before-after-unset">
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="fo-03-col-news  col-xs-12 col-sm-3 col-md-3">
                                                    <div class="fo-03-news">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e(makeLink('post',$post->id,$post->slug)); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="<?php echo e(makeLink('post',$post->id,$post->slug)); ?>"><?php echo e($post->name); ?></a></h3>
                                                                <div class="desc"><?php echo $post->description; ?></div>
                                                                <div class="block-action-news">
                                                                    <a href="<?php echo e(makeLink('post',$post->id,$post->slug)); ?>" class="xemthem"><?php echo e(__('post.xem_them')); ?></a>
                                                                    <span class="date"><?php echo e(date_format($post->updated_at,"d/m/Y")); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 right">
                                            <div class="pagination-group">
                                                <div class="pagination">
                                                    <?php if(count($data)): ?>
                                                    <?php echo e($data->links()); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
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
        $(document).on('click','.pt_icon_right',function(){
            event.preventDefault();
            $(this).parentsUntil('ul','li').children("ul").slideToggle();
            $(this).parentsUntil('ul','li').toggleClass('active');
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/post.blade.php ENDPATH**/ ?>