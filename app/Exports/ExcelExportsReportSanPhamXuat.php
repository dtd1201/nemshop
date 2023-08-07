<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Carbon;

class ExcelExportsReportSanPhamXuat implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
{
    use RegistersEventListeners;
    private $model;
    private $excelfile;
    private $selectField;
    private $title;
    private $titleField;
    private $start;
    private $end;
    private $typeUser;
    private $sanPhamXuat;
    public function __construct($start,$end,$data)
    {
        $this->start=$start;
        $this->end=$end;
        $this->sanPhamXuat = $data;
        $nameModel ='\App\Models\User';
        $this->model= new $nameModel;
        $this->selectField="*";
        $this->title=true;
        $this->titleField= [
            "order" => "STT",
            "name_sp"=>  "Tên sản phẩm",
            "ma_sp" => "Mã sản phẩm",
            "ma_phieu" => "Mã phiếu xuất",
            "ma_don" => "Mã đơn",
            "price"=> "Giá nhập",
            "quantity" => "Số lượng",
            "total" => "Tổng",
            "lo_hang" => "Lô hàng",
            "created_at" => "Ngày tạo",
        ];
    }

    public function array(): array
    {
        $data=[];
        if($this->sanPhamXuat->count()>0){
            foreach ($this->sanPhamXuat as $index => $value) {
                $item=[];
                $item['order'] = $index + 1;
                $item['name_sp'] = $value->name ? $value->name:'Chưa cập nhập';
                $item['ma_sp'] = $value->masp ? $value->masp:'Chưa cập nhập';
                $item['ma_phieu'] = $value->phieuxuat->ma_phieu_xuat;
                $item['ma_don'] = $value->phieuxuat->transaction_code;
                $item['price'] = $value->cost ? $value->cost:'Chưa cập nhập';
                $item['quantity'] = $value->quantity ? $value->quantity:'Chưa cập nhập';
                $item['total'] = $value->cost * $value->quantity;
                $item['lo_hang'] = $value->lohang->name;
                $item['created_at'] = Carbon::parse($value->created_at)->format('d/m/Y');
                array_push($data,$item);
            }
        }

        return $data;
    }
// add title for file export
    public function headings(): array
    {
        if($this->title){
            return [
                ['Báo cáo giá vốn hàng bán'],
                ['Từ ngày '.Carbon::parse($this->start)->format('d/m/Y').' đến ngày '.Carbon::parse($this->end)->format('d/m/Y')],
                ['Ngày lập phiếu: '.Carbon::now()->format('d/m/Y')],
                $this->titleField
            ];
        }
        else{
            return [];
        }
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:H1');
        $sheet->mergeCells('A2:H2');
        $sheet->mergeCells('A3:H3');
        $sheet->getStyle('A1:H1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:H2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:H3')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:H4';
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFont()
                    ->setSize(13)
                    ->getColor()->setRGB('000000');
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('dcf4fc');
            }
        ];
    }
}
