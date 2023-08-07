@extends('admin.layouts.main')
@section('title',"Danh sách sản phẩm của lô hàng")

@section('css')

@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Lô hàng","key"=>"Danh sách sản phẩm của lô hàng"])

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
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="50px">Mã SP</th>
                                        <th width="200px">Tên sản phẩm</th>
                                        <th width="100px" class="text-right">Giá nhập</th>
                                        <th width="100px" class="text-right">Số lượng tồn</th>
                                        <th width="100px" class="text-right">Số lượng bán</th>
                                        <th width="100px" class="text-right">Số lượng lỗi</th>
                                        <th width="100px">Hạn sử dụng</th>
                                        <th width="50px">Lô hàng</th>
                                        <th width="100px">Ngày nhập</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index}}</td>
                                            <td>{{ $item->masp }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-right">{{ number_format($item->cost) }}</td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td class="text-right">{{ $item->sell_number }}</td>
                                            <td class="text-right">{{ $item->so_luong_loi }}</td>
                                            <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
                                            <td>{{ $item->lohang->name }}</td>
                                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td>
                                                <a data-url="{{route('admin.store.addQuantityProduct')}}" data-id="{{$item->id}}" class="btn btn-sm btn-danger lb_update_quantity" style="background-color: #138496; border-color:#138496 ;">Thêm số lượng</a>
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

<div id="update_quantity" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Thêm số lượng sản phẩm theo lô</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_quantity">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).on('click','.lb_update_quantity', function(){
        let id_prod = $(this).data('id');
        if(id_prod != ''){
            let urlRequest = $(this).data('url')+'?'+'id_prod'+'='+id_prod;
            $.ajax({
                url: urlRequest,
                method:"GET",
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#change_quantity").html(response.html);
                        $('#update_quantity').modal('show');
                    }
                }
            })   
        }
    });
</script>
@endsection
