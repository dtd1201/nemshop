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
                <a href="<?php echo e(route('admin.user_frontend.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                <div class="card card-outline card-primary">
                    <div class="card-tools w-100  p-1">
                        <form class="form-inline text-right justify-content-end  mb-2 p-0 pt-3" action="<?php echo e(route('admin.user_frontend.transferPointBetweenXY')); ?>" method="GET">
                           <label for="">STT bắt đầu:</label>
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
                           <label for="">STT kết thúc:</label>
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
                   <div class="card-tools w-100  p-1">
                        <form class="form-inline text-right justify-content-end  mb-2 p-0" action="<?php echo e(route('admin.user_frontend.transferPointRandom')); ?>" method="GET">
                            <label for="">STT </label>
                                <div class="d-inline-block">
                                    <input type="number" class="form-control ml-1 mr-1" name="order" placeholder="Nhập STT" value="<?php echo e(old('order')); ?>">
                                    <?php $__errorArgs = ['order'];
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
                            <label for="">Số điểm:</label>
                            <div class="d-inline-block">
                                    <input type="number" class="form-control ml-1 mr-1" name="point" placeholder="Nhập số điểm" value="<?php echo e(old('point')); ?>">
                                    <?php $__errorArgs = ['point'];
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
                            <button type="submit" class="btn btn-primary">Bắn điểm</button>
                        </form>
                        <?php if(session('transferPointRandom')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session("transferPointRandom")); ?>

                            </div>
                        <?php elseif(session('transferPointRandomError')): ?>
                            <div class="alert alert-warning">
                                <?php echo e(session("transferPointRandomError")); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-header">
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.user_frontend.index')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="form-group col-md-3 mb-0">
                                                <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                                                <div id="keyword_feedback" class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" <?php echo e($order_with=='dateASC'? 'selected':''); ?>>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" <?php echo e($order_with=='dateDESC'? 'selected':''); ?>>Ngày tạo giảm dần</option>
                                                    <option value="usernameASC" <?php echo e($order_with=='usernameASC'? 'selected':''); ?>>Username A-> Z</option>
                                                    <option value="usernameDESC" <?php echo e($order_with=='usernameDESC'? 'selected':''); ?>>Username Z -> A</option>
                                                    <option value="activeDESC" <?php echo e($order_with=='activeDESC'? 'selected':''); ?>>Trạng thái</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="userNoActive" <?php echo e($fill_action=='userNoActive'? 'selected':''); ?>>Thành viên chưa kích hoạt</option>
                                                    <option value="userActive" <?php echo e($fill_action=='userActive'? 'selected':''); ?>>Thành viên đã kích hoạt</option>
                                                    <option value="userActiveKey" <?php echo e($fill_action=='userActiveKey'? 'selected':''); ?>>Thành viên bị khóa</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-1 mb-0">
                                        <button type="submit" class="btn btn-success w-100">Search</button>
                                    </div>
                                    <div class="col-md-1 mb-0">
                                        <a  class="btn btn-danger w-100" href="<?php echo e(route('admin.user_frontend.index')); ?>">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                        <div class="count">
                            Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> / <?php echo e($totalUser); ?>

                         </div>
                      </div>

                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài khoản</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điểm đã nạp</th>
                                    <th>Trạng thái</th>
                                    <th>Hoạt động</th>
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
                                        <a  class="btn btn-sm btn-success"  href="<?php echo e(route('admin.user_frontend.edit',['id'=>$item->id])); ?>" ><i class="fas fa-edit"></i></a>
                                        <?php if($item->active==1): ?>
                                        <a  class="btn btn-sm btn-success" id="btnTranferPoint" data-url="<?php echo e(route('admin.user_frontend.transferPoint',['id'=>$item->id])); ?>" >Bắn điểm</a>
                                        <?php endif; ?>

                                      <?php if($item->active): ?>
                                      <a  class="btn btn-sm btn-danger <?php echo e($item->active==2?"key":""); ?>" id="btnKeyUser" data-url="<?php echo e(route('admin.user_frontend.load.active-key',['id'=>$item->id])); ?>" > <?php echo e($item->active==1?"Khóa user":"Mở khóa"); ?></a>
                                      <?php endif; ?>
                                        
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

        $(document).on('click','#btnKeyUser',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let title = '';

            let   $this=$(this);
            if($this.hasClass('key')){
                title ='Bạn có chắc chắn muốn mở khóa thành viên';
            }else{
                title ='Bạn có chắc chắn muốn khóa thành viên';

            }

            let loadActive=$(this).parents('tr').find('.wrap-load-active');
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
                                loadActive.html(data.html);

                                if($this.hasClass('key')){
                                    $this.removeClass('key');
                                    $this.text('Khóa user');
                                }else{
                                    $this.addClass('key');
                                    $this.text('Mở khóa');
                                }
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: data.title,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error:function(data){

                            Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: "Khóa không thành công",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                        }
                    });
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/pages/user_frontend/list.blade.php ENDPATH**/ ?>