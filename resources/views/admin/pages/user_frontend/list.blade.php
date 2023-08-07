@extends('admin.layouts.main')
@section('title',"Danh sách thành viên")

@section('css')
<link rel="stylesheet" href="{{asset('lib/sweetalert2/css/sweetalert2.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>" Admin User","key"=>"Danh sách thành viên"])

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


                <a href="{{route('admin.user_frontend.create')}}" class="btn btn-info btn-md mb-2 float-left">+ Thêm mới</a>
                
                <form class="d-inline-block mb-2" action="{{route('admin.user_frontend.export.excel.database')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{--
                    <label for="">Ngày bắt đầu:</label>
                    <div class="d-inline-block ml-2">
                        <input type="datetime-local" class="form-control @error('start') is-invalid  @enderror" placeholder="" id="" name="start" value="{{ old('start')}}">
                        @error('start')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="" class="ml-2">Ngày kết thúc:</label>
                    <div class="d-inline-block ml-2">
                        <input type="datetime-local" class="form-control @error('end') is-invalid  @enderror" placeholder="" id="" name="end" value="{{ old('end')}}">
                        @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="ml-2">
                        <select id="" name="typeUser" class="form-control">
                            <option value="-1" selected>Tất cả thành viên </option>
                            <option value="0" >Thành viên chưa kích hoạt</option>
                            <option value="1" >Thành viên đã kích hoạt</option>
                            <option value="2" >Thành viên bị khóa</option>
                        </select>
                    </div>
                    --}}
                    <input type="submit" value="Export Execel" class="ml-2 btn btn-danger">
                </form>
                
                <div class="card card-outline card-primary">
                    {{--
                    <div class="card-tools w-100  p-1">
                        <form class="form-inline text-right justify-content-end  mb-2 p-0 pt-3" action="{{ route('admin.user_frontend.transferPointBetweenXY') }}" method="GET">
                           <label for="">STT bắt đầu:</label>
                            <div class="d-inline-block">
                                <input type="number" class="form-control ml-1 mr-1" name="start" placeholder="Nhập STT bắt đầu" value="{{ old('start') }}">
                                @error('start')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                           <label for="">STT kết thúc:</label>
                          <div class="d-inline-block">
                                <input type="number" class="form-control ml-1 mr-1" name="end" placeholder="Nhập STT kết thúc" value="{{ old('end') }}">
                                @error('end')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                          </div>
                           <button type="submit" class="btn btn-primary">Bắn điểm hàng loạt</button>
                       </form>
                       @if (session('transferPointBetweenXY'))
                        <div class="alert alert-success">
                            {{session("transferPointBetweenXY")}}
                        </div>
                       @elseif(session('transferPointBetweenXYError'))
                        <div class="alert alert-warning">
                            {{session("transferPointBetweenXYError")}}
                        </div>
                       @endif
                   </div>
                   <div class="card-tools w-100  p-1">
                        <form class="form-inline text-right justify-content-end  mb-2 p-0" action="{{ route('admin.user_frontend.transferPointRandom') }}" method="GET">
                            <label for="">STT </label>
                                <div class="d-inline-block">
                                    <input type="number" class="form-control ml-1 mr-1" name="order" placeholder="Nhập STT" value="{{ old('order') }}">
                                    @error('order')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            <label for="">Số điểm:</label>
                            <div class="d-inline-block">
                                    <input type="number" class="form-control ml-1 mr-1" name="point" placeholder="Nhập số điểm" value="{{ old('point') }}">
                                    @error('point')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Bắn PM</button>
                        </form>
                        @if (session('transferPointRandom'))
                            <div class="alert alert-success">
                                {{session("transferPointRandom")}}
                            </div>
                        @elseif(session('transferPointRandomError'))
                            <div class="alert alert-warning">
                                {{session("transferPointRandomError")}}
                            </div>
                        @endif
                    </div>
                    --}}
                    <div class="card-header">
                        <div class="card-tools w-100 mb-3">
                            <form action="{{ route('admin.user_frontend.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="form-group col-md-3 mb-0">
                                                <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control" placeholder="Tên user/username">
                                                <div id="keyword_feedback" class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">-- Sắp xếp theo --</option>
                                                    <option value="dateASC" {{ $order_with=='dateASC'? 'selected':'' }}>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" {{ $order_with=='dateDESC'? 'selected':'' }}>Ngày tạo giảm dần</option>
                                                    <option value="usernameASC" {{ $order_with=='usernameASC'? 'selected':'' }}>Username A-> Z</option>
                                                    <option value="usernameDESC" {{ $order_with=='usernameDESC'? 'selected':'' }}>Username Z -> A</option>
                                                    <option value="activeDESC" {{ $order_with=='activeDESC'? 'selected':'' }}>Trạng thái</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                <select id="" name="fill_action" class="form-control">
                                                    <option value="">-- Lọc --</option>
                                                    <option value="userNoActive" {{ $fill_action=='userNoActive'? 'selected':'' }}>Thành viên chưa kích hoạt</option>
                                                    <option value="userActive" {{ $fill_action=='userActive'? 'selected':'' }}>Thành viên đã kích hoạt</option>
                                                    <option value="userActiveKey" {{ $fill_action=='userActiveKey'? 'selected':'' }}>Thành viên bị khóa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-0">
                                        <button type="submit" class="btn btn-success w-40">Tìm kiếm</button>
                                        <a  class="btn btn-danger w-40" href="{{ route('admin.user_frontend.index') }}">Làm mới</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                        <div class="count">
                            Tổng số bản ghi <strong>{{  $data->count() }}</strong> / {{ $totalUser }}
                         </div>
                      </div>

                    <div class="card-body table-responsive p-0 lb-list-category">
                        @php
                            $modelPoint = new App\Models\Point;
                        @endphp
                        <table class="table table-head-fixed" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài khoản</th>
                                    <th>Họ và tên</th>
                                    {{--
                                    <th>Số điểm đã nạp</th>
                                    --}}
                                    <th>Admin xử lý</th>
                                    <th>Cấp độ</th>
                                    <th>GĐ mới</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng số điểm</th>
                                    <th>Điểm mua hàng</th>
                                    <th>Điểm còn lại</th>
                                    <th>KIC</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)                                    
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->username}}</td>
                                    <td><a href="{{ route('admin.user_frontend.detail',['id'=>$item->id]) }}">{{$item->name}}</a></td>
                                    {{--
                                    <td>{{$item->points()->where(['type'=>4])->select(\App\Models\Point::raw('SUM(point) as total'))->first()->total }}</td>
                                    --}}
                                    <td>
                                        @if ($item->admin_id)
                                        <ul>
                                            <li>
                                                <strong>Tên</strong> {{optional($item->admin)->name}} <br>
                                                <strong>Email</strong> {{optional($item->admin)->email}}
                                            </li>
                                        </ul>

                                        @endif

                                    </td>
                                    <td>
                                        <span>
                                            @if($item->chuc_danh == 1)
                                                Tổng giám đốc
                                            @elseif($item->chuc_danh == 2)
                                                Giám đốc
                                            @else
                                                Đại lý
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->giamdoc_id2)
                                        <span>{{ $item->username }}</span>
                                        @endif
                                    </td>
                                    <td class="wrap-load-active" data-url="{{ route('admin.user_frontend.load.active',['id'=>$item->id]) }}">
                                        @include('admin.components.load-change-active-user',['data'=>$item,'type'=>'user'])
                                    </td>
                                    <td>{{ number_format($modelPoint->sumPointCurrent2($item->id) ?? 0) }}</td>
                                    <td>{{ number_format($modelPoint->sumPointCurrent3($item->id) ?? 0) }}</td>
                                    <td>{{ number_format($modelPoint->sumPointCurrent($item->id) ?? 0) }}</td>
                                    <td class="wrap-load-active" data-url="{{ route('admin.user_frontend.kicUser',['id'=>$item->id]) }}">
                                        @include('admin.components.load-change-kic-user',['data'=>$item,'type'=>'user'])
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="{{route('admin.user_frontend.loadUserDetail',['id'=>$item->id])}}" ><i class="fas fa-eye"></i></a>
                                        {{--
                                            <a class="btn btn-sm btn-success"  href="{{route('admin.user_frontend.edit',['id'=>$item->id])}}" ><i class="fas fa-edit"></i></a>
                                        
                                            @if ($item->active==1)
                                                <a class="btn btn-sm btn-success" id="btnTranferPoint" data-url="{{route('admin.user_frontend.transferPoint',['id'=>$item->id])}}">Bắn điểm</a>
                                            @endif
                                        --}}

                                        @if ($item->active)
                                            <a  class="btn btn-sm btn-danger {{ $item->active==2?"key":"" }}" id="btnKeyUser" data-url="{{route('admin.user_frontend.load.active-key',['id'=>$item->id])}}" > {{ $item->active==1?"Khóa user":"Mở khóa" }}</a>

                                            <a data-url="{{route('admin.user_frontend.plusPoint')}}" data-id="{{$item->id}}" class="btn btn-sm btn-danger lb_plus_point mr-1" style="background-color: #138496; border-color:#138496 ;">Thưởng điểm</a>

                                            <a data-url="{{route('admin.user_frontend.minusPoint')}}" data-id="{{$item->id}}" class="btn btn-sm btn-danger lb_minus_point mr-1" style="background-color: #138496; border-color:#138496 ;">Trừ điểm</a>
                                        @endif
                                        <a href="{{route('admin.user_frontend.edit',['id'=>$item->id])}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        {{--
                                        <a data-url="{{route('admin.user.destroy',['id'=>$item->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                        --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{$data->appends(request()->all())->links()}}
            </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade in" id="transactionDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thông tin chi tiết thành viên</h4>
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


<div id="plus-point" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Thưởng điểm thành viên</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change-plus-point">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="minus-point" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Trừ điểm thành viên</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change-minus-point">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

<script src="{{asset('lib/sweetalert2/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin_asset/ajax/deleteAdminAjax.js')}}"></script>
<script>
    $(function(){
        $(document).on('click','#btnTranferPoint',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let title = '';
            title ='Bạn có chắc chắn muốn bắn điểm';
            $this=$(this);
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, next step!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function(data) {
                            if (data.code == 200) {
                                $this.text('Đã bắn');
                                $this.removeClass('btn-danger').addClass('btn-info');
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Bắn điểm không thành công',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click','#btnKeyUser',function(){
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let title = '';

            let   $this=$(this);
            if($this.hasClass('key')){
                title ='Bạn có chắc chắn muốn mở khóa thành viên';
            }else{
                title ='Bạn có chắc chắn muốn khóa thành viên';

            }

            let loadActive=$(this).parents('tr').find('.wrap-load-active');
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, next step!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function(data) {
                            if (data.code == 200) {
                                loadActive.html(data.html);

                                if($this.hasClass('key')){
                                    $this.removeClass('key');
                                    $this.text('Khóa user');
                                }else{
                                    $this.addClass('key');
                                    $this.text('Mở khóa');
                                }
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: data.title,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error:function(data){

                            Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: "Khóa không thành công",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                        }
                    });
                }
            });
        });



        $(document).on('click','.lb_plus_point', function(){
            let user_id = $(this).data('id');
            if(user_id != ''){
                let urlRequest = $(this).data('url')+'?'+'user_id'+'='+user_id;
                $.ajax({
                    url: urlRequest,
                    method:"GET",
                    dataType:"JSON",
                    success:function(response){
                        if (response.code == 200) {
                            $("#change-plus-point").html(response.html);
                            $('#plus-point').modal('show');
                        }
                    }
                })   
            }
        });

        $(document).on('click','.lb_minus_point', function(){
            let user_id = $(this).data('id');
            if(user_id != ''){
                let urlRequest = $(this).data('url')+'?'+'user_id'+'='+user_id;
                $.ajax({
                    url: urlRequest,
                    method:"GET",
                    dataType:"JSON",
                    success:function(response){
                        if (response.code == 200) {
                            $("#change-minus-point").html(response.html);
                            $('#minus-point').modal('show');
                        }
                    }
                })   
            }
        });

    });
</script>

@endsection
