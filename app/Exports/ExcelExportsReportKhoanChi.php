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

class ExcelExportsReportKhoanChi implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $khoanChi;
    public function __construct($start,$end,$data)
    {
        $this->start=$start;
        $this->end=$end;
        $this->khoanChi = $data;
        $this->selectField="*";
        $this->title=true;
        $this->typePoint = config('point.typePoint');
        $this->titleField= [
            "order" => "STT",
            "ma_phieu"=>  "Mã phiếu",
            "user"=>  "Tài khoản",
            "nguoi_nhan"=>  "Người nhận",
            "type" => "Loại tài khoản",
            "price"=> "Số tiền chi",
            "sub_price"=> "Phụ chi",
            "date"=> "Ngày chi",
            "content"=> "Nội dung",
        ];
    }

    public function array(): array
    {
        $data=[];
        if($this->khoanChi->count()>0){
            foreach ($this->khoanChi as $index => $value) {
                if($value->loai_tk == 1){
                    $type = "Nhà cung cấp";
                } else if ($value->loai_tk == 2){
                    $type = "Nhân viên";
                } else if ($value->loai_tk == 3){
                    $type = "Thành viên";
                } else if ($value->loai_tk == 4){
                    $type = "Đại lý";
                } else {
                    $type = "Không có";
                }

                $name_user = '';

                if ($value->user_id && $value->loai_tk == 3) {
                    $name_user = $value->user->username;
                }

                $item=[];
                $item['order'] = $index + 1;
                $item['ma_phieu'] = $value->ma_phieu;
                $item['user'] = $name_user;
                $item['nguoi_nhan'] = $value->name;
                $item['type'] = $type;
                $item['price'] = $value->money;
                $item['sub_price'] = $value->phu_chi;
                $item['date'] = $value->ngay_chi ? Carbon::parse($value->ngay_chi)->format('d/m/Y') : "Chưa có";
                $item['content'] = $value->content;
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
                ['Báo cáo Khoản chi'],
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
        $sheet->mergeCells('A1:I1');
        $sheet->mergeCells('A2:I2');
        $sheet->mergeCells('A3:I3');
        $sheet->getStyle('A1:I1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:I2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:I3')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:I4';
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
