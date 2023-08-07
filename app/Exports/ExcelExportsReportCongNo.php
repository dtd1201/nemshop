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
use App\Models\Product;

class ExcelExportsReportCongNo implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
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
    private $congNoUser;
    private $congNoAgency;
    public function __construct($start, $end, $data, $data2)
    {
        $this->start=$start;
        $this->end=$end;
        $this->congNoUser = $data;
        $this->congNoAgency = $data2;
        $this->selectField="*";
        $this->title=true;
        $this->typePoint = config('point.typePoint');
        $this->titleField= [
            "order" => "STT",
            "name"=>  "Họ tên",
            "ma_don"=>  "Mã đơn",
            "name_tk" => "Tài khoản",
            "type" => "Loại",
            "date"=> "Ngày đáo hạn",
            "total"=> "Tiền nợ",
        ];
    }

    public function array(): array
    {
        $data=[];
        $stt = 1;
        if($this->congNoUser->count()>0){
            foreach ($this->congNoUser as $index => $value) {
                $item=[];
                $item['order'] = $stt;
                $item['name'] = $value->name;
                $item['ma_don'] = $value->code;
                $item['name_tk'] = optional($value->user)->username;
                $item['type'] = "Tài khoản thành viên";
                $item['date'] = $value->due_date ? Carbon::parse($value->due_date)->format('d/m/Y') : "Chưa cập nhật";
                $item['total'] = $value->tien_no;
                array_push($data,$item);
                $stt++;
            }
        }

        if($this->congNoAgency->count()>0){
            $modelProduct = new Product();
            $totalAll = 0;

            foreach ($this->congNoAgency as $index => $value) {
                $total = 0;
                // $products = $value->products()->get();

                // foreach($products as $proItem){
                //     $price = 0;
                //     $price = $modelProduct->where('masp', $proItem->masp)->first()->price;
                //     $money = $proItem->quantity * $price;
                //     $total = $total + $money;
                // }

                $totalAll = $totalAll + $value->tien_no;


                $item=[];
                $item['order'] = $stt;
                $item['name'] =  $value->agency->name;
                $item['ma_don'] = $value->ma_phieu_xuat;
                $item['name_tk'] = '';
                $item['type'] = "Đại lý";
                $item['date'] = $value->due_date ? Carbon::parse($value->due_date)->format('d/m/Y') : "Chưa cập nhật";
                $item['total'] = $value->tien_no;
                array_push($data,$item);
                $stt++;
            }
        }

        return $data;
    }
// add title for file export
    public function headings(): array
    {
        if($this->title){
            return [
                ['Báo cáo Công nợ'],
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
        $sheet->mergeCells('A1:G1');
        $sheet->mergeCells('A2:G2');
        $sheet->mergeCells('A3:G3');
        $sheet->getStyle('A1:G1')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A2:G2')->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );
        $sheet->getStyle('A3:G3')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:G4';
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
