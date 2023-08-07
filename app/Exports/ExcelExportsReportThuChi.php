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

class ExcelExportsReportThuChi implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $totalPoint;
    private $khoanchi;
    private $tongBanForUser;
    private $tongLoiNhuan;
    private $sanPhamLoi;
    public function __construct($start, $end, $tongThu, $totalPoint, $khoanchi, $tongBanForUser, $sanPhamLoi)
    {
        $this->start=$start;
        $this->end=$end;
        $this->tongThu = $tongThu;
        $this->totalPoint = $totalPoint;
        $this->khoanchi = $khoanchi;
        $this->tongBanForUser = $tongBanForUser;
        $this->sanPhamLoi = $sanPhamLoi;
        $this->tongLoiNhuan = $tongThu - $khoanchi - abs($totalPoint) - $tongBanForUser - $sanPhamLoi;
        $this->selectField="*";
        $this->title=true;
        $this->titleField= [
            "",
            "Tổng",
        ];
    }

    public function array(): array
    {
        $data=[
            [
                "Tổng thu",
                $this->tongThu ? number_format($this->tongThu) : '0'
            ],
            [
                "Giá vốn hàng bán",
                $this->tongBanForUser ? number_format($this->tongBanForUser) : '0'
            ],
            [
                "Chi phí hàng lỗi trong kì",
                $this->sanPhamLoi ? number_format($this->sanPhamLoi) : '0'
            ],
            [
                "Tổng chi hoa hồng",
                $this->totalPoint ? number_format(abs($this->totalPoint)) : '0'
            ],
            [
                "Tổng các khoản chi khác",
                $this->khoanchi ? number_format($this->khoanchi) : '0'
            ],
            [
                "Tổng lợi nhuận thuần",
                $this->tongLoiNhuan ? number_format($this->tongLoiNhuan) : '0'
            ],
        ];
        return $data;
    }
// add title for file export
    public function headings(): array
    {
        if($this->title){
            return [
                ['Báo cáo thu chi'],
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
        $sheet->mergeCells('A1:B1');
        $sheet->mergeCells('A2:B2');
        $sheet->mergeCells('A3:B3');
        $sheet->getStyle('A1:B1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:B2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:B3')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:B4';
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
