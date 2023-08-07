@extends('frontend.layouts.main-profile')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('css')
    <style>

        .badge-1 {
            background: #dc3545;
        }

        .badge-1 {
            background: #c3e6cb;
        }

        .badge-2 {
            background: #ffc107;
        }

        .badge-3 {
            background: #17a2b8;
        }

        .badge-4 {
            background: #28a745;
        }
        .info-box {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            border-radius: .25rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }
        .info-box .info-box-icon {
            border-radius: .25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }
        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
        }
        .info-box .info-box-text, .info-box .progress-description {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .info-box .info-box-number {
            display: block;
            margin-top: .25rem;
            font-weight: 700;
        }
        .modal-header{
            background-color: #000;
            color: #fff;
        }
        .modal-header .close{
            opacity: 1;
            color: #fff;
        }
        .modal-title{
            margin: 0;

        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset --}}

             <div class="row">

                @if ($user->active==0)
                <div class="col-md-12">
                    <div class="alert alert-danger" style=" font-size: 150%;">
                        <strong>warning!</strong> Tài khoản của bạn chưa được kích hoạt <br>
                        <span style="font-size: 14px;">(Các thông số tài khoản sẽ là thông số của tài khoản sau khi được kích hoạt)</span>
                      </div>
                </div>
                @elseif($user->active==2)
                <div class="col-md-12">
                    <div class="alert alert-danger" style=" font-size: 150%;">
                        <strong>warning!</strong> Tài khoản của bạn đã bị khóa <br>
                      </div>
                </div>
                @endif

                 <div class="col-md-12">
                    <div class="list-count">
                        <div class="row">
                            @isset($dataTransactionGroupByStatus)
                                <div class="col-sm-12">
                                    <div class="list-count">
                                        <div class="row">
                                            @foreach ($dataTransactionGroupByStatus as $item)

                                            <div class="col-md-6 col-sm-12 ">
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
                                        </div>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                 </div>
                 <div class="col-sm-12">
                    <div class="wrap-history" style="font-size:13px;">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                               <thead>
                                  <tr>
                                     <th>ID</th>
                                     <th class="text-nowrap">Thông tin</th>
                                     <th class="text-nowrap">Tổng tiền</th>
                                     {{--
                                     <th class="text-nowrap">Tài khoản</th>
                                     --}}
                                     <th class="text-nowrap">Trạng thái</th>
                                     <th>Thời gian</th>
                                     <th>Action</th>
                                  </tr>
                               </thead>
                               <tbody>
                                   @foreach ($data as $transaction)
                                   <tr>
                                       <td>{{$data->currentPage() * $data->perPage() - $data->perPage() + 1 + $loop->index}}</td>
                                       <td>
                                           <ul>
                                              <li>
                                                 <strong>Họ tên:</strong>  {{ $transaction->name }}
                                              </li>
                                              <li>
                                                <strong>Điện thoại:</strong>   {{ $transaction->phone }}
                                              </li>
                                              <li>
                                                <strong>Email:</strong>   {{ $transaction->email }}
                                              </li>
                                               <li>
                                                   <strong>Mã đơn:</strong>  {{ $transaction->code }}
                                               </li>
                                              @if($transaction->time)
                                              <li>
                                                <strong>Thời gian nhận:</strong> {{ $transaction->time }}
                                              </li>
                                              @endif
                                              @if($transaction->name_orther)
                                              <li>
                                                <strong>Tên người nhận khác:</strong>   {{ $transaction->name_orther }}
                                              </li>
                                              @endif
                                              @if($transaction->phone_orther)
                                              <li>
                                                <strong>Điện thoại người nhận khác:</strong>   {{ $transaction->phone_orther }}
                                              </li>
                                              @endif
                                              @if($transaction->address_orther)
                                              <li>
                                                <strong>Địa chỉ người nhận khác:</strong>   {{ $transaction->address_orther }}
                                              </li>
                                              @endif
                                           </ul>
                                       </td>
                                       <td>
                                           {{-- <span class="tag tag-success"></span> --}}
                                           <ul>
                                              <li>
                                                <strong>Giá trị đơn hàng:</strong>  <span class="text-danger">{{ number_format($transaction->total) }}đ</span>
                                              </li>
                                          </ul>
                                        </td>
                                        {{--
                                       <td class="text-nowrap">{{ $transaction->user_id?'Thành viên':'Khách vãng lai' }}</td>
                                       --}}
                                       <td class="text-nowrap">
                                        @foreach ($listStatus as $status)
                                            @if ($status['status']==$transaction->status)
                                                <span  class="badge badge-@if ($transaction->status<=0)danger @else{{ $transaction->status }}@endif">
                                                    {{ $status['name'] }}
                                                </span>
                                            @endif
                                        @endforeach
                                       </td>
                                       <td>{{ $transaction->created_at }}</td>
                                       <td>
                                        <a class="btn btn-sm btn-info p-1" id="btn-load-transaction-detail" data-url="{{route('profile.transaction.detail',['id'=>$transaction->id])}}" >Chi tiết</a>
                                        </td>
                                    </tr>
                                   @endforeach

                               </tbody>
                            </table>
                         </div>
                       </div>
                 </div>
                 <div class="col-md-12">
                    {{$data->appends(request()->input())->links()}}
                </div>
             </div>



        </div>
    </div>

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

@endsection
@section('js')
      <script>
          $(function(){
            // js load ajax chi tiet don hang
            $(document).on("click", "#btn-load-transaction-detail", function() {
                let contentWrap = $('#loadTransactionDetail');

                let urlRequest = $(this).data("url");
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            contentWrap.html(html);
                            $('#transactionDetail').modal('show');
                        }
                    }
                });
            });
          })
      </script>
@endsection
