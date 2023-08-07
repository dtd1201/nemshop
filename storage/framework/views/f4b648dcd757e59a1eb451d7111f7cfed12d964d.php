<?php $__env->startSection('title',"Edit product"); ?>
<?php $__env->startSection('control'); ?>
<a href="<?php echo e(route('admin.product.getAdd')); ?>" class="btn btn-danger">add</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('lib/select2/css/select2.min.css')); ?>" rel="stylesheet" />
<style>
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: #000 !important;
  }
  .select2-container .select2-selection--single{
    height: auto;
  }
  .lb_template_product_edit img{
     width: 200px;
     height: auto;
     object-fit: cover;
 }
 .lb_list_thumb_image{
     display: flex;
    flex-wrap: wrap;
    margin: 30px 0;
    list-style: none;
 }
 .lb_list_thumb_image li{
     max-width: 150px;
     list-style:none;
     padding:5px;
     border:1px solid #f2f2f2;
 }
 .lb_list_thumb_image .image_detail{
     width: 100%;
     height: auto;
     object-fit: cover;
 }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper lb_template_product_edit">
    <?php echo $__env->make('admin.partials.content-header',['name'=>"Product","key"=>"Edit product"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <?php if(session("alert")): ?>
              <?php echo "<script>alert('".session("alert")."')</script>"; ?>

              <div class="alert alert-success">
                  <?php echo e(session("alert")); ?>

              </div>
              <?php endif; ?>
              <form action="<?php echo e(route('admin.product.postEdit',['id'=>$data->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                  <div class="form-group">
                  <label for="">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="" value="<?php echo e($data->name); ?>"  name="name" placeholder="Nhập tên sản phẩm">
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <label for="">slug</label>
                    <input type="text" class="form-control" id="" value="<?php echo e($data->slug); ?>" name="slug" placeholder="Nhập slug">
                  </div>
                  <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-group">
                    <label for="">price</label>
                    <input type="text" class="form-control" id="" value="<?php echo e($data->price); ?>" name="price" placeholder="Nhập slug">
                  </div>
                  <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">sale</label>
                    <input type="number" class="form-control" id="" value="<?php echo e($data->sale); ?>" name="sale" placeholder="Nhập sale">
                  </div>
                  <?php $__errorArgs = ['sale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                  <div class="form-group">
                    <div class="form-check-inline">
                      <label class="form-check-label">Hot
                      <input type="checkbox" class="form-check-input" value="1" name="hot" <?php if( $data->hot ===1): ?> <?php echo e('checked'); ?>  <?php endif; ?>>
                      </label>
                    </div>
                  </div>
                  <?php $__errorArgs = ['hot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Thời gian bảo hành (tháng)</label>
                    <input type="text" class="form-control" id="" value="<?php echo e($data->warranty); ?>" name="warranty" placeholder="Nhập warranty">
                  </div>
                  <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Số lượt xem</label>
                    <input type="mumber" class="form-control" id="" value="<?php echo e($data->view); ?>" name="view" placeholder="Nhập view">
                  </div>
                  <?php $__errorArgs = ['view'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Nhập description</label>
                    <textarea class="form-control tinymce_editor_init" name="description" id="" rows="4"  placeholder="Nhập description"><?php echo e($data->description); ?></textarea>
                  </div>
                  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Nhập description_seo</label>
                    <input type="text" class="form-control" id="" value="<?php echo e($data->description_seo); ?>" name="description_seo" placeholder="Nhập description_seo">
                  </div>
                  <?php $__errorArgs = ['description_seo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Nhập title_seo</label>
                    <input type="text" class="form-control" id="" value="<?php echo e($data->title_seo); ?>" name="title_seo" placeholder="Nhập title_seo">
                  </div>
                  <?php $__errorArgs = ['title_seo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Nhập content</label>
                    <textarea class="form-control tinymce_editor_init" name="content" id="" rows="7"  placeholder="Nhập content"><?php echo e($data->content); ?></textarea>
                  </div>
                  <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" class="form-control"  id=""  name="avatar_path" >
                  <img src="<?php echo e($data->avatar_path); ?>" alt="<?php echo e($data->name); ?>">
                  </div>
                  <?php $__errorArgs = ['avatar_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                  <div class="form-group">
                    <label for="">Images</label>
                    <input type="file" class="form-control"  id=""  name="image[]" multiple>
                    <ul class="lb_list_thumb_image">
                        <?php $__currentLoopData = $data->getImages()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImageItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img class="image_detail" src="<?php echo e($productImageItem->image_path); ?>" alt="<?php echo e($productImageItem->name); ?>"></li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <div class="form-group">
                    <label for="">Nhập tags</label>
                  <select class="form-control tag-select-choose" multiple="multiple" name="tags[]">
                     <?php $__currentLoopData = $data->getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tagItem->name); ?>" selected><?php echo e($tagItem->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </div>

                  <div class="form-group">
                    <label for="">Chọn danh muc sản phẩm</label>
                    <select class="form-control custom-select select-2-init" id=""  name="category_id">
                      
                      <option value="">Chọn danh mục</option>
                      <?php echo $option; ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                      <input type="radio" class="form-check-input" value="1" name="active" <?php if( $data->active=="1"||old('active')=="1"): ?> <?php echo e('checked'); ?>  <?php endif; ?>>Active
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="0" <?php if( $data->active=="0"||old('active')=="0"): ?><?php echo e('checked'); ?>  <?php endif; ?> name="active">Disable
                      </label>
                    </div>
                  </div>
                  <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="checkrobot" id="">
                  <label class="form-check-label" for="" required>Check me out</label>
                  </div>
                  <?php $__errorArgs = ['checkrobot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
            </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('lib/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/tinymce5/js/tinymce.min.js')); ?>"></script>
<script>
  $(function(){
    $(".tag-select-choose").select2({
    tags: true,
    tokenSeparators: [','],

    })
    $(".select-2-init").select2({
      placeholder: "Chọn danh mục",
      allowClear: true
    })
  })
</script>

<script>
 let editor_config = {
    path_absolute : "/",
    selector: 'textarea.tinymce_editor_init',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      let cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/page/product/edit.blade.php ENDPATH**/ ?>