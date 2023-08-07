@extends('admin.layouts.main')
@section('title',"Danh sách đại lý")

@section('css')

@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Đại lý","key"=>"Danh sách đại lý"])

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
                    <a href="{{ route('admin.agency.create') }}" class="btn  btn-info btn-md mb-2">Thêm đại lý +</a>

                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="220px">Họ tên</th>
                                        <th width="220px">Mã đại lý</th>
                                        <th width="200px">Điện thoại</th>
                                        <th width="200px">Email</th>
                                        <th width="200px">Số tài khoản</th>
                                        <th width="200px">Ngân hàng</th>
                                        <th width="200px">Số căn cước</th>
                                        <th width="500px">Địa chỉ</th>
                                        <th width="50px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->ma_daily }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->so_tai_khoan }}</td>
                                            <td>
                                            
                                                @if($item->bank_id)
                                                    {{ $item->bank->name }}
                                                @else
                                                    Chưa cập nhật
                                                @endif
                                            </td>
                                            <td>{{ $item->can_cuoc }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('admin.agency.edit',['id'=>$item->id])}}" class="btn btn-sm btn-info mr-1"><i class="fas fa-edit"></i></a>
                                                    <a data-url="{{route('admin.agency.destroy',['id'=>$item->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                                </div>
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
@endsection
