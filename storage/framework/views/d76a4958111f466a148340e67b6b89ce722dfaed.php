<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>
<?php $__env->startSection('css'); ?>
    <style>

        .badge-1 {
            background: #dc3545;
        }

        .badge-1 {
            background: #c3e6cb;
        }

        .badge-2 {
            background: #ffc107;
        }

        .badge-3 {
            background: #17a2b8;
        }

        .badge-4 {
            background: #28a745;
        }
        .info-box {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            border-radius: .25rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }
        .info-box .info-box-icon {
            border-radius: .25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }
        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
        }
        .info-box .info-box-text, .info-box .progress-description {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .info-box .info-box-number {
            display: block;
            margin-top: .25rem;
            font-weight: 700;
        }
        .modal-header{
            background-color: #000;
            color: #fff;
        }
        .modal-header .close{
            opacity: 1;
            color: #fff;
        }
        .modal-title{
            margin: 0;

        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="main">
            

             <div class="row">
                 <div class="col-md-12">
                    <div class="list-count">
                        <div class="row">
                            <?php if(isset($dataTransactionGroupByStatus)): ?>
                                <div class="col-sm-12">
                                    <div class="list-count">
                                        <div class="row">
                                            <?php $__currentLoopData = $dataTransactionGroupByStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="col-md-6 col-sm-12 ">
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
                        </div>
                    </div>
                 </div>
                 <div class="col-sm-12">
                    <div class="wrap-history" style="font-size:13px;">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                               <thead>
                                  <tr>
                                     <th>ID</th>
                                     <th class="text-nowrap">Thông tin</th>
                                     <th class="text-nowrap">Tổng tiền</th>
                                     <th class="text-nowrap">Acount</th>
                                     <th class="text-nowrap">Trạng thái</th>
                                     <th>Thời gian</th>
                                     <th>Action</th>
                                  </tr>
                               </thead>
                               <tbody>
                                   <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr>
                                       <td><?php echo e($transaction->id); ?></td>
                                       <td>
                                           <ul>
                                               <li>
                                                 <strong>Name:</strong>  <?php echo e($transaction->name); ?>

                                               </li>
                                               <li>
                                                <strong>Phone:</strong>   <?php echo e($transaction->phone); ?>

                                               </li>
                                               <li>
                                                <strong>Email:</strong>   <?php echo e($transaction->email); ?>

                                               </li>
                                           </ul>
                                       </td>
                                       <td class="text-nowrap">
                                           
                                           <ul>
                                              <li>
                                                <strong>Tổng giá trị đơn hàng:</strong>  <?php echo e(number_format($transaction->total)); ?>

                                              </li>
                                              <li>
                                               <strong>Tri trả bằng tiền:</strong>   <?php echo e(number_format($transaction->money)); ?> đ
                                              </li>
                                              <li>
                                                  <strong>Tri trả bằng điểm:</strong>   <?php echo e(number_format($transaction->point)); ?> điểm
                                              </li>
                                          </ul>
                                          </td>
                                       <td class="text-nowrap"><?php echo e($transaction->user_id?'Thành viên':'Khách vãng lai'); ?></td>
                                       <td class="text-nowrap ">
                                        <?php $__currentLoopData = $listStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($status['status']==$transaction->status): ?>
                                                <span  class="badge badge-<?php if($transaction->status<=0): ?>danger <?php else: ?><?php echo e($transaction->status); ?><?php endif; ?>">
                                                    <?php echo e($status['name']); ?>

                                                </span>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </td>
                                       <td class="text-nowrap"><?php echo e($transaction->created_at); ?></td>
                                       <td>
                                        <a  class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="<?php echo e(route('profile.transaction.detail',['id'=>$transaction->id])); ?>" ><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               </tbody>
                            </table>
                         </div>
                       </div>
                 </div>
                 <div class="col-md-12">
                    <?php echo e($data->appends(request()->input())->links()); ?>

                </div>
             </div>



        </div>
    </div>

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
      <script>
          $(function(){
            // js load ajax chi tiet don hang
            $(document).on("click", "#btn-load-transaction-detail", function() {
                let contentWrap = $('#loadTransactionDetail');

                let urlRequest = $(this).data("url");
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            contentWrap.html(html);
                            $('#transactionDetail').modal('show');
                        }
                    }
                });
            });
          })
      </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/frontend/pages/profile-history.blade.php ENDPATH**/ ?>