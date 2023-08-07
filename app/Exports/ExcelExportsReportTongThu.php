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

class ExcelExportsReportTongThu implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $tongThu;
    private $tongThu2;
    public function __construct($start, $end, $data, $data2)
    {
        $this->start=$start;
        $this->end=$end;
        $this->tongThu = $data;
        $this->tongThu2 = $data2;
        $this->selectField="*";
        $this->title=true;
        $this->titleField= [
            "order" => "STT",
            "name"=>  "Người nộp/nhận",
            "ma_don" => "Mã đơn",
            "thoi_gian" => "Thời gian",
            "loai" => "Loại thu chi",
            "total"=> "Tổng tiền",
        ];
    }

    public function array(): array
    {
        $data=[];
        $stt = 0;
        if($this->tongThu->count()>0){
            foreach ($this->tongThu as $index => $value) {
                $stt = $stt + 1;
                $item=[];
                $item['order'] = $stt;
                $item['name'] = $value->name ? $value->name:'Chưa cập nhập';
                $item['ma_don'] = $value->code ? $value->code:'Chưa cập nhập';
                $item['thoi_gian'] = Carbon::parse($value->updated_at)->format('d/m/Y');
                $item['loai'] = "Thu tiền từ đơn hàng";
                if ($value->status == 6) {
                    $item['total'] = $value->total;
                } else {
                    $item['total'] = $value->total - $value->tien_no;
                }
                array_push($data,$item);
            }
        }

        if($this->tongThu2->count()>0){
            foreach ($this->tongThu2 as $index => $value) {
                $stt = $stt + 1;
                $item=[];
                $item['order'] = $stt;
                $item['name'] = $value->name ? $value->name:'Chưa cập nhập';
                $item['ma_don'] = $value->ma_phieu_xuat ? $value->ma_phieu_xuat:'Chưa cập nhập';
                $item['thoi_gian'] = Carbon::parse($value->updated_at)->format('d/m/Y');
                $item['loai'] = "Thu tiền từ đại lý";
                if ($value->condition == 3) {
                    $item['total'] = $value->total;
                } else {
                    $item['total'] = $value->total - $value->tien_no;
                }
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
                ['Báo cáo Tổng thu'],
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
        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');
        $sheet->mergeCells('A3:F3');
        $sheet->getStyle('A1:F1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:F2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:F3')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:F4';
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
