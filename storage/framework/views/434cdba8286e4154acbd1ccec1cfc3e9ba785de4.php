<?php $__env->startSection('title',"Edit user"); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('lib/select2/css/select2.min.css')); ?>" rel="stylesheet" />
<style>
   .select2-container--default .select2-selection--multiple .select2-selection__choice{
   background-color: #000 !important;
   }
   .select2-container .select2-selection--single{
   height: auto;
   }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <?php echo $__env->make('admin.partials.content-header',['name'=>"Thành viên","key"=>"Thông tin thành viên"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số điểm hiện tại</span>
                        <span class="info-box-number"><?php echo e($sumPointCurrent); ?></span>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $sumEachType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo e($typePoint[$item->type]['name']); ?></span>
                            <span class="info-box-number"><?php echo e($item->total); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12">
               <div class="row">
                   <div class="col-md-12 col-lg-6">
                        <div class="wrap-user-frontend">
                            <?php echo $htmlUserFrontend; ?>

                        </div>
                   </div>
                   <div class="col-md-12 col-lg-6">
                        <div class="wrap-rose-user-frontend">
                            <?php echo $htmlRoseUserFrontend; ?>

                        </div>
                   </div>
               </div>


            </div>

         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>
   $(function(){
    $(document).on('click','.pagination a',function(){
        event.preventDefault();
        let href=$(this).attr('href');
        //alert(href);
        $.ajax({
            type: "Get",
            url: href,
           // data: "data",
            dataType: "JSON",
            success: function (response) {
                if(response.type=='rose-user_frontend'){
                    $('.wrap-rose-user-frontend').html(response.html);
                } else if(response.type=='user_frontend'){
                    $('.wrap-user-frontend').html(response.html);
                }

            }
        });
    });
   })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/pages/user_frontend/detail.blade.php ENDPATH**/ ?>