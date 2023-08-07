@extends('frontend.layouts.main-full')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('css')
    <style>

body{
    background-color: #f5f5f5 !important;
    padding-top: 40px !important;
}
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset --}}
            <div class="d-flex align-items-center" style="padding: 30px;">
            <div class="wrap-content-main w-100">
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

                        <form action="{{route('profile.register-referral.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input  type="hidden" class="form-control" name="code" value="{{ $code }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header mb-3">
                                            <h3 class="card-title">Thông tin thành viên</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh đại diện</label>
                                                            <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                        </div>
                                                        @error('avatar_path')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="img-load border p-1 w-100" src="{{ $shareFrontend['userNoImage'] }}" alt="" style="height: auto;width:auto;max-width:150px;object-fit:cover;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Họ và tên</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('name') }}"  name="name" required
                                                            placeholder="Nhập Họ và tên">
                                                        @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">Tài khoản</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('username') }}"  name="username" required
                                                            placeholder="Nhập tài khoản">
                                                        @error('username')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    {{--
                                                    <div class="form-group">
                                                        <label for="">Mã combo</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('masp') }}"  name="masp"
                                                            placeholder="Nhập mã sản phẩm"
                                                            required>
                                                        @error('masp')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    --}}

                                                    {{-- <div class="form-group">
                                                        <label for="">Số điểm đã nap</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('startpoint') }}"  name="startpoint"
                                                            placeholder="Nhập số điểm đã nạp"
                                                            required
                                                        >
                                                        @error('startpoint')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <label for="">Email liên hệ</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('email') }}" name="email" required
                                                            placeholder="Email">
                                                        @error('email')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Số điện thoại</label>
                                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                         name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại" required>
                                                        @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Ngày sinh</label>
                                                        <input type="date" class="form-control  @error('date_birth') is-invalid @enderror" name="date_birth" value="{{ old('date_birth') }}" placeholder="Ngày sinh" required>
                                                        @error('date_birth')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tỉnh/Thành phố</label>
                                                        <select name="city_id" id="city" class="form-control @error('city_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.districts') }}" required="required">
                                                            <option value="">Chọn tỉnh/thành phố</option>
                                                            {!! $cities !!}
                                                        </select>
                                                        @error('city_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quận/huyện</label>
                                                        <select name="district_id" id="district" class="form-control @error('district_id') is-invalid   @enderror" data-url="{{ route('ajax.address.communes') }}"  required="required">
                                                            <option value="">Chọn quận/huyện</option>
                                                        </select>
                                                        @error('district_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Xã/phường/thị trấn </label>
                                                        <select name="commune_id" id="commune" class="form-control @error('commune_id')is-invalid   @enderror"  required="required">
                                                            <option value="">Chọn xã/phường/thị trấn</option>
                                                        </select>
                                                        @error('commune_id')
                                                             <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Địa chỉ</label>
                                                        <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" placeholder="Địa chỉ" required>
                                                        @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Hộ khẩu thường trú</label>
                                                        <input type="text" class="form-control  @error('hktt') is-invalid @enderror"
                                                        value="{{ old('hktt') }}" name="hktt" placeholder="Hộ khẩu thường trú" required>
                                                        @error('hktt')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    {{-- <div class="form-group">
                                                    <label for="">Chọn vai trò</label>
                                                    <select name="role_id[]" class="form-control select-2-init" id="" multiple>
                                                        <option value=""></option>
                                                        @foreach ($dataRoles as $roleItem)
                                                        <option value="{{ $roleItem->id }}">{{ $roleItem->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('role_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    </div> --}}


                                                    @if($user->type == 2)
                                                        @if($user->chuc_danh == 1)
                                                        <div class="form-group">
                                                            <label for="">Chọn cấp độ</label>
                                                            <select name="chuc_danh" class="form-control">
                                                                <option value="2">Giám đốc</option>
                                                            </select>
                                                        </div>
                                                        @elseif($user->chuc_danh == 2)
                                                        <div class="form-group">
                                                            <label for="">Chọn cấp độ</label>
                                                            <select name="chuc_danh" class="form-control">
                                                                <option value="3">Trình dược viên</option>
                                                                <option value="4">Nhà thuốc</option>
                                                            </select>
                                                        </div>
                                                        @elseif($user->chuc_danh == 3)
                                                        <div class="form-group">
                                                            <label for="">Chọn cấp độ</label>
                                                            <select name="chuc_danh" class="form-control">
                                                                <option value="4">Nhà thuốc</option>
                                                            </select>
                                                        </div>
                                                        @else
                                                        @endif
                                                    @endif

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Mật khẩu</label>
                                                        <input
                                                            type="password"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('password') }}"  name="password"
                                                            placeholder="Mật khẩu"
                                                        >
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nhập lại mật khẩu</label>
                                                        <input
                                                            type="password"
                                                            class="form-control"
                                                            id=""
                                                            value="{{ old('password_confirmation') }}"  name="password_confirmation"
                                                            placeholder="Nhập lại mật khẩu"
                                                        >
                                                        @error('password_confirmation')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Số tài khoản</label>
                                                        <input type="text" class="form-control @error('stk') is-invalid @enderror"
                                                       
                                                        value="{{  old('stk')}}" name="stk" placeholder="Số tài khoản" required>
                                                        @error('stk')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Họ tên chủ tài khoản</label>
                                                        <input type="text" class="form-control @error('ctk') is-invalid @enderror"
                                                        value="{{  old('ctk') }}" name="ctk" placeholder="Chủ tài khoản" required>
                                                        @error('ctk')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Ngân hàng</label>
                                                        <select name="bank_id" class="form-control" required>
                                                            <option value="0">Chọn ngân hàng</option>
                                                            @foreach ($banks as $bank)
                                                            <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ?'selected':''}}>{{ $bank->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('bank_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Chi nhánh ngân hàng</label>
                                                        <input type="text" class="form-control @error('bank_branch') is-invalid @enderror"
                                                        
                                                        value="{{old('bank_branch') }}" name="bank_branch" placeholder="Tên chi nhánh ngân hàng" required>
                                                        @error('bank_branch')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Giới tính</label><br>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="1" name="sex"
                                                                 @if(old('sex')=="1") {{'checked'}} @endif >Nam
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="0" @if( old('sex')=="0"){{'checked'}} @endif name="sex" >Nữ
                                                            </label>
                                                        </div>
                                                        @error('sex')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Số chứng minh thư</label>
                                                        <input type="text" class="form-control @error('cmt') is-invalid @enderror"
                                                        value="{{  old('cmt') }}" name="cmt" required placeholder="Chứng minh thư">
                                                        @error('cmt')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh chứng minh mặt trước</label>
                                                            <input type="file" class="form-control-file img-load-input border" id="" name="image_cmt_before">
                                                        </div>
                                                        @error('image_cmt_before')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="img-load border p-1 w-100" src="{{ $shareFrontend['userNoImage'] }}" alt="" style="height: auto;width:auto;max-width:150px;object-fit:cover;">
                                                    </div>
                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh chứng minh mặt sau</label>
                                                            <input type="file" class="form-control-file img-load-input border" id="" name="image_cmt_after">
                                                        </div>
                                                        @error('image_cmt_after')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="img-load border p-1 w-100" src="{{ $shareFrontend['userNoImage'] }}" alt="" style="height: auto;width:auto;max-width:150px;object-fit:cover;">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    {{--
                                                    <div class="form-group">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input
                                                                type="radio"
                                                                class="form-check-input"
                                                                value="1"
                                                                name="active"
                                                                @if(old('active')==="1"||old('active')===null) {{'checked'}}  @endif
                                                            >
                                                            Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input
                                                                    type="radio"
                                                                    class="form-check-input"
                                                                    value="0"
                                                                    @if(old('active')==="0"){{'checked'}}  @endif
                                                                    name="active"
                                                                >
                                                                Disable
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @error('active')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror --}}
                                                    <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" name="checkrobot" id="checkrobot" required>
                                                    <label class="form-check-label" for="checkrobot">Tôi đồng ý</label>
                                                    </div>
                                                    @error('checkrobot')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Chấp nhận</button>
                                                    <button type="reset" class="btn btn-danger">Làm lại</button>
                                                    <a href="{{ route('home.index') }}" class="btn btn-info">Trang chủ</a>
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
            </div>
         </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('frontend/js/load-address.js') }}"></script>
<script>

   $(function(){
        // js load image khi upload
    $(document).on('change', '.img-load-input', function() {
        let input = $(this);
        displayImage(input, '.wrap-load-image', '.img-load');
    });

    function displayImage(input, selectorWrap, selectorImg) {
        let img = input.parents(selectorWrap).find(selectorImg);
        let file = input.prop('files')[0];
        let reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            img.attr('src', reader.result);
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
   });

</script>
@endsection
