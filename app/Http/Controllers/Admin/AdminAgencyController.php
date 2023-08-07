<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Agency;
use App\Models\XuatKho;
use App\Models\Bank;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AdminAgencyController extends Controller
{
    //
    use DeleteRecordTrait;
    private $admin;
    private $bank;
    private $agency;
    private $xuatKho;
    private $listCondition;
    public function __construct(Admin $admin, Bank $bank, Agency $agency, XuatKho $xuatKho){
        $this->admin = $admin;
        $this->agency = $agency;
        $this->bank = $bank;
        $this->xuatKho = $xuatKho;
        $this->listCondition = $this->xuatKho->listCondition;
        $this->typePhieuXuat = config('point.typePhieuXuat');
    }
    public function index(){
        $data = $this->agency->orderBy("created_at", "desc")->paginate(15);

        return view(
            "admin.pages.agency.list",
            [
                'data' => $data,
            ]
        );
    }

    public function congno(Request $request){
        $agency = $this->agency->orderBy("created_at", "desc")->get();
        $data = $this->xuatKho->where('type', 2)->where('status', 1);
        $where = [];
        $whereIn = [];
        $orWhere = null;

        // if ($request->has('keyword') && $request->input('keyword')) {
        //     $data = $data->where([['masp', 'like', '%' . $request->input('keyword') . '%']]);
        // }

        // if ($request->input('start') && $request->input('end')) {
        //     $start = $request->input('start');
        //     $end = $request->input('end');
        //     $data = $data->whereBetween('created_at', [$start, $end]);
        // } else if ($request->input('start')) {
        //     $start = $request->input('start');
        //     $data = $data->whereBetween('created_at', [$start, $now::now()]);
        // }

        if ($request->has('condition') && $request->input('condition')) {
            $data = $data->where('condition', $request->input('condition'));
        }

        if ($request->has('agency_id') && $request->input('agency_id')) {
            $data = $data->where('agency_id', $request->input('agency_id'));
        }

        if ($where) {
            $data = $data->where($where);
        }

        if ($orWhere) {
            $data = $data->orWhere(...$orWhere);
        }


        $data = $data->latest()->paginate(15);

        return view(
            "admin.pages.agency.cong-no",
            [
                'data' => $data,
                'agency' => $agency,
                'typePhieuXuat' => $this->typePhieuXuat,
                'listCondition' => $this->listCondition,
                'agencyId' => $request->input('agency_id') ? $request->input('agency_id') : "",
                'condition' => $request->input('condition') ? $request->input('condition') : "",
            ]
        );
    }

    public function changeTienNo(Request $request){
        if($request->ajax()){
            if ($request->id){
                $id = $request->id;
                $data = $this->xuatKho->find($id);

                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.change-tien-no-agency', [
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

            $data = $this->xuatKho->find($id);

            $tienNo = $request->tien_no;

            $data->update([
                'tien_no' => $tienNo,
            ]);

            DB::commit();
            return redirect()->route("admin.agency.congno")->with("alert", "Thay đổi thông tin thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.agency.congno")->with("error", "Thay đổi thông tin không thành công");
        }
    }
    
    public function create(Request $request = null)
    {
        $banks = $this->bank->get();
        return view("admin.pages.agency.add", [
            'banks' => $banks
        ]);
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataAdminAgencyCreate = [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "phone" => $request->input('phone'),
                "bank_id" => $request->input('bank_id'),
                "so_tai_khoan" => $request->input('so_tai_khoan'),
                "can_cuoc" => $request->input('can_cuoc'),
                "address" => $request->input('address'),
            ];

            $agency = $this->agency->create($dataAdminAgencyCreate);

            $agency->update([
                'ma_daily' => 'DL-'. $agency->id,
            ]);

            DB::commit();
            return redirect()->route('admin.agency.index')->with("alert", "Thêm đại lý thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.agency.index')->with("error", "Thêm đại lý không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->agency->find($id);
        $banks = $this->bank->get();
        return view("admin.pages.agency.edit", [
            'data' => $data,
            'banks' => $banks
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataAdminAgencyCreate = [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "phone" => $request->input('phone'),
                "bank_id" => $request->input('bank_id'),
                "so_tai_khoan" => $request->input('so_tai_khoan'),
                "can_cuoc" => $request->input('can_cuoc'),
                "address" => $request->input('address'),
            ];

            $this->agency->find($id)->update($dataAdminAgencyCreate);
            DB::commit();
            return redirect()->route('admin.agency.index')->with("alert", "Cập nhật thông tin đại lý thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.agency.index')->with("error", "Cập nhật thông tin không thành công");
        }
    }

    public function changeDueDateAgency(Request $request){
        if($request->ajax()){
            if ($request->id){
                $id = $request->id;
                $data = $this->xuatKho->find($id);

                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.change-due-date-agency', [
                        'data' => $data,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function storeChangeDueDateAgency($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $this->xuatKho->find($id);

            $due_date = $request->due_date;

            $data->update([
                'due_date' => $due_date,
            ]);

            DB::commit();
            return redirect()->route("admin.agency.congno")->with("alert", "Thay đổi thông tin thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.agency.congno")->with("error", "Thay đổi thông tin không thành công");
        }
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->agency, $id);
    }
}
