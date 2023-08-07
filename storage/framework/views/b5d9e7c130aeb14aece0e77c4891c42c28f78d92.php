<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
                

                <div class="text-left wrap-breadcrumbs">
                    <div class="breadcrumbs">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <ul>
                                        <li class="breadcrumbs-item">
                                            <a href="<?php echo e(makeLink('home')); ?>"><?php echo e(__('home.home')); ?></a>
                                        </li>
                                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->last): ?>
                                        <li class="breadcrumbs-item active"><a href="<?php echo e($item['slug']); ?>" class="currentcat"><?php echo e($item['name']); ?></a></li>
                                        <?php else: ?>
                                        <li class="breadcrumbs-item"><a href="<?php echo e($item['slug']); ?>" class="currentcat"><?php echo e($item['name']); ?></a></li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="blog-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title title-red">
                                   <?php echo e(__('contact.he_thong_vistion')); ?>

                                </div>
                            </div>
                            <div class="image-contact">
                                <div class="wrap-system">
                                    <div class="box-system">
                                        <div class="image-sytem">
                                            <img src="<?php echo e(asset('frontend/images/map-contact.png')); ?>" alt="map">
                                        </div>
                                        <div class="list-icon">
                                            <?php if(isset($systemChilds)): ?>
                                            <?php $__currentLoopData = $systemChilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span style="<?php echo e($system_item->value); ?>" data-icon="map" data-image="<?php echo e(asset($system_item->image_path)); ?>"></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                        <div class="bg-image-load">
                                            <div class="image-load">
                                                <div class="box-image-load">
                                                    <img src="" alt="map">
                                                    <span class="close-map" data-icon="close"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="wrap-list-contact-address">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="group-title">
                                    <div class="title text-left title-red d-flex align-items-center">
                                        <span><?php echo e(__('contact.lien_he')); ?></span>
                                        <form action="<?php echo e(makeLinkToLanguage('search-dai-ly',null,null,App::getLocale())); ?>" id="form1" name="form1" method="GET" role="form" class="form-search-icon">
                                            <div class="form-group">
                                                <label for="" class="search-label">
                                                <input type="text" name="keyword" class="form-control" id="gone22" placeholder="<?php echo e(__('contact.tim_kiem')); ?>">
                                                <button class="submit2" type="submit" name="submit" class="form-control" id="gone22"><i class="fa fa-search" aria-hidden="true"></i></button>
                                             </label>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <?php if(isset($listAddress)): ?>
                                <div class="list-contact-address">
                                    <div class="row p-75 d-flex before-after-unset">
                                        <?php $__currentLoopData = $listAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 col-sm-6 col-xs-12 p-75">
                                            <div class="item-colsap">
                                                <button class="btn-colsap">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <?php echo e($item->name); ?>

                                                    <i class="icon-right fa fa-angle-down"></i>
                                                </button>
                                                <div class="content-colsap">
                                                    <?php echo $item->description; ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $(document).on("click", "[data-icon='map']", function() {
                    let src = $(this).attr('data-image');
                    $(this).addClass("active");
                    $(".bg-image-load").addClass("active");
                    $(".bg-image-load img").attr("src", src);
                });
                $(document).on("click", "[data-icon='close']", function() {
                    $(".bg-image-load").removeClass("active");
                    $("[data-icon='map']").removeClass("active");
                });


                $(document).on("click", ".btn-colsap", function() {

                    $(this).parent(".item-colsap").find(".content-colsap").slideToggle();
                    $(this).parent(".item-colsap").toggleClass("active");
                });
            });
        </script>




        </div>
    </div>

    <div class="modal fade in" id="modalAjax">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết đơn hàng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             <div class="content" id="content">

             </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>

        /*$(document).on('click',".submit2",function(){
            var key = $('input[name="keyword"]').val();


            if(key != ''){
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"<?php echo e(url('/tim-kiem-dai-ly')); ?>",
                    method:'GET',
                    data:{key:key, _token:_token},
                    success:function(data){
                        return $result;
                    }
                });
            }


        });*/

        // ajax load form
        $(document).on('submit',"[data-ajax='submit']",function(){
            let formValues = $(this).serialize();
            let dataInput=$(this).data();
            // dataInput= {content: "#content", href: "#modalAjax", target: "modal", ajax: "submit", url: "http://127.0.0.1:8000/contact/store-ajax"}

            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function (response) {
                    if(response.code==200){
                        if(dataInput.content){
                            $(dataInput.content).html(response.html);
                        }
                        if(dataInput.target){
                            switch (dataInput.target) {
                                case 'modal':
                                    $(dataInput.href).modal();
                                    break;
                                case 'alert':
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response.html,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                default:
                                    break;
                            }
                        }
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.html,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                   // console.log( response.html);
                },
                error:function(response){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
            return false;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\vision-2\backuptan\resources\views/frontend/pages/contact.blade.php ENDPATH**/ ?>