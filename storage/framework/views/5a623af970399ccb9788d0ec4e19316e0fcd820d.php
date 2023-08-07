<?php $__env->startSection('title', $seo['title'] ?? '' ); ?>
<?php $__env->startSection('keywords', $seo['keywords']??''); ?>
<?php $__env->startSection('description', $seo['description']??''); ?>
<?php $__env->startSection('abstract', $seo['abstract']??''); ?>
<?php $__env->startSection('image', $seo['image']??''); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="main">
        <?php if(isset($breadcrumbs,$typeBreadcrumb)): ?>
            <?php echo $__env->make('frontend.components.breadcrumbs',[
            'breadcrumbs'=>$breadcrumbs,
            'type'=>$typeBreadcrumb,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <style>
            .tab-drug-store{
                display: none;
            }
            .tab-drug-store.current{
                display: block !important;
            }

            .info-contact::before {
                content: "\f35a";
                font-family: "Font Awesome 5 Free";
                position: absolute;
                left: 0;
                font-weight: 900;
                top: 3px;
                color: #FA0000;
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                line-height: 1;
            }

            .info-contact .address a {
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 19px;
                color: #000000;
            }

            .info-contact {
                margin-bottom: 20px;
                padding-bottom: 20px;
                border-bottom: 1px dashed #CACACA;
                padding-left: 20px;
                position: relative;
            }

            h2.contact-title {
                font-style: normal;
                font-weight: 700;
                font-size: 30px;
                line-height: 35px;
                text-align: center;
                text-transform: uppercase;
                color: #000000;
                margin: 85px 0px 66px;
            }
        </style>

        <?php if( isset($listSystem) && $listSystem->count()>0 ): ?>
        <div class="wrap-contact-front">
            <div class="container">
                
                Đang cập nhật nội dung !
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade in" id="modalAjax">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết đơn hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="content" id="content">

                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('click', '.select_address', function() {
        let id_address = $(this).data('id_address');

        let urlRequest = window.location;

        urlRequest = urlRequest + '?' + 'id_address' + '=' + id_address;

        if (id_address != '') {
            $.ajax({
                url: urlRequest,
                method: "GET",

                success: function(data) {

                    $('#maps').html(data);
                }
            })
        }
    });

    $(document).on('change', '.option_address', function() {
        //tab
        var tab_id = $('option:selected', this).attr('data-tab');
        var el = $("#" + tab_id);
        $('.tab-drug-store').removeClass('current');
        $("." + tab_id).addClass('current');

        let id_address_city = $(this).val();
        let urlRequest = window.location;

        urlRequest = urlRequest + '?' + 'id_address_city' + '=' + id_address_city;

        if (id_address_city != '') {
            $.ajax({
                url: urlRequest,
                method: "GET",

                success: function(data) {

                    $('#maps').html(data);
                }
            })
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/cus05.largevendor.com/httpdocs/resources/views/frontend/pages/he-thong-nha-thuoc.blade.php ENDPATH**/ ?>