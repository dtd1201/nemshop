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


            <h1 class="title-template-news hidden"><?php echo e($data->name??""); ?></h1>

            <div class="blog-tuyendung">
                <div class="container">
                    <div class="row p-75">
                        <div class="col-md-8 col-sm-12 col-xs-12 block-content-left p-75">
                            <div class="shadow padding-content">
                                <div class="title-detail title-lg">
                                    <?php echo e($data->name??""); ?>

                                </div>
                                <div class="list-news-3">
                                    <?php if(isset($categoryAll)): ?>
                                    <?php $__currentLoopData = $categoryAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card-news-horizontal">
                                        <div class="box">
                                            <div class="image">
                                                <a href="<?php echo e(route('tuyendung_link',
                                                    ['id' => $post->id, 'slug' => $post->slug]

                                                    )); ?>"><img src="<?php echo e(asset($post->avatar_path)); ?>" alt="<?php echo e($post->name); ?>"></a>
                                            </div>
                                            <div class="content">
                                                <h3><a href="<?php echo e(route('tuyendung_link',
                                                    ['id' => $post->id, 'slug' => $post->slug]

                                                    )); ?>"><?php echo e($post->name); ?></a></h3>
                                                <div class="desc">
                                                    <?php echo $post->description; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 block-content-right p-75" id="side-bar">
                            <div class="side-bar">
                                <div class="title-sider-bar">
                                    <span>Tin tuyển dụng nổi bật</span>
                                </div>
                                <?php if(isset($post_hot)): ?>
                                <div class="list-trending">
                                    <ul>
                                        <?php $__currentLoopData = $post_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="box">
                                                <div class="icon">
                                                    <a href="<?php echo e(route('tuyendung_link',
                                                    ['id' => $item->id, 'slug' => $item->slug]

                                                    )); ?>"
                                                    >
                                                        <img src="<?php echo e($item->avatar_path); ?>" alt="<?php echo e($item->name); ?>">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h3 class="name">
                                                        <a href="<?php echo e(route('tuyendung_link',
                                                    ['id' => $item->id, 'slug' => $item->slug]

                                                    )); ?>"><?php echo e($item->name); ?></a>
                                                    </h3>
                                                    <div class="desc">
                                                        <?php echo $item->description; ?>

                                                    </div>
                                                    <div class="text-right">
                                                        <div class="date">
                                                            <?php echo e(date_format($item->updated_at,"d/m/Y")); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/vision.vsscorp.vn/httpdocs/resources/views/frontend/pages/tuyendung.blade.php ENDPATH**/ ?>