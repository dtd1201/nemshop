<?php $__env->startSection('title',"danh sach rút điểm"); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lib/sweetalert2/css/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>" Rút điểm","key"=>"Danh sách rút điểm"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                <?php if(session("numberUpdate")): ?>
                <div class="alert alert-success">
                   <?php echo e(session("numberUpdate")); ?>

                </div>
                <?php endif; ?>
                
                <div class="card card-outline card-primary">
                    <form action="<?php echo e(route('admin.pay.updateDrawPointAll')); ?>" method="GET" id="updateAll" name="updateAll">
                        <?php echo csrf_field(); ?>
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed wrap-pay" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Username</th>
                                        <th>Điểm</th>
                                        <th>Trạng thái</th>
                                        <th>action</th>
                                        <th>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input checkallPay" value="">Chọn tất cả
                                                </label>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->index); ?></td>
                                        <td><?php echo e($item->user->name); ?></td>
                                        <td><?php echo e($item->point); ?></td>
                                        <td class="content-type"><?php echo e($typePay[$item->status]['name']); ?></td>
                                        <td>
                                            <?php if($item->status==1): ?>
                                            <div class="wrap-remove">
                                                <a  data-url="<?php echo e(route('admin.pay.updateDrawPoint',['id'=>$item->id,'type'=>'complate'])); ?>" data-type="complate" class="btn btn-sm btn-success updateStatusDrawPoint">Hoàn thành</a>
                                                <a data-url="<?php echo e(route('admin.pay.updateDrawPoint',['id'=>$item->id,'type'=>'error'])); ?>" data-type="error" class="btn btn-sm btn-danger updateStatusDrawPoint">Hủy bỏ</a>
                                            </div>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if($item->status==1): ?>
                                            <div class="wrap-remove">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" name="id[]" class="form-check-input checkChildren" value="<?php echo e($item->id); ?>">Chọn
                                                    </label>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td class="content-type"></td>
                                        <td colspan="2">
                                            <div class="text-right">
                                                <input type="hidden" value="" name="type" class="hidden">
                                                <button type="submit" data-type="complate" class="btn btn-sm btn-success updateAll">Hoàn thành các mục đã chọn </button>
                                                <button type="submit" data-type="error" class="btn btn-sm btn-danger updateAll">Hủy bỏ các mục đã chọn </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
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

<script src="<?php echo e(asset('lib/sweetalert2/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/ajax/deleteAdminAjax.js')); ?>"></script>
<script>
    $(function(){
        $(document).on('click','.updateStatusDrawPoint',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let type = $(this).data("type");
            let title = '';
            let content=$(this).parents('tr').find('.content-type');
            let re=$(this).parents('tr').find('.wrap-remove');
            switch (type) {
                case 'complate':
                    title ='Bạn có chắc chắn muốn chuyển sang trạng thái rút điểm thành công'
                    break;
                case 'error':
                    title='Bạn có chắc chắn muốn chuyển sang trạng thái rút điểm thất bại và hoàn lại điểm';
                break;
                default:
                    break;
            }
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
                                let html = data.html;
                                content.text(html);
                                re.remove();
                            }
                        }
                    });
                }
            });
        });

        $('.checkallPay').on('click', function() {
            $(this).parents('.wrap-pay').find('.checkChildren').prop('checked', $(this).prop('checked'));
        });

        $(document).on('click','.updateAll',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let type = $(this).data("type");
            $("input[name='type']").val(type);
            $("#updateAll").submit();
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/pages/pay/list.blade.php ENDPATH**/ ?>