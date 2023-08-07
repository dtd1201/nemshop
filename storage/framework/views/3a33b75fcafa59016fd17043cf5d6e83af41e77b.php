<?php $__env->startSection('title',"Danh sách sản phẩm nhập"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Sản phẩm nhập","key"=>"Danh sách sản phẩm nhập"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <div class="">
                        <form class="form-inline ml-3" action="<?php echo e(route('admin.nhapKho.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <label for="">Ngày bắt đầu:</label>
                            <div class="d-inline-block ml-2">
                                <input type="datetime-local" class="form-control <?php $__errorArgs = ['startDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" name="startDate" value="<?php echo e(old('startDate')); ?>">
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
unset($__errorArgs, $__bag); ?>" placeholder=""name="endDate" value="<?php echo e(old('endDate')); ?>">
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
                            <input type="submit" value="Export Execel" class="ml-2 btn btn-danger">
                        </form>
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.store.listNhapKho')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">

                                            <div class="form-group col-md-2 mb-0">
                                                <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Mã SP">
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
                                            
                                            <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                <select id="order" name="lohang" class="form-control">
                                                    <option value="">-- Chọn lô hàng --</option>
                                                    <?php if(isset($loHang) && $loHang->count()>0 ): ?>
                                                    <?php $__currentLoopData = $loHang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($lohang == $item->id ? 'selected':''); ?>><?php echo e($item->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="1" <?php echo e($fill_action== 1 ? 'selected':''); ?>>Chưa thanh toán</option>
                                                    <option value="2" <?php echo e($fill_action== 2 ? 'selected':''); ?>>Đã thanh toán</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0 text-right">
                                        <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                        <a class="btn btn-danger " href="<?php echo e(route('admin.store.listDefectiveProduct')); ?>">Làm mới</a>
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
                                        <th width="100px" class="text-right">Số lượng</th>
                                        <th width="100px">User nhập</th>
                                        <th width="100px">Hạn sử dụng</th>
                                        <th width="50px">Lô hàng</th>
                                        <th width="100px">Ngày nhập</th>
                                        <th width="100px">Trạng thái</th>
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
                                            <td><?php echo e($item->admin->name); ?></td>
                                            <td><?php echo e(Carbon::parse($item->han_su_dung)->format('d-m-Y')); ?></td>
                                            <td><?php echo e($item->lohang->name); ?></td>
                                            <td><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                                            <td class="wrap-load-status-nhap-kho text-nowrap" data-url="<?php echo e(route('admin.store.changeStatusNhapKho', ['id'=>$item->id])); ?>">
                                                <?php echo $__env->make('admin.components.load-change-status-nhap-kho', ['data' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('click', '.lb-change-status-nhap-kho', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-nhap-kho');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn chuyển sang trạng thái Đã Thanh Toán';
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/kho/list-product-import.blade.php ENDPATH**/ ?>