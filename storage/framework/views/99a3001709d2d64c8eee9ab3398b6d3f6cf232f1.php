<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lib/char\js\Chart.min.css')); ?>">
<style>
    /* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
ul{
    padding-left: 20px;
}
.badge-1{
background: #dc3545;
}
.badge-1{
background: #c3e6cb;
}
.badge-2{
    background: #ffc107;
}
.badge-3{
    background: #17a2b8;
}
.badge-4{
    background: #28a745;
}
.status>span{
    cursor: pointer;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',"Trang chủ admin"); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   
   <!-- /.content-header -->
   <!-- Main content -->
   <div class="content mt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Tổng số đơn hàng</span>
                     <span class="info-box-number"><?php echo e(number_format($totalTransaction)); ?></span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Thành viên</span>
                     <span class="info-box-number"><?php echo e(number_format($totalMember)); ?></span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fas fa-newspaper"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Sản phẩm</span>
                     <span class="info-box-number"><?php echo e(number_format($totalProduct)); ?></span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-newspaper"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Bài viết</span>
                     <span class="info-box-number"><?php echo e(number_format($totalPost)); ?></span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
         </div>
         <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-8">
               <!-- LINE CHART -->
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title">Biểu đồ doanh thu các ngày trong tháng</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                     </div>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col (RIGHT) -->
            <div class="col-md-4">
               <!-- PIE CHART -->
               <div class="card card-danger">
                  <div class="card-header">
                     <h3 class="card-title">Thống kê trạng thái đơn hàng</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
         <div class="row">
            <div class="col-md-9">
               <div class="card card-outline card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Danh sách đơn hàng mới</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 345px;">
                     <table class="table table-head-fixed">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th class="text-nowrap">Thông tin</th>
                              <th class="text-nowrap">Tổng tiền</th>
                              <th class="text-nowrap">Acount</th>
                              <th class="text-nowrap">Trạng thái</th>
                              <th>Thời gian</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $newTransaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <td class="text-nowrap"><span class="tag tag-success"><?php echo e(number_format($transaction->total)); ?></span></td>
                                <td class="text-nowrap"><?php echo e($transaction->user_id?'Thành viên':'Khách vãng lai'); ?></td>
                                <td class="text-nowrap status" data-url="<?php echo e(route('admin.transaction.loadNextStepStatus',['id'=>$transaction->id])); ?>">
                                   <?php echo $__env->make('admin.components.status',[
                                        'dataStatus'=>$transaction,
                                        'listStatus'=>$listStatus,
                                   ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                                <td class="text-nowrap"><?php echo e($transaction->created_at); ?></td>
                             </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
            <div class="col-md-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                       <h3 class="card-title">Tốp sản phẩm bán chạy</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body overflow-auto" style="height: 345px; ">
                        <?php $__currentLoopData = $topPayProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="media mt-3">
                            <img src="<?php echo e($item->avatar_path); ?>" class="align-self-center mr-3" style="width:60px">
                            <div class="media-body">
                              <p class="mb-1 font-weight-bold">
                                  <?php echo e($item->pay); ?> Lượt mua
                                <span class="price float-right badge badge-danger"><?php echo e(number_format($item->price)); ?></span>
                              </p>
                              <div><?php echo e($item->name); ?> </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- /.card-body -->
                 </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                     </p>
                     <a href="#" class="card-link">Card link</a>
                     <a href="#" class="card-link">Another link</a>
                  </div>
               </div>
               <div class="card card-primary card-outline">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                     </p>
                     <a href="#" class="card-link">Card link</a>
                     <a href="#" class="card-link">Another link</a>
                  </div>
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-header">
                     <h5 class="m-0">Featured</h5>
                  </div>
                  <div class="card-body">
                     <h6 class="card-title">Special title treatment</h6>
                     <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
               </div>
               <div class="card card-primary card-outline">
                  <div class="card-header">
                     <h5 class="m-0">Featured</h5>
                  </div>
                  <div class="card-body">
                     <h6 class="card-title">Special title treatment</h6>
                     <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
               </div>
            </div>
            <!-- /.col-md-6 -->
         </div>
         <!-- /.row -->
      </div>
   </div>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('lib/char\js\Chart.min.js')); ?>"></script>
<script>



   var areaChartData = {
                   labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                   datasets: [{
                            label: 'Digital Goods',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        // {
                        //     label: 'Electronics',
                        //     backgroundColor: 'rgba(210, 214, 222, 1)',
                        //     borderColor: 'rgba(210, 214, 222, 1)',
                        //     pointRadius: false,
                        //     pointColor: 'rgba(210, 214, 222, 1)',
                        //     pointStrokeColor: '#c1c7d1',
                        //     pointHighlightFill: '#fff',
                        //     pointHighlightStroke: 'rgba(220,220,220,1)',
                        //     data: [65, 59, 80, 81, 56, 55, 40]
                        // },
                    ]
               }
   var areaChartOptions = {
                   maintainAspectRatio: false,
                   responsive: true,
                   legend: {
                       display: false
                   },
                   scales: {
                       xAxes: [{
                           gridLines: {
                               display: false,
                           }
                       }],
                       yAxes: [{
                           gridLines: {
                               display: false,
                           }
                       }]
                   }
               }

       //-------------
       //- LINE CHART -
       //--------------
       var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
       var lineChartOptions = $.extend(true, {}, areaChartOptions);
       var lineChartData = $.extend(true, {}, areaChartData);
       lineChartData.datasets[0].fill = false;
   //    lineChartData.datasets[1].fill = false;
       lineChartOptions.datasetFill = false;

       var lineChart = new Chart(lineChartCanvas, {
         type: 'line',
         data: lineChartData,
         options: lineChartOptions
       });



       //-------------
       //- PIE CHART -
       //-------------
       // Get context with jQuery - using jQuery's .get() method.
       var donutData = {
                labels: [
                    'Đặt hàng thành công',
                    'Tiếp nhận đơn hàng',
                    'Đang vận chuyển',
                    'Hoàn thành',
                    'Hủy bỏ',
                ],
                datasets: [{
                    data: [
                        <?php echo e($countTransaction[1]); ?>,
                        <?php echo e($countTransaction[2]); ?>,
                        <?php echo e($countTransaction[3]); ?>,
                        <?php echo e($countTransaction[4]); ?>,
                        <?php echo e($countTransaction[-1]); ?>

                    ],
                    backgroundColor: ['#c3e6cb', '#ffc107', '#17a2b8', '#28a745', '#dc3545'],
                }]
            }
       var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
       var pieData        = donutData;
       var pieOptions     = {
         maintainAspectRatio : false,
         responsive : true,
       }
       //Create pie or douhnut chart
       // You can switch between pie and douhnut using the method below.
       var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
       })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>