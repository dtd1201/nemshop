@extends('admin.layouts.main')
@section('title',"Báo cáo thống kê")
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

.cursor-pointer {
    cursor: pointer;
}

.modal-dialog {
    max-width: 1200px;
    margin: 1.75rem auto;
}

input::placeholder{
    font-size: 12px;
}

</style>
@endsection
@section('content')
   <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>"Thống kê","key"=>"Báo cáo thống kê"])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.report.index') }}" method="GET">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-tools w-100 mb-3">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
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
                                            <div class="form-group col-md-3 mb-0">
                                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="list-count">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="doanhthu" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Doanh thu</span>
                                                    <span class="info-box-number"><strong>{{ number_format($doanhThu) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="doanhthu" class="btn btn-success">Export</button>
                                            <input type="hidden" name="doanhThu" value="{{ $doanhThu }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="sanphamxuat" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Giá vốn hàng bán </span>
                                                    <span class="info-box-number"><strong>{{ number_format($tongBanForUser) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="sanphamxuat" class="btn btn-success">Export</button>
                                            <input type="hidden" name="tongBanForUser" value="{{ $tongBanForUser ?? '0' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="tongthu" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng thu </span>
                                                    <span class="info-box-number"><strong>{{ number_format($tongThu) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="tongthu" class="btn btn-success">Export</button>
                                            <input type="hidden" name="tongThu" value="{{ $tongThu }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="hoahong" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng chi hoa hồng</span>
                                                    <span class="info-box-number"><strong>{{ $totalPoint ? number_format(abs($totalPoint * 1000)) : 0 }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="hoahong" class="btn btn-success">Export</button>
                                            <input type="hidden" name="totalPoint" value="{{ $totalPoint ? ($totalPoint * 1000) : 0 }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="khoanchi" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng các khoản chi khác</span>
                                                    <span class="info-box-number"><strong>{{ number_format($khoanchi) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="khoanchi" class="btn btn-success">Export</button>
                                            <input type="hidden" name="khoanchi" value="{{ $khoanchi }}">
                                            <input type="hidden" name="sanPhamLoi" value="{{ $sanPhamLoi ?? '0' }}">
                                        </div>
                                    </div>                                

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="loinhuan" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Báo cáo kết quả hoạt động kinh doanh</span>
                                                    <span class="info-box-number"><strong>{{ number_format($totalLoiNhuanThuan) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="loinhuan" class="btn btn-success">Export</button>
                                            <input type="hidden" name="tongLoiNhuan" value="{{ $tongLoiNhuan }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="congno" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Công nợ</span>
                                                    <span class="info-box-number"><strong>{{ number_format($no) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="congno" class="btn btn-success">Export</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="thuchi" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Báo cáo thu chi</span>
                                                    <span class="info-box-number"><strong>{{ number_format($thuChi) }}đ</strong></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="export" value="thuchi" class="btn btn-success">Export</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <div class="d-flex align-item-center">
                                            <div class="info-box cursor-pointer mb-0 lb_report" data-type="best_sale" data-url="{{route('admin.report.detail')}}">
                                                <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tài khoản mua nhiều nhất</span>
                                                </div>
                                            </div>
                                            {{--
                                            <button type="submit" name="export" value="best_sale" class="btn btn-success">Export</button>
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--
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
                                        </div>
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
                            --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
<div id="report-detail" class="modal fade update_price" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block">
                <h3 id="title">Báo cáo chi tiết</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>
                @if($start&&$end)
                <div>Từ ngày {{ $start }} đến ngày {{ $end }}</div>
                @endif
                
            </div>
            <div class="modal-body">
                <div id="data">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).on('click','.lb_report', function(){
        let type = $(this).data('type');
        let start = $(".form-control[name='start']").val();
        let end = $(".form-control[name='end']").val();
        let tongThu = {{ $tongThu }};
        let totalPoint = {{ $totalPoint ? ($totalPoint * 1000) : 0 }};
        let khoanchi = {{ $khoanchi }};
        let tongBanForUser = {{ $tongBanForUser ?? 0 }};
        let tongLoiNhuan = {{ $tongLoiNhuan }};
        let sanPhamLoi = {{ $sanPhamLoi ?? 0 }};
        let no = {{ $no }};
        let doanhThu = {{ $doanhThu }};
        if(type != ''){
            let urlRequest = $(this).data('url')+'?'+'type'+'='+type;
            $.ajax({
                url: urlRequest,
                method:"GET",
                data:{start:start, end:end, tongThu:tongThu, totalPoint:totalPoint, khoanchi:khoanchi, tongBanForUser:tongBanForUser, tongLoiNhuan:tongLoiNhuan, no:no, doanhThu:doanhThu, sanPhamLoi:sanPhamLoi},
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#data").html(response.html);
                        $("#title").html(response.title);
                        $('#report-detail').modal('show');
                    }
                }
            })   
        }
    });
</script>
@endsection
