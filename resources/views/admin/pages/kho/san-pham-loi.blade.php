@extends('admin.layouts.main')
@section('title',"Danh sách sản phẩm hoàn trả")

@section('css')

@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Kho","key"=>"Danh sách sản phẩm hoàn trả"])

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
                            <form action="{{ route('admin.store.listDefectiveProduct') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-0">
                                                <input id="keyword" value="{{$keyword}}" name="keyword" type="text" class="form-control" placeholder="Mã SP">
                                                <div id="keyword_feedback" class="invalid-feedback">

                                                </div>
                                            </div>
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
                                        <th width="100px">Hạn sử dụng</th>
                                        <th width="100px">Lô hàng</th>
                                        <th width="100px">Ngày tạo</th>
                                        <td width="100px">Hành động</td>
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
                                            <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
                                            <td>{{ $item->lohang->name }}</td>
                                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td>
                                                <a data-url="{{route('admin.store.destroyDefectiveProduct',['id'=>$item->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
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
