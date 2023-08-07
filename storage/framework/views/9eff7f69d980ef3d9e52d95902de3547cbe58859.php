
<?php $__env->startSection('title', __('contact.gio_hang')); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            <div class="text-left wrap-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="<?php echo e(makeLink('home')); ?>"><?php echo e(__('home.home')); ?></a>
                                </li>
                                <li class="breadcrumbs-item active"><a href="#" class="currentcat"><?php echo e(__('contact.gio_hang')); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			<div class="box_cart">
				<div class="container container-cart">
					<div class="row">
						<div class="col-sm-12 col-12">
                            
                                <div class="row cart-wrapper">
                                        <?php echo $__env->make('frontend.components.cart-component',[
                                            'data' => $data,
                                            'cities' => $cities,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('frontend/js/load-address.js')); ?>"></script>
<script>
    $(document).on('click','.btn-colsap',function(){
        $('#list-thanhtoan').find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent('.colsap').addClass('active');
        let value= $(this).parent('.colsap.active').data('value');
        $('#hinhthuc').val(value);
        console.log(value);
        $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
            $(this).parent('.colsap.active').find('.content-colsap').slideDown();
    });
    $("#chinhanh").change(function () {
        var id = $(this).val();
        if (id != "0") {
            $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
        }
        else
            $(".list-chinhanh .item").removeClass("active");
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#buynow").submit(function() {

            var msg = "";

            if (buynow.email.value == '') {
                msg += "+ Vui lòng nhập tên của bạn \n";
            }

            if (buynow.phone.value == '') {
                msg += "+ Vui lòng nhập số điện thoại của bạn \n";
            }

            if (buynow.email.value == '') {
                msg += "+ Vui lòng nhập email của bạn \n";
            }


            if (buynow.city_id.value == '') {
                msg += "+ Vui lòng chọn tỉnh/thành phố \n";
            }

            if (buynow.district_id.value == '') {
                msg += "+ Vui lòng chọn quận huyện \n";
            }

            if (buynow.commune_id.value == '') {
                msg += "+ Vui lòng chọn phường xã \n";
            }


            if (buynow.address_detail.value == '') {
                msg += "+ Vui lòng nhập địa chỉ của bạn \n";
            }

           


            if (msg != "") {
                alert("Vui lòng nhập đầy đủ thông tin các thông tin sau:\n" + msg);
                return false;
            } else {
                return true;
            }



            return false;
        });

        // het 
        $("#tax").click(function() {
			if($(this).is(":checked")) {
				$('#bill').show();
			}else{
				$('#bill').hide();
			}
        });

    });


    


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\demola\resources\views/frontend/pages/cart.blade.php ENDPATH**/ ?>