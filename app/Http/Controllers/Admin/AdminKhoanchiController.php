<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhoanChi;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Supplier;
use App\Models\Agency;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\Storage;
use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;
use App\Exports\ExcelExportsDatabaseKhoanChi;
class AdminKhoanchiController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait;
    private $khoanChi;
    public function __construct(KhoanChi $khoanChi)
    {
        $this->khoanChi = $khoanChi;
    }
    public function index(Request $request)
    {

        $users = User::where('active', 1)->get();
        $data = $this->khoanChi;
        $where = [];
        $whereIn = [];
        $orWhere = null;
        $now = new Carbon();

        if ($request->has('keyword') && $request->input('keyword')) {
            $data = $data->where([['ma_phieu', 'like', '%' . $request->input('keyword') . '%']]);
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

        if ($request->input('user_id')) {
            $data = $data->where('user_id', $request->input('user_id'));
        }

        $data = $data->latest()->paginate(15);

        return view(
            "admin.pages.khoan_chi.list",
            [
                'data' => $data,
                'users' => $users,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
                'user_id' => $request->input('user_id') ? $request->input('user_id') : "",
                'start' => $request->input('start') ? $request->input('start') : "",
                'end' => $request->input('end') ? $request->input('end') : $now->toDateString(),
            ]
        );
    }

    public function create(Request $request )
    {   
        $users = User::where('active', 1)->get();
        return view("admin.pages.khoan_chi.add",
            [
                'request' => $request,
                'users' => $users
            ]
        );
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $dataKhoanchiCreate = [
                "ma_phieu" => 'PC',
                "loai_tk" => $request->loai_tk ?? null,
                "user_id" => $request->user_id ?? null,
                "name" => $request->name,
                "address" => $request->address,
                "mst" => $request->mst,
                "money" => $request->money ?? 0,
                "content" => $request->content,
                "admin_id" => auth()->guard('admin')->id(),
                "admin_duyet" => null,
                "phu_chi" => $request->phu_chi ?? 0,
                "status" => 0,                
            ];

            $dataUploadAvatar = $this->storageTraitUpload($request, "image_path", "khoan_chi");
            if (!empty($dataUploadAvatar)) {
                $dataKhoanchiCreate["image_path"] = $dataUploadAvatar["file_path"];
            }
            //  dd($dataKhoanchiCreate);
            $khoanChi = $this->khoanChi->create($dataKhoanchiCreate);

            $khoanChi->update([
                'ma_phieu' => 'PC-'.$khoanChi->id,
            ]);
            // dd($khoanChi);
            // insert data product lang

            DB::commit();
            return redirect()->route("admin.khoanChi.index")->with("alert", "Thêm khoản chi thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.khoanChi.index')->with("error", "Thêm khoản chi không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->khoanChi->find($id);
        $users = null;
        if($data->loai_tk == 1) {
            $users = Supplier::all();
        } elseif ($data->loai_tk == 2) {
            $users = Admin::where('id', '<>', 1)->get();
        } elseif ($data->loai_tk == 3) {
            $users = User::where('active', 1)->get();
        } else if ($data->loai_tk == 4) {
            $users = Agency::all();
        } else {

        }

        return view("admin.pages.khoan_chi.edit", [
            'data' => $data,
            'users' => $users
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataKhoanchiUpdate = [
                "loai_tk" => $request->loai_tk,
                "user_id" => $request->user_id,
                "name" => $request->name,
                "address" => $request->address,
                "mst" => $request->mst,
                "money" => $request->money,
                "content" => $request->content,
                "admin_id" => auth()->guard('admin')->id(),
                "phu_chi" => $request->phu_chi,
            ];
            //  dd($dataCategoryPostUpdate);

            $dataUpdateAvatar = $this->storageTraitUpload($request, "image_path", "khoan_chi");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->khoanChi->find($id)->image_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataKhoanchiUpdate["image_path"] = $dataUpdateAvatar["file_path"];
            }
            // dd($dataKhoanchiUpdate);
            $this->khoanChi->find($id)->update($dataKhoanchiUpdate);

            $khoanChi = $this->khoanChi->find($id);
            DB::commit();
            return redirect()->route("admin.khoanChi.index")->with("alert", "Cập nhật thông tin khoản chi thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.khoanChi.index')->with("error", "Cập nhật thông tin khoản chi không thành công");
        }
    }

    public function changeStatusKhoanChi($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->khoanChi->find($id);
            $now = new Carbon();
            
            $data->update([
                'status' => 1,
                'ngay_chi' => $now->format('Y-m-d H:i'),
                "admin_duyet" => auth()->guard('admin')->user()->id,
            ]);

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-status-khoan-chi', ['data' => $data])->render(),
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

    public function changeUser(Request $request)
    {
        if ($request->userId && $request->loaiUser) {
            $userId = $request->userId;
            $loaiUser = $request->loaiUser;
            if($loaiUser == 1) {
                $user = Supplier::find($userId);
                if ($user) {
                    $output['name'] = $user->name;
                    $output['address'] = $user->address;
                    echo json_encode($output);
                }
            } elseif ($loaiUser == 2) {
                $user = Admin::find($userId);
                if ($user) {
                    $output['name'] = $user->name;
                    $output['address'] = $user->address;
                    echo json_encode($output);
                }
            } elseif ($loaiUser == 3) {
                $user = User::find($userId);
                if ($user) {
                    $output['name'] = $user->name;
                    $output['address'] = $user->address;
                    echo json_encode($output);
                }
            } else if ($loaiUser == 4) {
                $user = Agency::find($userId);
                if ($user) {
                    $output['name'] = $user->name;
                    $output['address'] = $user->address;
                    echo json_encode($output);
                }
            } else {

            }
            
        }
        
    }

    public function changeTk(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = null;
            if ($request->loaiTk) {
                $loaiTk = $request->loaiTk;
                if ($loaiTk == 1) {
                    $data = Supplier::all();
                } elseif ($loaiTk == 2) {
                    $data = Admin::where('id','<>', 1)->get();
                } elseif ($loaiTk == 3) {
                    $data = User::where('active', 1)->get();
                } elseif ($loaiTk == 4) {
                    $data = Agency::all();
                } else {

                }
            }

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.list_tk', ['data' => $data])->render(),
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

    public function exportKhoanChi(Request $request)
    {
        $start = $request->input('startDate');
        $end = $request->input('endDate');
        return Excel::download(new ExcelExportsDatabaseKhoanChi($start, $end), 'khoan-chi.xlsx');
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->khoanChi, $id);
    }
}
