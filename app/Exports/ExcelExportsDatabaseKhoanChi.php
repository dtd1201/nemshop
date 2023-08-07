<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;
class ExcelExportsDatabaseKhoanChi implements FromArray, WithHeadings
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
        $nameModel ='\App\Models\KhoanChi';
        $this->model = new $nameModel;
        $this->selectField = "*";
        $this->title = true;
        $this->titleField = [
            "id" => "ID",
            "ma_phieu"=>  "Mã phiếu",
            "username"=> "Tài khoản",
            "name"=> "Thông tin người nhận",
            "address"=> "Địa chỉ",
            "mst"=> "Mã số thuế",
            "money" => "Số tiền chi",
            "ngay_chi"=> "Ngày chi",
            "content" => "Nội dung chi",
            "admin_duyet" => "Người duyệt",
            "phu_chi" => "Phụ chi",
        ];
    }

    public function array(): array
    {
        $data=[];
       // dd($this->start,$this->end);
        $pay=$this->model->whereBetween('created_at',[$this->start,$this->end])->where(['status'=>1])->select($this->selectField)->get();
        if($pay->count()>0){
            foreach ($pay as $index => $value) {
                $item=[];
                $item['id']=$index + 1;
                $item['ma_phieu']=$value->ma_phieu;
                $item['username']=$value->user->username?$value->user->username:'Không có';
                $item['name']=$value->name?$value->name:'Chưa cập nhập';
                $item['address']=$value->address?$value->address:'Chưa cập nhập';
                $item['mst']=$value->mst?$value->mst:'Chưa cập nhập';
                $item['money']=$value->money;
                $item['ngay_chi'] = Carbon::parse($value->ngay_chi)->format('d-m-Y H:i:s');
                $item['content']=$value->content?$value->content:'Chưa cập nhập';
                $item['admin_duyet']=$value->adminDuyet->name;
                $item['phu_chi']=$value->phu_chi?$value->phu_chi:'Không có';
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
