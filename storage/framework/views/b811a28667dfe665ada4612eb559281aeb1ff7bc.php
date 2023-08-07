<?php $__env->startSection('title',"Danh sách sản phẩm trong kho"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Kho","key"=>"Danh sách sản phẩm trong kho"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="col-md-12">
                    <a href="<?php echo e(route('admin.store.createNhapKhoHang')); ?>" class="btn  btn-info btn-md mb-2">Thêm sản phẩm lô mới +</a>
                    <a href="<?php echo e(route('admin.store.listLoHang')); ?>" class="btn  btn-info btn-md mb-2">Thêm sản phẩm lô có sẵn +</a>
                    <form class="mb-2 ml-3 d-inline-block" action="<?php echo e(route('admin.kho.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="submit" value="Export Execel" class="ml-2 btn btn-danger">
                    </form>
                    <div class="">
                        
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.store.listKhoHang')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-0">
                                                <input id="keyword" value="" name="keyword" type="text" class="form-control" placeholder="Mã SP/Tên SP/Mã GD/Email Admin/ Tên Admin">
                                                <div id="keyword_feedback" class="invalid-feedback">

                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC">Ngày tạo tăng dần</option>
                                                    <option value="dateDESC">Ngày tạo giảm dần</option>
                                                    <option value="typeASC">Trạng thái A-Z</option>
                                                    <option value="typeDESC">Trạng thái Z-A</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="1">Nhập kho</option>
                                                    <option value="2">Đang chờ xuất kho</option>
                                                    <option value="3">Xuất kho</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0 text-right">
                                        <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                        <a class="btn btn-danger " href="<?php echo e(route('admin.store.listKhoHang')); ?>">Làm mới</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="50px">Mã SP</th>
                                        <th width="200px">Tên sản phẩm</th>
                                        <th width="100px" class="text-right">Giá nhập</th>
                                        <th width="100px" class="text-right">Số lượng tồn</th>
                                        <th width="100px" class="text-right">Số lượng bán</th>
                                        <th width="100px" class="text-right">Số lượng lỗi</th>
                                        <th width="100px">Hạn sử dụng</th>
                                        <th width="50px">Lô hàng</th>
                                        <th width="100px">Ngày nhập</th>
                                        <th width="100px">Tình trạng</th>
                                        <th width="100px">Thêm sản phẩm lỗi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index); ?></td>
                                            <td><?php echo e($item->masp); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td class="text-right"><?php echo e($item->cost); ?></td>
                                            <td class="text-right"><?php echo e($item->quantity); ?></td>
                                            <td class="text-right"><?php echo e($item->sell_number); ?></td>
                                            <td class="text-right"><?php echo e($item->so_luong_loi); ?></td>
                                            <td><?php echo e(Carbon::parse($item->han_su_dung)->format('d-m-Y')); ?></td>
                                            <td><?php echo e($item->lohang->name); ?></td>
                                            <td><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                                            <td>
                                                <?php if($item->quantity == 0): ?>
                                                <a class="btn btn-sm btn-danger">Hết hàng</a>
                                                <?php elseif($item->quantity < 50): ?>
                                                <a class="btn btn-sm btn-warning">Sắp hết</a>
                                                <?php else: ?>
                                                <a class="btn btn-sm btn-success">Còn hàng</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex text-nowrap">
                                                    <a data-url="<?php echo e(route('admin.store.addDefectiveProduct')); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-sm btn-danger lb_update_quantity mr-1" style="background-color: #138496; border-color:#138496 ;">Thêm SP lỗi</a>
                                                    <a data-url="<?php echo e(route('admin.destroyProductKho',['id'=>$item->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
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

<div id="update_quantity" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Thêm số lượng sản phẩm lỗi</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_quantity">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('click','.lb_update_quantity', function(){
        let khohang_id = $(this).data('id');
        if(khohang_id != ''){
            let urlRequest = $(this).data('url')+'?'+'khohang_id'+'='+khohang_id;
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/kho/list.blade.php ENDPATH**/ ?>