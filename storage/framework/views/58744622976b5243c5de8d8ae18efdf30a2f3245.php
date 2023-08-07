
<?php $__env->startSection('title',"Danh sách khoản chi"); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .fa-check {
        color: #28a745;
        font-size: 30px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper lb_template_list_slider">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"Khoản chi","key"=>"Danh sách khoản chi"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <a href="<?php echo e(route('admin.khoanChi.create')); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                <div class="">
                    <form class="form-inline ml-3" action="<?php echo e(route('admin.khoanChi.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
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
                        <form action="<?php echo e(route('admin.khoanChi.index')); ?>" method="GET">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">

                                        <div class="form-group col-md-2 mb-0">
                                            <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Mã phiếu">
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
                                            <select id="order" name="user_id" class="form-control">
                                                <option value="">-- Chọn tài khoản --</option>
                                                <?php if(isset($users) && $users->count()>0 ): ?>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo e($user_id == $item->id ? 'selected':''); ?>><?php echo e($item->username); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                            <select id="" name="fill_action" class="form-control">
                                                <option value="">-- Lọc --</option>
                                                <option value="1" <?php echo e($fill_action== 1 ? 'selected':''); ?>>Chưa duyệt</option>
                                                <option value="2" <?php echo e($fill_action== 2 ? 'selected':''); ?>>Đã duyệt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-0 text-right">
                                    <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                    <a class="btn btn-danger " href="<?php echo e(route('admin.khoanChi.index')); ?>">Làm mới</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phiếu</th>
                                    <th>User</th>
                                    <th>Thông tin người nhận</th>
                                    <th>Loại tài khoản</th>
                                    <th>Địa chỉ</th>
                                    <th>Mã số thuế</th>
                                    <th>Số tiền chi</th>
                                    <th>Ngày chi</th>
                                    <th>Nội dung chi</th>
                                    <th>Người tạo</th>
                                    <th>Người duyệt</th>
                                    <th>Phụ chi</th>
                                    <th class="white-space-nowrap">Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center" style="width:124px;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($item->ma_phieu); ?></td>
                                    <td>
                                        <?php if($item->user_id && $item->loai_tk == 3): ?>
                                            <?php echo e($item->user->username); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td>
                                        <?php if($item->loai_tk == 1): ?>
                                            Nhà cung cấp
                                        <?php elseif($item->loai_tk == 2): ?>
                                            Nhân viên
                                        <?php elseif($item->loai_tk == 3): ?>
                                            Thành viên
                                        <?php elseif($item->loai_tk == 4): ?>
                                            Đại lý
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->address); ?></td>
                                    <td><?php echo e($item->mst); ?></td>
                                    <td><?php echo e(number_format($item->money)); ?></td>
                                    <td>
                                        <?php if($item->ngay_chi): ?>
                                            <?php echo e(Carbon::parse($item->ngay_chi)->format('d-m-Y')); ?>

                                        <?php else: ?>
                                            <span>Chưa có</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->content); ?></td>
                                    <td><?php echo e($item->admin->name); ?></td>
                                    <td>
                                        <?php if($item->admin_duyet): ?>
                                            <?php echo e($item->adminDuyet->name); ?>

                                        <?php else: ?>
                                            Chưa có
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(number_format($item->phu_chi)); ?></td>
                                    <td>
                                        <?php if($item->image_path): ?>
                                        <a href="<?php echo e(asset($item->image_path)); ?>" target="_blank">
                                            <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->ma_phieu); ?>" style="width:40px; height: 40px; object-fit: cover;">
                                        </a>
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('admin_asset/images/upload-image.png')); ?>" alt="<?php echo e($item->ma_phieu); ?>" style="width:40px; height: 40px; object-fit: cover;">
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['khoan-chi-active'])): ?> class="wrap-load-status-khoan-chi" data-url="<?php echo e(route('admin.store.changeStatusKhoanChi', ['id'=>$item->id])); ?>" <?php endif; ?>>
                                        <?php echo $__env->make('admin.components.load-change-status-khoan-chi', ['data' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if($item->status == 0): ?>
                                        <a href="<?php echo e(route('admin.khoanChi.edit',['id'=>$item->id])); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <?php else: ?>
                                        <i class="fas fa-check"></i>
                                        <?php endif; ?>
                                        
                                        <a data-url="<?php echo e(route('admin.khoanChi.destroy',['id'=>$item->id])); ?>" class="btn btn-sm btn-danger lb_delete ml-2"><i class="far fa-trash-alt"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
    $(document).on('click', '.lb-change-status-khoan-chi', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-khoan-chi');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn duyệt khoản chi này';
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/khoan_chi/list.blade.php ENDPATH**/ ?>