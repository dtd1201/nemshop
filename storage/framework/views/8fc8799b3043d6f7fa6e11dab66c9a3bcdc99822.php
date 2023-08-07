<div class="card card-outline card-primary">
    <div class="card-header">Danh sách hoa hồng</div>
    <div class="card-body table-responsive p-0 lb-list-category">
        <table class="table table-head-fixed">
            <thead>
                <tr>
                  <th>Hoa hồng</th>
                  <th>Nhận từ</th>
                  <th>Thời gian</th>
                  <th>Ghi chú</th>
                </tr>
              </thead>
              <tbody>

                  <?php if(isset($rose)): ?>
                      <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <td><?php echo e($item->point); ?></td>
                            <td>
                                <?php if($item->userorigin_id): ?>


                                    <a href="<?php echo e(route('admin.user_frontend.detail',['id'=>$item->userOriginPoint->id])); ?>"> <?php echo e($item->userOriginPoint->name); ?></a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(date_format($item->created_at,'d/m/Y H:i:s')); ?></td>
                            <td><?php echo e($typePoint[$item->type]['name']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

              </tbody>
        </table>
    </div>
</div>

<?php echo e($rose->appends('type','rose-user_frontend')->links()); ?>

<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/components/load-rose-user-front-end.blade.php ENDPATH**/ ?>