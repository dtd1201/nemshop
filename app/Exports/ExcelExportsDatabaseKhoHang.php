<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;
class ExcelExportsDatabaseKhoHang implements FromArray, WithHeadings
{
    private $model;
    private $excelfile;
    private $selectField;
    private $title;
    private $titleField;
    public function __construct()
    {
        $nameModel ='\App\Models\KhoHang';
        $this->model = new $nameModel;
        $this->selectField = "*";
        $this->title = true;
        $this->titleField = [
            "id" => "ID",
            "masp"=>  "Mã sản phẩm",
            "name"=>  "Tên sản phẩm",
            "cost"=> "Giá nhập",
            "quantity" => "Số lượng tồn",
            "sell_number" => "Số lượng bán",
            "so_luong_loi" => "Số lượng lỗi",
            "han_su_dung"=> "Hạn sử dụng",
            "lohang" => "Lô hàng",
        ];
    }

    public function array(): array
    {
        $data=[];
       // dd($this->start,$this->end);
        $pay=$this->model->select($this->selectField)->get();
        if($pay->count()>0){
            foreach ($pay as $index => $value) {
                $item=[];
                $item['id']=$index + 1;
                $item['masp']=$value->masp;
                $item['name']=$value->name;
                $item['cost']=$value->cost;
                $item['quantity']=$value->quantity;
                $item['sell_number']=$value->sell_number;
                $item['so_luong_loi']=$value->so_luong_loi;
                $item['han_su_dung'] = Carbon::parse($value->han_su_dung)->format('d-m-Y');
                $item['lohang']=$value->lohang->name;
                array_push($data,$item);
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
