<div class="wrap-fill">
    
    <?php
        $categoryPModel=new App\Models\CategoryProduct();
        $listCategoryProduct=$categoryPModel->where('parent_id',$category->parent_id)->orderby('order')->latest()->get();
    ?>
    <div class="form-group">
        <select name=""  class="form-control field-change-link" >
            
            <?php $__currentLoopData = $listCategoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($categoryItem->id==$category->id?'':$categoryItem->slug_full); ?>" <?php echo e($categoryItem->id==$category->id?'selected':''); ?>><?php echo e($categoryItem->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <select form="formfill" class="form-control field-form" name="price" >
            <option value="">Giá</option>
            <?php $__currentLoopData = $priceSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
           <option value="<?php echo e($item['value']); ?>" <?php echo e($item['value']==($priceS??"")?"selected":""); ?>>
              <?php echo e($item['name']); ?>

            </option>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php if(isset($sidebar['attribute'])): ?>
        <?php $__currentLoopData = $sidebar['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
            <select  name="attribute_id[<?php echo e($attributeItem->id); ?>][]" form="formfill" class="form-control field-form">
                <option value=""><?php echo e($attributeItem->name); ?></option>
                <?php $__currentLoopData = $attributeItem->childs()->orderby('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
   <div class="form-group">
    <select name="orderby" id="" class="form-control field-form" form="formfill">
        <option value="0">Sắp sếp theo</option>
        <option value="1">Giá tăng dần</option>
        <option value="2">Giá giảm dần</option>
        
    </select>
   </div>
</div>
<?php /**PATH /var/www/vhosts/largevendor.com/demo4.largevendor.com/resources/views/frontend/components/sidebar-1.blade.php ENDPATH**/ ?>