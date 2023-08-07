<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use App\Models\Transaction;

class ExcelExportsOneOrder
{
    public function exportToExcel($transaction)
    {
        // Lấy dữ liệu phiếu xuất kho từ cơ sở dữ liệu hoặc bất kỳ nguồn nào khác
        $data = $transaction; // Lấy dữ liệu phiếu xuất kho từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        dd($data);
        // Tạo một đối tượng Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Thiết kế mẫu Excel phiếu xuất
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Phiếu xuất kho');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A3', 'Mã phiếu:');
        $sheet->setCellValue('B3', 'PX001');

        $sheet->setCellValue('A4', 'Ngày xuất:');
        $sheet->setCellValue('B4', '2023-05-30');

        $sheet->setCellValue('A5', 'Tên người nhận:');
        $sheet->setCellValue('B5', 'Nguyễn Văn A');

        $sheet->setCellValue('A6', 'Tên người ký gửi:');
        $sheet->setCellValue('B6', 'Nguyễn Văn B');

        $sheet->setCellValue('A8', 'STT');
        $sheet->setCellValue('B8', 'Mã sản phẩm');
        $sheet->setCellValue('C8', 'Tên sản phẩm');
        $sheet->setCellValue('D8', 'Số lượng');
        $sheet->setCellValue('E8', 'Đơn giá');
        $sheet->setCellValue('F8', 'Thành tiền');

        $sheet->getStyle('A8:F8')->getFont()->setBold(true);
        $sheet->getStyle('A8:F8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A8:F8')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // $dataRows = ...; // Dữ liệu chi tiết phiếu xuất từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        $startRow = 9;
        $stt = 1;

        // foreach ($dataRows as $dataRow) {
            $sheet->setCellValue('A' . $startRow, $stt);
            $sheet->setCellValue('B' . $startRow, $data->ma_san_pham);
            $sheet->setCellValue('C' . $startRow, $data->ten_san_pham);
            $sheet->setCellValue('D' . $startRow, $data->so_luong);
            $sheet->setCellValue('E' . $startRow, $data->don_gia);
            $sheet->setCellValue('F' . $startRow, $data->thanh_tien);

        //     $startRow++;
        //     $stt++;
        // }

        // Thiết kế phần tổng kết
        $totalRow = $startRow + 1;
        $sheet->setCellValue('E' . $totalRow, 'Tổng cộng:');
        $sheet->setCellValue('F' . $totalRow, '=SUM(F9:F' . ($startRow - 1) . ')');
        $sheet->getStyle('E' . $totalRow . ':F' . $totalRow)->getFont()->setBold(true);
        $sheet->getStyle('E' . $totalRow . ':F' . $totalRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // Thiết lập định dạng và kích thước cột
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        // ...

        // Tạo một đối tượng Writer và lưu tệp Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'phieu_xuat_kho.xlsx';
        $writer->save($filename);

        // Trả về tệp Excel để tải xuống
        return response()->download($filename)->deleteFileAfterSend();
    }
}