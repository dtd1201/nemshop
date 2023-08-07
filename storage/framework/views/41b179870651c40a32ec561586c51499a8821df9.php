<?php $__env->startSection('title',"Danh sách yêu cầu đổi trả"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Yêu cầu đổi trả","key"=>"Danh sách yêu cầu đổi trả"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.store.listYeuCau')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" <?php echo e($order_with == 'dateASC' ? 'selected' : ''); ?>>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" <?php echo e($order_with == 'dateDESC' ? 'selected' : ''); ?>>Ngày tạo giảm dần</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0 text-right">
                                        <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                        <a class="btn btn-danger " href="<?php echo e(route('admin.store.listYeuCau')); ?>">Làm mới</a>
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
                                        <th width="100px">Số lượng</th>
                                        <th width="100px">Họ tên</th>
                                        <th width="100px">Tài khoản</th>
                                        <th width="300px">Lý do</th>
                                        <th width="100px">Người duyệt</th>
                                        <th width="100px">Ngày tạo</th>
                                        <th width="100px">Trạng thái</th>
                                        <th width="100px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index); ?></td>
                                            <td><?php echo e($item->product->masp); ?></td>
                                            <td><?php echo e($item->product->name); ?></td>
                                            <td><?php echo e($item->quantity); ?></td>
                                            <td><?php echo e($item->user->name); ?></td>
                                            <td><?php echo e($item->user->username); ?></td>
                                            <td><?php echo e($item->content); ?></td>
                                            <td>
                                                <?php if($item->admin_id): ?>
                                                    <?php echo e($item->admin->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                                            <?php if($item->status != -1): ?>
                                            <td class="wrap-load-status-yeu-cau" data-url="<?php echo e(route('admin.store.changeStatusYeuCau', ['id'=>$item->id])); ?>">
                                                <?php echo $__env->make('admin.components.load-change-status-yeu-cau', ['data' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                            <?php else: ?>
                                            <td>
                                                <a class="btn btn-sm btn-danger" style="width:88px;">Đã hủy</a>
                                            </td>
                                            <?php endif; ?>

                                            <td>
                                                <?php if($item->status == 0): ?>
                                                <a href="javascript:;" data-url="<?php echo e(route('admin.store.yeucau.cancel',['id'=>$item->id])); ?>"  class="btn btn-sm btn btn-danger js-huydon">Hủy yêu cầu</a>
                                                <?php endif; ?>
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
    $(document).on('click', '.lb-change-status-yeu-cau', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-yeu-cau');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn duyệt yêu cầu này';
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

    $(document).on("click", ".js-huydon", function(){
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn hủy yêu cầu này',
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/kho/yeu-cau-doi-tra.blade.php ENDPATH**/ ?>