<?php $__env->startSection('title',"Danh sách đơn hàng"); ?>
<?php $__env->startSection('css'); ?>
<style>
ul{
    padding-left: 20px;
}
.info-box .info-box-number {
    display: block;
    margin-top: .25rem;
    color: #f00;
    font-weight: 700;
}
input::placeholder{
    font-size: 12px;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header',['name'=>"Đơn hàng","key"=>"Danh sách đơn hàng"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <?php if(session("alert")): ?>
                      <div class="alert alert-success">
                          <?php echo e(session("alert")); ?>

                      </div>
                      <?php elseif(session('error')): ?>
                      <div class="alert alert-warning">
                          <?php echo e(session("error")); ?>

                      </div>
                    <?php endif; ?>
                  </div>
                    <?php if(isset($dataTransactionGroupByStatus)): ?>
                        <div class="col-sm-12">
                            <div class="list-count">
                                <div class="row">
                                    <?php $__currentLoopData = $dataTransactionGroupByStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Số giao dịch <?php echo e($item['name']); ?> </span>
                                            <span class="info-box-number"><strong><?php echo e(number_format($item['total']??0)); ?></strong> / tổng số <?php echo e($totalTransaction); ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction-total-price')): ?>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Doanh số / Chi phí (%)</span>
                                                <span class="info-box-number"><strong><?php echo e(number_format($totalPrice??0)); ?></strong>/ 
        											<?php if($totalPoint): ?>
        												<?php echo e(number_format($totalPoint * 1000)); ?>

        											<?php else: ?>
        												0
        											<?php endif; ?>
                                                    <?php if($totalPoint && $totalPrice): ?>
                                                      (<?php echo e(round((($totalPoint * 1000)/$totalPrice * 100),2)); ?>%)
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="col-sm-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <h3 class="card-title">Danh sách</h3>
                                    </div>
                                    <div class="col-md-10 col-12">
                                        <div class="card-tools">
                                            <form action="<?php echo e(route('admin.transaction.index')); ?>" method="GET">

                                                <div class="row" style="font-size: 13px;">
                                                    <div class="col-md-9" >
                                                        <div class="row">
                                                            <div class="form-group col-md-3 mb-0">
                                                                <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Mã GD/Username/Tên user/Tên admin/Email Admin">
                                                                <div id="keyword_feedback" class="invalid-feedback">

                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 mb-0">
                                                                <input type="datetime-local" class="form-control <?php $__errorArgs = ['start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    placeholder="Từ ngày" id="" name="start" value="<?php echo e($start); ?>">
                                                                <?php $__errorArgs = ['start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                  
                                                            <div class="form-group col-md-3 mb-0">

                                                                <input type="datetime-local" class="form-control <?php $__errorArgs = ['end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    placeholder="Đến ngày" id="" name="end" value="<?php echo e($end); ?>">
                                                                <?php $__errorArgs = ['end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-3 mb-0">
                                                                <select id="status" name="status" class="form-control">
                                                                    <option value="">Tình trạng đơn hàng</option>
                                                                    <?php $__currentLoopData = $listStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <option value="<?php echo e($status['status']); ?>" <?php echo e($status['status']==$statusCurrent? 'selected':''); ?>>Đơn hàng <?php echo e($status['name']); ?></option>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 text-right">
                                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                                        <button type="submit" class="ml-1 btn btn-danger" name="type" value="1">Export</button>
                                                        <a href="<?php echo e(route('admin.transaction.index')); ?>" class="btn btn-danger">Làm lại</a>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                                <div class="count">
                                    Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> / <?php echo e($totalTransaction); ?>

                                </div>
                            </div>
                           <!-- /.card-header -->
                           <div class="card-body table-responsive p-0" style="font-size: 13px;">
                              <table class="table table-head-fixed">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th class="text-nowrap">Thông tin</th>
                                       <th class="text-nowrap">Tổng tiền</th>
                                       <th class="text-nowrap">Tài khoản</th>
                                       <th class="">Admin xử lý</th>
                                       <th class="text-nowrap">Trạng thái</th>
                                       <th>Thời gian đặt</th>
                                       <th>Thời gian giao</th>
                                       <th>Ngày đáo hạn</th>
                                       <th>Tiền nợ</th>
                                       <th>Trang thái</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                         <td><?php echo e($transaction->id); ?></td>
                                         <td>
                                             <ul class="pl-0">
                                                <li>
                                                    <strong>MGD:</strong>  <?php echo e($transaction->code); ?>

                                                  </li>
                                                 <li>
                                                   <strong>Họ tên:</strong>  <?php echo e($transaction->name); ?>

                                                 </li>
                                                 <li>
                                                  <strong>Số điện thoại:</strong>   <?php echo e($transaction->phone); ?>

                                                 </li>
                                                 <li>
                                                  <strong>Email:</strong>   <?php echo e($transaction->email); ?>

                                                 </li>
                                                 <li>
                                                    <strong>Username:</strong>   <?php echo e(optional($transaction->user)->username); ?>

                                                </li>
                                             </ul>
                                         </td>
                                         <td class="text-nowrap">
                                             
                                             <ul class="pl-0">
                                                <?php if($transaction->sale): ?>
                                                <li>
                                                  <strong>Giá trị đơn hàng:</strong>  <?php echo e(number_format($transaction->total)); ?> đ
                                                </li>
                                                <li>
                                                  <strong>Giá gốc <span class="text-danger"><?php echo e(number_format($transaction->total_origin)); ?> đ</span></strong>
                                                </li>
                                                <li>
                                                  <strong>Đơn giá đã được chiết khấu <span class="text-danger"><?php echo e($transaction->sale); ?> %</span></strong>
                                                </li>
                                                <?php else: ?>
                                                <li>
                                                  <strong>Giá trị đơn hàng:</strong>  <?php echo e(number_format($transaction->total)); ?> đ
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </td>

                                         <td class="text-nowrap"><?php echo e($transaction->user_id?'Thành viên':'Khách vãng lai'); ?></td>
                                         <td>
                                            <ul  class="pl-0">
                                                <li>
                                                    <strong>Tên </strong> <?php echo e(optional($transaction->admin)->name); ?>

                                                </li>
                                                <li>
                                                    <strong>Email</strong>  <?php echo e(optional($transaction->admin)->email); ?>

                                                </li>
                                            </ul>
                                        </td>
                                         <td class="text-nowrap status" data-url="<?php echo e(route('admin.transaction.loadNextStepStatus',['id'=>$transaction->id])); ?>">
                                            <?php echo $__env->make('admin.components.status',[
                                                'dataStatus'=>$transaction,
                                                'listStatus'=>$listStatus,
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         </td>
                                         <td class="text-nowrap"><?php echo e(Carbon::parse($transaction->created_at)->format('d-m-Y H:i:s')); ?></td>
                                        <td class="text-nowrap">
                                            <?php if($transaction->time_ship): ?>
                                                <?php echo e(Carbon::parse($transaction->time_ship)->format('d-m-Y H:i:s')); ?>

                                            <?php else: ?>
                                                Chưa có
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-nowrap">
                                            <?php if($transaction->status == 6): ?>
                                                Hoàn thành
                                            <?php else: ?>
                                                <?php if($transaction->due_date): ?>
                                                    <?php echo e(Carbon::parse($transaction->due_date)->format('d-m-Y H:i:s')); ?>

                                                    <a data-url="<?php echo e(route('admin.transaction.changeDueDateTransaction')); ?>" data-id="<?php echo e($transaction->id); ?>" class="btn btn-xs btn-danger ml-1 lb_update_quantity" style="background-color: #138496; border-color:#138496 ;"><i class="fas fa-edit"></i></a>
                                                <?php else: ?>
                                                    Chưa có
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-nowrap">
                                          <?php if($transaction->status !== 6): ?>
                                            <?php echo e(number_format($transaction->tien_no)); ?> đ
                                            <a data-url="<?php echo e(route('admin.transaction.changeTienNo')); ?>" data-id="<?php echo e($transaction->id); ?>" class="btn btn-xs btn-danger ml-1 lb_update_money" style="background-color: #138496; border-color:#138496 ;"><i class="fas fa-edit"></i></a>
                                          <?php endif; ?>
                                          
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="<?php echo e(route('admin.transaction.detail',['id'=>$transaction->id])); ?>" ><i class="fas fa-eye"></i></a>
                                            <?php if($transaction->status == -1 || $transaction->status == 6): ?>
                                            <?php else: ?>
                                            <a href="javascript:;" data-url="<?php echo e(route('admin.transaction.cancel',['id'=>$transaction->id])); ?>"  class="btn btn-sm btn btn-danger js-huydon">Hủy đơn</a>
                                            <?php endif; ?>
                                             
                                        </td>
                                      </tr>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </tbody>
                              </table>
                           </div>
                           <!-- /.card-body -->
                        </div>
                     </div>
                     <div class="col-md-12">
                        <?php echo e($data->appends(request()->input())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
     <!-- The Modal chi tiết đơn hàng -->
  <div class="modal fade in" id="transactionDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết đơn hàng</h4>
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


  <div id="update_quantity" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cập nhật ngày đáo hạn</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_quantity">
                </div>
            </div>
        </div>
    </div>
  </div>

  <div id="update_tien_no" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cập nhật tiền nợ</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_tien_no">
                </div>
            </div>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on("click", ".js-huydon", function(){
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn hủy đơn này',
            text: "Bạn sẽ không thể khôi phục điều này",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!',
            cancelButtonText: 'Hủy bỏ!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            location.reload();
                        }
                    },
                    error: function() {

                    }
                });
            }
        })
    });

    $(document).on('click','.lb_update_quantity', function(){
        let id = $(this).data('id');
        if(id != ''){
            let urlRequest = $(this).data('url')+'?'+'id'+'='+id;
            $.ajax({
                url: urlRequest,
                method:"GET",
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#change_quantity").html(response.html);
                        $('#update_quantity').modal('show');
                    }
                }
            })   
        }
    });

    $(document).on('click','.lb_update_money', function(){
        let id = $(this).data('id');
        if(id != ''){
            let urlRequest = $(this).data('url')+'?'+'id'+'='+id;
            $.ajax({
                url: urlRequest,
                method:"GET",
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#change_tien_no").html(response.html);
                        $('#update_tien_no').modal('show');
                    }
                }
            })   
        }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/transaction/index.blade.php ENDPATH**/ ?>