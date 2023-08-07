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

            <div class="block-product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12  block-content-right">
                            <div class="group-title">
                                <div class="title title-img"><?php echo e($category->name); ?></div>
                            </div>
                        <?php if(isset($sidebar)): ?>
                            <?php echo $__env->make('frontend.components.sidebar-1',[
                               // "categoryProduct"=>$sidebar['categoryProduct'],
                                // "categoryPost"=>$sidebar['categoryPost'],
                                'category'=>$category,
                                "categoryProductActive"=>$categoryProductActive,
                                'fill'=>true,
                                'product'=>true,
                                'post'=>false,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                           
                            <?php if(isset($data)): ?>
                                <div class="wrap-list-product" id="dataProductSearch">
                                    <div class="list-product-card">
                                        <div class="row">
                                            <?php if(isset($data)&&$data): ?>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $tran=$product->translationsLanguage()->first();
                                                        $link=$product->slug_full;
                                                    ?>
                                                    <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="product-item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="<?php echo e($link); ?>">
                                                                        <img src="<?php echo e(asset($product->avatar_path)); ?>" alt="<?php echo e($tran->name); ?>">
                                                                        <?php if($product->sale): ?>
                                                                        <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                         <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <div class="content">
                                                                    <h3>
                                                                        <a href="<?php echo e($link); ?>">
                                                                            <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <?php if($product->price_after_sale): ?>
                                                                        <span><?php echo e(number_format($product->price_after_sale)); ?> vnđ</span>
                                                                        <?php else: ?>
                                                                        <span>Liên hệ</span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if(count($data)): ?>
                                        <?php echo e($data->appends(request()->all())->onEachSide(1)->links()); ?>

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

            <form action="#" method="get" name="formfill" id="formfill" class="d-none">
                <?php echo csrf_field(); ?>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(function(){
        $(document).on('change','.field-form',function(){
          // $( "#formfill" ).submit();

           let contentWrap = $('#dataProductSearch');

            let urlRequest = '<?php echo e(url()->current()); ?>';
            let data=$("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data:data,
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                }
            });
        });
        $(document).on('change','.field-change-link',function(){
          // $( "#formfill" ).submit();

           let link=$(this).val();
           if(link){
               window.location.href=link;
           }
        });
        // load ajax phaan trang
        $(document).on('click','.pagination a',function(){
            event.preventDefault();
            let contentWrap = $('#dataProductSearch');
            let href=$(this).attr('href');
            //alert(href);
            $.ajax({
                type: "Get",
                url: href,
            // data: "data",
                dataType: "JSON",
                success: function (response) {
                    let html = response.html;

                    contentWrap.html(html);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/nabei.vn/httpdocs/resources/views/frontend/pages/product-by-category.blade.php ENDPATH**/ ?>