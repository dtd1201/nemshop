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
        display: none;
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
                            <div class="col-lg-9 col-sm-12  block-content-right1">
								<h1 class="title-template-in">
                                    <span class="title-inner"> <?php echo e($category->name??""); ?> </span>
                                </h1>
                                <?php if(isset($data)): ?>
                                    <div class="wrap-list-news">
                                        <div class="list-card-news-horizontal">
                                            <div class="row">
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $slug_post1 = explode('tin-tuc/', $post_item->slug);
                                                    $slug_post = implode($slug_post1);
                                                    // dd($slug_post1);
                                                    // $slug_post = $post_item->slug;
                                                ?>
                                                <div class="col-card-news-horizontal col-sm-3">
                                                    <div class="card-news-horizontal card-news-horizontal-2">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="<?php echo e(makeLink('post',$post_item->id, $slug_post)); ?>">
                                                                    <img src="<?php echo e($post_item->avatar_path != null ? asset($post_item->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($post_item->name); ?>"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="<?php echo e(makeLink('post', $post_item->id,$slug_post)); ?>"><?php echo e($post_item->name); ?></a></h3>
                                                                 
                                                                <div class="desc">
                                                                    <?php echo e($post_item->description); ?>

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
							<div class="col-lg-3 col-md-12 col-sm-12 col-12 block-content-left">
								<?php if(isset($sidebar)): ?>
								<?php echo $__env->make('frontend.components.sidebar',[
									"categoryProduct"=>$sidebar['categoryProduct'],
									"categoryPost"=>$sidebar['categoryPost'],
									"categoryProductActive"=>$categoryProductActive  ?? null,
									"postsHot"=>$sidebar['postsHot'],
									"support_online"=>$sidebar['support_online'],
									'fill'=>true,
									'product'=>true,
									'post'=>false,
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

    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/food.mauwebsite.asia/httpdocs/resources/views/frontend/pages/post-by-category.blade.php ENDPATH**/ ?>