


 <div class="card-body table-responsive p-0">
    <table class="table table-head-fixed">
       <thead>
          <tr>
             <th>ID</th>
             <th class="text-nowrap">Thông tin</th>
             <th class="text-nowrap">Acount</th>
             <th class="text-nowrap">Trạng thái</th>
             <th class="text-nowrap">Địa chỉ</th>
             <th class="text-nowrap">Nội dung</th>
             <th>Thời gian</th>

          </tr>
       </thead>
       <tbody>
           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
               <td><?php echo e($contact->id); ?></td>
               <td>
                   <ul>
                       <li>
                         <strong>Name:</strong>  <?php echo e($contact->name); ?>

                       </li>
                       <li>
                          <strong>Email:</strong>   <?php echo e($contact->email); ?>

                       </li>
                       <li>
                        <strong>Phone:</strong>   <?php echo e($contact->phone); ?>

                       </li>

                   </ul>
               </td>
               <td class="text-nowrap"><?php echo e($contact->user_id?'Thành viên':'Khách vãng lai'); ?></td>
               <td class="text-nowrap status-2" data-url="<?php echo e(route('admin.contact.loadNextStepStatus',['id'=>$contact->id])); ?>">
                  <?php echo $__env->make('admin.components.status-2',[
                      'dataStatus' => $contact,
                      'listStatus'=>$listStatus,
                  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </td>
               <td class="text-nowrap">
                  <ul>
                      <?php if($contact->city_id&&$contact->district_id&&$contact->commune_id): ?>
                          <li> <strong>Tỉnh:</strong> <?php echo e($contact->city->name); ?></li>
                          <li><strong>Quận:</strong>  <?php echo e($contact->district->name); ?></li>
                          <li><strong>Phường/xã:</strong>    <?php echo e($contact->commune->name); ?> </li>
                      <?php endif; ?>
                      <?php if($contact->address_detail ): ?>
                          <li> <strong>Địa chỉ</strong> <?php echo e($contact->address_detail); ?></li>
                      <?php endif; ?>
                  </ul>
              </td>

               <td class="text-nowrap"> <?php echo e($contact->content); ?> </td>
               <td class="text-nowrap"> <?php echo e(date_format($contact->created_at,"d/m/Y")); ?> </td>

            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </tbody>
    </table>
 </div>
<?php /**PATH /var/www/vhosts/magnus-pro.com.vn/httpdocs/resources/views/admin/components/contact-detail.blade.php ENDPATH**/ ?>