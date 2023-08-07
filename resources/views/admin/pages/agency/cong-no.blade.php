@extends('admin.layouts.main')
@section('title',"Đơn đại lý")

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
</style>
@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Đơn đại lý","key"=>"Đơn đại lý"])

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
                    <form class="mb-2" action="{{ route('admin.agency.congno') }}" method="GET">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    
                                    <div class="form-group col-md-4 mb-0" style="min-width:100px;">
                                        <select name="agency_id" class="form-control">
                                            <option value="">-- Chọn đại lý --</option>
                                            @if(isset($agency) && $agency->count()>0 )
                                            @foreach($agency as $item)
                                            <option value="{{ $item->id }}" {{ $agencyId == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                        <select name="condition" class="form-control">
                                            <option value="">-- Tất cả tình trạng --</option>
                                            @foreach($listCondition as $item)
                                            <option value="{{ $item['condition'] }}" {{ $condition == $item['condition'] ? 'selected':'' }}>{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-0 text-right">
                                <button type="submit" class="btn btn-success ">Tìm kiếm</button>
                                <a class="btn btn-danger " href="{{ route('admin.agency.congno') }}">Làm mới</a>
                            </div>

                        </div>
                    </form>
                    <div class="card card-outline card-primary">
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="30px">STT</th>
                                        <th width="200px">Tên phiếu</th>
                                        <th width="100px">Mã phiếu</th>
                                        <th width="100px">Đại lý</th>
                                        <th width="100px">Người tạo</th>
                                        <th width="100px">Người duyệt</th>
                                        <th width="100px">Trạng thái</th>
                                        <th width="100px">Tình trạng</th>
                                        <th width="100px">Ngày xuất</th>
                                        <th width="100px">Ngày tạo</th>
                                        <th width="100px">Ngày đáo hạn</th>
                                        <th width="100px">Tổng giá</th>
                                        <th width="100px">Tiền nợ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $modelProduct = new \App\Models\Product;
                                        $totalAll = 0;
                                    @endphp
                                    @foreach ($data as $item)
                                        
                                        @php
                                            $total = 0;
                                            $products = $item->products()->get();

                                            foreach($products as $proItem){
                                                $price = 0;
                                                $price = $modelProduct->where('masp', $proItem->masp)->first()->price;
                                                $money = $proItem->quantity * $price;
                                                $total = $total + $money;
                                            }

                                            $totalAll = $totalAll + $item->tien_no;
                                        @endphp
                                        <tr>
                                            <td>{{$data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->ma_phieu_xuat }}</td>
                                            <td>
                                                @if($item->type == 2)
                                                    {{ $item->agency->name }}
                                                @endif
                                            </td>
                                            <td>{{ $item->admin->name }}</td>
                                            <td>
                                                @if($item->admin_duyet)
                                                {{ $item->adminDuyet->name }}
                                                @else
                                                Chưa có
                                                @endif
                                            </td>
                                            <td class="wrap-load-status-phieu-xuat" data-url="{{ route('admin.store.changeStatusPhieuXuat', ['id'=>$item->id]) }}">
                                                @include('admin.components.load-change-status-phieu-xuat', ['data' => $item])
                                            </td>
                                            <td class="text-nowrap condition" data-url="{{ route('admin.store.loadNextStepCondition',['id'=>$item->id]) }}">
                                                @include('admin.components.condition-agency',[
                                                    'dataCondition'=>$item,
                                                    'listCondition'=>$listCondition,
                                                ])
                                            </td>
                                            <td>
                                                @if($item->ngay_xuat)
                                                    {{ Carbon::parse($item->ngay_xuat)->format('d-m-Y') }}
                                                @else
                                                    <span>Chưa có</span>
                                                @endif
                                            </td>
                                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>

                                            <td>
                                                @if($item->condition == 3)
                                                    Hoàn thành
                                                @elseif($item->due_date && $item->condition == 2)
                                                    {{ Carbon::parse($item->due_date)->format('d-m-Y H:i:s') }}
                                                    <a data-url="{{route('admin.agency.changeDueDateAgency')}}" data-id="{{$item->id}}" class="btn btn-xs btn-danger ml-1 lb_update_quantity" style="background-color: #138496; border-color:#138496 ;"><i class="fas fa-edit"></i></a>
                                                @else
                                                    Chưa có
                                                @endif
                                            </td>
                                            <td>
                                                {{ number_format($item->total) }} đ
                                            </td>
                                            <td>
                                                {{ number_format($item->tien_no) }} đ
                                                @if($item->condition == 2)
                                                <a data-url="{{route('admin.agency.changeTienNo')}}" data-id="{{ $item->id }}" class="btn btn-xs btn-danger ml-1 lb_update_money" style="background-color: #138496; border-color:#138496;"><i class="fas fa-edit"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    <!-- <tr>
                                        <td colspan="11"><span class="font-bold">Tổng tiền</span></td>
                                        <td>
                                            {{ number_format($totalAll) }} đ
                                        </td>
                                    </tr> -->
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

<div id="model-list-sp" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4>Danh sách sản phẩm xuất</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="list_product">
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
                <h3>Cập nhật ngày đáo hạn</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_quantity">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="update_tien_no" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cập nhật tiền nợ</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_tien_no">
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('js')

<script type="text/javascript">
    $(document).on('click', '.js-model-phieu-xuat', function () {
        event.preventDefault();
        let id_phieuxuat = $(this).data('phieuxuat');
        let urlRequest = "{{ route('admin.store.listSanPhamXuat') }}";
        if(id_phieuxuat != ''){

            $.ajax({
                type: "GET",
                url: urlRequest,
                data:{
                    id_phieuxuat:id_phieuxuat, 
                },
                dataType: "json",
                success: function (response) {
                    if (response.code == 200) {
                        $("#list_product").html(response.html);
                        $('#model-list-sp').modal('show');
                    }
                },
            });
        }
    });

    $(document).on('click','.lb_update_quantity', function(){
        let id = $(this).data('id');
        if(id != ''){
            let urlRequest = $(this).data('url')+'?'+'id'+'='+id;
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

    $(document).on('click', '.lb-change-condition-phieu-xuat', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-condition-phieu-xuat');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn chuyển phiếu xuất này sang trạng thái Đã Thanh Toán';
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


    $(document).on('click', '.lb-change-status-phieu-xuat', function() {
        event.preventDefault();
        let wrapActive = $(this).parents('.wrap-load-status-phieu-xuat');
        let urlRequest = wrapActive.data("url");
        let value = $(this).data("value");
        let title = '';
        if (value) {
            
        } else {
            title = 'Bạn có chắc chắn muốn duyệt phiếu xuất này';
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
                        },
                        error: function(data){
                           alert('Số lượng sản phẩm xuất phải nhỏ hơn số lượng sản phẩm còn trong kho');
                        }
                    });
                }
            })
        }
        
    });

    $(document).on('click','.lb_update_money', function(){
        let id = $(this).data('id');
        if(id != ''){
            let urlRequest = $(this).data('url')+'?'+'id'+'='+id;
            $.ajax({
                url: urlRequest,
                method:"GET",
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#change_tien_no").html(response.html);
                        $('#update_tien_no').modal('show');
                    }
                }
            })   
        }
    });
</script>
@endsection
