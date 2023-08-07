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
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="news-detail">
                                <div class="title-detail">
                                    <?php echo e($data->name); ?>

                                </div>
                                <div class="author">
                                    <div class="date">
                                        <div class="year">Ngày đăng: <?php echo e(date_format($data->created_at,"d/m/Y")); ?></div>
                                    </div>
                                    
                                </div>
								<div class="description">
                                    <?php echo $data->description; ?>

                                </div>
                                
                                <div class="box_content" id="wrapSizeChange">
                                    <div class="content-news">
                                        <?php echo $data->content; ?>


                                        

                                        <div class="row">
                                            <div class="col-lg-3 col-sm-12 col-12">
                                                <div class="content_mucluc">
                                                    <?php $__currentLoopData = config('paragraph.posts.type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeParagraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($data->paragraphs()->where([['type', $typeKey], ['active', 1]])->count() > 0): ?>
                                                            <div class="title_mucluc">
                                                                <i class="fas fa-list"></i>
                                                                <span>Nội dung chính</span>
                                                            </div>
                                                            <div class="box-link-paragraph">
                                                                <ul>
                                                                    <?php echo $__env->make('frontend.components.paragraph',['typeKey'=>$typeKey,'data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-sm-12 col-12">
                                                <?php $__currentLoopData = config('paragraph.posts.type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeParagraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($data->paragraphs()->where([['type', $typeKey], ['active', 1]])->count() > 0): ?>
                                                        <div class="list-content-paragraph">
                                                            <?php echo $__env->make('frontend.components.paragraph-content',['typeKey'=>$typeKey,'data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="hastag">
                                <div class="tags">
                                    <i class="fa fa-tags" aria-hidden="true"></i>Tags
                                </div>
                                <div class="tags_product">
                                    <?php $__currentLoopData = $data->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="tag_title" title="<?php echo e($item->name); ?>"
                                            href="<?php echo e(route('post.tag', ['slug' => $item->name])); ?>"><?php echo e($item->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-12 col-sm-12">
							<?php if(isset($dataRelate)): ?>
                                <?php if($dataRelate): ?>
                                    <?php if($dataRelate->count()): ?>
                                        <div class="row">
                                            <div class="col-xs-12  p-75">
                                                <div class="side-bar wrap-relate shadow">
                                                    <div class="title-sider-bar">
                                                        <span><?php echo e(__('post-detail.tin_tuc_lien_quan')); ?></span>
                                                    </div>
                                                    <div class="list-trending">
                                                        <ul class="d-flex">
                                                            <?php $__currentLoopData = $dataRelate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $slug_post = explode('tin-tuc/', $item->slug);
                                                                $slug_post = implode(' ', $slug_post);
                                                            ?>
                                                            <li class="col-sm-6 col-xs-12">
                                                                <div class="box">
                                                                    <div class="icon">
                                                                        <a href="<?php echo e(makeLink('post',$item->id,$slug_post)); ?>"><img src="<?php echo e(asset($item->avatar_path)); ?>" alt="<?php echo e($item->name); ?>"></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h3 class="name">
                                                                            <a href="<?php echo e(makeLink('post',$item->id,$slug_post)); ?>"><?php echo e($item->name); ?></a>
                                                                        </h3>
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

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(function(){

        let normalSize=parseFloat($('#wrapSizeChange').css('fontSize'));
        $(document).on('click','.prevSize',function(){
            let font=$('#wrapSizeChange').css('fontSize');
            console.log(parseFloat(font));
            let prevFont;
            if(parseFloat(font)<=10){
                prevFont =parseFloat(font);
            }else{
                 prevFont= parseFloat(font) -1;
            }
            $('#wrapSizeChange').css({'fontSize':prevFont});
        });
        $(document).on('click','.nextSize',function(){
            let font=$('#wrapSizeChange').css('fontSize');
            console.log(parseFloat(font));
            let nextFont;
            nextFont= parseFloat(font) + 1;
            $('#wrapSizeChange').css({'fontSize':nextFont});
        });
        $(document).on('click','.mormalSize',function(){
            $('#wrapSizeChange').css({'fontSize':normalSize});
        });


        // js scroll muc luc
        let width;
        width = $(window).width();
        
        if (width>991) {
            (function () {
                var inc = 0;
                $('.name-p').each(function () {
                    $(this).attr('data-scsp', "data" + inc)
                    inc++;
                });
            })();
            (function () {
                var inc = 0;
                $('.scrollLink').each(function (ev) {
                    $(this).attr('data-scsp', "data" + inc)
                    inc++;
                });
            })();

            $(window).on("load scroll", function () {
                var windowScroll = $(this).scrollTop();
                $(".name-p").each(function () {
                    var thisOffsetTop = Math.round($(this).offset().top - 30);

                    if (windowScroll >= thisOffsetTop) {
                        var thisAttr = $(this).attr('data-scsp');
                        $('.scrollLink').removeClass("active");
                        $('.scrollLink[data-scsp="' + thisAttr + '"]').addClass("active");
                    }
                });
            });
        }

        $(window).resize(function() {
            width = $(window).width();
            if (width>991) {
                (function () {
                    var inc = 0;
                    $('.name-p').each(function () {
                        $(this).attr('data-scsp', "data" + inc)
                        inc++;
                    });
                })();
                (function () {
                    var inc = 0;
                    $('.scrollLink').each(function (ev) {
                        $(this).attr('data-scsp', "data" + inc)
                        inc++;
                    });
                })();

                $(window).on("load scroll", function () {
                    var windowScroll = $(this).scrollTop();
                    $(".name-p").each(function () {
                        var thisOffsetTop = Math.round($(this).offset().top - 30);

                        if (windowScroll >= thisOffsetTop) {
                            var thisAttr = $(this).attr('data-scsp');
                            $('.scrollLink').removeClass("active");
                            $('.scrollLink[data-scsp="' + thisAttr + '"]').addClass("active");
                        }
                    });
                });
            }
        });
    });
</script>
<script src="<?php echo e(asset('frontend/js/Comment.js')); ?>">
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kingphar.vn/httpdocs/resources/views/frontend/pages/post-detail.blade.php ENDPATH**/ ?>