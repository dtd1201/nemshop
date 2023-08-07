@extends('admin.layouts.main')
@section('title',"Danh sách yêu cầu đổi trả")

@section('css')

@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Yêu cầu đổi trả","key"=>"Danh sách yêu cầu đổi trả"])

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
                <div class="col-md-12">
                    <div class="">
                        <div class="card-tools w-100 mb-3">
                            <form action="{{ route('admin.store.listYeuCau') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" {{ $order_with == 'dateASC' ? 'selected' : '' }}>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" {{ $order_with == 'dateDESC' ? 'selected' : '' }}>Ngày tạo giảm dần</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0 text-right">
                                        <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                        <a class="btn btn-danger " href="{{ route('admin.store.listYeuCau') }}">Làm mới</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="50px">Mã SP</th>
                                        <th width="200px">Tên sản phẩm</th>
                                        <th width="100px">Số lượng</th>
                                        <th width="100px">Họ tên</th>
                                        <th width="100px">Tài khoản</th>
                                        <th width="300px">Lý do</th>
                                        <th width="100px">Người duyệt</th>
                                        <th width="100px">Ngày tạo</th>
                                        <th width="100px">Trạng thái</th>
                                        <th width="100px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index}}</td>
                                            <td>{{ $item->product->masp }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->username }}</td>
                                            <td>{{ $item->content }}</td>
                                            <td>
                                                @if($item->admin_id)
                                                    {{ $item->admin->name }}
                                                @endif
                                            </td>
                                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            @if($item->status != -1)
                                            <td class="wrap-load-status-yeu-cau" data-url="{{ route('admin.store.changeStatusYeuCau', ['id'=>$item->id]) }}">
                                                @include('admin.components.load-change-status-yeu-cau', ['data' => $item])
                                            </td>
                                            @else
                                            <td>
                                                <a class="btn btn-sm btn-danger" style="width:88px;">Đã hủy</a>
                                            </td>
                                            @endif

                                            <td>
                                                @if($item->status == 0)
                                                <a href="javascript:;" data-url="{{route('admin.store.yeucau.cancel',['id'=>$item->id])}}"  class="btn btn-sm btn btn-danger js-huydon">Hủy yêu cầu</a>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    $(document).on('click', '.lb-change-status-yeu-cau', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-yeu-cau');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn duyệt yêu cầu này';
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

    $(document).on("click", ".js-huydon", function(){
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn hủy yêu cầu này',
            text: "Bạn sẽ không thể khôi phục điều này",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!',
            cancelButtonText: 'Hủy bỏ!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            location.reload();
                        }
                    },
                    error: function() {

                    }
                });
            }
        })
    });
</script>
@endsection
