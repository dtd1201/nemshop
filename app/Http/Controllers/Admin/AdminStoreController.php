<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteRecordTrait;
use App\Http\Requests\Admin\ValidateAddStore;
use App\Http\Requests\Admin\ValidateEditStore;
use App\Models\Product;
use App\Models\LoHang;
use App\Models\KhoHang;
use App\Models\NhapKho;
use App\Models\XuatKho;
use App\Models\KhoanChi;
use App\Models\SanPhamXuat;
use App\Models\SanPhamLoi;
use App\Models\Transaction;
use App\Models\Admin;
use App\Models\User;
use App\Models\Agency;
use App\Models\Point;
use Carbon\Carbon;
use App\Models\YeuCauDoiTra;

use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsLoHang;
use App\Exports\ExcelExportsDatabaseNhapKho;
use App\Exports\ExcelExportsDatabaseXuatKho;
use App\Exports\ExcelExportsDatabaseKhoHang;
use App\Exports\ExcelExportsReportSanPhamXuat;
use App\Exports\ExcelExportsReportTongThu;
use App\Exports\ExcelExportsReportHoaHongChi;
use App\Exports\ExcelExportsReportCongNo;
use App\Exports\ExcelExportsReportKhoanChi;
use App\Exports\ExcelExportsReportDoanhThu;
use App\Exports\ExcelExportsReportLoiNhuan;
use App\Exports\ExcelExportsReportThuChi;
use App\Exports\ExcelExportsReportBestSale;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class AdminStoreController extends Controller
{
    //
    use DeleteRecordTrait;
    private $store;
    private $user;
    private $agency;
    private $admin;
    private $point;
    private $product;
    private $transaction;
    private $typeStore;
    private $sanPhamLoi;
    private $loHang;
    private $khoHang;
    private $nhapKho;
    private $xuatKho;
    private $khoanChi;
    private $typePhieuXuat;
    private $yeuCauDoiTra;
    private $listCondition;

    public function __construct(Store $store, SanPhamLoi $sanPhamLoi, Point $point, KhoanChi $khoanChi, Agency $agency, User $user, LoHang $loHang, KhoHang $khoHang, NhapKho $nhapKho, XuatKho $xuatKho, Product $product, Transaction $transaction, Admin $admin,
    YeuCauDoiTra $yeuCauDoiTra
    )
    {
        $this->store = $store;
        $this->yeuCauDoiTra = $yeuCauDoiTra;
        $this->point = $point;
        $this->product = $product;
        $this->loHang = $loHang;
        $this->khoHang = $khoHang;
        $this->nhapKho = $nhapKho;
        $this->xuatKho = $xuatKho;
        $this->khoanChi = $khoanChi;
        $this->sanPhamLoi = $sanPhamLoi;
        $this->agency = $agency;
        $this->user = $user;
        $this->admin = $admin;
        $this->transaction = $transaction;
        $this->listCondition = $this->xuatKho->listCondition;
        $this->typeStore = config('point.typeStore');
        $this->typePhieuXuat = config('point.typePhieuXuat');
        $this->typePoint = config('point.typePoint');
    
    }
    public function index(Request $request)
    {
        $data = $this->store->where('active', 1);
        $where = [];
        $whereIn = [];
        $orWhere = null;

        if ($request->input('keyword')) {
            // dd($request->input('keyword'));
            $adminId = $this->admin->where([
                ['email', 'like', '%' . $request->input('keyword') . '%'],
            ])->orWhere([
                ['name', 'like', '%' . $request->input('keyword') . '%'],
            ])->pluck('id')->toArray();

            // $whereIn[] = ['user_id',   $adminId];

            $transactionId = $this->transaction->where([
                ['code', 'like', '%' . $request->input('keyword') . '%'],
            ])->pluck('id')->toArray();
            //   dd($transactionId);
            $productId = $this->product->where([
                ['masp', 'like', '%' . $request->input('keyword') . '%'],
            ])->orWhere([
                ['name', 'like', '%' . $request->input('keyword') . '%'],
            ])->pluck('id')->toArray();
            $data = $data->whereIn('admin_id', $adminId)
                ->orWhereIn('product_id', $productId)
                ->orWhereIn('transaction_id', $transactionId);

            //  dd($userId);
            //  dd( $data = $data->whereIn('user_id',   $userId)->get());

        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 1:
                    $where[] = ['type', '=', 1];
                    break;
                case 2:
                    $where[] = ['type', '=', 2];
                    break;
                case 3:
                    $where[] = ['type', '=', 3];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        if ($whereIn) {
            foreach ($whereIn as $w) {
                $data = $data->whereIn(...$w);
            }
        }
        //  dd($data->get());
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'typeASC':
                    $orderby = [
                        'type',
                        'ASC'
                    ];
                    break;
                case 'typeDESC':
                    $orderby = [
                        'type',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }

        $data = $data->paginate(15);



      //  $data = $this->store->where('active', 1)->orderBy("created_at", "desc")->paginate(15);
        return view(
            "admin.pages.store.list",
            [
                'data' => $data,
                'typeStore' => $this->typeStore,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }


    public function create(Request $request)
    {
        if (false !== array_search($request->type, [1, 3])) {
            return view(
                "admin.pages.store.add",
                [
                    'request' => $request,
                ]
            );
        } else {
            return;
        }
    }
    public function store(ValidateAddStore $request)
    {
        if (false === array_search($request->type, [1, 3])) {
            return;
        }
        try {
            DB::beginTransaction();
            $masp = $request->input('masp');
            $product = $this->product->where([
                'masp' => $masp,
            ])->first();
            $dataStoreCreate = [
                "active" => $request->input('active'),
                "type" => $request->input('type'),
                "admin_id" => auth()->guard('admin')->id()
            ];
            if ($request->type == 1) {
                $dataStoreCreate['quantity'] = $request->input('quantity') ?? null;
                $dataStoreCreate['product_id'] = $product->id;
                $store = $this->store->create($dataStoreCreate);
            }
            if ($request->type == 3) {
                //   dd($request->input('transaction_code'));
                $transaction = $this->transaction->where([
                    'code' => $request->input('transaction_code'),
                ])->first();

                // cập nhập admin xuất kho
                //   dd($listDataStoreCreate);
                foreach ($transaction->stores as $store) {
                    $store->update([
                        "admin_id" => auth()->guard('admin')->id(),
                        "type" => 3
                    ]);
                }
                //    dd($transaction->stores );
                // cập nhập transaction sang trạng thái vận chuyển
                $transaction->update([
                    'status' => 3,
                ]);
                //  dd($transaction->status);
            }
            //  dd($dataStoreCreate);

            DB::commit();
            return redirect()->route("admin.store.create", ['type' => $request->input('type') ?? 0])->with("alert", "Thêm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.create", ['type' => $request->input('type') ?? 0])->with("error", "Thêm không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->store->find($id);
        return view("admin.pages.store.edit", [
            'data' => $data
        ]);
    }
    public function update(ValidateEditStore $request, $id)
    {
        $store = $this->store->find($id);
        //  dd($store);
        if ($store->type == 1) {
            $product = $this->product->where([
                'masp' => $request->input('masp'),
            ])->first();
            $store->update([
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
                'active' => $request->input('active'),
            ]);
            return redirect()->route("admin.store.index")->with("alert", "Sửa  thành công");
        }
    }

    public function listLoHang(Request $request)
    {
        $data = $this->loHang->latest()->paginate(15);

        return view(
            "admin.pages.lo_hang.list",
            [
                'data' => $data,
            ]
        );
    }

    public function detailLoHang($id, Request $request)
    {
        $data = $this->khoHang->where('lo_hang_id', $id)->latest()->paginate(15);

        return view(
            "admin.pages.lo_hang.detail",
            [
                'data' => $data,
            ]
        );
    }

    public function addQuantityProduct(Request $request){
        if($request->ajax()){
            if ($request->id_prod){
                $id_prod = $request->id_prod;
                $productOfStore = $this->khoHang->find($id_prod);

                $product_name = $productOfStore->name;

                $lo_hang_name = $productOfStore->lohang->name;

                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.update-product-store', [
                        'product_name' => $product_name,
                        'lo_hang_name' => $lo_hang_name,
                        'product_id' => $id_prod,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function updateQuantityProduct($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $khoHang = $this->khoHang->find($id);

            $quantity = $request->quantity;

            $khoHang->update([
                'quantity' => $khoHang->quantity + $quantity,
            ]);

            $nhapkho = new NhapKho();
            $nhapkho->name = $khoHang->name;
            $nhapkho->masp = $khoHang->masp;
            $nhapkho->cost = $khoHang->cost;
            $nhapkho->quantity = $quantity;
            $nhapkho->han_su_dung = $khoHang->han_su_dung;
            $nhapkho->lo_hang_id  = $khoHang->lo_hang_id;
            $nhapkho->admin_id = auth()->guard('admin')->user()->id;
            $nhapkho->save();

            DB::commit();
            return redirect()->route("admin.store.detailLoHang", ['id' => $khoHang->lo_hang_id])->with("alert", "Nhập số lượng sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.detailLoHang", ['id' => $khoHang->lo_hang_id])->with("error", "Nhập số lượng sản phẩm không thành công");
        }
    }

    public function listDefectiveProduct(Request $request)
    {
        $data = $this->sanPhamLoi;
        $where = [];
        $whereIn = [];
        $orWhere = null;


        if ($request->input('keyword')) {
            // dd($request->input('keyword'));
            $data = $data->where([
                ['masp', 'like', '%' . $request->input('keyword') . '%'],
            ]);
        }

        if ($where) {
            $data = $data->where($where);
        }
        //  dd($data->get());
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }

        $data = $data->paginate(15);

        return view(
            "admin.pages.kho.san-pham-loi",
            [
                'data' => $data,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            ]
        );
    }

    public function destroyDefectiveProduct($id)
    {
        $sanPhamLoi = $this->sanPhamLoi->find($id);
        if($sanPhamLoi->count()>0) {
            $khohang = $this->khoHang->find($sanPhamLoi->kho_hang_id);
            if ($khohang->count()>0) {
                $khohang->update([
                    'so_luong_loi' => $khohang->so_luong_loi - $sanPhamLoi->quantity,
                    'quantity' => $khohang->quantity + $sanPhamLoi->quantity
                ]);

                return $this->deleteTrait($this->sanPhamLoi, $id);
            }
        }
    }

    public function listYeuCau(Request $request)
    {
        $data = $this->yeuCauDoiTra;
        $where = [];
        $whereIn = [];
        $orWhere = null;


        // if ($request->input('keyword')) {
        //     $data = $data->where([
        //         ['masp', 'like', '%' . $request->input('keyword') . '%'],
        //     ]);
        // }

        if ($where) {
            $data = $data->where($where);
        }
        //  dd($data->get());
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby = $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }

        $data = $data->paginate(15);

        return view(
            "admin.pages.kho.yeu-cau-doi-tra",
            [
                'data' => $data,
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            ]
        );
    }

    public function changeStatusYeuCau($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->yeuCauDoiTra->find($id);

            $updateResult = $data->update([
                'status' => 1,
                "admin_id" => auth()->guard('admin')->user()->id,
            ]);

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-status-yeu-cau', ['data' => $data])->render(),
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function cancel($id)
    {
        $yeucau = $this->yeuCauDoiTra->find($id);
        if ($yeucau) {

            $yeucau->update([
                'status' => -1,
            ]);

            return response()->json([
                'code' => 200,
                'messange' => 'success'
            ], 200);
        }
    }

    public function addDefectiveProduct(Request $request){
        if($request->ajax()){
            if ($request->khohang_id){
                $khohang_id = $request->khohang_id;
                $data = $this->khoHang->find($khohang_id);

                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.add-defective-product', [
                        'data' => $data,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function storeDefectiveProduct($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $khoHang = $this->khoHang->find($id);

            $quantity = $request->quantity;

            if ($khoHang->quantity >= $quantity) {
                $khoHang->update([
                    'so_luong_loi' => $khoHang->so_luong_loi + $quantity,
                    'quantity' => $khoHang->quantity - $quantity,
                ]);

                $sanphamloi = new SanPhamLoi();
                $sanphamloi->name = $khoHang->name;
                $sanphamloi->masp = $khoHang->masp;
                $sanphamloi->cost = $khoHang->cost;
                $sanphamloi->quantity = $quantity;
                $sanphamloi->note = $request->note;
                $sanphamloi->han_su_dung = $khoHang->han_su_dung;
                $sanphamloi->kho_hang_id  = $khoHang->id;
                $sanphamloi->lo_hang_id  = $khoHang->lo_hang_id;
                $sanphamloi->admin_id = auth()->guard('admin')->user()->id;
                $sanphamloi->save();
            } else {
                return redirect()->route("admin.store.listKhoHang")->with("error", "Số lượng sản phẩm lỗi không được vượt quá sản phẩm tồn");
            }

            
            DB::commit();
            return redirect()->route("admin.store.listKhoHang")->with("alert", "Thêm số lượng sản phẩm hoàn trả thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.listKhoHang")->with("error", "Thêm số lượng sản phẩm hoàn trả không thành công");
        }
    }

    public function createLoHang(Request $request)
    {
        return view("admin.pages.lo_hang.add");
    }

    public function storeLoHang(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataLoHang = [
                "name" => $request->input('name'),
                "description" => $request->input('description'),
            ];
            $loHang = $this->loHang->create($dataLoHang);

            DB::commit();
            return redirect()->route("admin.store.listLoHang")->with("alert", "Thêm lô hàng thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.listLoHang")->with("error", "Thêm lô hàng không thành công");
        }
    }

    public function editLoHang($id)
    {
        $data = $this->loHang->find($id);
        return view("admin.pages.lo_hang.edit", [
            'data' => $data
        ]);
    }

    public function updateLoHang($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $this->loHang->find($id);
            $data->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);

            DB::commit();
            return redirect()->route("admin.store.listLoHang")->with("alert", "Cập nhật lô hàng thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.listLoHang")->with("error", "Cập nhật lô hàng không thành công");
        }
    }

    public function createNhapKhoHang(Request $request)
    {
        $product = $this->product->where('active',1)->get();
        return view("admin.pages.kho.add",[
            'product' => $product
        ]);
    }

    public function storeNhapKhoHang(Request $request)
    {
        try {
            DB::beginTransaction();

            $name_lo_hang = $request->input('name_lo_hang');

            $checkLoHang = $this->loHang->where('name', $name_lo_hang)->first();

            if ($checkLoHang) {
                return redirect()->route("admin.store.createNhapKhoHang")->with("error", "Lô hàng này đã tồn tại");
            } else {

                $dataLoHang = [
                    "name" => $name_lo_hang,
                ];

                $loHang = $this->loHang->create($dataLoHang);

                $products = $request->input('product');
                $listProduct = isset($products) ? $products : [];

                foreach ($listProduct as $itemProduct) {
                    $khohang = new KhoHang();
                    $khohang->name = $itemProduct['name'];
                    $khohang->masp = $itemProduct['masp'];
                    $khohang->cost = $itemProduct['cost'];
                    $khohang->quantity = $itemProduct['quantity'];
                    $khohang->sell_number = 0;
                    $khohang->so_luong_loi = 0;
                    $khohang->lo_hang_id  = $loHang->id;
                    $khohang->avatar_path = null;
                    $khohang->han_su_dung = $itemProduct['han_su_dung'];
                    $khohang->status = 0;
                    $khohang->save();

                    $nhapkho = new NhapKho();
                    $nhapkho->name = $itemProduct['name'];
                    $nhapkho->masp = $itemProduct['masp'];
                    $nhapkho->cost = $itemProduct['cost'];
                    $nhapkho->quantity = $itemProduct['quantity'];
                    $nhapkho->han_su_dung = $itemProduct['han_su_dung'];
                    $nhapkho->lo_hang_id  = $loHang->id;
                    $nhapkho->admin_id = auth()->guard('admin')->user()->id;
                    $nhapkho->status = 0;
                    $nhapkho->save();
                }
            }

            DB::commit();
            return redirect()->route("admin.store.createNhapKhoHang")->with("alert", "Nhập hàng thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.createNhapKhoHang")->with("error", "Nhập hàng không thành công");
        }
    }

    public function addProduct(Request $request) {
        $id_prod = $request->id_prod;
        $data = $this->product->findOrFail($id_prod);
        if ($data) {
            $index = $data->id;
            return response()->json([
                'code' => 200,
                'html' => view('admin.components.add-product-row', [
                    'product' => $data,
                    'index' => $index,
                ])->render(),
                'messange' => 'success'
            ], 200);
        }
    }

    public function listKhoHang(Request $request)
    {
        $data = $this->khoHang;
        $where = [];
        $whereIn = [];
        $orWhere = null;

        //  dd($data->get());
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }

        $data = $data->paginate(15);

        return view(
            "admin.pages.kho.list",
            [
                'data' => $data,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    public function listNhapKho(Request $request)
    {
        $loHang = $this->loHang->get();
        $data = $this->nhapKho;
        $where = [];
        $whereIn = [];
        $orWhere = null;
        $now = new Carbon();

        if ($request->has('keyword') && $request->input('keyword')) {
            $data = $data->where([['masp', 'like', '%' . $request->input('keyword') . '%']]);
            // $idAdmin = $this->admin->where([
            //         ['name', 'like', '%' . request()->input('keyword') . '%']
            //     ])->pluck('id')->unique();

            // $data = $data->where([
            //     ['name', 'like', '%' . request()->input('keyword') . '%']
            // ])->orWhereIn('admin_id',$idAdmin);


            // $where[] = ['masp', 'like', '%' . $request->input('keyword') . '%'];

            // $orWhere = ['name', 'like', '%' . $request->input('keyword') . '%'];

            // $data = $data->where(function($query){
            //     $keyword = request()->input('keyword');
            //     $adminId = $this->admin->where([
            //         ['name', 'like', '%' .$keyword . '%'],
            //     ])->pluck('id')->toArray();

            //     $query->whereIn('admin_id',$adminId);
            // });
        }

        if ($request->input('start') && $request->input('end')) {
            $start = $request->input('start');
            $end = $request->input('end');
            $data = $data->whereBetween('created_at', [$start, $end]);
        } else if ($request->input('start')) {
            $start = $request->input('start');
            $data = $data->whereBetween('created_at', [$start, $now::now()]);
        }

        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 1:
                    $where[] = ['status', '=', 0];
                    break;
                case 2:
                    $where[] = ['status', '=', 1];
                    break;
                default:
                    break;
            }
        }

        if ($where) {
            $data = $data->where($where);
        }
      //  dd($orWhere);
        if ($orWhere) {
            $data = $data->orWhere(...$orWhere);
        }

        //  dd($data->get());
        if ($request->input('lohang')) {
            $data = $data->where('lo_hang_id', $request->input('lohang'));
            // switch ($key) {
            //     case 'dateASC':
            //         $orderby = ['created_at'];
            //         break;
            //     case 'dateDESC':
            //         $orderby = [
            //             'created_at',
            //             'DESC'
            //         ];
            //         break;
            //     default:
            //         $orderby =  $orderby = [
            //             'created_at',
            //             'DESC'
            //         ];
            //         break;
            // }
            // $data = $data->orderBy(...$orderby);
        }

        $data = $data->paginate(15);

        return view(
            "admin.pages.kho.list-product-import",
            [
                'data' => $data,
                'loHang' => $loHang,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
                'lohang' => $request->input('lohang') ? $request->input('lohang') : "",
                'start' => $request->input('start') ? $request->input('start') : "",
                'end' => $request->input('end') ? $request->input('end') : $now->toDateString(),
            ]
        );
    }

    public function listXuatKho(Request $request)
    {

        $now = new Carbon();
        $start = Carbon::parse("2023-02-15")->format('Y-m-d H:i:s');
        $end = $now::now()->addDay(1)->format('Y-m-d H:i:s');

        $data = $this->xuatKho->where('id', '<>', 17);
        if ($request->has('status') && $request->input('status') != '') {
            $data = $data->where('status', $request->input('status'));
        }

        $data = $data->latest()->paginate(15);

        if($request->input('type')){
            $start = $request->input('startDate');
            $end = $request->input('endDate');
            $status = $request->input('status');
            return Excel::download(new ExcelExportsDatabaseXuatKho($start, $end, $status), 'xuat-kho.xlsx');
        };

        return view(
            "admin.pages.kho.xuat-kho",
            [
                'data' => $data,
                'typePhieuXuat' => $this->typePhieuXuat,
                'statusCurrent' => $request->input('status') ?? '',
                'start' => $request->input('start') ? $request->input('start') : $start,
                'end' => $request->input('end') ? $request->input('end') : $end,
            ]
        );
    }

    public function createXuatKho(Request $request)
    {
        $sanpham = $this->khoHang->where('quantity','>', 0)->latest()->get();
        $agency = $this->agency->latest()->get();
        $user = $this->user->where('type', 1)->where('active', 1)->latest()->get();

        if ($request->has('lohang') && $request->input('lohang') != '') {
            $lohangId = $request->input('lohang');
            $sanpham = $this->khoHang->where('quantity','>', 0)->where('lo_hang_id', $lohangId)->latest()->get();
        } else {
            $sanpham = $this->khoHang->where('quantity','>', 0)->latest()->get();
        }

        $loHang = LoHang::get();

        return view("admin.pages.kho.create-xuat-kho",[
            'sanpham' => $sanpham,
            'agency' => $agency,
            'loHang' => $loHang,
            'user' => $user
        ]);
    }

    public function storeXuatKho(Request $request)
    {
        try {
            DB::beginTransaction();

            $name = $request->input('name');
            
            $type = $request->input('type');

            $dataXuatKhoCreate = [
                "name" => $name,
                "ma_phieu_xuat" => '',
                "transaction_code" => null,
                "admin_id" => auth()->guard('admin')->user()->id,
                "admin_duyet" => null,
                "type" => $type,
                "status" => 0,
                "ngay_xuat" => null,
            ];

            if ($type == 2) {
                $dataXuatKhoCreate['agency_id'] = $request->input('agency');
                $dataXuatKhoCreate['user_id'] = null;
            } else {
                $dataXuatKhoCreate['agency_id'] = null;
                $dataXuatKhoCreate['user_id'] = $request->input('user');
            }

            $xuatkho = $this->xuatKho->create($dataXuatKhoCreate);

            $xuatkho->update([
                'ma_phieu_xuat' => 'PX-'. $xuatkho->id,
            ]);

            $products = $request->input('product');

            $listProduct = isset($products) ? $products : [];
            $total = 0;

            foreach ($listProduct as $itemProduct) {
                if ($itemProduct['quantity'] >= $itemProduct['quantity_xuat']) {
                    if (0 < $itemProduct['quantity_xuat']) {
                        $sanphamxuat = new SanPhamXuat();
                        $sanphamxuat->name = $itemProduct['name'];
                        $sanphamxuat->masp = $itemProduct['masp'];
                        $sanphamxuat->cost = $itemProduct['cost'];
                        $sanphamxuat->quantity = $itemProduct['quantity_xuat'];
                        $sanphamxuat->lo_hang_id  = $itemProduct['lo_hang_id'];
                        $sanphamxuat->xuat_kho_id = $xuatkho->id;
                        $sanphamxuat->kho_hang_id  = $itemProduct['kho_hang_id'];
                        $sanphamxuat->han_su_dung = $itemProduct['han_su_dung'];
                        $sanphamxuat->save();

                        $price = $sanphamxuat->product->price;
                        $total = $total + ($price * $itemProduct['quantity_xuat']);
                    }

                } else {
                    return redirect()->route("admin.store.listXuatKho")->with("error", "Số lượng sản phẩm xuất phải nhỏ hơn số lượng sản phẩm còn trong kho");
                }
            }

            $xuatkho->update([
                'total' => $total,
            ]);

            DB::commit();
            return redirect()->route("admin.store.listXuatKho")->with("alert", "Tạo phiếu xuất kho thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.listXuatKho")->with("error", "Tạo phiếu xuất kho không thành công");
        }
    }

    
    public function listSanPhamXuat(Request $request)
    {
        try {
            DB::beginTransaction();
            $id_phieuxuat = $request->id_phieuxuat;

            $data = $this->xuatKho->find($id_phieuxuat);
            if ($data) {
                return response()->json([
                    "code" => 200,
                    "html" => view('admin.components.load-list-san-pham-xuat', ['data' => $data])->render(),
                    "message" => "success"
                ], 200);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadNextStepCondition(Request $request)
    {
        try {
            DB::beginTransaction();
            $now = new Carbon();
            $id = $request->id;
            $xuatKho = $this->xuatKho->find($id);
            $condition = $xuatKho->condition;
            $dataUpdate = [];
            switch ($condition) {
                case -1:
                    break;
                case 0:
                    $condition += 1;
                    break;
                case 1:
                    $condition += 1;
                    break;
                case 2:
                    $condition += 1;
                    break;
                case 3:
                    break;
                default:
                    break;
            }
            $dataUpdate['condition'] = $condition;

            if ($condition == 2) {
                $date = $now::now()->addDay(30)->format('Y-m-d H:i:s');
                $xuatKho->update([
                    'due_date' => $date,
                    'tien_no' => $xuatKho->total,
                ]);
            }

            if ($condition == 3) {
                $dataUpdate['tien_no'] = 0;                
            }

            $xuatKho->update($dataUpdate);

            DB::commit();
            return response()->json([
                'code' => 200,
                'htmlStatus' => view('admin.components.condition-agency', [
                    'dataCondition' => $xuatKho,
                    'listCondition' => $this->listCondition,
                ])->render(),
                'messange' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.agency.congno')->with("error", "Thay đổi trạng thái không thành công");
        }
    }

    public function editXuatKho($id, Request $request)
    {
        $xuatkho = $this->xuatKho->find($id);
        // $sanphamXuat = $xuatkho->products()->pluck('masp');
        $transactions = $this->transaction->where('code', $xuatkho->transaction_code)->first();
        $listMaSp = $transactions->orders()->pluck('masp');

        if ($request->has('lohang') && $request->input('lohang') != '') {
            $lohangId = $request->input('lohang');
            $sanpham = $this->khoHang->where('quantity','>', 0)->whereIn('masp', $listMaSp)->where('lo_hang_id', $lohangId)->latest()->get();
        } else {
            $sanpham = $this->khoHang->where('quantity','>', 0)->whereIn('masp', $listMaSp)->latest()->get();
        }

        $loHang = LoHang::get();
        return view("admin.pages.kho.edit-xuat-kho",[
            'sanpham' => $sanpham,
            'loHang' => $loHang,
            'xuatkho' => $xuatkho
        ]);
    }

    public function updateXuatKho($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $xuatkho = $this->xuatKho->find($id);

            $name = $request->input('name');
            
            $type = $request->input('type');

            $dataXuatKhoCreate = [
                "name" => $name,
                "admin_id" => auth()->guard('admin')->user()->id,
                "type" => $type,
            ];

            $xuatkho->update($dataXuatKhoCreate);

            $products = $request->input('product');

            $listProduct = isset($products) ? $products : [];

            $old_product = $xuatkho->products()->delete();
            $total = 0;
            foreach ($listProduct as $itemProduct) {
                if ($itemProduct['quantity'] >= $itemProduct['quantity_xuat']) {
                    if (0 < $itemProduct['quantity_xuat']) {
                        $sanphamxuat = new SanPhamXuat();
                        $sanphamxuat->name = $itemProduct['name'];
                        $sanphamxuat->masp = $itemProduct['masp'];
                        $sanphamxuat->cost = $itemProduct['cost'];
                        $sanphamxuat->quantity = $itemProduct['quantity_xuat'];
                        $sanphamxuat->lo_hang_id  = $itemProduct['lo_hang_id'];
                        $sanphamxuat->xuat_kho_id = $xuatkho->id;
                        $sanphamxuat->kho_hang_id  = $itemProduct['kho_hang_id'];
                        $sanphamxuat->han_su_dung = $itemProduct['han_su_dung'];
                        $sanphamxuat->save();

                        $price = $sanphamxuat->product->price;
                        $total = $total + ($price * $itemProduct['quantity_xuat']);
                    }

                } else {
                    return redirect()->route("admin.store.listXuatKho")->with("error", "Số lượng sản phẩm xuất phải nhỏ hơn số lượng sản phẩm còn trong kho");
                }
            }
            $xuatkho->update([
                'total' => $total,
            ]);

            DB::commit();
            return redirect()->route("admin.store.listXuatKho")->with("alert", "Cập nhật phiếu xuất kho thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.store.listXuatKho")->with("error", "Cập nhật phiếu xuất kho không thành công");
        }
    }

    public function changeStatusPhieuXuat($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->xuatKho->find($id);
            $now = new Carbon();
            
            if ($data->products()->count()>0) {
                $due_date = null;
                if ($data->type == 2) {
                    $due_date = $now::now()->addDay(30)->format('Y-m-d H:i:s');
                }

                $updateResult = $data->update([
                    'status' => 1,
                    'ngay_xuat' => $now->format('Y-m-d H:i'),
                    "admin_duyet" => auth()->guard('admin')->user()->id,
                ]);

                $products = $data->products()->get();

                foreach ($products as $item) {
                    $khohang = $this->khoHang->find($item->kho_hang_id);
                    if ($khohang->quantity >= $item->quantity) {
                        $khohang->update([
                            'quantity' => $khohang->quantity - $item->quantity,
                            'sell_number' => $khohang->sell_number + $item->quantity,
                        ]);
                    } else {
                        return response()->json([
                            "code" => 500,
                            "message" => "Số lượng sản phẩm xuất phải nhỏ hơn số lượng sản phẩm còn trong kho"
                        ], 500);
                    }
                    # code...
                }

                // Nếu là phiếu xuất cho đơn hàng thì chuyển sang trạng thái vận chuyển
                if ($data->type == 1) {
                    $transaction = $this->transaction->where('code', $data->transaction_code)->first();
                    if ($transaction) {
                        $transaction->update([
                            'status' => 4,
                            'time_ship' => $now::now()->format('Y-m-d H:i:s')
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-status-phieu-xuat', ['data' => $data])->render(),
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function changeConditionPhieuXuat($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->xuatKho->find($id);

            $updateResult = $data->update([
                'condition' => 1
            ]);

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-condition-phieu-xuat', ['data' => $data])->render(),
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function changeStatusNhapKho($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->nhapKho->find($id);

            $updateResult = $data->update([
                'status' => 1
            ]);

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-status-nhap-kho', ['data' => $data])->render(),
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function changeTypePhieuXuat(Request $request)
    {
        try {
            DB::beginTransaction();

            $type = $request->type;
            $agency = $this->agency->latest()->get();
            $user = $this->user->where('type', 1)->where('active', 1)->latest()->get();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-type-phieu-xuat', ['agency' => $agency, 'user' => $user, 'type' => $type])->render(),
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    

    public function destroyLoHang($id)
    {
        $loHang = $this->loHang->find($id);
        if ($loHang) {
            return $this->deleteTrait($this->loHang, $id);
        }
    }

    public function report(Request $request)
    {

        $now = new Carbon();

        $start = Carbon::parse("2023-02-15")->format('Y-m-d H:i:s');
        $end = $now::now()->addDay(1)->format('Y-m-d H:i:s');

        if ($request->export) {
            $start = $request->input('start');
            $end = $request->input('end');
            $export = $request->export;
            
            if($export == "sanphamxuat") {
                $listIdPhieuXuat = $this->xuatKho->whereBetween('created_at', [$start, $end])->where('status', 1)->pluck('id');
                $data = SanPhamXuat::whereIn('xuat_kho_id', $listIdPhieuXuat)->latest()->get();
                return Excel::download(new ExcelExportsReportSanPhamXuat($start, $end, $data), 'bao-cao-gia-von-hang-ban.xlsx');

            } else if($export == "tongthu") {
                $data = Transaction::where("status", 6)->orWhere(function($query){
                        return $query
                        ->where("status", 5)
                        ->whereColumn("total",">" ,"tien_no");
                    })->whereBetween('created_at', [$start, $end])->latest()->get();

                $data2 = XuatKho::where("condition", 3)->orWhere(function($query){
                        return $query
                        ->where("condition", 2)
                        ->whereColumn("total",">" ,"tien_no");
                    })->where('status', 1)->where('type', 2)->whereBetween('created_at', [$start, $end])->latest()->get();

                return Excel::download(new ExcelExportsReportTongThu($start, $end, $data, $data2), 'bao-cao-tong-thu.xlsx');

            } else if($export == "hoahong") {
                $data = Point::whereIn('type', [5, 7])->whereBetween('created_at', [$start, $end])->latest()->get();
                return Excel::download(new ExcelExportsReportHoaHongChi($start, $end, $data), 'bao-cao-chi-hoa-hong.xlsx');

            } else if($export == "congno") {
                $data = Transaction::where("status", 5)->whereBetween('created_at', [$start, $end])->latest()->get();
                $congNoDaiLy = $this->xuatKho->whereBetween('created_at', [$start, $end])->where('type', 2)->where('status', 1)->where('condition', 2)->get();
                return Excel::download(new ExcelExportsReportCongNo($start, $end, $data, $congNoDaiLy), 'bao-cao-cong-no.xlsx');

            } else if($export == "khoanchi") {
                $data = KhoanChi::where("status", 1)->whereBetween('created_at', [$start, $end])->latest()->get();
                return Excel::download(new ExcelExportsReportKhoanChi($start, $end, $data), 'bao-cao-khoan-chi.xlsx');

            } else if($export == "doanhthu") {
                $sanPhamLoi = SanPhamLoi::select(SanPhamLoi::raw('DATE(created_at) as date'), SanPhamLoi::raw('SUM(cost * quantity) as amount'), SanPhamLoi::raw('0 as money'))->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                $transaction = Transaction::select(Transaction::raw('DATE(created_at) as date'), Transaction::raw('SUM(total) as money'), Transaction::raw('0 as amount'))->whereIn("status", [5, 6])->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                // $transaction2 = Transaction::select(Transaction::raw('DATE(created_at) as date'), Transaction::raw('SUM(total - tien_no) as money'), Transaction::raw('0 as amount'))->where("status", 5)->where("total", '>' ,"tien_no")->whereBetween('created_at', [$start, $end])->groupBy('date')->get();

                $congNoDaiLy = XuatKho::select(XuatKho::raw('DATE(created_at) as date'), XuatKho::raw('SUM(total) as money'), XuatKho::raw('0 as amount'))->where('status', 1)->where('type', 2)->whereIn("condition", [2, 3])->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                // $congNoDaiLy2 = XuatKho::select(XuatKho::raw('DATE(created_at) as date'), XuatKho::raw('SUM(total - tien_no) as money'), XuatKho::raw('0 as amount'))->where('type', 2)->where('status', 1)->where("condition", 2)->where("total", '>' ,"tien_no")->whereBetween('created_at', [$start, $end])->groupBy('date')->get();


                $data = collect([]);
          
                $data = $data->merge($transaction);
                $data = $data->merge($sanPhamLoi);
                $data = $data->merge($congNoDaiLy);

                $data = $data->groupBy('date')->map(function ($row) {
                    $firstRow = $row->first();
                    return (object)[
                        'amount' => $row->sum('amount'), 
                        'money' => $row->sum('money'), 
                        'date' => $firstRow['date']
                    ];
                });
      
                return Excel::download(new ExcelExportsReportDoanhThu($start, $end, $data), 'bao-cao-doanh-thu.xlsx');

            } else if($export == "loinhuan") {
                $doanhThu = $request->input('doanhThu');
                $totalPoint = $request->input('totalPoint');
                $khoanchi = $request->input('khoanchi');
                $sanPhamLoi = $request->input('sanPhamLoi');
                $tongBanForUser = $request->input('tongBanForUser');
                return Excel::download(new ExcelExportsReportLoiNhuan($start, $end, $totalPoint, $khoanchi, $tongBanForUser, $doanhThu, $sanPhamLoi), 'bao-cao-ket-qua-kinh-doanh.xlsx');
            } else if($export == "thuchi") {
                $tongThu = $request->input('tongThu');
                $totalPoint = $request->input('totalPoint');
                $khoanchi = $request->input('khoanchi');
                $tongBanForUser = $request->input('tongBanForUser');
                $sanPhamLoi = $request->input('sanPhamLoi');
                return Excel::download(new ExcelExportsReportThuChi($start, $end, $tongThu, $totalPoint, $khoanchi, $tongBanForUser, $sanPhamLoi), 'bao-cao-thu-chi.xlsx');

            } else if($export == "best_sale") {
                $data = Point::select(Point::raw('sum(point) as total, user_id'))->where('type', 4)->whereBetween('created_at', [$start, $end])->groupBy('user_id')->orderby('total', 'DESC')->get();
                return Excel::download(new ExcelExportsReportBestSale($start, $end, $data), 'bao-cao-tai-khoan-best-sale.xlsx');

            } else {

            }
        }


        $tongThu = $this->transaction;

        $doanhThu = $this->transaction;

        $doanhThuDaiLy = $this->xuatKho;

        $thuno_donhang = $this->transaction;

        $listIdPhieuXuatPay = $this->xuatKho;

        $listIdPhieuXuat = $this->xuatKho;

        $sanPhamLoi = $this->sanPhamLoi::select(SanPhamLoi::raw('SUM(cost * quantity) as amount'));

        $khoanchi = KhoanChi::select(KhoanChi::raw('SUM(money + phu_chi) as amount'));

        $totalPoint = Point::whereIn('type', [5, 7]);

        $listIdPhieuXuatNotPay = $this->xuatKho;


        if ($request->input('start') && $request->input('end')) {
            $start = $request->input('start');
            $end = $request->input('end');

            $tongThu = $tongThu->whereBetween('created_at', [$start, $end]);
            $doanhThu = $doanhThu->whereBetween('created_at', [$start, $end]);
            $doanhThuDaiLy = $doanhThu->whereBetween('created_at', [$start, $end]);
            $thuno_donhang = $thuno_donhang->whereBetween('created_at', [$start, $end]);
            $listIdPhieuXuatPay = $listIdPhieuXuatPay->whereBetween('created_at', [$start, $end]);
            $listIdPhieuXuat = $listIdPhieuXuat->whereBetween('created_at', [$start, $end]);
            $khoanchi = $khoanchi->whereBetween('created_at', [$start, $end]);
            $totalPoint = $totalPoint->whereBetween('created_at', [$start, $end]);
            $listIdPhieuXuatNotPay = $listIdPhieuXuatNotPay->whereBetween('created_at', [$start, $end]);
            $sanPhamLoi = $sanPhamLoi->whereBetween('created_at', [$start, $end]);
        }

        $doanhThu = $doanhThu->whereIn('status', [5, 6])->get()->sum('total');
        $doanhThuDaiLy = $doanhThuDaiLy->where('status', 1)->where('type', 2)->whereIn('condition', [2, 3])->get()->sum('total');
        $doanhThu = ($doanhThu + $doanhThuDaiLy) / 1.1;

        $tongThu = $tongThu->where('status', 6)->get()->sum('total');
        $thuno_donhang = $thuno_donhang->select(Transaction::raw('SUM(total - tien_no) as total'))->where("status", 5)->where("total", '>' ,"tien_no")->get()->sum('total');

        // $listIdPhieuXuatPay = $listIdPhieuXuatPay->where('type', 2)->where('status', 1)->where('condition', 3)->pluck('id');
        // $spXuatDailyPay = SanPhamXuat::with('product')->whereIn('xuat_kho_id', $listIdPhieuXuatPay)->get();

        $thuno_daily1 = $listIdPhieuXuatPay::where('type', 2)->where('status', 1)->where('condition', 3)->select(XuatKho::raw('SUM(total) as amount'))->first()->amount;

        $thuno_daily2 = $listIdPhieuXuatPay->select(Transaction::raw('SUM(total - tien_no) as total'))->where('type', 2)->where('status', 1)->where('condition', 2)->where("total", '>' ,"tien_no")->get()->sum('total');

        $totalAgency = $thuno_daily1 + $thuno_daily2;

        // if ($spXuatDailyPay) {
        //     foreach ($spXuatDailyPay as $item) {
        //         $totalAgency = $totalAgency + ($item->quantity * $item['product']->price);
        //     }
        // }

        $tongThu = $tongThu + $totalAgency + $thuno_donhang;

        $listIdPhieuXuat = $listIdPhieuXuat->where('status', 1)->pluck('id');
        $tongBanForUser = SanPhamXuat::select(SanPhamXuat::raw('SUM(quantity*cost) as amount'))->whereIn('xuat_kho_id', $listIdPhieuXuat)->first()->amount;

        $khoanchi = $khoanchi->where('status', 1)->first()->amount;

        $sanPhamLoi = $sanPhamLoi->first()->amount;

        $totalPoint = $totalPoint->get()->sum('point');

        $tongLoiNhuan = $tongThu - ($tongBanForUser + $khoanchi + ($totalPoint * 1000));

        if ($tongThu != 0) {
            $phanTramLoiNhuan = round((($tongLoiNhuan)/$tongThu * 100),2);
        } else {
            $phanTramLoiNhuan = 0;
        }

        $phieuXuatNotPay = $listIdPhieuXuatNotPay->where('type', 2)->where('status', 1)->where('condition', 2)->select(XuatKho::raw('SUM(tien_no) as amount'))->first()->amount;
        // $spXuatDailyNotPay = SanPhamXuat::with('product')->whereIn('xuat_kho_id', $listIdPhieuXuatNotPay)->get();

        

        $no = 0;
        $don_no = Transaction::where('status', 5)->whereBetween('created_at', [$start, $end])->select(Transaction::raw('SUM(tien_no) as amount'))->first()->amount;
        if ($don_no) {
            $no = $no + $don_no;
        }

        if ($phieuXuatNotPay) {
            $no = $no + $phieuXuatNotPay;
        }

        $totalLoiNhuanThuan = $doanhThu - ($tongBanForUser + $khoanchi + $sanPhamLoi + abs($totalPoint * 1000));
        $thuChi = $tongThu - ($tongBanForUser + $khoanchi + $sanPhamLoi + abs($totalPoint * 1000));

//        $results = Transaction::select(Transaction::raw('DATE(updated_at) AS date'),
//                    Transaction::raw('SUM(total) AS money'))
//                        ->whereBetween('updated_at', [$start, $end])
//            ->groupBy(DB::raw('DATE(updated_at)'))
//            ->get();
//
//        dd($results);

        return view(
            "admin.pages.report.index",
            [
                'tongThu' => $tongThu,
                'thuChi' => $thuChi,
                'tongBanForUser' => $tongBanForUser,
                'khoanchi' => $khoanchi ?? 0,
                'totalPoint' => $totalPoint,
                'totalLoiNhuanThuan' => $totalLoiNhuanThuan,
                'tongLoiNhuan' => $tongLoiNhuan,
                'phanTramLoiNhuan' => $phanTramLoiNhuan,
                'doanhThu' => $doanhThu,
                'no' => $no,
                'sanPhamLoi' => $sanPhamLoi,
                'start' => $request->input('start') ? $request->input('start') : $start,
                'end' => $request->input('end') ? $request->input('end') : $end,
            ]
        );
    }

    public function reportDetail(Request $request)
    {
         // try {
            DB::beginTransaction();
            $start = $request->input('start');
            $end = $request->input('end');
            if ($request->type) {
                $type = $request->type;
                if ($type == "hoahong") {
                    $data = Point::whereIn('type', [5, 7])->whereBetween('created_at', [$start, $end])->latest()->get();
                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Danh sách hoa hồng chi",
                        "html" => view('admin.components.report-detail', [
                            'data' => $data,
                            'typePoint' => $this->typePoint,
                            'type' => 1
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "khoanchi") {
                    $data = KhoanChi::where("status", 1)->whereBetween('created_at', [$start, $end])->latest()->get();
                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Danh sách khoản chi",
                        "html" => view('admin.components.report-detail', [
                            'data' => $data,
                            'type' => 2
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "tongthu") {
                    $data = Transaction::where("status", 6)->orWhere(function($query){
                        return $query
                        ->where("status", 5)
                        ->whereColumn("total",">" ,"tien_no");
                    })->whereBetween('created_at', [$start, $end])->latest()->get();

                    // $data = Transaction::whereIn("status", [5, 6])->whereBetween('created_at', [$start, $end])->latest()->get();

                    $data2 = XuatKho::where("condition", 3)->orWhere(function($query){
                        return $query
                        ->where("condition", 2)
                        ->whereColumn("total",">" ,"tien_no");
                    })->whereBetween('created_at', [$start, $end])->latest()->get();

                    // $data2 = XuatKho::whereIn("condition", [2, 3])->whereBetween('created_at', [$start, $end])->latest()->get();

                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Danh sách đơn hàng đã thu tiền",
                        "html" => view('admin.components.report-detail', [
                            'data' => $data,
                            'data2' => $data2,
                            'type' => 3
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "congno") {
                    $data = Transaction::where("status", 5)->whereBetween('created_at', [$start, $end])->latest()->get();

                    $congNoDaiLy = $this->xuatKho->whereBetween('created_at', [$start, $end])->where('type', 2)->where('status', 1)->where('condition', 2)->get();

                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Danh sách đơn hàng chưa thu tiền",
                        "html" => view('admin.components.report-detail', [
                            'data' => $data,
                            'congNoDaiLy' => $congNoDaiLy,
                            'type' => 4
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "loinhuan") {

                    $doanhThu = $request->input('doanhThu');
                    $tongThu = $request->input('tongThu');
                    $totalPoint = $request->input('totalPoint');
                    $khoanchi = $request->input('khoanchi');
                    $tongBanForUser = $request->input('tongBanForUser');
                    $tongLoiNhuan = $request->input('tongLoiNhuan');
                    $sanPhamLoi = $request->input('sanPhamLoi');

                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Báo cáo kết quả hoạt động kinh doanh",
                        "html" => view('admin.components.report-detail', [
                            'doanhThu' => $doanhThu,
                            'tongThu' => $tongThu,
                            'totalPoint' => $totalPoint,
                            'khoanchi' => $khoanchi,
                            'sanPhamLoi' => $sanPhamLoi,
                            'tongBanForUser' => $tongBanForUser,
                            'tongLoiNhuan' => $tongLoiNhuan,
                            'type' => 5
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "doanhthu") {
                    // $khoanchi = SanPhamLoi::select(SanPhamLoi::raw('DATE(created_at) as date'), SanPhamLoi::raw('SUM(money + phu_chi) as amount'), KhoanChi::raw('0 as money'))->where("status", 1)->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                    $sanPhamLoi = SanPhamLoi::select(SanPhamLoi::raw('DATE(created_at) as date'), SanPhamLoi::raw('SUM(cost * quantity) as amount'), SanPhamLoi::raw('0 as money'))->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                    $transaction = Transaction::select(Transaction::raw('DATE(created_at) as date'), Transaction::raw('SUM(total) as money'), Transaction::raw('0 as amount'))->whereIn("status", [5, 6])->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                    // $transaction2 = Transaction::select(Transaction::raw('DATE(created_at) as date'), Transaction::raw('SUM(total - tien_no) as money'), Transaction::raw('0 as amount'))->where("status", 5)->where("total", '>' ,"tien_no")->whereBetween('created_at', [$start, $end])->groupBy('date')->get();

                    $congNoDaiLy = XuatKho::select(XuatKho::raw('DATE(created_at) as date'), XuatKho::raw('SUM(total) as money'), XuatKho::raw('0 as amount'))->where('type', 2)->where('status', 1)->whereIn("condition", [2, 3])->whereBetween('created_at', [$start, $end])->groupBy('date')->get();
                    // $congNoDaiLy2 = XuatKho::select(XuatKho::raw('DATE(created_at) as date'), XuatKho::raw('SUM(total - tien_no) as money'), XuatKho::raw('0 as amount'))->where('type', 2)->where('status', 1)->where("condition", 2)->where("total", '>' ,"tien_no")->whereBetween('created_at', [$start, $end])->groupBy('date')->get();

                    $data = collect([]);
    
                    $data = $data->merge($transaction);
                    $data = $data->merge($sanPhamLoi);
                    $data = $data->merge($congNoDaiLy);

                    $data = $data->groupBy('date')->map(function ($row) {
                        $firstRow = $row->first();
                        return (object)[
                            'amount' => $row->sum('amount'), 
                            'money' => $row->sum('money'), 
                            'date' => $firstRow['date']
                        ];
                    });

                 
                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Doanh thu bán hàng theo thời gian",
                        "html" => view('admin.components.report-detail', [
                            'data' => $data,
                            'type' => 6
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "sanphamxuat") {

                    $listIdPhieuXuat = $this->xuatKho->whereBetween('created_at', [$start, $end])->where('status', 1)->pluck('id');
                    $data = SanPhamXuat::whereIn('xuat_kho_id', $listIdPhieuXuat)->latest()->get();
                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Thông tin giá vốn hàng bán",
                        "html" => view('admin.components.report-detail', [
                            'data' => $data,
                            'type' => 7
                        ])->render(),
                        "message" => "success"
                    ], 200);
    
                } else if($type == "best_sale") {
                    $listIdDaily = $this->user->where('active', 1)->where('type', 1)->pluck('id');
                    $listIdNhaThuoc = $this->user->where('active', 1)->where('type', 2)->pluck('id');
                    // $data = Point::select(Point::raw('sum(point) as total, user_id'))->where('type', 4)->whereBetween('created_at', [$start, $end])->groupBy('user_id')->orderby('total', 'DESC')->get();
                    $userDaiLy = null;
                    if ($listIdDaily->count()>0) {
                        $userDaiLy = Point::select(Point::raw('sum(point) as total, user_id'))->where('type', 4)->whereBetween('created_at', [$start, $end])->whereIn('user_id', $listIdDaily)->groupBy('user_id')->orderby('total', 'DESC')->first();
                    }
                    
                    $userNhaThuoc = null;
                    if ($listIdNhaThuoc->count()>0) {
                        $userNhaThuoc = Point::select(Point::raw('sum(point) as total, user_id'))->where('type', 4)->whereBetween('created_at', [$start, $end])->whereIn('user_id', $listIdNhaThuoc)->groupBy('user_id')->orderby('total', 'DESC')->first();
                    }

                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Tài khoản mua nhiều nhất của 2 cây",
                        "html" => view('admin.components.report-detail', [
                            'userDaiLy' => $userDaiLy,
                            'userNhaThuoc' => $userNhaThuoc,
                            'type' => 8
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else if($type == "thuchi") {

                    $tongThu = $request->input('tongThu');
                    $khoanChi = $request->input('khoanchi');
                    $tongBanForUser = $request->input('tongBanForUser');
                    $totalPoint = $request->input('totalPoint');
                    $sanPhamLoi = $request->input('sanPhamLoi');
                    DB::commit();
                    return response()->json([
                        "code" => 200,
                        "title" => "Thông tin báo cáo thu chi",
                        "html" => view('admin.components.report-detail', [
                            'tongThu' => $tongThu,
                            'khoanChi' => $khoanChi,
                            'tongBanForUser' => $tongBanForUser,
                            'totalPoint' => $totalPoint,
                            'sanPhamLoi' => $sanPhamLoi,
                            'type' => 9
                        ])->render(),
                        "message" => "success"
                    ], 200);
                } else {

                }
            }
            
         // } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
         // }
    }

    public function reportDoanhThuDetail($date, Request $request)
    {
        $start = Carbon::parse($date)->format('Y-m-d 00:00:00');
        $end = Carbon::parse($date)->format('Y-m-d 23:59:59');
        $sanPhamLoi = SanPhamLoi::whereBetween('created_at', [$start, $end])->latest()->get();

        $transactions = Transaction::whereIn("status", [5, 6])->whereBetween('created_at', [$start, $end])->latest()->get();
        // $data2 = Transaction::where("status", 5)->whereColumn("total",">" ,"tien_no")->whereBetween('created_at', [$start, $end])->latest()->get();
        // $transactions = collect([]);
        // $transactions = $transactions->merge($data);
        // $transactions = $transactions->merge($data2);

        $thuno_dailys = XuatKho::whereIn("condition", [2, 3])->where('status', 1)->where('type', 2)->whereBetween('created_at', [$start, $end])->latest()->get();
        // $thuno_daily2 = XuatKho::where("condition", 2)->where('status', 1)->where('type', 2)->whereColumn("total",">" ,"tien_no")->whereBetween('created_at', [$start, $end])->latest()->get();
        // $thuno_dailys = collect([]);
        // $thuno_dailys = $thuno_dailys->merge($thuno_daily1);
        // $thuno_dailys = $thuno_dailys->merge($thuno_daily2);
        
        return view("admin.pages.report.report-doanh-thu", [
            'sanphamloi' => $sanPhamLoi,
            'transactions' => $transactions,
            'thuno_dailys' => $thuno_dailys,
        ]);
    }

    public function exportNhapKho(Request $request)
    {
        $start = $request->input('startDate');
        $end = $request->input('endDate');
        return Excel::download(new ExcelExportsDatabaseNhapKho($start, $end), 'nhap-kho.xlsx');
    }

    // public function exportXuatKho(Request $request)
    // {
    //     $start = $request->input('startDate');
    //     $end = $request->input('endDate');
    //     return Excel::download(new ExcelExportsDatabaseXuatKho($start, $end), 'xuat-kho.xlsx');
    // }

    public function exportKho(Request $request)
    {
        return Excel::download(new ExcelExportsDatabaseKhoHang(), 'san-pham-trong-kho.xlsx');
    }

    public function destroy($id)
    {
        $store = $this->store->find($id);
        if ($store->type == 1) {
            return $this->deleteCategoryRecusiveTrait($this->store, $id);
        }
    }

    public function excelExportsOrder($id)
    {
        // Lấy dữ liệu phiếu xuất kho từ cơ sở dữ liệu hoặc bất kỳ nguồn nào khác
        //$transactions = $this->transaction->find($id);
        $data = $this->xuatKho->find($id);// Lấy dữ liệu phiếu xuất kho từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        //dd($data);
        if($data->transaction_code){
            $transaction = $this->transaction->where('code', $data->transaction_code)->first();
        }
        // dd($transaction);
        $date = date('d', strtotime($data->ngay_xuat));
        $month = date('m', strtotime($data->ngay_xuat));
        $year = date('Y', strtotime($data->ngay_xuat));

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

        $sheet->setCellValue('A6', 'Ngày '. $date .' tháng '. $month .' năm '. $year);
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
        $sheet->setCellValue('C9', $transaction->name);
        $sheet->mergeCells('C9:E9');

        $sheet->setCellValue('A10', '- Địa chỉ (bộ phận): …......');
        $sheet->mergeCells('A10:C10');
        $sheet->setCellValue('A11', '- Lý do xuất kho: Xuất kho bán hàng '. $transaction->name);
        $sheet->mergeCells('A11:C11');
        // $sheet->setCellValue('D11', $transaction->name);
        // $sheet->mergeCells('D11:F11');

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

        $sheet->setCellValue('C14', 'Mã sản phẩm');
        $sheet->mergeCells('C14:C15');
        $sheet->getStyle('C14:C15')->getFont()->setBold(true);
        $sheet->getStyle('C14:C15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('D14', 'Đơn vị tính');
        $sheet->mergeCells('D14:D15');
        $sheet->getStyle('D14:D15')->getFont()->setBold(true);
        $sheet->getStyle('D14:D15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('E14', 'Số lượng');
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

        $sheet->setCellValue('H14', 'Lô hàng');
        $sheet->mergeCells('H14:H15');
        $sheet->getStyle('H14:H15')->getFont()->setBold(true);
        $sheet->getStyle('H14:H15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('I14', 'Thành tiền');
        $sheet->mergeCells('I14:I15');
        $sheet->getStyle('I14:I15')->getFont()->setBold(true);
        $sheet->getStyle('I14:I15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A14:I14')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A15:I15')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A16:I16')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue('A20', '- Tổng  số tiền (Viết bằng chữ): …………………………………………………………………………');
        $sheet->mergeCells('A20:I20');

        $sheet->setCellValue('A21', '- Số chứng từ gốc kèm theo: …………………………………………………………………………………');
        $sheet->mergeCells('A21:I21');

        $sheet->setCellValue('G23', 'Ngày '. $date .' tháng '. $month .' năm '. $year);
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

        $sheet->setCellValue('B25', '(Ký, họ tên)');
        $sheet->getStyle('B25')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('B25')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('C25', '(Ký, họ tên)');
        $sheet->getStyle('C25')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('C25')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('D25', '(Ký, họ tên)');
        $sheet->mergeCells('D25:E25');
        $sheet->getStyle('D25:E25')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('D25:E25')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('F25', '(Hoặc bộ phận có nhu cầu nhập)');
        $sheet->mergeCells('F25:G25');
        $sheet->getStyle('F25:G25')->getFont()->setBold(true)->setItalic(true)->setSize(12);
        $sheet->getStyle('F25:G25')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('F26', '(Ký, họ tên)');
        $sheet->mergeCells('F26:G26');
        $sheet->getStyle('F26:G26')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('F26:G26')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('I25', '(Ký, họ tên)');
        $sheet->getStyle('I25')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('I25')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataRows = $data->products; // Dữ liệu chi tiết phiếu xuất từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        $startRow = 16;
        $stt = 1;
        $quantity =0;
        $total = 0;
        //dd($dataRows);
        foreach ($dataRows as $dataRow) {
            //dd($dataRow->product);
            $sheet->setCellValue('A' . $startRow, $stt);
            $sheet->setCellValue('B' . $startRow, $dataRow->name);
            $sheet->setCellValue('C' . $startRow, $dataRow->masp);
            $sheet->setCellValue('D' . $startRow, 'Hộp');
            $sheet->setCellValue('E' . $startRow, $dataRow->quantity);
            $sheet->setCellValue('F' . $startRow, $dataRow->quantity);
            $sheet->setCellValue('G' . $startRow, number_format($dataRow->product->price));
            $sheet->setCellValue('H' . $startRow, $dataRow->lohang->name??'');
            $sheet->setCellValue('I' . $startRow, number_format($transaction->total).'(Đã chiết khấu '.$transaction->sale.'%)');

            $sheet->getStyle('A' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('B' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('C' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('D' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('E' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('F' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('G' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('H' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('I' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $startRow++;
            $stt++; 
            
            $quantity += $dataRow->quantity;
            $total += $transaction->total; 
        }

        $sheet->setCellValue('A' . $startRow, $stt);
        $sheet->setCellValue('B' . $startRow, 'Cộng');
        $sheet->setCellValue('E' . $startRow, $quantity);
        $sheet->setCellValue('F' . $startRow, $quantity);
        $sheet->setCellValue('I' . $startRow, number_format($total));
        //dd($startRow);
        $sheet->getStyle('A' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('B' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('C' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('D' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('E' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('F' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('G' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('H' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('I' . $startRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        // <td>{{ $loop->index + 1 }}</td>
        //         <td>{{ $item->name }}</td>
        //         <td>{{ $item->masp }}</td>
        //         <td>{{ number_format($item->cost) }}</td>
        //         <td>{{ $item->quantity }}</td>
        //         <td>{{ $item->lohang->name }}</td>
        //         <td>{{ Carbon::parse($item->han_su_dung)->format('d-m-Y') }}</td>
        //         <td>{{ Carbon::parse($item->created_at)->format('d-m-Y') }}</td>

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

    public function destroyProductKho($id)
    {
        try {
            DB::beginTransaction();
            $productXuat = SanPhamXuat::where('kho_hang_id', $id)->get();
            if ($productXuat->count()>0) {
                return redirect()->route("admin.store.listKhoHang")->with("error", "Xóa sản phẩm không thành công");
            } else {
                $product = $this->khoHang->find($id);
                if ($product->count()>0) {
                    $productNhap = $this->nhapKho->where('lo_hang_id', $product->lo_hang_id)->where('masp', $product->masp)->pluck('id');
                    if ($productNhap->count()>0) {
                        $this->nhapKho->destroy($productNhap);
                    }
                    $product->delete();
                }
            }

            DB::commit();
            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }


    public function importKhoHang() 
    {
        $path =request()->file('fileExcel');
        Excel::import(new ExcelImportsLoHang, $path);
        return redirect()->back()->with('alert', 'Thêm dữ liệu thành công.');
    }

}
