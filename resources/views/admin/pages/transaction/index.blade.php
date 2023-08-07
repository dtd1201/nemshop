@extends('admin.layouts.main')
@section('title',"Danh sách đơn hàng")
@section('css')
<style>
ul{
    padding-left: 20px;
}
.info-box .info-box-number {
    display: block;
    margin-top: .25rem;
    color: #f00;
    font-weight: 700;
}
input::placeholder{
    font-size: 12px;
}

</style>
@endsection
@section('content')
   <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>"Đơn hàng","key"=>"Danh sách đơn hàng"])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    @if(session("alert"))
                      <div class="alert alert-success">
                          {{session("alert")}}
                      </div>
                      @elseif(session('error'))
                      <div class="alert alert-warning">
                          {{session("error")}}
                      </div>
                    @endif
                  </div>
                    @isset($dataTransactionGroupByStatus)
                        <div class="col-sm-12">
                            <div class="list-count">
                                <div class="row">
                                    @foreach ($dataTransactionGroupByStatus as $item)

                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Số giao dịch {{ $item['name'] }} </span>
                                            <span class="info-box-number"><strong>{{ number_format($item['total']??0) }}</strong> / tổng số {{ $totalTransaction }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    @endforeach

                                    
                                    @can('transaction-total-price')
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Doanh số / Chi phí (%)</span>
                                                <span class="info-box-number"><strong>{{ number_format($totalPrice??0) }}</strong>/ 
        											@if($totalPoint)
        												{{number_format($totalPoint * 1000)}}
        											@else
        												0
        											@endif
                                                    @if($totalPoint && $totalPrice)
                                                      ({{ round((($totalPoint * 1000)/$totalPrice * 100),2) }}%)
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                    
                                </div>
                            </div>
                        </div>
                    @endisset


                    <div class="col-sm-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <h3 class="card-title">Danh sách</h3>
                                    </div>
                                    <div class="col-md-10 col-12">
                                        <div class="card-tools">
                                            <form action="{{ route('admin.transaction.index') }}" method="GET">

                                                <div class="row" style="font-size: 13px;">
                                                    <div class="col-md-9" >
                                                        <div class="row">
                                                            <div class="form-group col-md-3 mb-0">
                                                                <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control" placeholder="Mã GD/Username/Tên user/Tên admin/Email Admin">
                                                                <div id="keyword_feedback" class="invalid-feedback">

                                                                </div>
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
                                                            {{--
                                                            <div class="form-group col-md-4 mb-0">
                                                                <select id="order" name="order_with" class="form-control">
                                                                    <option value="">Sắp xếp theo</option>
                                                                    <option value="dateASC" {{ $order_with=='dateASC'? 'selected':'' }}>Ngày đặt hàng tăng dần</option>
                                                                    <option value="dateDESC" {{ $order_with=='dateDESC'? 'selected':'' }}>Ngày đặt hàng giảm dần</option>
                                                                    <option value="statusASC" {{ $order_with=='statusASC'? 'selected':'' }}>Trạng thái 1-n</option>
                                                                    <option value="statusDESC" {{ $order_with=='statusDESC'? 'selected':'' }}>Trạng thái n-1</option>
                                                                </select>
                                                            </div>
                                                            --}}
                                                            <div class="form-group col-md-3 mb-0">
                                                                <select id="status" name="status" class="form-control">
                                                                    <option value="">Tình trạng đơn hàng</option>
                                                                    @foreach ($listStatus as $status)
                                                                      <option value="{{ $status['status'] }}" {{ $status['status']==$statusCurrent? 'selected':'' }}>Đơn hàng {{ $status['name'] }}</option>
                                                                      @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 text-right">
                                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                                        <button type="submit" class="ml-1 btn btn-danger" name="type" value="1">Export</button>
                                                        <a href="{{ route('admin.transaction.index') }}" class="btn btn-danger">Làm lại</a>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                                <div class="count">
                                    Tổng số bản ghi <strong>{{  $data->count() }}</strong> / {{ $totalTransaction }}
                                </div>
                            </div>
                           <!-- /.card-header -->
                           <div class="card-body table-responsive p-0" style="font-size: 13px;">
                              <table class="table table-head-fixed">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th class="text-nowrap">Thông tin</th>
                                       <th class="text-nowrap">Tổng tiền</th>
                                       <th class="text-nowrap">Tài khoản</th>
                                       <th class="">Admin xử lý</th>
                                       <th class="text-nowrap">Trạng thái</th>
                                       <th>Thời gian đặt</th>
                                       <th>Thời gian giao</th>
                                       <th>Ngày đáo hạn</th>
                                       <th>Tiền nợ</th>
                                       <th>Trang thái</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($data as $transaction)
                                     <tr>
                                         <td>{{ $transaction->id }}</td>
                                         <td>
                                             <ul class="pl-0">
                                                <li>
                                                    <strong>MGD:</strong>  {{ $transaction->code }}
                                                  </li>
                                                 <li>
                                                   <strong>Họ tên:</strong>  {{ $transaction->name }}
                                                 </li>
                                                 <li>
                                                  <strong>Số điện thoại:</strong>   {{ $transaction->phone }}
                                                 </li>
                                                 <li>
                                                  <strong>Email:</strong>   {{ $transaction->email }}
                                                 </li>
                                                 <li>
                                                    <strong>Username:</strong>   {{ optional($transaction->user)->username }}
                                                </li>
                                             </ul>
                                         </td>
                                         <td class="text-nowrap">
                                             {{-- <span class="tag tag-success"></span> --}}
                                             <ul class="pl-0">
                                                @if($transaction->sale)
                                                <li>
                                                  <strong>Giá trị đơn hàng:</strong>  {{ number_format($transaction->total) }} đ
                                                </li>
                                                <li>
                                                  <strong>Giá gốc <span class="text-danger">{{ number_format($transaction->total_origin) }} đ</span></strong>
                                                </li>
                                                <li>
                                                  <strong>Đơn giá đã được chiết khấu <span class="text-danger">{{ $transaction->sale }} %</span></strong>
                                                </li>
                                                @else
                                                <li>
                                                  <strong>Giá trị đơn hàng:</strong>  {{ number_format($transaction->total) }} đ
                                                </li>
                                                @endif
                                            </ul>
                                        </td>

                                         <td class="text-nowrap">{{ $transaction->user_id?'Thành viên':'Khách vãng lai' }}</td>
                                         <td>
                                            <ul  class="pl-0">
                                                <li>
                                                    <strong>Tên </strong> {{ optional($transaction->admin)->name }}
                                                </li>
                                                <li>
                                                    <strong>Email</strong>  {{ optional($transaction->admin)->email }}
                                                </li>
                                            </ul>
                                        </td>
                                         <td class="text-nowrap status" data-url="{{ route('admin.transaction.loadNextStepStatus',['id'=>$transaction->id]) }}">
                                            @include('admin.components.status',[
                                                'dataStatus'=>$transaction,
                                                'listStatus'=>$listStatus,
                                            ])
                                         </td>
                                         <td class="text-nowrap">{{ Carbon::parse($transaction->created_at)->format('d-m-Y H:i:s') }}</td>
                                        <td class="text-nowrap">
                                            @if($transaction->time_ship)
                                                {{ Carbon::parse($transaction->time_ship)->format('d-m-Y H:i:s') }}
                                            @else
                                                Chưa có
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            @if($transaction->status == 6)
                                                Hoàn thành
                                            @else
                                                @if($transaction->due_date)
                                                    {{ Carbon::parse($transaction->due_date)->format('d-m-Y H:i:s') }}
                                                    <a data-url="{{route('admin.transaction.changeDueDateTransaction')}}" data-id="{{$transaction->id}}" class="btn btn-xs btn-danger ml-1 lb_update_quantity" style="background-color: #138496; border-color:#138496 ;"><i class="fas fa-edit"></i></a>
                                                @else
                                                    Chưa có
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                          @if($transaction->status !== 6)
                                            {{ number_format($transaction->tien_no) }} đ
                                            <a data-url="{{route('admin.transaction.changeTienNo')}}" data-id="{{$transaction->id}}" class="btn btn-xs btn-danger ml-1 lb_update_money" style="background-color: #138496; border-color:#138496 ;"><i class="fas fa-edit"></i></a>
                                          @endif
                                          
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="{{route('admin.transaction.detail',['id'=>$transaction->id])}}" ><i class="fas fa-eye"></i></a>
                                            @if($transaction->status == -1 || $transaction->status == 6)
                                            @else
                                            <a href="javascript:;" data-url="{{route('admin.transaction.cancel',['id'=>$transaction->id])}}"  class="btn btn-sm btn btn-danger js-huydon">Hủy đơn</a>
                                            @endif
                                             {{-- <a href="" data-url="{{route('admin.transaction.destroy',['id'=>$transaction->id])}}"  class="btn btn-sm btn-info btn-danger lb_delete"><i class="far fa-trash-alt"></i></a> 
                                             <a href="{{route('admin.transaction.export.excel.one.order',['id'=>$transaction->id])}}" class="btn btn-sm btn-info btn-danger">Xuất Excel</a>--}}
                                        </td>
                                      </tr>
                                     @endforeach

                                 </tbody>
                              </table>
                           </div>
                           <!-- /.card-body -->
                        </div>
                     </div>
                     <div class="col-md-12">
                        {{$data->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
     <!-- The Modal chi tiết đơn hàng -->
  <div class="modal fade in" id="transactionDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết đơn hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="content" id="loadTransactionDetail">

         </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    $(document).on("click", ".js-huydon", function(){
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn hủy đơn này',
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
