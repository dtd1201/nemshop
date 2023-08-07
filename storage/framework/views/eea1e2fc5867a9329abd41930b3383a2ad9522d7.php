<div class="card card-outline card-primary">
    <div class="card-header">Danh sách các thành viên</div>
    <div class="card-body table-responsive p-0 lb-list-category">
        <table class="table table-head-fixed">
            <thead>
                <tr>
                  <th>Tên </th>
                  <th>SỐ CMT</th>
                  <th>Level</th>
                  <th>R</th>
                </tr>
              </thead>
              <tbody>

                  <?php if(isset($dataUser)): ?>
                      <?php $__currentLoopData = $dataUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <td><a href="<?php echo e(route('admin.user_frontend.detail',['id'=>$item->id])); ?>"><?php echo e($item->name); ?></a></td>
                            <td>
                                <?php echo e($item['cmt']??""); ?>

                            </td>
                            <td><?php echo e($item['active']?'CVKD':'CTV'); ?></td>
                            <td>R<?php echo e($item['level']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

              </tbody>
        </table>
    </div>
</div>
<?php echo e($dataUser->appends('type','user_frontend')->links()); ?>

<?php /**PATH D:\xampp\htdocs\php-laravel\web_tinh_toan\project_1\resources\views/admin/components/load-user-front-end.blade.php ENDPATH**/ ?>