
<?php $__env->startSection('title',"Phiếu xuất kho"); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">
    .fa-check {
        color: #28a745;
        font-size: 30px;
    }

    .modal-dialog {
        max-width: 1000px;
        margin: 1.75rem auto;
    }

    .table td, .table th {
        padding: 5px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Phiếu xuất","key"=>"Phiếu xuất kho"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <a href="<?php echo e(route('admin.store.createXuatKho')); ?>" class="btn btn-info btn-md mb-2">Tạo phiếu xuất +</a>
                    <form class="form-inline ml-3" action="<?php echo e(route('admin.store.listXuatKho')); ?>" method="GET" enctype="multipart/form-data">
                            <label for="">Ngày bắt đầu:</label>
                            <div class="d-inline-block ml-2">
                                <input type="datetime-local" class="form-control <?php $__errorArgs = ['startDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" name="startDate" value="<?php echo e($start); ?>">
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
                            <label class="ml-2" for="">Ngày kết thúc:</label>
                            <div class="d-inline-block ml-2">
                                <input type="datetime-local" class="form-control <?php $__errorArgs = ['endDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" name="endDate" value="<?php echo e($end); ?>">
                                <?php $__errorArgs = ['endDate'];
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
                                    <option value="1" <?php echo e($statusCurrent == '1' ? 'selected':''); ?>>Đã duyệt</option>
                                    <option value="0" <?php echo e($statusCurrent == '0' ? 'selected':''); ?>>Chờ duyệt</option>
                                    <option value="-1" <?php echo e($statusCurrent == '-1' ? 'selected':''); ?>>Đã hủy</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                <button type="submit" class="ml-1 btn btn-danger" name="type" value="1">Export</button>
                                <a href="<?php echo e(route('admin.store.listXuatKho')); ?>" class="ml-1 btn btn-danger">Làm lại</a>
                            </div>
                        </form>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="200px">Tên phiếu</th>
                                        <th width="100px">Mã phiếu</th>
                                        <th width="100px">Mã đơn</th>
                                        <th width="100px">Đại lý</th>
                                        <th width="100px">Thành viên</th>
                                        <th width="100px">Người tạo</th>
                                        <th width="100px">Người duyệt</th>
                                        <th width="100px">Người nhận</th>
                                        <th width="100px">Điện thoại</th>
                                        <th width="100px">Email</th>
                                        <th width="100px">Loại phiếu</th>
                                        <th width="100px">Trạng thái</th>
                                        <th width="100px">Ngày xuất</th>
                                        <th width="100px">Ngày tạo</th>
                                        <th width="100px">Sản phẩm xuất</th>
                                        <th width="100px">Tình trạng</th>
                                        <th width="80px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $modelTransaction = new App\Models\Transaction;
                                            $transation = null;
                                            if($item->transaction_code){
                                                $transation = $modelTransaction->where('code', $item->transaction_code)->first();
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo e($data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->ma_phieu_xuat); ?></td>
                                            <td><?php echo e($item->transaction_code); ?></td>
                                            <td>
                                                <?php if($item->type == 2): ?>
                                                    <?php echo e($item->agency->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->type == 3): ?>
                                                    <?php echo e($item->user->username); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->admin->name); ?></td>
                                            <td>
                                                <?php if($item->admin_duyet): ?>
                                                <?php echo e($item->adminDuyet->name); ?>

                                                <?php else: ?>
                                                Chưa có
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($transation ? $transation->name : ''); ?></td>
                                            <td><?php echo e($transation ? $transation->phone : ''); ?></td>
                                            <td><?php echo e($transation ? $transation->email : ''); ?></td>
                                            <td><?php echo e($typePhieuXuat[$item->type]['name']); ?></td>
                                            <?php if($item->status != -1): ?>
                                            <td class="wrap-load-status-phieu-xuat" data-url="<?php echo e(route('admin.store.changeStatusPhieuXuat', ['id'=>$item->id])); ?>">
                                                <?php echo $__env->make('admin.components.load-change-status-phieu-xuat', ['data' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                            <?php else: ?>
                                            <td>
                                                <a class="btn btn-sm btn-danger" style="width:88px;">Đã hủy</a>
                                            </td>
                                            <?php endif; ?>
                                            <td>
                                                <?php if($item->ngay_xuat): ?>
                                                    <?php echo e(Carbon::parse($item->ngay_xuat)->format('d-m-Y')); ?>

                                                <?php else: ?>
                                                    <span>Chưa có</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                                            <td>
                                                <?php if(count($item->products)>0): ?>
                                                <a class="btn btn-sm btn-success js-model-phieu-xuat" data-phieuxuat="<?php echo e($item->id); ?>" style="width:100px;">Xem SP</a>
                                                <?php else: ?>
                                                <a class="btn btn-sm btn-warning" style="width:100px;">Chưa có SP</a>
                                                <?php endif; ?>
                                            </td>
                                            <!-- <td class="wrap-load-condition-phieu-xuat text-nowrap" data-url="<?php echo e(route('admin.store.changeConditionPhieuXuat', ['id'=>$item->id])); ?>">
                                                <?php if($item->type == 2): ?>
                                                    <?php echo $__env->make('admin.components.load-change-condition-phieu-xuat', ['data' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td> -->
                                            <td>
                                                <?php if($item->type == 2): ?>
                                                    <a class="btn btn-sm <?php echo e($item->condition==3 ? 'btn-success': 'btn-warning'); ?>" data-value="<?php echo e($item->condition); ?>" style="cursor: auto"><?php echo e($item->condition == 3 ? 'Đã thanh toán' : 'Chưa thanh toán'); ?></a>
                                                <?php endif; ?>
                                            </td>
                                        
                                            <td>
                                                <?php if($item->status == 0): ?>
                                                <a href="<?php echo e(route('admin.store.editXuatKho', ['id'=>$item->id])); ?>" class="btn btn-sm btn-info js-model-edit-sp-xuat"><i class="fas fa-edit"></i></a>
                                                <?php else: ?>
                                                <i class="fas fa-check"></i>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('admin.store.export.excel.one.order',['id'=>$item->id])); ?>" class="btn btn-sm btn-info btn-danger">Xuất Excel</a>
                                                <!-- <a data-url="" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a> -->
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

<div id="model-list-sp" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4>Danh sách sản phẩm xuất</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="list_product">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript">
    $(document).on('click', '.lb-import-product', function () {
        alert('Bạn chưa cập nhật sản phẩm vào phiếu xuất');
    });
    $(document).on('click', '.js-model-phieu-xuat', function () {
        event.preventDefault();
        let id_phieuxuat = $(this).data('phieuxuat');
        let urlRequest = "<?php echo e(route('admin.store.listSanPhamXuat')); ?>";
        if(id_phieuxuat != ''){

            $.ajax({
                type: "GET",
                url: urlRequest,
                data:{
                    id_phieuxuat:id_phieuxuat, 
                },
                dataType: "json",
                success: function (response) {
                    if (response.code == 200) {
                        $("#list_product").html(response.html);
                        $('#model-list-sp').modal('show');
                    }
                },
            });
        }
    });

    $(document).on('click', '.lb-change-condition-phieu-xuat', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-condition-phieu-xuat');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn chuyển phiếu xuất này sang trạng thái Đã Thanh Toán';
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function(data) {
                            if (data.code == 200) {
                                let html = data.html;
                                wrapActive.html(html);
                            }
                        }
                    });
                }
            })
        }
    });


    $(document).on('click', '.lb-change-status-phieu-xuat', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-phieu-xuat');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn duyệt phiếu xuất này';
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function(data) {
                            if (data.code == 200) {
                                let html = data.html;
                                wrapActive.html(html);
                            }
                        },
                        error: function(data){
                           alert('Số lượng sản phẩm xuất phải nhỏ hơn số lượng sản phẩm còn trong kho');
                        }
                    });
                }
            })
        }
        
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/kho/xuat-kho.blade.php ENDPATH**/ ?>