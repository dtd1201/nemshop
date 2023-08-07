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
    .section-btg .post-title{
        font-size: 24px;
        font-weight: 700;
        color: #333;
        padding: 30px 0;
        margin: 0;
    }
    .section-btg .box{
        display:block;
        padding:4px;
    }
    .section-btg .news-image{
        transition:border 0.2s ease-in-out;
    }
    .section-btg .news-image img{
        width: 100%;
        height:auto;
    }
    .section-btg .news-content{
        padding:9px;
        color:#333;

    }
    .section-btg .news-content .news-content-title{
        font-size:17px;
        line-height:24px;
        font-weight:600;
        margin: 15px 0 3px;
        padding: 0;
        color: rgb(65, 65, 65);
        text-transform: uppercase;
    }
    .section-btg .news-content ul>li{
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 12px;
    }
    .section-btg .news-content ul>li a:hover{
            color: #1e9402;
    }
    .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl{
        padding-left:12px;
        padding-right:12px;
    }
    .section-btg .col-blog-news{
        padding-left:0;
        padding-right:12px;
    }

    .main .ss-view-body {
        background: linear-gradient(to right,#3a9db8,#1e64a9);
    }

    .main .ss-view-body h2 {
        font-size: 24px;
        font-weight: 700;
        color: #fff;
        padding: 30px 0;
    }

    .main .ss-view-body .btn-main {
        padding-right: 70px;
    }

    .main .ss-view-body .btn-main .btn-bp {
        padding: 0;
    }

    .nut-btn {
        cursor: pointer;
    }

    .main .ss-view-body .btn-main .btn-bp a i {
        position: relative;
        right: -114px;
        top: -35px;
        font-size: 34px;
        width: 20px;
        color: #fff;
        display: none;
    }

    .main .ss-view-body .body-content {
        border-radius: 4px;
        background: #fff;
        width: 750px;
        height: 400px;
        padding: 0 0 12px;
        /* margin-left: 10px; */
    }

    .main .ss-view-body .body-content .tab-content, .main .ss-view-body .body-content .tab-content a.xemthem {
        display: none;
    }

    .main .ss-view-body .body-content .tab-content.current {
        display: block!important;
        overflow: auto;
        height: 400px;
    }

    .main .ss-view-body .btn-main img {
        position: relative;
        bottom: 25px;
    }

    .main .ss-view-body .body-content .tab-content a {
        text-decoration: none;
        float: left;
        color: #414141;
        text-align: left;
        background: 0 0;
        width: 50%;
        height: 10%;
        display: inline-block;
        margin: 0 0 3px;
        padding: 10px 0 0 40px;
    }

    .main .ss-view-body a {
        margin-bottom: 20px;
        padding: 9px 10px;
        border-radius: 4px;
        width: 100px;
        text-align: center;
        height: 40px;
        background-color: #f4f4f4;
        display: block;
        font-size: 16px;
    }

    .row:before {
        display: table;
        content: " ";
    }

    .row:after {
        clear: both;
    }

    .container:after {
        clear: both;
    }

    .main .ss-view-body .btn-main .btn-bp a.active {
        background: #ee8434;
        color: #fff;
    }

    .main .ss-view-body .btn-main .btn-bp a.active i {
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
            
            
                <?php if(isset($category) && $category): ?>
                <div class="block-news">
                    <div class="section-btg">
                        <div class="container">
                            <h2 class="post-title"><?php echo e($category->name); ?></h2>
                            <div class="row">
                                <?php $__currentLoopData = $category->childs()->where('active', 1)->orderBy('order')->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-blog-news">
                                        <div class="box">
                                            <div class="news-image">
                                                <a href="<?php echo e($value->slug_full); ?>">
                                                    <img src="<?php echo e(asset($value->avatar_path)); ?>" alt="<?php echo e($value->name); ?>">
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <div class="news-content-title">
                                                    <a href="<?php echo e($value->slug_full); ?>"><?php echo e($value->name); ?></a>
                                                </div>
                                                <ul>
                                                    <?php if($value->posts()->count() > 0): ?>
                                                        <?php $__currentLoopData = $value->posts()->where('active', 1)->orderBy('order')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e($childValue->slug_full); ?>">
                                                                    <span><?php echo e($childValue->name); ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(function(){
        $(document).ready(function() {
            handleTabBenh();
        });

        function handleTabBenh(){
            //btn body cho trang benh-info
            $(".btn-bp a").click(function () {
                var tab_id = $(this).attr('data-tab');
                var el = $("#" + tab_id);
                // tao bien cho tab
                $('a').removeClass('active');
                $(this).addClass("active");

                // $(".btn-bp a svg").show("svg");
                // cho the a
                $('.tab-content').removeClass('current');
                $("#" + tab_id).addClass('current');

                // if ($(window).innerWidth() <= 767) {
                //     $('.btn-bp').addClass("wrapping");
                //     $(".btn-main .xoa").addClass('delete');
                //     $(".btn-main").addClass('them');
                //     $(".btn-bp a ").removeClass("active1");
                //     $(this).addClass("active1");
                //     $(".body-content").fadeIn('them');
                //     $(".body-content").css("display", "inline-table");
                //     $(".ss-view-body h2 span").show();
                // } else {
                //     return false;
                // }
                if (el.children("a").length > 12) {
                    $(el.children(".xemthem")).css("display", "block");
                }
                // click nut xem them show full tag a

                var e = $(".xemthem").click(function () {
                    var tab_id = $(this).attr('data-tab');
                    $("#" + tab_id).addClass('full row');
                    $(this).fadeOut();
                });

                // click ra ngoai remove class full
                $(document).on('click', function (event) {
                    if (!$(event.target).closest('.tab-content').length) {
                        $(".tab-content").removeClass("full row");

                        // check laij xem them
                        if (el.children("a").length > 12) {
                            $(el.children(".xemthem")).fadeIn();
                        }
                    }

                });
            });
        }
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/cus05.largevendor.com/httpdocs/resources/views/frontend/pages/post-by-category.blade.php ENDPATH**/ ?>