<?php $__env->startSection('title',"Danh sách thành viên"); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lib/sweetalert2/css/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>" Admin User","key"=>"Danh sách thành viên"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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


                <a href="<?php echo e(route('admin.user_frontend.create')); ?>" class="btn btn-info btn-md mb-2 float-left">+ Thêm mới</a>
                
                <form class="d-inline-block mb-2" action="<?php echo e(route('admin.user_frontend.export.excel.database')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <input type="submit" value="Export Execel" class="ml-2 btn btn-danger">
                </form>
                
                <div class="card card-outline card-primary">
                    
                    <div class="card-header">
                        <div class="card-tools w-100 mb-3">
                            <form action="<?php echo e(route('admin.user_frontend.index')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="form-group col-md-3 mb-0">
                                                <input id="keyword" value="<?php echo e($keyword); ?>" name="keyword" type="text" class="form-control" placeholder="Tên user/username">
                                                <div id="keyword_feedback" class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" <?php echo e($order_with=='dateASC'? 'selected':''); ?>>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" <?php echo e($order_with=='dateDESC'? 'selected':''); ?>>Ngày tạo giảm dần</option>
                                                    <option value="usernameASC" <?php echo e($order_with=='usernameASC'? 'selected':''); ?>>Username A-> Z</option>
                                                    <option value="usernameDESC" <?php echo e($order_with=='usernameDESC'? 'selected':''); ?>>Username Z -> A</option>
                                                    <option value="activeDESC" <?php echo e($order_with=='activeDESC'? 'selected':''); ?>>Trạng thái</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="userNoActive" <?php echo e($fill_action=='userNoActive'? 'selected':''); ?>>Thành viên chưa kích hoạt</option>
                                                    <option value="userActive" <?php echo e($fill_action=='userActive'? 'selected':''); ?>>Thành viên đã kích hoạt</option>
                                                    <option value="userActiveKey" <?php echo e($fill_action=='userActiveKey'? 'selected':''); ?>>Thành viên bị khóa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0">
                                        <button type="submit" class="btn btn-success w-40">Tìm kiếm</button>
                                        <a  class="btn btn-danger w-40" href="<?php echo e(route('admin.user_frontend.index')); ?>">Làm mới</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                        <div class="count">
                            Tổng số bản ghi <strong><?php echo e($data->count()); ?></strong> / <?php echo e($totalUser); ?>

                         </div>
                      </div>

                    <div class="card-body table-responsive p-0 lb-list-category">
                        <?php
                            $modelPoint = new App\Models\Point;
                        ?>
                        <table class="table table-head-fixed" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài khoản</th>
                                    <th>Họ và tên</th>
                                    
                                    <th>Admin xử lý</th>
                                    <th>Cấp độ</th>
                                    <th>GĐ mới</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng số điểm</th>
                                    <th>Điểm mua hàng</th>
                                    <th>Điểm còn lại</th>
                                    <th>KIC</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($item->username); ?></td>
                                    <td><a href="<?php echo e(route('admin.user_frontend.detail',['id'=>$item->id])); ?>"><?php echo e($item->name); ?></a></td>
                                    
                                    <td>
                                        <?php if($item->admin_id): ?>
                                        <ul>
                                            <li>
                                                <strong>Tên</strong> <?php echo e(optional($item->admin)->name); ?> <br>
                                                <strong>Email</strong> <?php echo e(optional($item->admin)->email); ?>

                                            </li>
                                        </ul>

                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <span>
                                            <?php if($item->chuc_danh == 1): ?>
                                                Tổng giám đốc
                                            <?php elseif($item->chuc_danh == 2): ?>
                                                Giám đốc
                                            <?php else: ?>
                                                Đại lý
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if($item->giamdoc_id2): ?>
                                        <span><?php echo e($item->username); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="wrap-load-active" data-url="<?php echo e(route('admin.user_frontend.load.active',['id'=>$item->id])); ?>">
                                        <?php echo $__env->make('admin.components.load-change-active-user',['data'=>$item,'type'=>'user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                    <td><?php echo e(number_format($modelPoint->sumPointCurrent2($item->id) ?? 0)); ?></td>
                                    <td><?php echo e(number_format($modelPoint->sumPointCurrent3($item->id) ?? 0)); ?></td>
                                    <td><?php echo e(number_format($modelPoint->sumPointCurrent($item->id) ?? 0)); ?></td>
                                    <td class="wrap-load-active" data-url="<?php echo e(route('admin.user_frontend.kicUser',['id'=>$item->id])); ?>">
                                        <?php echo $__env->make('admin.components.load-change-kic-user',['data'=>$item,'type'=>'user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="<?php echo e(route('admin.user_frontend.loadUserDetail',['id'=>$item->id])); ?>" ><i class="fas fa-eye"></i></a>
                                        

                                        <?php if($item->active): ?>
                                            <a  class="btn btn-sm btn-danger <?php echo e($item->active==2?"key":""); ?>" id="btnKeyUser" data-url="<?php echo e(route('admin.user_frontend.load.active-key',['id'=>$item->id])); ?>" > <?php echo e($item->active==1?"Khóa user":"Mở khóa"); ?></a>

                                            <a data-url="<?php echo e(route('admin.user_frontend.plusPoint')); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-sm btn-danger lb_plus_point mr-1" style="background-color: #138496; border-color:#138496 ;">Thưởng điểm</a>

                                            <a data-url="<?php echo e(route('admin.user_frontend.minusPoint')); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-sm btn-danger lb_minus_point mr-1" style="background-color: #138496; border-color:#138496 ;">Trừ điểm</a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('admin.user_frontend.edit',['id'=>$item->id])); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo e($data->appends(request()->all())->links()); ?>

            </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade in" id="transactionDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thông tin chi tiết thành viên</h4>
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


<div id="plus-point" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Thưởng điểm thành viên</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change-plus-point">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="minus-point" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Trừ điểm thành viên</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change-minus-point">
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
        $(document).on('click','#btnTranferPoint',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let title = '';
            title ='Bạn có chắc chắn muốn bắn điểm';
            $this=$(this);
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
                                $this.text('Đã bắn');
                                $this.removeClass('btn-danger').addClass('btn-info');
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Bắn điểm không thành công',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click','#btnKeyUser',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let title = '';

            let   $this=$(this);
            if($this.hasClass('key')){
                title ='Bạn có chắc chắn muốn mở khóa thành viên';
            }else{
                title ='Bạn có chắc chắn muốn khóa thành viên';

            }

            let loadActive=$(this).parents('tr').find('.wrap-load-active');
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
                                loadActive.html(data.html);

                                if($this.hasClass('key')){
                                    $this.removeClass('key');
                                    $this.text('Khóa user');
                                }else{
                                    $this.addClass('key');
                                    $this.text('Mở khóa');
                                }
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: data.title,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error:function(data){

                            Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: "Khóa không thành công",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                        }
                    });
                }
            });
        });



        $(document).on('click','.lb_plus_point', function(){
            let user_id = $(this).data('id');
            if(user_id != ''){
                let urlRequest = $(this).data('url')+'?'+'user_id'+'='+user_id;
                $.ajax({
                    url: urlRequest,
                    method:"GET",
                    dataType:"JSON",
                    success:function(response){
                        if (response.code == 200) {
                            $("#change-plus-point").html(response.html);
                            $('#plus-point').modal('show');
                        }
                    }
                })   
            }
        });

        $(document).on('click','.lb_minus_point', function(){
            let user_id = $(this).data('id');
            if(user_id != ''){
                let urlRequest = $(this).data('url')+'?'+'user_id'+'='+user_id;
                $.ajax({
                    url: urlRequest,
                    method:"GET",
                    dataType:"JSON",
                    success:function(response){
                        if (response.code == 200) {
                            $("#change-minus-point").html(response.html);
                            $('#minus-point').modal('show');
                        }
                    }
                })   
            }
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/user_frontend/list.blade.php ENDPATH**/ ?>