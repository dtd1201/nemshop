@extends('admin.layouts.main')
@section('title',"Chi tiết doanh thu")

@section('css')
<style type="text/css">
    .fa-check {
        color: #28a745;
        font-size: 30px;
    }

    .modal-dialog {
        max-width: 1000px;
        margin: 1.75rem auto;
    }

    .table td, .table th {
        padding: 5px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Chi tiết doanh thu","key"=>"Chi tiết doanh thu"])

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

                @if(isset($sanphamloi) && $sanphamloi->count()>0)
                <div class="col-md-12 mb-5">
                    <h3>Danh sách sản phẩm lỗi</h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sanphamloi as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->masp }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-right">{{ $item->cost }}</td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
                                            <td>{{ $item->lohang->name }}</td>
                                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($transactions) && $transactions->count()>0)
                <div class="col-md-12 mb-5">
                    <h3>Danh sách đơn hàng</h3>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                       <th width="30">STT</th>
                                       <th width="300" class="text-nowrap">Thông tin</th>
                                       <th width="300" class="text-nowrap">Tổng tiền</th>
                                       <th width="300">Thời gian đặt</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($transactions as $transaction)
                                     <tr>
                                         <td>{{ $loop->index + 1 }}</td>
                                         <td>
                                             <ul class="pl-0">
                                                <li>
                                                    {{ $transaction->code }}
                                                </li>
                                             </ul>
                                         </td>
                                         <td class="text-nowrap">
                                             <ul class="pl-0">
                                                <li>
                                                  {{ number_format($transaction->total) }}
                                                </li>
                                            </ul>
                                        </td>
     
                                        <td class="text-nowrap">{{ Carbon::parse($transaction->created_at)->format('d-m-Y H:i:s') }}</td>
                                      </tr>
                                     @endforeach

                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($thuno_dailys) && $thuno_dailys->count()>0)
                <div class="col-md-12">
                    <h3>Danh sách đơn đại lý</h3>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                       <th width="30">STT</th>
                                       <th width="300" class="text-nowrap">Thông tin</th>
                                       <th width="300" class="text-nowrap">Tổng tiền</th>
                                       <th width="300">Thời gian đặt</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($thuno_dailys as $item)
                                     <tr>
                                         <td>{{ $loop->index + 1 }}</td>
                                         <td>
                                             <ul class="pl-0">
                                                <li>
                                                    {{ $item->ma_phieu_xuat }}
                                                </li>
                                             </ul>
                                         </td>
                                         <td class="text-nowrap">
                                             <ul class="pl-0">
                                                <li>
                                                  {{ number_format($item->total) }}
                                                </li>
                                            </ul>
                                        </td>
     
                                        <td class="text-nowrap">{{ Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}</td>
                                      </tr>
                                     @endforeach

                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')

@endsection
