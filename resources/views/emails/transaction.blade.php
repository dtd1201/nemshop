<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin đặt hàng</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-4.5.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/stylesheet-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/cart.css') }}">
    <style>
        .container{
            max-width: 800px;
            margin: 0 auto;
            background-color: #eee;
            padding:40px;
            border-radius: 10px;
        }
        h1{
            font-size: 20px;
            color: #000;
            font-weight: bold;
            margin: 0 0;
            text-align: center;
        }
        ul,li{
            list-style: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="wrap-email">
        <div class="container">
            <div class="row">
      
                <div class="col-sm-12">
                    <h1 style="text-align:center; text-transform: uppercase;">Thông tin đặt hàng</h1>
                    <ul style="padding: 0; margin-bottom: 20px;">
						<li>Chúng tôi đã xác nhận thông tin đặt hàng cho quý khách hàng với những nội dung sau:</li>
                        <li>Họ tên: {{ $transaction->name }}</li>
                        <li>Số điện thoại: {{ $transaction->phone }}</li>
                        <li>Email: {{ $transaction->email }}</li>
                        <li>Địa chỉ giao hàng: {{ $transaction->address_detail }}, {{ $transaction->commune->name }}, {{ $transaction->district->name }}, {{ $transaction->city->name }}</li>
                        {{-- <li>Hình thức thanh toán: {{ transaction($orderCart->setting)->name }}</li> --}}
                        <li>Ghi chú: {{ $transaction->note ?? 'Không' }}</li>
                    </ul>
                    <table class="table table-bordered" style="border: solid 1px #eee">
                        <thead>
                           <tr>
                              <th style="width: 10px">STT</th>
                         
                              <th>Tên sản phẩm</th>
                              <th class="text-nowrap">Số lượng</th>
                              <th class="text-nowrap">Thành tiền</th>
                           </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($transaction->orders as $order)
                                @php
                                    $i++;
                                @endphp
                            <tr>
                                <td>{{ $i }}</td>
                    
                                <td>
                                    {{ $order->name }}
                                </td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ number_format($order->new_price) }}</td>
                            </tr>
                           @endforeach
                            <tr>
                                <td colspan="3">Tổng tiền:</td>
                                <td>{{ number_format($transaction->total) }} đ</td>
                            </tr>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
