<?php $__env->startSection('title',"Danh sách $title"); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<style>
    .format-text{
        width: 450px;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 20px;
        -webkit-line-clamp: 10;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
</style>
<div class="content-wrapper">

    <?php echo $__env->make('admin.partials.content-header',['name'=>"$title","key"=>"Danh sách $title"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="text-right">
                    <a href="<?php echo e(route('admin.comment.create',['parent_id'=>request()->parent_id??0])); ?>" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                </div>
                <div class="card card-outline card-info">
                    <div class="card-header pt-2 pb-2">
                        <div class="cart-title">
                            <i class="fas fa-list"></i> <?php if($type_comment ==1): ?> Danh sách bình luận <?php else: ?> Danh sách đánh giá sao <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0 lb-list-category">
                    <table class="table table-head-fixed" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Danh xưng</th>
                                <th>Họ và tên</th>
                                <th>Điện thoại</th>
                                <th class="white-space-nowrap">Nội dung</th>
                                <?php if($type_comment ==2): ?>
                                    <th class="white-space-nowrap">Số sao đánh giá</th>
                                <?php endif; ?>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index); ?></td>
                                <td><?php echo e($item->danh_xung == 1 ? 'Anh' : 'Chị'); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->phone); ?></td>
                                <td class="format-text"><?php echo e($item->content); ?></td>
                                <?php if($type_comment ==2): ?>
                                    <td><?php echo e($item->stars); ?></td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-sm btn-info open-modal-reply-comment" data-toggle="modal" data-target="#modalReplyComment" data-name="<?php echo e($item->name); ?>" data-id="<?php echo e($item->id); ?>" data-type_comment=<?php echo e($type_comment); ?> data-product_id="<?php echo e($item->products[0]->id); ?>">Trả lời</a>
                                    
                                    <a data-url="<?php echo e(route('admin.comment.destroy',['id'=>$item->id])); ?>" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-12">
                <?php echo e($data->links()); ?>

            </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal send commnet-->
<div class="modal fade in" id="modalReplyComment">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <div class="modal-title single-start-title">Trả Lời “<span id="replyNameComment" class="f-w-500"></span>”</div>
            <input type="hidden" id="replyIdComment">
            <input type="hidden" id="replyTypeComment">
            <input type="hidden" id="productId">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form class="content" id="form_reply_comment">
                <div class="col-12">
                    <div class="form-group m-t-12">
                        <textarea id="contentComment" name="content" class="form-control" rows="5" placeholder="Nhập nội dung (Vui lòng gõ tiếng Việt có dấu)…"></textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button id="sendComment" data-url="<?php echo e(route('admin.comment.create')); ?>" class="btn btn-sm btn-info" class="button_plus txt-red">
                Gửi câu lời
            </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    var removeChar = function (strInput) {
        return strInput.replace(/(<([^>]+)>)/gi, "").replace(/!|@|\$|%|\^|\*|\(|\#|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'||\"|\&|\#|\[|\]|~/g, "");
    };
    function openModalReplyComment() {
        $(document).on("click", ".open-modal-reply-comment", function () {
            var id = $(this).data("id");
            var name = $(this).data("name");
            var type_comment = $(this).data("type_comment");
            var product_id = $(this).data("product_id");
            $("#replyNameComment").text(name);
            $("#replyTypeComment").val(type_comment);
            $("#replyIdComment").val(id);
            $("#productId").val(product_id);
        });
    }


    function sendComment() {
        $(document).on("click", "#sendComment", function () {
            var url = $(this).data('url');
            var parent_id = $("#replyIdComment").val();
            var type_comment = $("#replyTypeComment").val();
            var product_id = $("#productId").val();
            var content = removeChar($("#contentComment").val());


            if (content == '') {
                alert('Vui lòng nhập đầy đủ câu trả lời!');
                return false;
            }
            $.ajax({
                url: url,
                type: "GET",
                data: { product_id: product_id, content: content, type_comment : type_comment, parent_id : parent_id},
                success: function (response) {
                    alert('Gửi câu trả lời thanhc công');
                    $('#form_reply_comment')[0].reset();
                    $('#modalReplyComment').modal('hide');
                },
                error: function (response) {
                    alert('Có lỗi, Vui lòng thử lại');
                },
            });
        });
    }

    $(document).ready(function () {

        openModalReplyComment();

        sendComment();
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/thuoctot365.vn/httpdocs/resources/views/admin/pages/comment/list.blade.php ENDPATH**/ ?>