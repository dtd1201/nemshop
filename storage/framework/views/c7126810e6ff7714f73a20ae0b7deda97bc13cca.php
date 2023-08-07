<?php $__env->startSection('title',"Danh sách thông tin liên hệ"); ?>
<?php $__env->startSection('css'); ?>
<style>
ul{
    padding-left: 0px;
}
table{
    font-size: 13px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header',['name'=>"Liên hệ","key"=>"Danh sách"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-sm-12">
                        <div class="list-count">
                            <div class="row">
                                <?php $__currentLoopData = $dataContactGroupByStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($item['status']!=-1): ?>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Số liên hệ <?php echo e($item['name']); ?> </span>
                                            <span class="info-box-number"><strong><?php echo e(number_format($item['total']??0)); ?></strong> / tổng số <?php echo e($totalContact); ?></span>
                                        </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                   </div>
                    <div class="col-sm-12">
                        <div class="card card-outline card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Danh sách liên hệ</h3>
                              <div class="card-tools w-60">
                                  <form action="<?php echo e(route('admin.contact.index')); ?>" method="GET">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-0">
                                                    <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                                                    <div id="keyword_feedback" class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-4 mb-0" style="min-width:100px;">
                                                    <select id="order" name="order_with" class="form-control">
                                                        <option value="">Sắp xếp theo</option>
                                                        <option value="dateASC" <?php echo e($order_with=='dateASC'? 'selected':''); ?>>Ngày gửi tăng dần</option>
                                                        <option value="dateDESC" <?php echo e($order_with=='dateDESC'? 'selected':''); ?>>Ngày gửi giảm dần</option>
                                                        <option value="statusASC" <?php echo e($order_with=='statusASC'? 'selected':''); ?>>Trạng thái 1-n</option>
                                                        <option value="statusDESC" <?php echo e($order_with=='statusDESC'? 'selected':''); ?>>Trạng thái n-1</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4 mb-0" style="min-width:100px;">
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">Tình trang </option>
                                                        <?php $__currentLoopData = $listStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($status['status']); ?>" <?php echo e($status['status']==$statusCurrent? 'selected':''); ?>> <?php echo e($status['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                            <a href="<?php echo e(route('admin.contact.index')); ?>" class="btn btn-danger">Làm lại</a>
                                        </div>

                                    </div>
                                </form>

                              </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body table-responsive p-0">
                              <table class="table table-head-fixed">
                                 <thead>
                                    <tr>
                                       <th style="background: #eee;">ID</th>
                                       <th class="text-nowrap" style="background: #eee;">Thông tin</th>
                                       <th class="text-nowrap" style="background: #eee;">Tài khoản</th>
                                       <th class="text-nowrap" style="background: #eee;">Trạng thái</th>
                                       <th class="text-nowrap" style="background: #eee;">Nội dung</th>
                                       <th class="text-nowrap" style="background: #eee;">Thời gian</th>
                                       <th class="text-nowrap" style="background: #eee;">Tình trạng</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                         <td><?php echo e($contact->id); ?></td>
                                         <td>
                                             <ul>
                                                 <li>
                                                   <strong>Tên:</strong>  <?php echo e($contact->name); ?>

                                                 </li>
                                                 <li>
                                                    <strong>Email:</strong>   <?php echo e($contact->email); ?>

                                                 </li>
                                                 <li>
                                                  <strong>Điện thoại:</strong>   <?php echo e($contact->phone); ?>

                                                 </li>
                                                 <?php if($contact->address_detail): ?>
                                                 <li>
                                                  <strong>Địa chỉ:</strong>   <?php echo e($contact->address_detail); ?>

                                                 </li>
                                                 <?php endif; ?>
                                             </ul>
                                         </td>
                                         <td class="text-nowrap"><?php echo e($contact->user_id?'Thành viên':'Khách vãng lai'); ?></td>
                                         <td class="text-nowrap status-2" data-url="<?php echo e(route('admin.contact.loadNextStepStatus',['id'=>$contact->id])); ?>">
                                            <?php echo $__env->make('admin.components.status-2',[
                                                'dataStatus' => $contact,
                                                'listStatus'=>$listStatus,
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         </td>

                                         <td class="text-nowrap"> <?php echo $contact->content; ?> </td>
                                         <td class="text-nowrap"> <?php echo e(date_format($contact->created_at,"d/m/Y")); ?> </td>
                                         <td>
                                             <a  class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="<?php echo e(route('admin.contact.detail',['id'=>$contact->id])); ?>" ><i class="fas fa-eye"></i></a>
                                             <a href="" data-url="<?php echo e(route('admin.contact.destroy',['id'=>$contact->id])); ?>"  class="btn btn-sm btn-info btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                         </td>
                                      </tr>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </tbody>
                              </table>
                           </div>
                           <!-- /.card-body -->

                           <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                            <div class="count">
                                Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> / <?php echo e($totalContact); ?>

                             </div>
                          </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/kimvietplywood.com/httpdocs/resources/views/admin/pages/contact/index.blade.php ENDPATH**/ ?>