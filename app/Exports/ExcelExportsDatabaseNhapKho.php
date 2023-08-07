<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;
class ExcelExportsDatabaseNhapKho implements FromArray, WithHeadings
{
    private $model;
    private $excelfile;
    private $selectField;
    private $title;
    private $titleField;
    private $start;
    private $end;
    public function __construct($start,$end)
    {
        $this->start = $start;
        $this->end = $end;
        $nameModel ='\App\Models\NhapKho';
        $this->model = new $nameModel;
        $this->selectField = "*";
        $this->title = true;
        $this->titleField = [
            "id" => "ID",
            "masp"=>  "Mã sản phẩm",
            "name"=>  "Tên sản phẩm",
            "cost"=> "Giá nhập",
            "quantity" => "Số lượng",
            "admin" => "Người nhập",
            "han_su_dung"=> "Hạn sử dụng",
            "lohang" => "Lô hàng",
            "created_at" => "Ngày nhập",
            "status" => "Trạng thái",
        ];
    }

    public function array(): array
    {
        $data=[];
       // dd($this->start,$this->end);
        $pay=$this->model->whereBetween('created_at',[$this->start,$this->end])->select($this->selectField)->get();
        if($pay->count()>0){
            foreach ($pay as $index => $value) {
                $item=[];
                $item['id']=$index + 1;
                $item['masp']=$value->masp;
                $item['name']=$value->name;
                $item['cost']=$value->cost;
                $item['quantity']=$value->quantity;
                $item['admin']=$value->admin->name;
                $item['han_su_dung'] = Carbon::parse($value->han_su_dung)->format('d-m-Y');
                $item['lohang']=$value->lohang->name;
                $item['created_at'] = Carbon::parse($value->created_at)->format('d-m-Y H:i:s');
                $item['status']=$value->status ? 'Đã thanh toán':'Chưa thanh toán';
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
