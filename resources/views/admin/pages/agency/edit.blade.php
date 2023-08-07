@extends('admin.layouts.main')
@section('title',"Cập nhật thông tin đại lý")

@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>"Đại lý","key"=>"Cập nhật thông tin đại lý"])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    @if(session("alert"))
                    <div class="alert alert-success">
                        {{session("alert")}}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-warning">
                        {{session("error")}}
                    </div>
                    @endif

                    @if(isset($data) && $data->count()>0 )
                    <form action="{{route('admin.agency.update', ['id' => $data->id])}}" method="POST">
                        @csrf
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Cập nhật thông tin đại lý
                                </h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <div class="form-group">
                                    <label for="">Tên đại lý</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $data->name }}"
                                    name="name"
                                    required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $data->phone }}"
                                    name="phone"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input
                                    type="email"
                                    class="form-control"
                                    value="{{ $data->email }}"
                                    name="email"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Ngân hàng</label>
                                    <select name="bank_id" class="form-control">
                                        <option value="0">Chọn ngân hàng</option>
                                        @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}" {{ (old('bank_id')?? $data->bank_id)==$bank->id ?'selected':''}}>{{ $bank->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('bank_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Số tài khoản</label>
                                    <input
                                    type="number"
                                    class="form-control"
                                    value="{{ $data->so_tai_khoan }}"
                                    name="so_tai_khoan"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Căn cước</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $data->can_cuoc }}"
                                    name="can_cuoc"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $data->address }}"
                                    name="address"
                                    required
                                    >
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Chấp nhận</button>
                                    <button type="reset" class="btn btn-danger">Làm lại</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <div>Không tìm thấy thông tin đại lý</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
