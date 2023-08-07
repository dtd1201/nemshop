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

class ExcelExportsReportBestSale implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $typePoint;
    private $bestSale;
    public function __construct($start,$end,$data)
    {
        $this->start=$start;
        $this->end=$end;
        $this->bestSale = $data;
        $this->selectField="*";
        $this->title=true;
        $this->typePoint = config('point.typePoint');
        $this->titleField= [
            "order" => "STT",
            "user"=>  "Tài khoản",
            "point"=>  "Điểm",
        ];
    }

    public function array(): array
    {
        $data=[];
        if($this->bestSale->count()>0){
            foreach ($this->bestSale as $index => $value) {
                $item=[];
                $item['order'] = $index + 1;
                $item['user'] = optional($value->user)->username;
                $item['point'] = $value->total;
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
                ['Tài khoản mua hàng nhiều nhất theo thời gian'],
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
        $sheet->mergeCells('A1:C1');
        $sheet->mergeCells('A2:C2');
        $sheet->mergeCells('A3:C3');
        $sheet->getStyle('A1:C1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:C2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:C3')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:C4';
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
