@extends('admin.layouts.main')
@section('title',"Danh sách khoản chi")
@section('css')
<style type="text/css">
    .fa-check {
        color: #28a745;
        font-size: 30px;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper lb_template_list_slider">

    @include('admin.partials.content-header',['name'=>"Khoản chi","key"=>"Danh sách khoản chi"])

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
                <a href="{{route('admin.khoanChi.create')}}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                <div class="">
                    <form class="form-inline ml-3" action="{{route('admin.khoanChi.export.excel.database')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="">Ngày bắt đầu:</label>
                        <div class="d-inline-block ml-2">
                            <input type="datetime-local" class="form-control @error('startDate') is-invalid  @enderror" placeholder="" name="startDate" value="{{ old('startDate')}}">
                            @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <label class="ml-2" for="">Ngày kết thúc:</label>
                        <div class="d-inline-block ml-2">
                            <input type="datetime-local" class="form-control @error('endDate') is-invalid  @enderror" placeholder=""name="endDate" value="{{ old('endDate')}}">
                            @error('endDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" value="Export Execel" class="ml-2 btn btn-danger">
                    </form>
                    <div class="card-tools w-100 mb-3">
                        <form action="{{ route('admin.khoanChi.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">

                                        <div class="form-group col-md-2 mb-0">
                                            <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control" placeholder="Mã phiếu">
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <input type="datetime-local" class="form-control @error('start') is-invalid  @enderror"
                                                placeholder="Từ ngày" id="" name="start" value="{{ $start }}">
                                            @error('start')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                              
                                        <div class="form-group col-md-3 mb-0">
                                            <input type="datetime-local" class="form-control @error('end') is-invalid  @enderror"
                                                placeholder="Đến ngày" id="" name="end" value="{{ $end }}">
                                            @error('end')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                            <select id="order" name="user_id" class="form-control">
                                                <option value="">-- Chọn tài khoản --</option>
                                                @if(isset($users) && $users->count()>0 )
                                                @foreach($users as $item)
                                                <option value="{{ $item->id }}" {{ $user_id == $item->id ? 'selected':'' }}>{{ $item->username }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                            <select id="" name="fill_action" class="form-control">
                                                <option value="">-- Lọc --</option>
                                                <option value="1" {{ $fill_action== 1 ? 'selected':'' }}>Chưa duyệt</option>
                                                <option value="2" {{ $fill_action== 2 ? 'selected':'' }}>Đã duyệt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-0 text-right">
                                    <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                    <a class="btn btn-danger " href="{{ route('admin.khoanChi.index') }}">Làm mới</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phiếu</th>
                                    <th>User</th>
                                    <th>Thông tin người nhận</th>
                                    <th>Loại tài khoản</th>
                                    <th>Địa chỉ</th>
                                    <th>Mã số thuế</th>
                                    <th>Số tiền chi</th>
                                    <th>Ngày chi</th>
                                    <th>Nội dung chi</th>
                                    <th>Người tạo</th>
                                    <th>Người duyệt</th>
                                    <th>Phụ chi</th>
                                    <th class="white-space-nowrap">Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center" style="width:124px;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $item)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->ma_phieu}}</td>
                                    <td>
                                        @if($item->user_id && $item->loai_tk == 3)
                                            {{$item->user->username}}
                                        @endif
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if($item->loai_tk == 1)
                                            Nhà cung cấp
                                        @elseif($item->loai_tk == 2)
                                            Nhân viên
                                        @elseif($item->loai_tk == 3)
                                            Thành viên
                                        @elseif($item->loai_tk == 4)
                                            Đại lý
                                        @else
                                        @endif
                                    </td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->mst}}</td>
                                    <td>{{ number_format($item->money) }}</td>
                                    <td>
                                        @if($item->ngay_chi)
                                            {{ Carbon::parse($item->ngay_chi)->format('d-m-Y') }}
                                        @else
                                            <span>Chưa có</span>
                                        @endif
                                    </td>
                                    <td>{{$item->content}}</td>
                                    <td>{{$item->admin->name}}</td>
                                    <td>
                                        @if($item->admin_duyet)
                                            {{ $item->adminDuyet->name }}
                                        @else
                                            Chưa có
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->phu_chi) }}</td>
                                    <td>
                                        @if($item->image_path)
                                        <a href="{{asset($item->image_path)}}" target="_blank">
                                            <img src="{{ asset($item->image_path) }}" alt="{{$item->ma_phieu}}" style="width:40px; height: 40px; object-fit: cover;">
                                        </a>
                                        @else
                                        <img src="{{ asset('admin_asset/images/upload-image.png') }}" alt="{{$item->ma_phieu}}" style="width:40px; height: 40px; object-fit: cover;">
                                        @endif
                                    </td>
                                    
                                    <td @canany(['khoan-chi-active']) class="wrap-load-status-khoan-chi" data-url="{{ route('admin.store.changeStatusKhoanChi', ['id'=>$item->id]) }}" @endcan>
                                        @include('admin.components.load-change-status-khoan-chi', ['data' => $item])
                                    </td>

                                    <td class="text-center">
                                        @if($item->status == 0)
                                        <a href="{{route('admin.khoanChi.edit',['id'=>$item->id])}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        @else
                                        <i class="fas fa-check"></i>
                                        @endif
                                        
                                        <a data-url="{{route('admin.khoanChi.destroy',['id'=>$item->id])}}" class="btn btn-sm btn-danger lb_delete ml-2"><i class="far fa-trash-alt"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{$data->links()}}
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).on('click', '.lb-change-status-khoan-chi', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-khoan-chi');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn duyệt khoản chi này';
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function(data) {
                            if (data.code == 200) {
                                let html = data.html;
                                wrapActive.html(html);
                            }
                        }
                    });
                }
            })
        }
        
    });
</script>
@endsection
