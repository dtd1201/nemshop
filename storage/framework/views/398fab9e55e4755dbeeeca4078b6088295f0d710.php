<a  class="btn btn-sm <?php echo e($data->active==1?'btn-success':($data->active==2?'btn-danger':'btn-warning')); ?> <?php echo e($data->active==0?' lb-active-user':''); ?>" data-value="<?php echo e($data->active); ?>" data-type="<?php echo e($type?$type:''); ?>"  style="width:80px;"><?php echo e($data->active==1?'Active':($data->active==2?'Khóa':'Disable')); ?></a><?php /**PATH /var/www/vhosts/demo.largevendor.com/httpdocs/resources/views/admin/components/load-change-active-user.blade.php ENDPATH**/ ?>