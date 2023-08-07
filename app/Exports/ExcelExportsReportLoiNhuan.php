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

class ExcelExportsReportLoiNhuan implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $doanhThu;
    private $sanPhamLoi;
    public function __construct($start, $end, $totalPoint, $khoanchi, $tongBanForUser, $doanhThu, $sanPhamLoi)
    {
        $this->start=$start;
        $this->end=$end;
        $this->totalPoint = $totalPoint;
        $this->khoanchi = $khoanchi;
        $this->tongBanForUser = $tongBanForUser;
        $this->doanhThu = $doanhThu;
        $this->sanPhamLoi = $sanPhamLoi;
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
                "Doanh thu bán hàng",
                $this->doanhThu ? number_format($this->doanhThu) : "0"
            ],
            [
                "Giảm trừ doanh thu",
                $this->sanPhamLoi ? number_format($this->sanPhamLoi) : '0'
            ],
            [
                "Chiết khấu hóa đơn",
                "-"
            ],
            [
                "Giá trị hàng bán bị trả lại",
                $this->sanPhamLoi ? number_format($this->sanPhamLoi) : '0'
            ],
            [
                "Doanh thu thuần",
                $this->doanhThu ? number_format($this->doanhThu - ($this->sanPhamLoi ?? 0)) : '0'
            ],
            [
                "Giá vốn bán hàng",
                $this->tongBanForUser ? number_format($this->tongBanForUser) : '0'
            ],
            [
                "Lợi nhuận gộp về bán hàng",
                number_format($this->doanhThu - ($this->sanPhamLoi ?? 0) - $this->tongBanForUser)
            ],
            [
                "Tổng chi hoa hồng",
                number_format(abs($this->totalPoint))
            ],
            [
                "Tổng các khoản chi khác",
                number_format($this->khoanchi)
            ],
            [
                "Lợi nhuận từ hoạt động kinh doanh",
                number_format( $this->doanhThu - ($this->sanPhamLoi ?? 0) - ($this->tongBanForUser + $this->khoanchi + abs($this->totalPoint)))
            ],
            [
                "Thu nhập khác",
                "-"
            ],
            [
                "Chi phí khác",
                "-"
            ],
            [
                "Lợi nhuận thuần",
                number_format( $this->doanhThu - ($this->sanPhamLoi ?? 0) - ($this->tongBanForUser + $this->khoanchi + abs($this->totalPoint)))
            ],
        ];
        return $data;
    }
// add title for file export
    public function headings(): array
    {
        if($this->title){
            return [
                ['Báo cáo kết quả hoạt động kinh doanh'],
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
