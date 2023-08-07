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
            <div class="wrap-content-main wrap-template-product template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 block-content-right">
                            <h3 class="title-template-news"><?php echo e($category->name??""); ?></h3>
                            <?php if(isset($data)): ?>
                                <div class="list-news">
                                    <div class="row">
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="fo-03-news col-lg-4 col-md-6 col-sm-6">
                                            <div class="box">
                                                <div class="image">
                                                    <a href="<?php echo e(makeLink("post",$post->id,$post->slug)); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                                                </div>
                                                <h3><a href="<?php echo e(makeLink("post",$post->id,$post->slug)); ?>"><?php echo e($post->name); ?></a></h3>
                                                <div class="date"><?php echo e(date_format($post->updated_at,"d/m/Y")); ?> - Admin Bivaco</div>
                                                <div class="desc">
                                                    <?php echo $post->description; ?>

                                                </div>
                                            </div>
                                        </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <?php if(count($data)): ?>
                                <?php echo e($data->links()); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-3 col-md-12 col-sm-12 block-content-left">
                            <?php if(isset($sidebar)): ?>
                                <?php echo $__env->make('frontend.components.sidebar',[
                                    "categoryProduct"=>$sidebar['categoryProduct'],
                                    "categoryPost"=>$sidebar['categoryPost'],
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/frontend/pages/post.blade.php ENDPATH**/ ?>