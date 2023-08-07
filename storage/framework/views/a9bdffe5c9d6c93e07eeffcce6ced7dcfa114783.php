
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
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header',['name'=>"Đơn hàng","key"=>"Danh sách đơn hàng"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
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
                                </div>
                            </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <div class="card card-outline card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Danh sách đơn hàng mới</h3>
                              <div class="card-tools w-60">
                                  <form action="<?php echo e(route('admin.productstar.index')); ?>" method="GET">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-0">
                                                    <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                                                    <div id="keyword_feedback" class="invalid-feedback">

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 mb-0" style="min-width:100px;">
                                                    <select id="order" name="order_with" class="form-control">
                                                        <option value="">Sắp xếp theo</option>
                                                        <option value="dateASC" <?php echo e($order_with=='dateASC'? 'selected':''); ?>>Ngày đặt hàng tăng dần</option>
                                                        <option value="dateDESC" <?php echo e($order_with=='dateDESC'? 'selected':''); ?>>Ngày đặt hàng giảm dần</option>
                                                        <option value="statusASC" <?php echo e($order_with=='statusASC'? 'selected':''); ?>>Trạng thái 1-n</option>
                                                        <option value="statusDESC" <?php echo e($order_with=='statusDESC'? 'selected':''); ?>>Trạng thái n-1</option>
                                                    </select>
                                                </div>

                                                

                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                            <a href="<?php echo e(route('admin.productstar.index')); ?>" class="btn btn-danger">Làm lại</a>
                                        </div>

                                    </div>
                                </form>
                              </div>
                           </div>
                           <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                            <div class="count">
                                Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> 
                             </div>
                          </div>
                           <!-- /.card-header -->
                           <div class="card-body table-responsive p-0">
                              <table class="table table-head-fixed">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th class="text-nowrap">Email</th>
                                       <th class="text-nowrap">Phone</th>
                                       <th class="text-nowrap">Nội dung</th>
                                       <th class="text-nowrap">Trạng thái</th>
                                       <th>Thời gian</th>
                                       <th>Hành động</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productstar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                         <td><?php echo e($productstar->id); ?></td>
                                         <td><?php echo e($productstar->email); ?></td>
                                         <td><?php echo e($productstar->phone); ?></td>
                                         <td><?php echo e($productstar->content); ?></td>
                                         <td class="wrap-load-hot" data-url="<?php echo e(route('admin.productstar.load.hot',['id'=>$productstar->id])); ?>">
                                            <?php echo $__env->make('admin.components.load-change-hot1',['data'=>$productstar,'type'=>'đánh giá'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         </td>
                                         <td class="text-nowrap"><?php echo e($productstar->created_at); ?></td>
                                         <td>
                                            <a href="" data-url="<?php echo e(route('admin.productstar.destroy',['id'=>$productstar->id])); ?>"  class="btn btn-sm btn-info btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
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
  <div class="modal fade in" id="productstarDetail">
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/admin/pages/productstar/index.blade.php ENDPATH**/ ?>