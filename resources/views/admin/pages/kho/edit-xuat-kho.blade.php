@extends('admin.layouts.main')
@section('title',"Cập nhật phiếu xuất")
@section('css')
<style type="text/css">
    .danh-sach-sp {
        max-width: 1000px;
    }

    .danh-sach-sp .item{
        display: flex;
        border: 1px solid #333;
    }

    .danh-sach-sp .name_sp{
        padding: 0 10px;
        width: 100%;
        max-width: 500px;
        border: 1px solid #333;
    }

    .danh-sach-sp .so_luong_ton{
        padding: 0 10px;
        width: 70px;
        text-align: center;
        border: 1px solid #333;
    }

    .danh-sach-sp .quantity{
        padding: 0 10px;
        width: 90px;
        border: 1px solid #333;
    }

    .danh-sach-sp .name_lo_hang{
        padding: 0 10px;
        width: 175px;
        border: 1px solid #333;
    }

    .danh-sach-sp .han_su_dung{
        padding: 0 10px;
        width: 120px;
        border: 1px solid #333;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>"Phiếu xuất","key"=>"Cập nhật phiếu xuất"])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12">
                    @if(session("alert"))
                    <div class="alert alert-success">
                        {{session("alert")}}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-warning">
                        {{session("error")}}
                    </div>
                    @endif
                    
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Cập nhật phiếu xuất
                            </h3>
                            <form class="d-flex float-right" action="{{route('admin.store.editXuatKho', ['id' => $xuatkho->id])}}" method="GET">
                                <select class="form-control input-product custom-select select-2-init" name="lohang">
                                    <option value="">-- Tất cả lô hàng --</option>
                                    @if(isset($loHang) && $loHang->count()>0 )
                                        @foreach($loHang as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <button class="btn btn-primary text-nowrap ml-2" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <form id="form-add-product" action="{{route('admin.store.updateXuatKho', ['id' => $xuatkho->id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="">Tên phiếu xuất</label>
                                            <input type="text"
                                            class="form-control"
                                            value="{{ $xuatkho->name }}"  name="name"
                                            placeholder="Nhập tên"
                                            required="" 
                                            >
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại phiếu xuất</label>
                                            <select class="form-control" name="type" required="">
                                                <option @if($xuatkho->type == 1) selected @endif value="1">Xuất cho đơn hàng</option>
                                                <option @if($xuatkho->type == 2) selected @endif value="2">Xuất cho đại lý</option>
                                                <option @if($xuatkho->type == 3) selected @endif value="3">Xuất để tặng</option>
                                            </select>
                                            @error('type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="danh-sach-sp">
                                    @if(isset($sanpham) && $sanpham->count()>0)
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Số lượng còn</th>
                                                    <th>Số lượng xuất</th>
                                                    <th>Tên lô hàng</th>
                                                    <th>Hạn sử dụng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sanpham as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->masp }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>
                                                        <input type="hidden" value="{{ $item->id }}" name="product[{{ $item->id }}][kho_hang_id]">
                                                        <input type="hidden" value="{{ $item->name }}" name="product[{{ $item->id }}][name]">
                                                        <input type="hidden" value="{{ $item->masp }}" name="product[{{ $item->id }}][masp]">
                                                        <input type="hidden" value="{{ $item->cost }}" name="product[{{ $item->id }}][cost]">
                                                        <input type="hidden" value="{{ $item->han_su_dung }}" name="product[{{ $item->id }}][han_su_dung]">
                                                        <input type="hidden" value="{{ $item->lo_hang_id }}" name="product[{{ $item->id }}][lo_hang_id]">
                                                        <input type="hidden" value="{{ $item->quantity }}" name="product[{{ $item->id }}][quantity]">
                                                        <input type="number"
                                                        class="form-control"
                                                        value="0" min="0" max="{{ $item->quantity }}" name="product[{{ $item->id }}][quantity_xuat]"
                                                        placeholder="Nhập số lượng">
                                                    </td>
                                                    <td>{{ $item->lohang->name }}</td>
                                                    <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                    <div>Kho của bạn hiện không còn sản phẩm nào!</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Chấp nhận</button>
                                    <button type="reset" class="btn btn-danger">Làm lại</button>
                                </div>
                            </form>
                        </div>
                    </div>
              
                    @if($xuatkho->transaction_code)
                        @php
                            $modelTransaction = new App\Models\Transaction;
                            $transaction = $modelTransaction->where('code', $xuatkho->transaction_code)->first();
                        @endphp

                        @if($transaction)
                        <h3>Thông tin đơn hàng</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->orders()->latest()->get() as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
