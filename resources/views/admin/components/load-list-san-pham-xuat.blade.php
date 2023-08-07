@if(isset($data) && $data->count()>0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Giá nhập</th>
                <th>Số lượng xuất</th>
                <th>Tên lô hàng</th>
                <th>Hạn sử dụng</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->products()->latest()->get() as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->masp }}</td>
                <td>{{ number_format($item->cost) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->lohang->name }}</td>
                <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
                <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif