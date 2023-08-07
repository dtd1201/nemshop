@if($type == 1)
    @if($data->count()>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Loại</th>
                <th scope="col" class="text-right">Điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $item->user->username }}</td>
                <td>{{ $typePoint[$item->type]['name'] }}</td>
                <td class="text-right">{{ abs($item->point) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
@endif

@if($type == 2)
    @if($data->count()>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã phiếu</th>
                <th>User</th>
                <th>Thông tin người nhận</th>
                <th>Loại tài khoản</th>
                <th>Địa chỉ</th>
                <th>Mã số thuế</th>
                <th>Số tiền chi</th>
                <th>Ngày chi</th>
                <th>Nội dung chi</th>
                <th>Phụ chi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$item->ma_phieu}}</td>
                <td>
                    @if($item->user_id && $item->loai_tk == 3)
                        {{$item->user->username}}
                    @endif
                </td>
                <td>{{$item->name}}</td>
                <td>
                    @if($item->loai_tk == 1)
                        Nhà cung cấp
                    @elseif($item->loai_tk == 2)
                        Nhân viên
                    @elseif($item->loai_tk == 3)
                        Thành viên
                    @elseif($item->loai_tk == 4)
                        Đại lý
                    @else
                    @endif
                </td>
                <td>{{$item->address}}</td>
                <td>{{$item->mst}}</td>
                <td>{{ number_format($item->money) }}</td>
                <td>
                    @if($item->ngay_chi)
                        {{ Carbon::parse($item->ngay_chi)->format('d-m-Y') }}
                    @else
                        <span>Chưa có</span>
                    @endif
                </td>
                <td>{{$item->content}}</td>
                <td>{{ number_format($item->phu_chi) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
@endif

@if($type == 3)
    @if($data->count()>0 || $data2->count()>0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Người nộp/nhận</th>
                    <th>Mã đơn</th>
                    <th>Thời gian</th>
                    <th>Loại thu chi</th>
                    <th>Tổng tiền</th>
                    <th>Admin xử lý</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = 0;
                @endphp
                @if($data->count()>0)
                    @foreach($data as $item)
                        @php
                            $stt = $stt + 1;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                            <td>Thu tiền từ đơn hàng</td>
                            @if($item->status == 6)
                            <td>{{ number_format($item->total) }} đ</td>
                            @else
                            <td>{{ number_format($item->total - $item->tien_no) }} đ</td>
                            @endif
                            <td>{{ optional($item->admin)->name }}</td>
                        </tr>
                    @endforeach
                @endif

                @if($data2->count()>0)
                    @foreach($data2 as $item)
                        @php
                            $stt = $stt + 1;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->ma_phieu_xuat }}</td>
                            <td>{{ Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                            <td>Thu tiền từ đại lý</td>
                            @if($item->condition == 3)
                            <td>{{ number_format($item->total) }} đ</td>
                            @else
                            <td>{{ number_format($item->total - $item->tien_no) }} đ</td>
                            @endif
                            <td>{{ optional($item->admin)->name }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
@endif

@if($type == 4)
    @if($data->count()>0 || $congNoDaiLy->count()>0)
        @if($data->count()>0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Tài khoản</th>
                    <th>Mã đơn</th>
                    <th>Admin xử lý</th>
                    <th>Ngày đáo hạn</th>
                    <th>Tiền nợ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        {{ $item->phone }}
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ optional($item->user)->username }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ optional($item->admin)->name }}</td>
                    <td>
                        @if($item->due_date)
                            {{ Carbon::parse($item->due_date)->format('d-m-Y H:i:s') }}
                        @else
                            Chưa có
                        @endif
                    </td>
                    <td>{{ number_format($item->tien_no) }} đ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if($congNoDaiLy->count()>0)
            <h2>Danh sách công nợ của đại lý</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="30px">STT</th>
                        <th width="100px">Tên phiếu</th>
                        <th width="100px">Mã phiếu</th>
                        <th width="100px">Đại lý</th>
                        <th width="100px">Người tạo</th>
                        <th width="100px">Người duyệt</th>
                        <th width="100px">Ngày xuất</th>
                        <th width="100px">Ngày tạo</th>
                        <th width="100px">Ngày đáo hạn</th>
                        <th width="100px">Tiền nợ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $modelProduct = new \App\Models\Product;
                        $totalAll = 0;
                    @endphp
                    @foreach ($congNoDaiLy as $item)
                        
                        @php
                            $totalAll = $totalAll + $item->tien_no;
                        @endphp
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
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
                            <td>
                                @if($item->ngay_xuat)
                                    {{ Carbon::parse($item->ngay_xuat)->format('d-m-Y') }}
                                @else
                                    <span>Chưa có</span>
                                @endif
                            </td>
                            <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td>
                                @if($item->due_date)
                                    {{ Carbon::parse($item->due_date)->format('d-m-Y H:i:s') }}
                                @else
                                    Chưa có
                                @endif
                            </td>
                            <td>
                                {{ number_format($item->tien_no) }} đ
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
@endif

@if($type == 5)
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="300px">&nbsp;</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Doanh thu bán hàng</td>
                <td>{{ number_format($doanhThu) }} đ</td>
            </tr>
            <tr>
                <td>Giảm trừ doanh thu</td>
                <td>{{ number_format($sanPhamLoi) }} đ</td>
            </tr>
            <tr>
                <td>Chiết khấu hóa đơn</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Giá trị hàng bán bị trả lại</td>
                <td>{{ number_format($sanPhamLoi) }} đ</td>
            </tr>
            <tr>
                <td>Doanh thu thuần</td>
                <td>{{ number_format($doanhThu - $sanPhamLoi) }} đ</td>
            </tr>
            <tr>
                <td>Giá vốn bán hàng</td>
                <td>{{ number_format($tongBanForUser) }} đ</td>
            </tr>
            <tr>
                <td>Lợi nhuận gộp về bán hàng</td>
                <td>{{ number_format($doanhThu - $sanPhamLoi - $tongBanForUser) }} đ</td>
            </tr>
            <tr>
                <td>Tổng chi hoa hồng</td>
                <td>{{ number_format(abs($totalPoint)) }} đ</td>
            </tr>
            <tr>
                <td>Tổng các khoản chi khác</td>
                <td>{{ number_format($khoanchi) }} đ</td>
            </tr>
            <tr>
                <td>Lợi nhuận từ hoạt động kinh doanh</td>
                <td>{{ number_format( $doanhThu - $sanPhamLoi - ($tongBanForUser + $khoanchi + abs($totalPoint))) }} đ</td>
            </tr>
            <tr>
                <td>Thu nhập khác</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Chi phí khác</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Lợi nhuận thuần</td>
                <td>{{ number_format( $doanhThu - $sanPhamLoi - ($tongBanForUser + $khoanchi + abs($totalPoint))) }} đ</td>
            </tr>
        </tbody>
    </table>
    <!-- <div>Công thức: Tổng thu - (Giá vốn hàng bán + Khoản Chi + Chi hoa hồng) = Lợi nhuận</div>
    <br>
    <div>Kết quả: {{number_format($tongThu)}} - ({{number_format($tongBanForUser)}} + {{number_format($khoanchi)}} + {{number_format($totalPoint)}}) = {{number_format($tongLoiNhuan)}}đ</div> -->
@endif

@if($type == 6)
    @if(isset($data) && $data->count()>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="30">#</th>
                <th>Thời gian</th>
                <th>Doanh thu bán hàng</th>
                <th>Giá trị trả</th>
                <th>Doanh thu thuần</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
                $total2 = 0;
            @endphp
            @foreach($data as $item)
                @php
                    $total = $total + (($item->money / 1.1) - $item->amount);
                    $total2 = $total2 + ($item->money / 1.1);
                @endphp
            <tr>
                <td><a target="_blank" href="{{ route('admin.report.doanhThuDetail', ['date' => $item->date]) }}"><i class="fas fa-plus-square"></i></a></td>
                <td>{{ Carbon::parse($item->date)->format('d-m-Y') }}</td>
                <td>{{ number_format($item->money / 1.1) }} đ</td>
                <td>{{ number_format($item->amount) }} đ</td>
                <td>{{ number_format(($item->money / 1.1) -  $item->amount) }} đ</td>
            </tr>
            @endforeach
            <tr>
                <td>Tổng:</td>
                <td></td>
                <td>{{ number_format($total2) }} đ</td>
                <td></td>
                <td>{{ number_format($total) }} đ</td>
            </tr>
        </tbody>
    </table>
    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
@endif

@if($type == 7)
    @if($data->count()>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Mã phiếu xuất</th>
                <th>Mã đơn</th>
                <th>Giá nhập</th>
                <th>Số lượng xuất</th>
                <th>Tổng</th>
                <th>Tên lô hàng</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->masp }}</td>
                <td>{{ $item->phieuxuat->ma_phieu_xuat }}</td>
                <td>{{ $item->phieuxuat->transaction_code }}</td>
                <td>{{ number_format($item->cost) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->cost * $item->quantity) }}</td>
                <td>{{ $item->lohang->name }}</td>
                <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
@endif

@if($type == 8)
    {{--
    @if($data->count()>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tài khoản</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ optional($item->user)->username }}</td>
                <td>{{ $item->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Không có dữ liệu hiển thị!</div>
    @endif
    --}}

    @php
        $modelPoint = new App\Models\Point;
    @endphp
    <div class="row">
        <div class="col-sm-6">
            <div>
                <h4>Tài khoản mua nhiều nhất cây Đại Lý</h4>
                @if(isset($userDaiLy) && $userDaiLy->count()>0)
                    @php
                        $totalPoint1 = $modelPoint->sumPointCurrent($userDaiLy->user_id);
                        $pointRut1 = $modelPoint->where('user_id', $userDaiLy->user_id)->where('type', 5)->get()->sum('point');
                    @endphp
                    <div class="">
                        Tài khoản: <b>{{ optional($userDaiLy->user)->username }}</b>
                    </div>
                    <div class="">
                        Số điểm còn lại: <b>{{ $totalPoint1 }}</b>
                    </div>
                    <div class="">
                        Số điểm đã rút: <b>{{ abs($pointRut1) }}</b>
                    </div>
                    <div class="">
                        Số điểm mua hàng: <b>{{ $userDaiLy->total }}</b>
                    </div>
                @else
                    Chưa có thông tin
                @endif
            </div>

        </div>
        <div class="col-sm-6">
            <div>
                <h4>Tài khoản mua nhiều nhất cây Nhà Thuốc</h4>
                @if(isset($userNhaThuoc) && $userNhaThuoc->count()>0)
                    @php
                        $totalPoint2 = $modelPoint->sumPointCurrent($userNhaThuoc->user_id);
                        $pointRut2 = $modelPoint->where('user_id', $userNhaThuoc->user_id)->where('type', 5)->get()->sum('point');
                    @endphp
                    <div class="">
                        Tài khoản: <b>{{ optional($userNhaThuoc->user)->username }}</b>
                    </div>
                    <div class="">
                        Số điểm còn lại: <b>{{ $totalPoint2 }}</b>
                    </div>
                    <div class="">
                        Số điểm đã rút: <b>{{ abs($pointRut2) }}</b>
                    </div>
                    <div class="">
                        Số điểm mua hàng: <b>{{ $userNhaThuoc->total }}</b>
                    </div>
                @else
                    Chưa có thông tin
                @endif
            </div>
        </div>
    </div>
@endif

@if($type == 9)
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th class="text-right">Tổng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tổng thu</td>
                <td class="text-right">{{ number_format($tongThu) }} đ</td>
            </tr>
            <tr>
                <td>Giá vốn hàng bán</td>
                <td class="text-right">{{ number_format($tongBanForUser) }} đ</td>
            </tr>
            <tr>
                <td>Chi phí hàng lỗi trong kì</td>
                <td class="text-right">{{ number_format($sanPhamLoi) }} đ</td>
            </tr>
            <tr>
                <td>Tổng chi hoa hồng</td>
                <td class="text-right">{{ number_format(abs($totalPoint)) }} đ</td>
            </tr>
            <tr>
                <td>Tổng các khoản chi khác</td>
                <td class="text-right">{{ number_format($khoanChi) }} đ</td>
            </tr>
            <tr>
                <td>Tổng lợi nhuận thuần</td>
                <td class="text-right">{{ number_format($tongThu - ($tongBanForUser + abs($totalPoint) + $khoanChi + $sanPhamLoi)) }} đ</td>
            </tr>
        </tbody>
    </table>
@endif
