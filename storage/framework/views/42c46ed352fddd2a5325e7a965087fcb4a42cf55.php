<?php $__env->startSection('title',"danh sach nhân viên"); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lib/sweetalert2/css/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>" Admin User","key"=>"Danh sách thành viên"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if(session("alert")): ?>
                <div class="alert alert-success">
                    <?php echo e(session("alert")); ?>

                </div>
                <?php elseif(session('error')): ?>
                <div class="alert alert-warning">
                    <?php echo e(session("error")); ?>

                </div>
                <?php endif; ?>
                <a href="<?php echo e(route('admin.user.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                <div class="card card-outline card-primary">
                    <div class="card-tools w-100  p-3">
                        <form class="form-inline text-right justify-content-end  mb-2" action="<?php echo e(route('admin.user_frontend.transferPointBetweenXY')); ?>" method="GET">
                           <label for="">Điểm bắt đầu:</label>
                            <div class="d-inline-block">
                                <input type="number" class="form-control ml-1 mr-1" name="start" placeholder="Nhập STT bắt đầu" value="<?php echo e(old('start')); ?>">
                                <?php $__errorArgs = ['start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                           <label for="">Điểm kết thúc:</label>
                          <div class="d-inline-block">
                                <input type="number" class="form-control ml-1 mr-1" name="end" placeholder="Nhập STT kết thúc" value="<?php echo e(old('end')); ?>">
                                <?php $__errorArgs = ['end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                           <button type="submit" class="btn btn-primary">Bắn điểm hàng loạt</button>
                       </form>
                       <?php if(session('transferPointBetweenXY')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session("transferPointBetweenXY")); ?>

                        </div>
                       <?php elseif(session('transferPointBetweenXYError')): ?>
                        <div class="alert alert-warning">
                            <?php echo e(session("transferPointBetweenXYError")); ?>

                        </div>
                       <?php endif; ?>
                   </div>
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điểm đã nạp</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->order); ?></td>
                                    <td><?php echo e($item->username); ?></td>
                                    <td><a href="<?php echo e(route('admin.user_frontend.detail',['id'=>$item->id])); ?>"><?php echo e($item->name); ?></a></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->points()->where(['type'=>4])->select(\App\Models\Point::raw('SUM(point) as total'))->first()->total); ?></td>
                                    <td class="wrap-load-active" data-url="<?php echo e(route('admin.user_frontend.load.active',['id'=>$item->id])); ?>">
                                        <?php echo $__env->make('admin.components.load-change-active-user',['data'=>$item,'type'=>'user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     </td>
                                    <td>
                                        <a  class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="<?php echo e(route('admin.user_frontend.loadUserDetail',['id'=>$item->id])); ?>" ><i class="fas fa-eye"></i></a>

                                        <a  class="btn btn-sm btn-danger" id="btnTranferPoint" data-url="<?php echo e(route('admin.user_frontend.transferPoint',['id'=>$item->id])); ?>" >Bắn điểm</a>

                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo e($data->links()); ?>

            </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade in" id="transactionDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thông tin chi tiết thành viên</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="content" id="loadTransactionDetail">

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

<script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/ajax/deleteAdminAjax.js')); ?>"></script>
<script>
    $(function(){
        $(document).on('click','#btnTranferPoint',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let title = '';
            title ='Bạn có chắc chắn muốn bắn điểm';
            $this=$(this);
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, next step!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function(data) {
                            if (data.code == 200) {
                                $this.text('Đã bắn');
                                $this.removeClass('btn-danger').addClass('btn-info');
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Bắn điểm không thành công',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/pages/user_frontend/list.blade.php ENDPATH**/ ?>