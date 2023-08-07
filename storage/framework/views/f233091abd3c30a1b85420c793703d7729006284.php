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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 block-content-left">
                            
                            
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
                                                    <div class="col-product-item col-lg-4 col-md-6 col-sm-6 col-6">
                                                        <div class="product-item">
                                                            <div class="box">
                                                                <div class="image">
                                                                    <a href="<?php echo e($link); ?>">
                                                                        <img src="<?php echo e($product->avatar_path != null ? asset($product->avatar_path) : '../frontend/images/no-images.jpg'); ?>" alt="<?php echo e($tran->name); ?>">
                                                                        <?php if($product->old_price && $product->price): ?>
                                                                            <span class="sale">   <?php echo e(ceil(100 -($product->price)*100/($product->old_price))." %"); ?> </span>
                                                                        <?php endif; ?>

                                                                        <?php if($product->baohanh): ?>
                                                                            <div class="km">
                                                                                <?php echo e($product->baohanh); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                    
                                                                    <div class="pro-item-star">
                                                                        <span class="pro-item-start-rating">
                                                                            <?php
                                                                                $avgRating = 0;
                                                                                $sumRating = array_sum(array_column($product->productStars->toArray(), 'star'));
                                                                                $countRating = count($product->productStars);
                                                                                if ($countRating != 0) {
                                                                                    $avgRating = $sumRating / $countRating;
                                                                                }
                                                                            ?>
                                                                            <?php for($i = 1; $i <= 5; $i++): ?>

                                                                                <?php if($i <= $avgRating): ?>
                                                                                    <i class="star-bold far fa-star"></i>
                                                                                <?php else: ?>
                                                                                <?php endif; ?>
                                                                            <?php endfor; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="content">
                                                                    <h3>
                                                                        <a href="<?php echo e($link); ?>">
                                                                           <?php echo e($tran->name); ?>

                                                                        </a>
                                                                    </h3>
                                                                    <div class="box-price">
                                                                        <span class="new-price"><?php echo e($product->price?number_format($product->price)." ".$unit:"Liên hệ"); ?></span>
                                                                        <?php if($product->old_price>0): ?>
                                                                            <span class="old-price"><?php echo e(number_format($product->old_price)); ?> <?php echo e($unit); ?></span>
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
                            
                        </div>
                        <div class="col-lg-3 col-sm-12 col-xs-12 block-content-right">
                            <div class="box-list-fill">
                                <div class="title-s">
                                    Tìm kiếm <i class="fas fa-minus"></i>
                                </div>
                            </div>
                            <div class="list-fill">
                                <div class="form-group">
                                        <div class="input-group">
                                            <input form="formfill" type="text"  class="form-control keyword input-search" name="keywords" placeholder="Từ khóa" />
                                            <div class="input-group-append">
                                                <button class="input-group-text btn-search"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="box-list-fill">
                                <div class="title-s">
                                    Danh mục sản phẩm <i class="fas fa-minus"></i>
                                </div>
                            </div>
                            <div class="list-fill">
                                <div class="form-group">
                                    <div class="price_check">
                                        <div class="form-check">
                                            <ul>
                                                <?php
                                                    $products = \App\Models\CategoryProduct::find(185);
                                                ?>
                                                <?php $__currentLoopData = $products->childs()->where('active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e($value->slug_full); ?>"><?php echo e($value->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-list-fill">
                                <div class="title-s">
                                    KHOẢNG GIÁ <i class="fas fa-minus"></i>
                                </div>
                            </div>

                            <div class="list-fill">
                                <div class="form-group">
                                    <?php $__currentLoopData = $priceSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="price_check">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input field-form" name="price" form="formfill" value="<?php echo e($item['value']); ?>"
                                                <?php echo e($item['value']==($priceS??'')?'checked':''); ?>

                                                    >
                                                <?php echo e($item['name']); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <form action="#" method="get" name="formfill" id="formfill" data-ajax="submit" class="d-none">
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

        $(document).on('click','.btn-search',function(event){
          // $( "#formfill" ).submit();
          event.preventDefault();

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

        $(document).on('submit',"[data-ajax='submit']",function(event){
          // $( "#formfill" ).submit();
          event.preventDefault();

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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/sieuthithoitrangcaocap.com/httpdocs/resources/views/frontend/pages/product-by-category.blade.php ENDPATH**/ ?>