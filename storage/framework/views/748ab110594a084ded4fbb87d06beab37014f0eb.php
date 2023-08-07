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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 block-content-right">
                            
                            
                           <div class="info-count-pro">
                               <div class="count-pro">
                                    <?php if(isset($category)&&$category): ?>
                                        <?php echo e($category->name); ?>

                                    <?php endif; ?>
                               </div>
                                <div class="orderby">
                                    <select name="orderby" id="" class="form-control field-form" form="formfill">
                                        <option value="0"><?php echo e(__('product.sap_xep_theo')); ?></option>
                                        <option value="1"><?php echo e(__('product.gia_tang_dan')); ?></option>
                                        <option value="2"><?php echo e(__('product.gia_giam_dan')); ?></option>
                                        
                                        <option value="5"><?php echo e(__('product.moi_nhat')); ?></option>
                                        <option value="6"><?php echo e(__('product.cu_nhat')); ?></option>
                                        <option value="7"><?php echo e(__('product.sp_noi_bat')); ?></option>
                                    </select>
                                </div>
                           </div>
							<?php if($category->content): ?>
                            <div class="content-category" id="wrapSizeChange">
                                <?php echo $category->content; ?>

                            </div>
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
                                                    <div class="col-product-item col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <div class="product-item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="<?php echo e($link); ?>">
                                                                        <img src="<?php echo e($product->avatar_path != null ? asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                                        <?php if($product->sale): ?>
                                                                        <span class="sale"> <?php echo e($product->sale." %"); ?></span>
                                                                        <?php endif; ?>

                                                                        <?php if($product->baohanh): ?>
                                                                            <div class="km">
                                                                                <?php echo e($product->baohanh); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                    <div class="actionss">
                                                                        <div class="btn-cart-products">
                                                                            <a class="add-to-cart" data-url="<?php echo e(route('cart.add',['id' => $product->id,])); ?>" data-info="<?php echo e(__('home.them_san_pham')); ?>" data-agree="<?php echo e(__('home.dong_y')); ?>" data-skip="<?php echo e(__('home.huy')); ?>" data-addfail="<?php echo e(__('home.them_san_pham_that_bat')); ?>">
                                                                                <i class="fas fa-cart-plus"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="view-details">
                                                                            <a href="<?php echo e($link); ?>" class="view-detail"> 
                                                                                <span>
                                                                                    <i class="far fa-clone"></i>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="content">
                                                                    <h3>
                                                                        <a href="<?php echo e($link); ?>">
                                                                           <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <?php if($product->price && $product->old_price): ?>
                                                                        <span class="new-price"><?php echo e('Giá từ: '.number_format($product->old_price). '/m²'. ' '. ' đến '.number_format($product->price) .'/m²'); ?></span>
                                                                        <?php else: ?>
                                                                        <span class="new-price">
                                                                            <?php echo e(__('home.lien_he')); ?>

                                                                        </span>
                                                                            
                                                                        <?php endif; ?>
                                                                    </div>
																	<div class="desc"><?php echo $tran->description; ?></div>
																	<div class="xemthem_home">
																		<a href="<?php echo e($link); ?>">Xem chi tiết</a>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo15.dkcauto.net/httpdocs/resources/views/frontend/pages/product-by-category.blade.php ENDPATH**/ ?>