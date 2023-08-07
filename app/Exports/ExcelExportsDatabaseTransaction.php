<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExportsDatabaseTransaction implements FromArray, WithHeadings
{
    private $model;
    private $excelfile;
    private $selectField;
    private $title;
    private $titleField;
    private $start;
    private $end;
    private $status;

    public function __construct($start, $end, $status)
    {
        $this->start = $start;
        $this->end = $end;
        $this->status = $status;
        $nameModel = '\App\Models\Transaction';
        $this->model = new $nameModel;
        $this->selectField = "*";
        $this->title = true;
        // $this->typeUser=config('');
        $this->titleField = [
            "order" => "STT",
            "ma_don" => "Mã đơn",
            // "name_sp" => "Tên sản phẩm",
            // "quantity" => "Số lượng",
            "gia_tri_don_hang" => "Giá trị đơn hàng",
            "gia_goc" => "Giá gốc",
            "gia_tri_chiet_khau" => "Phần trăm chiết khấu (%)",
            "username" => "Username",
            "name" => "Họ tên",
            "phone" => "Số điện thoại",
            "email" => "Email",
            "address" => "Địa chỉ",
            "phuong_xa" => "Phường/Xã",
            "quan_huyen" => "Quận/Huyện",
            "tinh_thanh" => "Tỉnh/Thành Phố",
            'created_at' => "Thời gian đặt",
            'time_ship' => "Thời gian giao",
            'ngay_dao_han' => "Ngày đáo hạn",
            'no' => "Tiền nợ",
            'status' => "Trạng thái",
        ];
    }

    public function array(): array
    {
        $data = [];
        // dd($this->start,$this->end);
        if ($this->status) {
            $transaction = $this->model->with('orders')->whereBetween('created_at', [$this->start, $this->end])->where('status', $this->status)->select($this->selectField)->latest()->get();
        } else {
            $transaction = $this->model->with('orders')->whereBetween('created_at', [$this->start, $this->end])->select($this->selectField)->latest()->get();
        }

        if ($transaction->count() > 0) {
            $stt = 0;
            foreach ($transaction as $index => $value) {
                $username = $value->user->username;
                $transaction_code = $value->code;
                $phone = $value->phone;
                $email = $value->email;
                $name = $value->name;
                $address = $value->address_detail;
                $created_at = $value->created_at;
                $time_ship = $value->time_ship;
                $commune = $value->commune->name;
                $district = $value->district->name;
                $city = $value->city->name;

                // foreach ($value['orders'] as $key => $product) {
                $stt = $stt + 1;
                $item = [];
                $item['order'] = $stt;
                $item['ma_don'] = $transaction_code;
                // $item['name_sp'] = $product->name;
                // $item['quantity'] = $product->quantity;
                $item['gia_tri_don_hang'] = $value->total;
                $item['gia_goc'] = $value->total_origin;
                $item['gia_tri_chiet_khau'] = $value->sale ? $value->sale : 0;
                $item['username'] = $username;
                $item['name'] = $name;
                $item['phone'] = $phone;
                $item['email'] = $email;
                $item['address'] = $address ? $address : 'Chưa cập nhập';
                $item['phuong_xa'] = $value->commune_id ? $commune : 'Chưa cập nhập';
                $item['quan_huyen'] = $value->district_id ? $district : 'Chưa cập nhập';
                $item['tinh_thanh'] = $value->city_id ? $city : 'Chưa cập nhập';
                $item['created_at'] = date_format($created_at, 'd-m-Y H:i:s');
                $item['time_ship'] = $time_ship ? date_format($created_at, 'd-m-Y H:i:s') : 'Chưa có';
                $item['ngay_dao_han'] = $value->created_at ? date_format($value->created_at, 'd-m-Y') : '';
                $item['no'] = $value->tien_no ? number_format($value->tien_no) : '';
                $item['status'] = $this->model->listStatus[$value->status]['name'];
                array_push($data, $item);
                // }
            }
        }

        //  dd($data);
        return $data;
    }

    // add title for file export
    public function headings(): array
    {
        if ($this->title) {
            return $this->titleField;
        } else {
            return [];
        }
    }
}
