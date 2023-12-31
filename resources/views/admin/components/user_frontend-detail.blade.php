<div class="wrap-load-user">
    <div class="row">
        <div class="col-sm-12">
            <div class="list-info-user mb-5">
                <ul class="row">

                    <li class="col-sm-12">
                        <div class="avatar text-center p-3">
                            <img src="{{ $user->avatar_path?$user->avatar_path: $shareFrontend['userNoImage'] }}" alt="{{ $user->name }}" class="mb-3 rounded-circle" style="width:60px; height: 60px; object-fit: cover;">
                            <h4> <strong>Trạng thái thông tin</strong>   {{ $user->status==1?"Chưa đầy đủ":"Hoàn thành" }}</h4>
                        </div>
                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Họ tên</strong>   {{ $user->name?$user->name:"Chưa cập nhập" }}
                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Email</strong>   {{ $user->email?$user->email:"Chưa cập nhập" }}
                    </li>
                    <li class="col-sm-12 col-md-6">
                        <strong>Tài khoản</strong>    {{ $user->username?$user->username:"Chưa cập nhập" }}
                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Phone</strong>   {{ $user->phone?$user->phone:"Chưa cập nhập" }}
                    </li>
                    <li  class="col-sm-12 col-md-6">
                        <strong>Địa chỉ</strong>   {{ $user->address?$user->address:"Chưa cập nhập" }}
                    </li>

                    <li class="col-sm-12 col-md-6"> <strong>Tình trạng </strong>    {{ $user->active==1?'Hiện':'Ẩn' }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>Người giới thiệu </strong>     {{ $user->parent_id?$user->parent->name:"Không có" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>Ngày sinh </strong>    {{$user->date_birth? $user->date_birth:"Chưa cập nhập" }}   </li>
                    <li class="col-sm-12 col-md-6"> <strong>HKTT </strong>     {{ $user->hktt?$user->hktt:"Chưa cập nhập" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>CMT </strong>     {{ $user->cmt?$user->cmt:"Chưa cập nhập" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>STK </strong>     {{ $user->stk?$user->stk:"Chưa cập nhập" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>CTK </strong>     {{ $user->ctk?$user->ctk:"Chưa cập nhập" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>Ngân hàng </strong>     {{ $user->bank?$user->bank->name:"Chưa cập nhập" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>Chi nhánh ngân hàng </strong>     {{ $user->bank_branch?$user->bank_branch:"Chưa cập nhập" }} </li>
                    <li class="col-sm-12 col-md-6"> <strong>Giới tính </strong>     {{ $user->sex==1?"name":($user->sex==0?"Nữ":"Chưa  cập nhập") }} </li>
                </ul>
            </div>

        </div>
        <div class="col-sm-12 mb-3">
            <div class="row">
                <div class="col-sm-6">
                    <label class="mb-0">Ảnh chứng minh thư mặt trước</label>
                    <div>
                        @if($user->image_cmt_before)
                            <img style="width: 120px" src="{{ asset($user->image_cmt_before) }}" alt="">
                        @else
                            Chưa cập nhật
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="mb-0">Ảnh chứng minh thư mặt sau</label>
                    <div>
                        @if($user->image_cmt_after)
                            <img style="width: 120px" src="{{ asset($user->image_cmt_after) }}" alt="">
                        @else
                            Chưa cập nhật
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mb-3">
            <div class="row">
                @isset($sumEachType)
                    @foreach ($sumEachType as $item)
                        @if($item['type'] == 4 || $item['type'] == 6)

                        @else
                            <div class="col-md-6 col-sm-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> {{ $typePoint[$item->type]['name']  }}</span>
                                        <span class="info-box-number"> <strong>{{ $item->total  }}</strong> điểm</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endisset

                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-cart-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng số điểm hiện có</span>
                            <span class="info-box-number"> <strong>{{ $sumPointCurrent ?? 0 }}</strong> điểm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="wrap-load-active" data-url="{{ route('admin.user_frontend.kicUser',['id'=>$user->id]) }}">
                @include('admin.components.load-change-kic-user',['data'=>$user,'type'=>'user'])
            </div>
        </div>
    </div>

</div>
