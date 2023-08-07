<?php $__env->startSection('title',"Báo cáo thống kê"); ?>
<?php $__env->startSection('css'); ?>
<style>
ul{
    padding-left: 20px;
}
.info-box .info-box-number {
    display: block;
    margin-top: .25rem;
    color: #f00;
    font-weight: 700;
}

.cursor-pointer {
    cursor: pointer;
}

.modal-dialog {
    max-width: 1200px;
    margin: 1.75rem auto;
}

input::placeholder{
    font-size: 12px;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header',['name'=>"Thống kê","key"=>"Báo cáo thống kê"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form action="<?php echo e(route('admin.report.index')); ?>" method="GET">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-tools w-100 mb-3">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
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
                                            <div class="form-group col-md-3 mb-0">
                                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="list-count">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="doanhthu" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Doanh thu</span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($doanhThu)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="doanhthu" class="btn btn-success">Export</button>
                                            <input type="hidden" name="doanhThu" value="<?php echo e($doanhThu); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="sanphamxuat" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Giá vốn hàng bán </span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($tongBanForUser)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="sanphamxuat" class="btn btn-success">Export</button>
                                            <input type="hidden" name="tongBanForUser" value="<?php echo e($tongBanForUser ?? '0'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="tongthu" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng thu </span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($tongThu)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="tongthu" class="btn btn-success">Export</button>
                                            <input type="hidden" name="tongThu" value="<?php echo e($tongThu); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="hoahong" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng chi hoa hồng</span>
                                                    <span class="info-box-number"><strong><?php echo e($totalPoint ? number_format(abs($totalPoint * 1000)) : 0); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="hoahong" class="btn btn-success">Export</button>
                                            <input type="hidden" name="totalPoint" value="<?php echo e($totalPoint ? ($totalPoint * 1000) : 0); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="khoanchi" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng các khoản chi khác</span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($khoanchi)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="khoanchi" class="btn btn-success">Export</button>
                                            <input type="hidden" name="khoanchi" value="<?php echo e($khoanchi); ?>">
                                            <input type="hidden" name="sanPhamLoi" value="<?php echo e($sanPhamLoi ?? '0'); ?>">
                                        </div>
                                    </div>                                

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="loinhuan" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Báo cáo kết quả hoạt động kinh doanh</span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($totalLoiNhuanThuan)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="loinhuan" class="btn btn-success">Export</button>
                                            <input type="hidden" name="tongLoiNhuan" value="<?php echo e($tongLoiNhuan); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="congno" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Công nợ</span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($no)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="congno" class="btn btn-success">Export</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="thuchi" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Báo cáo thu chi</span>
                                                    <span class="info-box-number"><strong><?php echo e(number_format($thuChi)); ?>đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="thuchi" class="btn btn-success">Export</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="best_sale" data-url="<?php echo e(route('admin.report.detail')); ?>">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tài khoản mua nhiều nhất</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
<div id="report-detail" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block">
                <h3 id="title">Báo cáo chi tiết</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>
                <?php if($start&&$end): ?>
                <div>Từ ngày <?php echo e($start); ?> đến ngày <?php echo e($end); ?></div>
                <?php endif; ?>
                
            </div>
            <div class="modal-body">
                <div id="data">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('click','.lb_report', function(){
        let type = $(this).data('type');
        let start = $(".form-control[name='start']").val();
        let end = $(".form-control[name='end']").val();
        let tongThu = <?php echo e($tongThu); ?>;
        let totalPoint = <?php echo e($totalPoint ? ($totalPoint * 1000) : 0); ?>;
        let khoanchi = <?php echo e($khoanchi); ?>;
        let tongBanForUser = <?php echo e($tongBanForUser ?? 0); ?>;
        let tongLoiNhuan = <?php echo e($tongLoiNhuan); ?>;
        let sanPhamLoi = <?php echo e($sanPhamLoi ?? 0); ?>;
        let no = <?php echo e($no); ?>;
        let doanhThu = <?php echo e($doanhThu); ?>;
        if(type != ''){
            let urlRequest = $(this).data('url')+'?'+'type'+'='+type;
            $.ajax({
                url: urlRequest,
                method:"GET",
                data:{start:start, end:end, tongThu:tongThu, totalPoint:totalPoint, khoanchi:khoanchi, tongBanForUser:tongBanForUser, tongLoiNhuan:tongLoiNhuan, no:no, doanhThu:doanhThu, sanPhamLoi:sanPhamLoi},
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#data").html(response.html);
                        $("#title").html(response.title);
                        $('#report-detail').modal('show');
                    }
                }
            })   
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/pages/report/index.blade.php ENDPATH**/ ?>