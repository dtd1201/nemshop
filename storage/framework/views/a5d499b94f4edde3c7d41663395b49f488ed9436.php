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
                
                <div class="d-flex justify-content-end">

                    <div class="group-button-right d-flex">
                        
                        <form class="form-inline ml-3" action="<?php echo e(route('admin.pay.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <label for="">Ngày bắt đầu:</label>
                            <div class="d-inline-block">
                                <input type="date" class="form-control <?php $__errorArgs = ['start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" id="" name="start" value="<?php echo e(old('start')); ?>">
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
                            <label for="">Ngày kết thúc:</label>
                            <div class="d-inline-block">

                                <input type="date" class="form-control <?php $__errorArgs = ['end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" id="" name="end" value="<?php echo e(old('end')); ?>">
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
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div>
                </div>
                <div class="card-header">
                    <div class="card-tools w-100 mb-3">
                        <form action="<?php echo e(route('admin.pay.index')); ?>" method="GET">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="form-group col-md-3 mb-0">
                                            <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                                            <div id="keyword_feedback" class="invalid-feedback">

                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                            <select id="order" name="order_with" class="form-control">
                                                <option value="">-- Sắp xếp theo --</option>
                                                <option value="dateASC" <?php echo e($order_with=='dateASC'? 'selected':''); ?>>Ngày tạo tăng dần</option>
                                                <option value="dateDESC" <?php echo e($order_with=='dateDESC'? 'selected':''); ?>>Ngày tạo giảm dần</option>
                                                <option value="statusASC" <?php echo e($order_with=='statusASC'? 'selected':''); ?>>Trạng thái</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                            <select id="" name="fill_action" class="form-control">
                                                <option value="">-- Lọc --</option>
                                                <option value="cancel" <?php echo e($fill_action=='cancel'? 'selected':''); ?>>Đã hủy</option>
                                                <option value="complate" <?php echo e($fill_action=='complate'? 'selected':''); ?>>Đã hoàn thành</option>
                                                <option value="handle" <?php echo e($fill_action=='handle'? 'selected':''); ?>>Chờ xử lý</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-1 mb-0">
                                    <button type="submit" class="btn btn-success w-100">Search</button>
                                </div>
                                <div class="col-md-1 mb-0">
                                    <a  class="btn btn-danger w-100" href="<?php echo e(route('admin.pay.index')); ?>">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                    <div class="count">
                        Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> / <?php echo e($totalPay); ?>

                     </div>
                  </div>



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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/pages/pay/list.blade.php ENDPATH**/ ?>