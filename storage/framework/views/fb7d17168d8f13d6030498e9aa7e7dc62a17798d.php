    

    <div class="wrap-bg wow fadeInUp" style="background-image: url('<?php echo e(asset ($footer['banner_shipping']->image_path)); ?>');">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box-bg">
                        <img src="<?php echo e(asset ($footer['banner_giua']->image_path)); ?>" alt="Image">
                        <div class="d-flex box-bg-content">
                            <div class="logo-bg">
                                <img src="<?php echo e(asset ($footer['logo_banner_shipping']->image_path)); ?>" alt="Logo">
                            </div>
                            <div class="button_tuvan">
                                <a href="<?php echo e(URL::to('/bao-gia.html')); ?>" class="btn-view"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo e($footer['nhan_tu_van']->name); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-contact-footer wow fadeInUp">
        <div class="container">
            <div class="row d-flex before-after-unset align-items-center justify-center">
                
                <?php $__currentLoopData = $footer['dataAddress'] ->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-2 col-sm-4 col-xs-6 col-item-contact col-1-5">
                    <div class="box">
                        <div class="icon"><img src="<?php echo e(asset ($item->image_path)); ?>" alt="<?php echo e($item->name); ?>"></div>
                        <h3 class="name"><?php echo e($item->name); ?></h3>
                        <div class="desc">
                            <?php echo e($item->value); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-2 col-sm-4 col-xs-6 col-item-img col-1-5">
                    <div class="box">
                        <div class="image">
                            <img src="<?php echo e(asset ($footer['maqr']->image_path)); ?>" alt="<?php echo e(asset ($footer['maqr']->name)); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 col-item-img col-1-5">
                    <div class="box">
                        <div class="image">
                            <a href="<?php echo e($footer['bocongthuong']->slug); ?>"><img src="<?php echo e(asset ($footer['bocongthuong']->image_path)); ?>" alt="<?php echo e($footer['bocongthuong']->name); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="border-top">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12 col-item-footer">
                                    <div class="logo-footer">
                                        <a href="<?php echo e(URL::to('/')); ?>">
                                            <img src="<?php echo e(asset ($footer['logo']->image_path)); ?>" alt="Logo">
                                        </a>
                                    </div>

                                    <ul class="pt_social">
                                        <?php $__currentLoopData = $footer["socialParent"]->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($social->slug); ?>" target="blank"><?php echo $social->value; ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="row">
                                        <?php $__currentLoopData = $footer['linkFooter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 col-sm-4 col-xs-12 col-item-footer">
                                            <div class="footer-link">
                                                <ul>
                                                    <?php $__currentLoopData = $item->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li> <a href="<?php echo e($item2->slug); ?>"> <?php echo e($item2->name); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
   
                                        <div class="col-md-4 col-sm-4 col-xs-12 col-item-footer">
                                            <div class="footer-form">

                                                <form  action="<?php echo e(route('contact.storeAjax')); ?>"  data-url="<?php echo e(route('contact.storeAjax')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" class="row p-75">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="Họ tên">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                                    </div>

                                                    <button type="submit" class="btn-form-submit">Gửi yêu cầu tư vấn</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>

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



<?php /**PATH /var/www/vhosts/vision.vsscorp.vn/httpdocs/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>