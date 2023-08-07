@extends('admin.layouts.main')
@section('title',"Thêm khoản chi")
@section('css')
@endsection
@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>"Khoản chi","key"=>"Thêm khoản chi"])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              @if(session("alert"))
                <div class="alert alert-success">
                    {{session("alert")}}
                </div>
              @elseif(session('error'))
                <div class="alert alert-warning">
                    {{session("error")}}
                </div>
              @endif
              <form action="{{route('admin.khoanChi.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-tool mb-2 text-right">
                                <button type="submit" class="btn btn-primary">Chấp nhận</button>
                                <button type="reset" class="btn btn-danger">Làm lại</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin khoản chi</h3>
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label" for="">Loại tài khoản</label>
                                            <select name="loai_tk" class="form-control">
                                                <option value="">-- Chọn loại tài khoản --</option>
                                                <option value="1">Nhà cung cấp</option>
                                                <option value="2">Nhân viên</option>
                                                <option value="3">Thành viên</option>
                                                <option value="4">Đại lý</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="list_tk" class="row">
                                            <label class="control-label" for="">Tài khoản</label>
                                            <select name="user_id" class="form-control custom-select select-user">
                                                <option value="">-- Chọn tài khoản --</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="">Thông tin người nhận</label>
                                        <input id="name" type="text" class="form-control
                                        @error('name') is-invalid @enderror" name="name" placeholder="Nhập thông tin người nhận">
                                        @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="">Địa chỉ</label>
                                        <input id="address" type="text" class="form-control
                                        @error('address') is-invalid @enderror" name="address" placeholder="Nhập địa chỉ">
                                        @error('address')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="">Mã số thuế</label>
                                        <input type="text" class="form-control
                                        @error('mst') is-invalid @enderror" name="mst" placeholder="Nhập mã số thuế">
                                        @error('mst')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="">Số tiền chi</label>
                                        <input id="price" type="text" class="form-control
                                        @error('money') is-invalid @enderror" value="0" placeholder="Nhập số tiền">
                                        <input id="price_hide" type="hidden" class="form-control
                                        @error('money') is-invalid @enderror" value="0" name="money">
                                        @error('money')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="">Phụ chi</label>
                                        <input id="sub_price" type="text" class="form-control
                                        @error('phu_chi') is-invalid @enderror" value="0" placeholder="Nhập số tiền">
                                        <input id="sub_price_hide" type="hidden" class="form-control
                                        @error('phu_chi') is-invalid @enderror" value="0" name="phu_chi">
                                        @error('phu_chi')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="">Nội dung chi</label>
                                        <textarea class="form-control
                                        @error('content') is-invalid @enderror" value="{{ old('content') }}" name="content" placeholder="Nhập nội dung" rows="4"></textarea>
                                        @error('content')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                <h3 class="card-title">Thông tin khác</h3>
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <div class="wrap-load-image mb-3">
                                        <div class="form-group">
                                            <label for="">Ảnh kèm theo</label>
                                            <input type="file" class="form-control-file img-load-input border @error('image_path')
                                            is-invalid
                                            @enderror" name="image_path">
                                            @error('image_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">

    $("select[name = loai_tk]").on("change", function (e) {
        let loaiTk = $(this).val();
        if (loaiTk) {
            let urlRequest = "{{ route('admin.khoanChi.changeTk') }}";
            $.ajax({
                type: "GET",
                url: urlRequest,
                data: {loaiTk: loaiTk},
                dataType: "json",
                success: function (data) {
                    $('#list_tk').html(data.html);
                    $('#name').val('');
                    $('#address').val('');

                    $(".select-user").select2({
                        placeholder: "--- Chọn tài khoản ---",
                        allowClear: true,
                    }).on("change", function (e) {
                        let userId = $(this).val();
                        let loaiUser = $("select[name = loai_tk]").val();
                        if (userId && loaiUser) {
                            let urlRequest = "{{ route('admin.khoanChi.changeUser') }}";
                            $.ajax({
                                type: "GET",
                                url: urlRequest,
                                data: {userId: userId, loaiUser: loaiUser},
                                dataType: "json",
                                success: function (data) {
                                    $('#name').val(data.name);
                                    $('#address').val(data.address);
                                },
                            });
                        }

                    });
                },
            });
        }

    });

    


    $(document).ready(function(){
        $('#price').number( true, 0,'.',',' );
        let price_show = $('#price').val();
        let price_hide = $('#price_hide').val(price_show);

        $('#sub_price').number( true, 0,'.',',' );
        let sub_price_show = $('#sub_price').val();
        let sub_price_hide = $('#sub_price_hide').val(sub_price_show);
    });

    $('#price').on('change',function(){ 
        let price_show = $('#price').val();
        let price_hide = $('#price_hide').val(price_show);
    });

    $('#sub_price').on('change',function(){ 
        let sub_price_show = $('#sub_price').val();
        let sub_price_hide = $('#sub_price_hide').val(sub_price_show);
    });

</script>
@endsection
