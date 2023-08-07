<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;
use App\Models\SanPhamXuat;
use App\Models\Transaction;
class ExcelExportsDatabaseXuatKho implements FromArray, WithHeadings
{
    private $model;
    private $excelfile;
    private $selectField;
    private $title;
    private $titleField;
    private $start;
    private $end;
    private $status;
    private $typePhieuXuat;
    public function __construct($start,$end, $status)
    {
        $this->start = $start;
        $this->end = $end;
        $this->status = $status;
        $nameModel ='\App\Models\XuatKho';
        $this->model = new $nameModel;
        $this->selectField = "*";
        $this->typePhieuXuat = config('point.typePhieuXuat');
        $this->title = true;
        $this->titleField = [
            "id" => "ID",
            "masp"=>  "Mã sản phẩm",
            "name"=>  "Tên sản phẩm",
            "cost"=> "Giá nhập",
            "quantity" => "Số lượng",
            "admin" => "Người tạo",
            "admin_duyet" => "Người duyệt",
            "nguoi_nhan" => "Người nhận",
            "phone" => "Điện thoại",
            "email" => "Email",
            "address" => "Địa chỉ",
            "phuong_xa" => "Phường/Xã",
            "quan_huyen" => "Quận/Huyện",
            "tinh_thanh" => "Tỉnh/Thành Phố",
            "han_su_dung"=> "Hạn sử dụng",
            "lohang" => "Lô hàng",
            "username" => "Tài khoản",
            "agency" => "Đại lý",
            "transaction_code" => "Mã đơn hàng",
            "ma_phieu_xuat" => "Mã phiếu xuất",
            "loai_phieu" => "Loại phiếu",
            "ngay_xuat" => "Ngày xuất",
        ];
    }

    public function array(): array
    {
        $data=[];
       // dd($this->start,$this->end);
        if($this->status != ''){
            $dataSp = $this->model->with('products')->whereBetween('ngay_xuat',[$this->start,$this->end])->where('status', $this->status)->select($this->selectField)->get();
        } else {
            $dataSp = $this->model->with('products')->whereBetween('ngay_xuat',[$this->start,$this->end])->select($this->selectField)->get();
        }

        $stt = 0;
        if($dataSp->count()>0){
            foreach ($dataSp as $index => $value) {
                $agency = '';
                $username = '';
                $transaction_code = '';
                $ma_phieu_xuat = $value->ma_phieu_xuat;

                $admin = $value->admin->name;
                $admin_duyet = $value->adminDuyet->name;
                $ngay_xuat = $value->ngay_xuat;

                $transation = null;
                if($value->transaction_code){
                    $transation = Transaction::where('code', $value->transaction_code)->first();
                }

                if ($value->user_id) {
                    $username = $value->user->username;
                }

                if ($value->agency_id) {
                    $agency = $value->agency->name;
                }

                if ($value->transaction_code) {
                    $transaction_code = $value->transaction_code;
                }

                foreach ($value['products'] as $key => $product) {
                    $stt = $stt + 1;
                    $item = [];
                    $item['id'] = $stt;
                    $item['masp'] = $product->masp;
                    $item['name'] = $product->name;
                    $item['cost'] = $product->cost;
                    $item['quantity'] = $product->quantity;
                    $item['admin'] = $admin; 
                    $item['admin_duyet'] = $admin_duyet;
                    $item['nguoi_nhan'] = $transation ? $transation->name : "Chưa có";
                    $item['phone'] = $transation ? $transation->phone : "Chưa có";
                    $item['email'] = $transation ? $transation->email : "Chưa có";
                    $item['address'] = $transation ? $transation->address_detail : "Chưa có";
                    $item['phuong_xa'] = $transation ? $transation->commune->name : "Chưa có";
                    $item['quan_huyen'] = $transation ? $transation->district->name : "Chưa có";
                    $item['tinh_thanh'] = $transation ? $transation->city->name : "Chưa có";
                    $item['han_su_dung'] = Carbon::parse($product->han_su_dung)->format('d-m-Y');
                    $item['lohang'] = $product->lohang->name;
                    $item['username'] = $username;
                    $item['agency'] = $agency;
                    $item['transaction_code'] = $transaction_code;
                    $item['ma_phieu_xuat'] = $ma_phieu_xuat;
                    $item['loai_phieu'] = $this->typePhieuXuat[$value->type]['name'];
                    $item['ngay_xuat'] = Carbon::parse($ngay_xuat)->format('d-m-Y');
                    array_push($data,$item);
                }
                
            }
        }

        // dd($data);
        return $data;
    }
    // add title for file export
    public function headings(): array
    {
        if($this->title){
            return $this->titleField;
        }
        else{
            return [];
        }
    }
}
