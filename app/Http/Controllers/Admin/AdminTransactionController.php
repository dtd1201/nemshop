<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Point;
use App\Models\Admin;
use App\Traits\DeleteRecordTrait;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\PointTrait;
use App\Models\XuatKho;
use App\Models\KhoHang;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExportsDatabaseTransaction;
use App\Exports\ExcelExportsOneOrder;
use Carbon\Carbon;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class AdminTransactionController extends Controller
{
    //
    use DeleteRecordTrait, PointTrait;
    private  $transaction;
    private $unit;
    private $listStatus;
    private $typePoint;
    private $rose;
    private $xuatKho;
    private $admin;
    public function __construct(Transaction $transaction, XuatKho $xuatKho, User $user, Admin $admin)
    {
        $this->transaction = $transaction;
        $this->user = $user;
        $this->admin = $admin;
        $this->xuatKho = $xuatKho;
        $this->unit = "đ";
        $this->listStatus = $this->transaction->listStatus;
        $this->typePoint = config('point.typePoint');
        $this->rose = config('point.rose');
    }
    public function index(Request $request)
    {

        $now = new Carbon();
        $start = Carbon::parse("2023-02-15")->format('Y-m-d H:i:s');
        $end = $now::now()->addDay(1)->format('Y-m-d H:i:s');

        // Tổng điểm
        $totalPoint = Point::where('type','<>',1)->get()->sum('point');

        //thống kê giao dịch
        $transactionGroupByStatus = $this->transaction->select($this->transaction->raw('count(status) as total'), 'status')->groupBy('status')->get();


        $dataTransactionGroupByStatus = $this->listStatus;
        foreach ($transactionGroupByStatus as $item) {
            $dataTransactionGroupByStatus[$item->status]['total'] = $item->total;
        }
        // dd($dataTransactionGroupByStatus);

        $transactions = $this->transaction->where(['active' => 1])->where('id', '<>', 17);
        $where = [];
        $orWhere = null;
        if ($request->has('keyword') && $request->input('keyword')) {
           //   $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
          //  $orWhere = ['code', 'like', '%' . $request->input('keyword') . '%'];


            //   dd($transactionId);
          //  $transactions= $transactions->whereIn('user_id',$userId)->orWhere('code', 'like', '%' . $request->input('keyword') . '%');

          $transactions = $transactions->where(function($query){
            $keyword =request()->input('keyword');
            $userId = $this->user->where([
                ['username', 'like', '%' .$keyword . '%'],
            ])->orWhere([
                ['name', 'like', '%' . $keyword . '%'],
            ])->pluck('id')->toArray();
            $adminId = $this->admin->where([
                ['name', 'like', '%' .$keyword . '%'],
            ])->orWhere([
                ['email', 'like', '%' . $keyword . '%'],
            ])->pluck('id')->toArray();

            $query->whereIn('user_id',$userId)
            ->orWhere('code', 'like', '%' . $keyword . '%')
            ->orWhereIn('admin_id',$adminId);

          });
        }

        if ($request->input('start') && $request->input('end')) {
            $start = $request->input('start');
            $end = $request->input('end');

            $transactions = $transactions->whereBetween('created_at', [$start, $end]);
        }

        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $transactions = $transactions->where($where);
        }
        //  dd($where);
        $orderby = [];
        if ($request->has('order_with') && $request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby[] = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'statusASC':
                    $orderby[] = ['status', 'ASC'];
                    $orderby[] = ['created_at', 'DESC'];
                    break;
                case 'statusDESC':
                    $orderby[] = ['status', 'DESC'];
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby[]  = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $transactions = $transactions->orderBy(...$or);
            }
        } else {
            $transactions = $transactions->orderBy("created_at", "DESC");
        }

        

        $totalPrice = $transactions->get()->sum('total');

        $totalTransaction = $transactions->get()->count();
      //  dd($totalTransaction);
        $transactions =  $transactions->paginate(15);

        if($request->input('type')){
            $start = $request->input('start');
            $end = $request->input('end');
            $status=$request->input('status');

            return Excel::download(new ExcelExportsDatabaseTransaction($start, $end, $status), 'danh-sach-don-hang.xlsx');
        };

        return view('admin.pages.transaction.index', [
            'data' => $transactions,
            'totalPrice' => $totalPrice,
            'totalPoint' => $totalPoint,
            'dataTransactionGroupByStatus' => $dataTransactionGroupByStatus,
            'totalTransaction' => $totalTransaction,
            'listStatus' => $this->listStatus,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            'statusCurrent' => $request->input('status') ? $request->input('status') : "",
            'start' => $request->input('start') ? $request->input('start') : $start,
            'end' => $request->input('end') ? $request->input('end') : $end,
        ]);
    }
    public function loadNextStepStatus(Request $request)
    {
        try {
            DB::beginTransaction();
            $now = new Carbon();
            $id = $request->id;
            $transaction = $this->transaction->find($id);
            $user = $transaction->user;
            $status = $transaction->status;
            $typeUser = config('point.typeUser');
            // $add_point_20 = false;
            
            $dataUpdate = [];
            switch ($status) {
                case -1:
                    break;
                case 1:
                    $status += 1;
                    $dataUpdate['admin_id']=auth()->guard('admin')->user()->id;
                    break;
                case 2:
                    $status += 1;
                    $dataUpdate['admin_id']=auth()->guard('admin')->user()->id;
                    break;
                    
                case 3:
                    $status += 1;
                    $dataUpdate['admin_id']=auth()->guard('admin')->user()->id;
                    break;
                case 4:
                    $status += 1;
                    $dataUpdate['admin_id']=auth()->guard('admin')->user()->id;
                    // thêm số điểm cây 20 lớp
                    // $user = $transaction->user;
                    // if ($transaction->add_point_20 == false) {
                    //     $this->addPointTo20($user, $transaction->total);
                    //     $add_point_20 = true;
                    //     $dataUpdate['add_point_20']=$add_point_20;
                    // }
                    
                    break;
                case 5:
                    $status += 1;
                    $dataUpdate['admin_id']=auth()->guard('admin')->user()->id;
                    break;
                case 6:
                    $dataUpdate['admin_id']=auth()->guard('admin')->user()->id;
                    break;
                default:
                    break;
            }
            $dataUpdate['status'] = $status;

            if ($status == 3) {
                $dataXuatKhoCreate = [
                    "name" => "Phiếu xuất cho đơn ".$transaction->code,
                    "ma_phieu_xuat" => '',
                    "transaction_code" => $transaction->code,
                    "admin_id" => auth()->guard('admin')->user()->id,
                    "type" => 1,
                    "status" => 0,
                    "ngay_xuat" => null,
                ];

                $xuatkho = $this->xuatKho->create($dataXuatKhoCreate);

                $xuatkho->update([
                    'ma_phieu_xuat' => 'PX-'. $xuatkho->id,
                ]);
            }

            if ($status == 5) {
                $date = $now::now()->addDay(30)->format('Y-m-d H:i:s');
                $transaction->update([
                    'due_date' => $date,
                    'tien_no' => $transaction->total,
                ]);
            }

            if ($status == 6) {
                $dataUpdate['tien_no'] = 0;
                // thêm số điểm nạp lúc đầu
                $user->points()->create([
                    'type' => $this->typePoint[4]['type'],
                    'point' => moneyToPoint($transaction->total),
                    'active' => 1,
                ]);
 
                // thêm số điểm mua
                $user->update([
                    'point_sale' => $user->point_sale + moneyToPoint($transaction->total),
                ]);

                // Trừ điểm mua sản phẩm
                $user->points()->create([
                    'type' => $this->typePoint[6]['type'],
                    'point' => -moneyToPoint($transaction->total),
                    'active' => 1,
                ]);

                $user_hethong = $this->user->where('type', 3)->where('active', 1)->first();
                if ($user_hethong) {
                    $user_hethong->points()->create([
                        'type' => $this->typePoint[11]['type'],
                        'point' =>  moneyToPoint($transaction->total_origin * (1 / 100 ) * 0.9),
                        'active' => 1,
                        'userorigin_id' => $user->id,
                    ]);
                } 

                if ($user->type == 1) {

                    $userTongGiamDoc = $this->user->where('type', 1)->where('active', 1)->where('chuc_danh', 1)->first();
                    if ($userTongGiamDoc) {
                        $userTongGiamDoc->points()->create([
                            'type' => $this->typePoint[11]['type'],
                            'point' =>  moneyToPoint($transaction->total_origin * (3 / 100 ) * 0.9),
                            'active' => 1,
                            'userorigin_id' => $user->id,
                        ]);
                    }

                    // if ($user->parent_id != 0 && $user->parent->giamdoc_id2 == 1) {

                    //     $userParent = $user->parent3()->first();
                    //     $userParent->points()->create([
                    //         'type' => $this->typePoint[11]['type'],
                    //         'point' =>  moneyToPoint($transaction->total_origin * (5 / 100 ) * 0.9),
                    //         'active' => 1,
                    //         'userorigin_id' => $user->id,
                    //     ]);
               
                    //     $money1 = moneyToPoint($transaction->total_origin * (5 / 100 ) * 0.9);
                    //     $this->thuongLoiNhuan($userParent, $money1);
                    // }
                    $userLoop = $user;
                    while ($userLoop->parent_id != 0) {
                        if ($userLoop->parent->giamdoc_id2 == null) {

                        } else {
                            $userParent = $userLoop->parent3()->first();
                            if ($userParent->chuc_danh != 2) {
                                $userParent->points()->create([
                                    'type' => $this->typePoint[11]['type'],
                                    'point' =>  moneyToPoint($transaction->total_origin * (5 / 100 ) * 0.85 * 0.9),
                                    'active' => 1,
                                    'userorigin_id' => $user->id,
                                ]);
                            } else {
                                $userParent->points()->create([
                                    'type' => $this->typePoint[11]['type'],
                                    'point' =>  moneyToPoint($transaction->total_origin * (5 / 100 ) * 0.9),
                                    'active' => 1,
                                    'userorigin_id' => $user->id,
                                ]);
                            }

                            $money1 = moneyToPoint($transaction->total_origin * (5 / 100 ) * 0.9);
                            $this->thuongLoiNhuan($userParent, $money1);
                            break;
                        }
                        $userLoop = $userLoop->parent3()->first();
                    }

                    // $userGiamDoc = $this->user->where('type', 1)->where('active', 1)->where('nhanh', $user->nhanh)->where('user_duoc_chon', 1)->first();
                    // if ($userGiamDoc) {

                    //     $userParent = $userGiamDoc->parent3()->first();
                    //     if ($userParent->giamdoc_id2 == 1) {
                    //         $userGiamDoc->points()->create([
                    //             'type' => $this->typePoint[11]['type'],
                    //             'point' =>  moneyToPoint($transaction->total_origin * (5 / 100 ) * 0.9),
                    //             'active' => 1,
                    //             'userorigin_id' => $user->id,
                    //         ]);
                    //     } else {
                    //         $userGiamDoc->points()->create([
                    //             'type' => $this->typePoint[11]['type'],
                    //             'point' =>  moneyToPoint($transaction->total_origin * (5 / 100 )),
                    //             'active' => 1,
                    //             'userorigin_id' => $user->id,
                    //         ]);
                    //     }

                    //     $money1 = moneyToPoint($transaction->total_origin * (5 / 100 ));
                    //     $this->thuongLoiNhuan($userGiamDoc, $money1);
                    // }
                    
                    // $this->checkLevel($user);
                    $this->addPointTo20($user, $transaction->total_origin);

                    if ($user->giamdoc_id2 == 1 && $user->chuc_danh != 2) {
                        $money = moneyToPoint($transaction->total_origin * ($this->typePoint['pointStart'] / 100 ) * 0.9);
                        $this->thuongLoiNhuan($user, $money);
                    }

                    if ($transaction->sale == null) {
                        if ($user->giamdoc_id2 == 1 && $user->chuc_danh != 2) {
                            $user->points()->create([
                                'type' => $this->typePoint[10]['type'],
                                'point' =>  moneyToPoint($transaction->total_origin * ($this->typePoint['pointStart'] / 100 ) * 0.85 * 0.9),
                                'active' => 1,
                                'userorigin_id' => $user->id,
                            ]);
                        } else {
                            $user->points()->create([
                                'type' => $this->typePoint[10]['type'],
                                'point' =>  moneyToPoint($transaction->total_origin * ($this->typePoint['pointStart'] / 100 ) * 0.9),
                                'active' => 1,
                                'userorigin_id' => $user->id,
                            ]);
                        }
                    }
                    
                } else {

                    $userTongGiamDoc = $this->user->where('type', 2)->where('active', 1)->where('chuc_danh', 1)->first();
                    if ($userTongGiamDoc) {
                        $userTongGiamDoc->points()->create([
                            'type' => $this->typePoint[11]['type'],
                            'point' =>  moneyToPoint($transaction->total_origin * (3 / 100 ) * 0.9),
                            'active' => 1,
                            'userorigin_id' => $user->id,
                        ]);
                    }
                    if ($transaction->sale == null) {
                        $user->points()->create([
                            'type' => $this->typePoint[10]['type'],
                            'point' =>  moneyToPoint($transaction->total_origin * ($typeUser[$user->chuc_danh]['point'] / 100 ) * 0.9),
                            'active' => 1,
                            'userorigin_id' => $user->id,
                        ]);
                    }
                    $this->addPointNhaThuoc($user, $transaction->total_origin);
                }
                
            }

            $transaction->update($dataUpdate);

            DB::commit();
            return response()->json([
                'code' => 200,
                'htmlStatus' => view('admin.components.status', [
                    'dataStatus' => $transaction,
                    'listStatus' => $this->listStatus,
                ])->render(),
                'messange' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.transaction.index')->with("error", "Thay đổi trạng thái không thành công");
        }
    }
    public function loadTransactionDetail($id)
    {
        $orders = $this->transaction->find($id)->orders()->get();
        return response()->json([
            'code' => 200,
            'htmlTransactionDetail' => view('admin.components.transaction-detail', [
                'orders' => $orders,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->transaction, $id);
    }

    public function cancel($id)
    {
        $transactions = $this->transaction->find($id);
        if ($transactions) {
            if ($transactions->status == 3 || $transactions->status == 4) {
                $xuatkho = $this->xuatKho->where('transaction_code', $transactions->code)->first();
                if ($transactions->status == 4 || $transactions->status == 5) {
                    $products = $xuatkho->products()->get();
                    if ($products->count()>0) {
                        foreach ($products as $item) {
                            $khohang = KhoHang::find($item->kho_hang_id);
                            $quantity = $item->quantity;
                            $khohang->update([
                                'quantity' => $khohang->quantity + $quantity,
                                'sell_number' => $khohang->sell_number - $quantity,
                            ]);
                        }
                    }
                }

                $xuatkho->update([
                    'status' => -1,
                ]);
            }

            $transactions->update([
                'status' => -1,
            ]);

            return response()->json([
                'code' => 200,
                'messange' => 'success'
            ], 200);
        }
    }
    // public function excelExportsOrder($id){
    //     $transactions = $this->transaction->find($id);
    //     return Excel::download(new ExcelExportsOneOrder($transactions));
    // }
    public function excelExportsOrder($id)
    {
        // Lấy dữ liệu phiếu xuất kho từ cơ sở dữ liệu hoặc bất kỳ nguồn nào khác
        $transactions = $this->transaction->find($id);
        $data = $transactions; // Lấy dữ liệu phiếu xuất kho từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        //dd($data);
        // Tạo một đối tượng Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Thiết kế mẫu Excel phiếu xuất
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Công ty Cổ phần Dược phẩm Food Tech');
        $sheet->mergeCells('A1:C1');

        $sheet->setCellValue('G1', 'Mẫu số: 02 - VT');
        $sheet->mergeCells('G1:I1');
        $sheet->getStyle('G1:I1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('G1:I1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('G2', '(Ban hành theo Thông tư số 133/2016/TT-BTC)');
        $sheet->mergeCells('G2:I2');
        $sheet->getStyle('G2:I2')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('G2:I2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G3', 'Ngày 20/03/2006 của Bộ trưởng BTC)');
        $sheet->mergeCells('G3:I3');
        $sheet->getStyle('G3:I3')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('G3:I3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A3', 'Số nhà 16, Lô biệt thự 1, Khu X1 Bắc Linh Đàm, Phường Đại Kim,');
        $sheet->mergeCells('A3:F3');

        $sheet->setCellValue('A4', 'Quận Hoàng Mai, Thành phố Hà Nội, Việt Nam');
        $sheet->mergeCells('A4:F4');
        

        $sheet->setCellValue('A5', 'PHIẾU XUẤT KHO');
        $sheet->mergeCells('A5:I5');
        $sheet->getStyle('A5:I5')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A5:I5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A6', 'Ngày.... tháng..... năm......');
        $sheet->mergeCells('A6:H6');
        $sheet->getStyle('A6:H6')->getFont()->setBold(true)->setItalic(true)->setSize(12);
        $sheet->getStyle('A6:H6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A7', 'Số: ...');
        $sheet->mergeCells('A7:H7');
        $sheet->getStyle('A7:H7')->getFont()->setBold(true)->setItalic(true)->setSize(12);
        $sheet->getStyle('A7:H7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('I6', 'Nợ');
        $sheet->setCellValue('I7', 'Có');

        $sheet->setCellValue('A9', '- Họ tên người nhận hàng: ');
        $sheet->mergeCells('A9:B9');
        $sheet->setCellValue('C9', $data->name);
        $sheet->mergeCells('C9:E9');

        $sheet->setCellValue('A10', '- Địa chỉ (bộ phận): …......');
        $sheet->mergeCells('A10:C10');
        $sheet->setCellValue('A11', '- Lý do xuất kho: Xuất kho bán hàng ');
        $sheet->mergeCells('A11:C11');
        $sheet->setCellValue('D11', $data->name);
        $sheet->mergeCells('D11:F11');

        $sheet->setCellValue('A12', '- Xuất tại kho (ngăn lô): Thành phẩm');
        $sheet->mergeCells('A12:C12');
        $sheet->setCellValue('E12', 'Địa điểm:');


        $sheet->setCellValue('A14', 'STT');
        $sheet->mergeCells('A14:A15');
        $sheet->getStyle('A14:A15')->getFont()->setBold(true);
        $sheet->getStyle('A14:A15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('B14', 'Tên, nhãn hiệu, quy cách, phẩm chất vật tư, dụng cụ, sản phẩm, hàng hóa');
        $sheet->mergeCells('B14:B15');
        $sheet->getStyle('B14:B15')->getFont()->setBold(true);
        $sheet->getStyle('B14:B15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('C14', 'Mã số');
        $sheet->mergeCells('C14:C15');
        $sheet->getStyle('C14:C15')->getFont()->setBold(true);
        $sheet->getStyle('C14:C15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('D14', 'Đơn vị tính');
        $sheet->mergeCells('D14:D15');
        $sheet->getStyle('D14:D15')->getFont()->setBold(true);
        $sheet->getStyle('D14:D15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('E14', 'Đơn vị tính');
        $sheet->mergeCells('E14:F14');
        $sheet->getStyle('E14:F14')->getFont()->setBold(true);
        $sheet->getStyle('D14:F14')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('E15', 'Yêu cầu');
        $sheet->getStyle('E15')->getFont()->setBold(true);

        $sheet->setCellValue('F15', 'Thực xuất');
        $sheet->getStyle('F15')->getFont()->setBold(true);

        $sheet->setCellValue('G14', 'Đơn giá');
        $sheet->mergeCells('G14:G15');
        $sheet->getStyle('G14:G15')->getFont()->setBold(true);
        $sheet->getStyle('G14:G15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('H14', 'Lô');
        $sheet->mergeCells('H14:H15');
        $sheet->getStyle('H14:H15')->getFont()->setBold(true);
        $sheet->getStyle('H14:H15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('I14', 'Thành tiền');
        $sheet->mergeCells('I14:I15');
        $sheet->getStyle('I14:I15')->getFont()->setBold(true);
        $sheet->getStyle('I14:I15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A14:I14')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A15:I15')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue('A20', '- Tổng  số tiền (Viết bằng chữ): …………………………………………………………………………');
        $sheet->mergeCells('A20:I20');

        $sheet->setCellValue('A21', '- Số chứng từ gốc kèm theo: …………………………………………………………………………………');
        $sheet->mergeCells('A21:I21');

        $sheet->setCellValue('G23', 'Ngày.... Tháng.... Năm......');
        $sheet->mergeCells('G23:I23');
        $sheet->getStyle('G23:I23')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('G23:I23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('B24', 'Người Lập Phiếu');
        $sheet->getStyle('B24')->getFont()->setBold(true);
        $sheet->getStyle('B24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('C24', 'Người Nhận Hàng');
        $sheet->getStyle('C24')->getFont()->setBold(true);
        $sheet->getStyle('C24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('D24', 'Thủ Kho');
        $sheet->mergeCells('D24:E24');
        $sheet->getStyle('D24:E24')->getFont()->setBold(true);
        $sheet->getStyle('D24:E24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('F24', 'Kế Toán Trưởng');
        $sheet->mergeCells('F24:G24');
        $sheet->getStyle('F24:G24')->getFont()->setBold(true);
        $sheet->getStyle('F24:G24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);  
        
        $sheet->setCellValue('I24', 'Giám Đốc');
        $sheet->getStyle('I24')->getFont()->setBold(true);
        $sheet->getStyle('I24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('B23', '(Ký, họ tên)');
        $sheet->getStyle('B23')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('B23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('C23', '(Ký, họ tên)');
        $sheet->getStyle('C23')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('C23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('D23', '(Ký, họ tên)');
        $sheet->mergeCells('D23:E23');
        $sheet->getStyle('D23:E23')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('D23:E23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('F23', '(Hoặc bộ phận có nhu cầu nhập)');
        $sheet->mergeCells('F23:G23');
        $sheet->getStyle('F23:G23')->getFont()->setBold(true)->setItalic(true)->setSize(12);
        $sheet->getStyle('F23:G23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('F24', '(Ký, họ tên)');
        $sheet->mergeCells('F24:G24');
        $sheet->getStyle('F24:G24')->getFont()->setBold(true)->setItalic(true)->setSize(12);
        $sheet->getStyle('F24:G24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('I23', '(Ký, họ tên)');
        $sheet->getStyle('I23')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('I23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataRows = $data->orders()->get(); // Dữ liệu chi tiết phiếu xuất từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        $startRow = 16;
        $stt = 1;
        //dd($dataRows);
        foreach ($dataRows as $dataRow) {
            $sheet->setCellValue('A' . $startRow, $stt);
            $sheet->setCellValue('B' . $startRow, $dataRow->name);
            $sheet->setCellValue('C' . $startRow, $dataRow->product->masp);
            $sheet->setCellValue('D' . $startRow, 'Hộp');
            $sheet->setCellValue('E' . $startRow, $dataRow->quantity);
            $sheet->setCellValue('F' . $startRow, $dataRow->quantity);
            $sheet->setCellValue('G' . $startRow, $dataRow->product->price);
            $sheet->setCellValue('H' . $startRow, 'lô hàng');
            $sheet->setCellValue('I' . $startRow, $dataRow->new_price);
            $startRow++;
            $stt++;
        }

        // Thiết kế phần tổng kết
        // $totalRow = $startRow + 1;
        // $sheet->setCellValue('E' . $totalRow, 'Tổng cộng:');
        // $sheet->setCellValue('F' . $totalRow, '=SUM(F9:F' . ($startRow - 1) . ')');
        // $sheet->getStyle('E' . $totalRow . ':F' . $totalRow)->getFont()->setBold(true);
        // $sheet->getStyle('E' . $totalRow . ':F' . $totalRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

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
    public function show($id)
    {
        $transactions = $this->transaction->find($id);
        return view('admin.pages.transaction.show', [
            'data' => $transactions,
            "unit" => $this->unit,
        ]);
    }

    public function changeDueDateTransaction(Request $request){
        if($request->ajax()){
            if ($request->id){
                $id = $request->id;
                $data = $this->transaction->find($id);

                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.change-due-date-transaction', [
                        'data' => $data,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function storeChangeDueDateTransaction($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $this->transaction->find($id);

            $due_date = $request->due_date;

            $data->update([
                'due_date' => $due_date,
            ]);

            DB::commit();
            return redirect()->route("admin.transaction.index")->with("alert", "Thay đổi thông tin thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.transaction.index")->with("error", "Thay đổi thông tin không thành công");
        }
    }

    public function changeTienNo(Request $request){
        if($request->ajax()){
            if ($request->id){
                $id = $request->id;
                $data = $this->transaction->find($id);

                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.change-tien-no', [
                        'data' => $data,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function storeChangeTienNo($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $this->transaction->find($id);

            $tienNo = $request->tien_no;

            $data->update([
                'tien_no' => $tienNo,
            ]);

            DB::commit();
            return redirect()->route("admin.transaction.index")->with("alert", "Thay đổi thông tin thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.transaction.index")->with("error", "Thay đổi thông tin không thành công");
        }
    }

    public function exportPdfTransactionDetail($id)
    {

        $transactions = $this->transaction->find($id);
        $unit = $this->unit;
        $data = $transactions;
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadView("admin.pages.transaction.show-pdf", compact('data'), compact('unit'));

        return $pdf->download("transaction.pdf");
    }

    public function exportExcelTransactionDetail(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        $status=$request->input('status');

        return Excel::download(new ExcelExportsDatabaseTransaction($start, $end, $status), 'danh-sach-don-hang.xlsx');
    }
}
