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

class ExcelExportsReportDoanhThu implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $data;
    public function __construct($start, $end, $data)
    {
        $this->start=$start;
        $this->end=$end;
        $this->data = $data;
        $this->selectField="*";
        $this->title=true;
        $this->titleField= [
            "thoi_gian" => "Thời gian",
            "tong_thu" => "Doanh thu bán hàng",
            "khoan_chi" => "Giá trị trả",
            "doanh_thu"=>  "Doanh thu thuần",
        ];
    }

    public function array(): array
    {
        $data=[];
        if($this->data->count()>0){
            $total = 0;
            $total2 = 0;
            foreach ($this->data as $index => $value) {
                $total = $total + (($value->money / 1.1) - $value->amount);
                $total2 = $total2 + ($value->money / 1.1);
                $item=[];
                $item['thoi_gian'] = Carbon::parse($value->date)->format('d/m/Y');
                $item['tong_thu'] = $value->money / 1.1;
                $item['khoan_chi'] = $value->amount ?? 0;
                $item['doanh_thu'] = ($value->money / 1.1) - $value->amount;
                array_push($data,$item);
            }
            $arrayTotal = [
                'thoi_gian' => 'Tổng:',
                'tong_thu' => $total2,
                'khoan_chi' => '',
                'doanh_thu' => $total
            ];
            array_push($data,$arrayTotal);
        }
        return $data;
    }
// add title for file export
    public function headings(): array
    {
        if($this->title){
            return [
                ['Doanh thu bán hàng theo thời gian'],
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
        $sheet->mergeCells('A1:D1');
        $sheet->mergeCells('A2:D2');
        $sheet->mergeCells('A3:D3');
        $sheet->getStyle('A1:D1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:D2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:D3')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:D4';
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
