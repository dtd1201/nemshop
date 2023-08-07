@extends('admin.layouts.main')
@section('title',"Danh sách sản phẩm nhập")

@section('css')

@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Sản phẩm nhập","key"=>"Danh sách sản phẩm nhập"])

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
                        <form class="form-inline ml-3" action="{{route('admin.nhapKho.export.excel.database')}}" method="post" enctype="multipart/form-data">
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
                            <form action="{{ route('admin.store.listNhapKho') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">

                                            <div class="form-group col-md-2 mb-0">
                                                <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control" placeholder="Mã SP">
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
                                                <select id="order" name="lohang" class="form-control">
                                                    <option value="">-- Chọn lô hàng --</option>
                                                    @if(isset($loHang) && $loHang->count()>0 )
                                                    @foreach($loHang as $item)
                                                    <option value="{{ $item->id }}" {{ $lohang == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="1" {{ $fill_action== 1 ? 'selected':'' }}>Chưa thanh toán</option>
                                                    <option value="2" {{ $fill_action== 2 ? 'selected':'' }}>Đã thanh toán</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0 text-right">
                                        <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                        <a class="btn btn-danger " href="{{ route('admin.store.listDefectiveProduct') }}">Làm mới</a>
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
                                        <th width="100px" class="text-right">Giá nhập</th>
                                        <th width="100px" class="text-right">Số lượng</th>
                                        <th width="100px">User nhập</th>
                                        <th width="100px">Hạn sử dụng</th>
                                        <th width="50px">Lô hàng</th>
                                        <th width="100px">Ngày nhập</th>
                                        <th width="100px">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index}}</td>
                                            <td>{{ $item->masp }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-right">{{ $item->cost }}</td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td>{{ $item->admin->name }}</td>
                                            <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
                                            <td>{{ $item->lohang->name }}</td>
                                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td class="wrap-load-status-nhap-kho text-nowrap" data-url="{{ route('admin.store.changeStatusNhapKho', ['id'=>$item->id]) }}">
                                                @include('admin.components.load-change-status-nhap-kho', ['data' => $item])
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
    $(document).on('click', '.lb-change-status-nhap-kho', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-nhap-kho');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn chuyển sang trạng thái Đã Thanh Toán';
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
