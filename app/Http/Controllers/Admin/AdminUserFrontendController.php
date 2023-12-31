<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Point;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\ValidateAddAdminUserFrontend;
use App\Http\Requests\Admin\ValidateEditAdminUserFrontend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Admin\ValidateTranferPointBetweenXY;
use App\Http\Requests\Admin\ValidateTranferPointRandom;
use App\Http\Requests\Frontend\ValidateEditUser;
use App\Traits\PointTrait;
use App\Models\Bank;
use App\Models\Product;
use App\Models\Transaction;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;
use App\Exports\ExcelExportsDatabaseUser;
use App\Exports\ExcelExportsDatabaseUser2;
class AdminUserFrontendController extends Controller
{
    //
    // các trạng thái tài khoản active
    // 0 vừa tạo chưa kích hoạt
    // 1 đã kích hoat
    // 2 khóa tài khoản
    use DeleteRecordTrait, PointTrait, StorageImageTrait;

    private $user;

    private $numberChild = 3;
    private $typePoint;
    private $daiLy;
    private $rose;
    private $tranferPointDefault;
    private $bank;
    private $product;
    private $transaction;
    private $typeUser;
    private $admin;
    public function __construct(Point $point, User $user, Bank $bank, Product $product, Transaction $transaction, Admin $admin)
    {
        $this->typePoint = config('point.typePoint');
        $this->daiLy = config('point.daiLy');
        $this->rose = config('point.rose');
        $this->typeUser = config('point.typeUser');
        $this->tranferPointDefault = config('point.transferPointDefault');
        $this->user = $user;
        $this->point = $point;
        $this->bank = $bank;
        $this->product = $product;
        $this->transaction = $transaction;
        $this->admin = $admin;
    }
    public function index(Request $request)
    {
        //  dd($this->product->setAppends(['number_pay'])->find(1));
        //   $a=  $this->product->setAppends(['pay'])->get()->toArray();
        //   asort($a);
        //  dd($a);
        // $this->point->where('type',3)->update([
        //     'point'=>1,
        // ]);
        $totalUser = $this->user->where('type', 1)->whereNotIn('id', [20, 21, 22])->get()->count();
        $data = $this->user->where('type', 1)->whereNotIn('id', [20, 21, 22]);
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {
            $data = $data->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->orWhere('username', 'like', '%' . $request->input('keyword') . '%');
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 'userNoActive':
                    $where[] = ['active', '=', 0];
                    break;
                case 'userActive':
                    $where[] = ['active', '=', 1];
                    break;
                case 'userActiveKey':
                    $where[] = ['active', '=', 2];
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
                case 'usernameASC':
                    $orderby = [
                        'username',
                        'ASC'
                    ];
                    break;
                case 'usernameDESC':
                    $orderby = [
                        'username',
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
        //  dd($this->product->select('*', \App\Models\Store::raw('Sum(quantity) as total')->whereRaw('products.id','stores.product_id'))->orderBy('total')->paginate(15));

        $data = $data->paginate(15);

        //  $data = $this->user->whereIn('active', [1,2])->orderBy("order", "desc")->orderBy("created_at", "desc")->paginate(15);
        return view(
            "admin.pages.user_frontend.list",
            [
                'data' => $data,
                'totalUser' => $totalUser,
                'daiLy' => $this->daiLy,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    public function index2(Request $request)
    {
        //  dd($this->product->setAppends(['number_pay'])->find(1));
        //   $a=  $this->product->setAppends(['pay'])->get()->toArray();
        //   asort($a);
        //  dd($a);
        // $this->point->where('type',3)->update([
        //     'point'=>1,
        // ]);
        $totalUser = $this->user->where('type', 2)->get()->count();
        $data = $this->user->where('type', 2);
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {
            $data = $data->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->orWhere('username', 'like', '%' . $request->input('keyword') . '%');
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 'userNoActive':
                    $where[] = ['active', '=', 0];
                    break;
                case 'userActive':
                    $where[] = ['active', '=', 1];
                    break;
                case 'userActiveKey':
                    $where[] = ['active', '=', 2];
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
                case 'usernameASC':
                    $orderby = [
                        'username',
                        'ASC'
                    ];
                    break;
                case 'usernameDESC':
                    $orderby = [
                        'username',
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
        //  dd($this->product->select('*', \App\Models\Store::raw('Sum(quantity) as total')->whereRaw('products.id','stores.product_id'))->orderBy('total')->paginate(15));

        $data = $data->paginate(15);

        //  $data = $this->user->whereIn('active', [1,2])->orderBy("order", "desc")->orderBy("created_at", "desc")->paginate(15);
        return view(
            "admin.pages.user_frontend.list2",
            [
                'data' => $data,
                'totalUser' => $totalUser,
                'daiLy' => $this->daiLy,
                'typeUser' => $this->typeUser,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    // public function listNoActive()
    // {
    //     $data = $this->user->where('active', 0)->orderBy("created_at", "desc")->paginate(15);
    //     return view(
    //         "admin.pages.user_frontend.list",
    //         [
    //             'data' => $data
    //         ]
    //     );
    // }

    public function detail($id, Request $request)
    {

        $user = $this->user->find($id);

        $rose = $this->point->where([
            'user_id' => $user->id,
        ])->whereIn(
            'type',
            [2, 3]
        )->orderby('created_at', 'DESC')->paginate(15);
        //  dd($rose);
        $htmlRoseUserFrontend = view('admin.components.load-rose-user-front-end', [
            'user' => $user,
            'rose' => $rose,
            'typePoint' => $this->typePoint
        ])->render();



        $dataUserTotal = $this->user->listUser20($user);
        $dataUser = $this->paginate($dataUserTotal, 15);
        $dataUser->withPath(route('admin.user_frontend.detail', [
            'id' => $id
        ]));
        $htmlUserFrontend = view('admin.components.load-user-front-end', [
            'user' => $user,
            'dataUser' => $dataUser,
            'typePoint' => $this->typePoint
        ])->render();

        $sumEachType = $this->point->sumEachType($user->id);
        $sumPointCurrent = $this->point->sumPointCurrent($user->id);
        if ($request->ajax()) {
            if ($request->type == 'user_frontend') {
                return response()->json([
                    'code' => 200,
                    'html' => $htmlUserFrontend,
                    'type' => 'user_frontend',
                    'messange' => 'success'
                ], 200);
            } else if ($request->type == 'rose-user_frontend') {
                return response()->json([
                    'code' => 200,
                    'html' => $htmlRoseUserFrontend,
                    'type' => 'rose-user_frontend',
                    'messange' => 'success'
                ], 200);
            }
        }
        return view("admin.pages.user_frontend.detail",
            [
                'user' => $user,
                'rose' => $rose,
                'htmlRoseUserFrontend' => $htmlRoseUserFrontend,
                'htmlUserFrontend' => $htmlUserFrontend,
                'typePoint' => $this->typePoint,
                'sumEachType' => $sumEachType,
                'sumPointCurrent' => $sumPointCurrent
            ]
        );
    }
    public function create(Request $request = null)
    {
        //    $parent_id2 = $this->user->getParentIdOfNewUser();
        //   dd(   $parent_id2 );
        return view(
            "admin.pages.user_frontend.add",
            [
                'request' => $request,

            ]
        ); 
    }
    public function store(ValidateAddAdminUserFrontend $request)
    {
        try {
            DB::beginTransaction();

            //  $parent_id2 = $this->getParentIdOfNewUser();
            $parent_id2 = $this->user->getParentIdOfNewUser();
            //   dd( $parent_id2);
            $type = $request->input('type');
            $chuc_danh = null;
            if ($type == 1) {
                $chuc_danh = 1;
                $userTongGiamDoc = $this->user->where('type', 1)->where('chuc_danh', 1)->first();
                if ($userTongGiamDoc) {
                    return redirect()->route('admin.user_frontend.create')->with("error", "Bạn chỉ được phép tạo tối đa 1 user tổng giám đốc");
                }
            } else {
                $quantri_hethong = $this->user->where('type', 3)->first();
                if ($quantri_hethong) {
                    return redirect()->route('admin.user_frontend.create')->with("error", "Bạn chỉ được phép tạo tối đa 1 user quản trị hệ thống");
                }
            }

            $dataAdminUserFrontendCreate = [
                "name" => $request->input('name'),
                "username" => $request->input('username'),
                "email" => $request->input('email'),
                'order' => $this->user->getOrderOfNewUser(),
                "parent_id" => 0,
                "parent_id2" => $parent_id2,
                "parent_id3" => 0,
                "password" => Hash::make('A123456'),
                "active" => 1,
                "code" => makeCodeUser($this->user),
                "admin_id"=>auth()->guard('admin')->user()->id,
                "level" => 1,
                "type" => $type,
                "chuc_danh" => $chuc_danh,
            ];
            //  dd($dataAdminUserFrontendCreate);
            // insert database in user table
            $user = $this->user->create($dataAdminUserFrontendCreate);
            // insert database to product_tags table

            // thêm điểm thưởng cây 7 lớp
            //   dd($user->parent2);
            // $this->addPointTo7($user);


            //   dd($this->product);
            // $product = $this->product->where(['masp' => $request->input('masp')])->first();

            //   dd($product);
            // $code = makeCodeTransaction($this->transaction);

            // $totalPrice = $product->price * (100 - $product->sale) / 100;

            // thêm số điểm nạp lúc đầu
            // $user->points()->create([
            //     'type' => $this->typePoint[4]['type'],
            //     'point' => moneyToPoint($totalPrice),
            //     'active' => 1,
            // ]);

            // Trừ điểm mua sản phẩm
            // $user->points()->create([
            //     'type' => $this->typePoint[6]['type'],
            //     'point' => -moneyToPoint($totalPrice),
            //     'active' => 1,
            // ]);

            // Điểm khi admin tạo tài khoản
            // $user->points()->create([
            //     'type' => $this->typePoint[10]['type'],
            //     'point' =>  moneyToPoint($totalPrice * ($this->typePoint['pointStart'] / 100 )),
            //     'active' => 1,
            // ]);

            // $dataTransactionCreate = [
            //     'code' => $code,
            //     'total' => $totalPrice,
            //     'point' =>  0,
            //     'money' => $totalPrice,
            //     'name' => $user->name,
            //     'phone' => null,
            //     'note' => null,
            //     'email' => null,
            //     'status' => 1,
            //     'city_id' => null,
            //     'district_id' => null,
            //     'commune_id' => null,
            //     'address_detail' => null,
            //     'admin_id' => Auth::guard('admin')->user()->id,
            //     'user_id' => $user->id,
            //     'add_point_20' => 1,
            // ];

            // tạo giao dịch
            //    dd($this->transaction);
            // $transaction = $this->transaction->create($dataTransactionCreate);
            // tạo các order của transaction
            // $dataOrderCreate = [];

            // $dataOrderCreate[] = [
            //     'name' => $product->name,
            //     'quantity' => 1,
            //     'new_price' => $totalPrice,
            //     'old_price' => $product->price,
            //     'avatar_path' => $product->avatar_path,
            //     'sale' => $product->sale,
            //     'product_id' => $product->id,
            // ];
            // $pay = $product->pay;
            // $product->update([
            //     'pay' => $pay + $dataOrderCreate[0]['quantity'],
            // ]);

            //   dd($dataOrderCreate);
            // insert database in orders table by createMany
            // $transaction->orders()->createMany($dataOrderCreate);

            // Đưa sản phẩm trong kho sang trạng thái đợi vận chuyển
            // $dataStoreCreate = [
            //     "type" => 2,
            //     'active' => 1,
            // ]; 

            // $dataStoreCreate["transaction_id"] = $transaction->id;
            // $orders = $transaction->orders;
            // $listDataStoreCreate = [];
            // foreach ($orders as $order) {
            //     $storeItem = $dataStoreCreate;
            //     $storeItem['quantity'] = -$order->quantity;
            //     $storeItem['product_id'] = $order->product_id;
            //     array_push($listDataStoreCreate, $storeItem);
            // }
            //   dd($listDataStoreCreate);
            // $transaction->stores()->createMany($listDataStoreCreate);

            // thêm điểm thưởng cây 20 lớp
            // $this->addPointTo20($user, $totalPrice);

            // $this->canNhanhUser($user);

            DB::commit();
            return redirect()->route('admin.user_frontend.create')->with("alert", "Thêm thành viên thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.user_frontend.create')->with("error", "Thêm thành viên không thành công");
        }
    }

    public function create2(Request $request = null)
    {
        return view(
            "admin.pages.user_frontend.add2",
            [
                'request' => $request,

            ]
        ); 
    }
    public function store2(ValidateAddAdminUserFrontend $request)
    {
        try {
            DB::beginTransaction();

            //  $parent_id2 = $this->getParentIdOfNewUser();
            $parent_id2 = $this->user->getParentIdOfNewUser();
            //   dd( $parent_id2);

            $userTongGiamDoc = $this->user->where('type', 2)->where('chuc_danh', 1)->first();
            if ($userTongGiamDoc) {
                return redirect()->route('admin.user_frontend.create')->with("error", "Bạn chỉ được phép tạo tối đa 1 user tổng giám đốc");
            }

            $dataAdminUserFrontendCreate = [
                "name" => $request->input('name'),
                "username" => $request->input('username'),
                "email" => $request->input('email'),
                'order' => $this->user->getOrderOfNewUser(),
                "parent_id" => 0,
                "parent_id2" => $parent_id2,
                "parent_id3" => 0,
                "password" => Hash::make('A123456'),
                "active" => 1,
                "code" => makeCodeUser($this->user),
                "admin_id"=>auth()->guard('admin')->user()->id,
                "level" => 1,
                "type" => 2,
                "chuc_danh" => 1,
            ];

            $user = $this->user->create($dataAdminUserFrontendCreate);
            // $product = $this->product->where(['masp' => $request->input('masp')])->first();

            //   dd($product);
            // $code = makeCodeTransaction($this->transaction);

            // $totalPrice = $product->price * (100 - $product->sale) / 100;

            // $dataTransactionCreate = [
            //     'code' => $code,
            //     'total' => $totalPrice,
            //     'point' =>  0,
            //     'money' => $totalPrice,
            //     'name' => $user->name,
            //     'phone' => null,
            //     'note' => null,
            //     'email' => null,
            //     'status' => 1,
            //     'city_id' => null,
            //     'district_id' => null,
            //     'commune_id' => null,
            //     'address_detail' => null,
            //     'admin_id' => Auth::guard('admin')->user()->id,
            //     'user_id' => $user->id,
            //     'add_point_20' => 1,
            // ];

            // tạo giao dịch
            //    dd($this->transaction);
            // $transaction = $this->transaction->create($dataTransactionCreate);
            // tạo các order của transaction
            // $dataOrderCreate = [];

            // $dataOrderCreate[] = [
            //     'name' => $product->name,
            //     'quantity' => 1,
            //     'new_price' => $totalPrice,
            //     'old_price' => $product->price,
            //     'avatar_path' => $product->avatar_path,
            //     'sale' => $product->sale,
            //     'product_id' => $product->id,
            // ];
            // $pay = $product->pay;
            // $product->update([
            //     'pay' => $pay + $dataOrderCreate[0]['quantity'],
            // ]);

            //   dd($dataOrderCreate);
            // insert database in orders table by createMany
            // $transaction->orders()->createMany($dataOrderCreate);

            // Đưa sản phẩm trong kho sang trạng thái đợi vận chuyển
            // $dataStoreCreate = [
            //     "type" => 2,
            //     'active' => 1,
            // ]; 

            // $dataStoreCreate["transaction_id"] = $transaction->id;
            // $orders = $transaction->orders;
            // $listDataStoreCreate = [];
            // foreach ($orders as $order) {
            //     $storeItem = $dataStoreCreate;
            //     $storeItem['quantity'] = -$order->quantity;
            //     $storeItem['product_id'] = $order->product_id;
            //     array_push($listDataStoreCreate, $storeItem);
            // }
            //   dd($listDataStoreCreate);
            // $transaction->stores()->createMany($listDataStoreCreate);

            DB::commit();
            return redirect()->route('admin.user_frontend.create2')->with("alert", "Thêm thành viên thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.user_frontend.create2')->with("error", "Thêm thành viên không thành công");
        }
    }

    public function edit($id)
    {
        $data = $this->user->find($id);
        $banks = $this->bank->get();
        return view("admin.pages.user_frontend.edit", [
            'data' => $data,
            'banks' => $banks,
        ]);
    }

    public function update($id, ValidateEditAdminUserFrontend $request)
    {
        // dd($request->input('bank_id'));
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);
            $dataUserUpdate = [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "username" => $request->input('username'),
                "phone" => $request->input('phone'),
                "date_birth" => $request->input('date_birth'),
                "address" => $request->input('address'),
                "hktt" => $request->input('hktt'),
                "cmt" => $request->input('cmt'),
                "stk" => $request->input('stk'),
                "ctk" => $request->input('ctk'),
                "bank_id" => $request->input('bank_id'),
                "bank_branch" => $request->input('bank_branch'),
                "sex" => $request->input('sex'),
               // 'status' => 2,
                // "active" => $request->input('active'),
            ];
            //  dd($dataUserUpdate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataUserUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            if (request()->has('password')) {
                if (request()->input('password')) {
                    $dataUserUpdate['password'] = Hash::make($request->input('password'));
                }
            }
            //   dd($dataUserUpdate);
            // insert database in product table
            $this->user->find($id)->update($dataUserUpdate);
            $user = $this->user->find($id);
            DB::commit();
            return redirect()->route('admin.user_frontend.index')->with("alert", "Thay đổi thông tin thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.user_frontend.index')->with("error", "Thay đổi thông tin không thành công");
        }
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->user, $id);
    }
    public function getParentIdOfNewUser()
    {
        $numberChild = $this->numberChild;
        // công thức tính tổng số phần tử ở vòng thứ n là x*0 + (x^(n+1)-x)/(x-1);
        // công thức tính số phần tử của vòng thứ n = x^n;
        $numberUserDatabase = $this->user->where([
            'active' => 1,
        ])->get()->count();
        if ($numberUserDatabase > 0) {
            $numberUser = $numberUserDatabase + 1;
            $totalCicle = log((($numberUser - 1) * ($numberChild - 1) + $numberChild), $numberChild) - 1;
            // vòng hoàn thiện cuối cùng
            $n = floor($totalCicle);
            // dd($n);
            // tổng số user đến vòng thứ n là
            $numberUserN = 1 + (pow($numberChild, $n + 1) - $numberChild) / ($numberChild - 1);
            // dd($numberUserN);
            // số user đã có ở vòng tiếp theo
            $numberUserNNext = $numberUser - $numberUserN;
            // dd($numberUserNNext);
            // số user tối đa ở vòng tiếp theo là
            $numberUserMaxNNext = pow($numberChild, $n + 1);
            //  dd($numberUserMaxNNext);
            // số lượt rải chu kì ở vòng tiếp theo
            $nchuki = $numberUserMaxNNext / $numberChild;
            // user sẽ được làm cha của user mới là user thứ
            if ($numberUserNNext < $nchuki) {

                $nUserParent = $numberUserNNext;
            } else {
                if ($numberUserNNext % $nchuki == 0) {
                    $nUserParent = $nchuki;
                } else {
                    $nUserParent = $numberUserNNext % $nchuki;
                }
            }
            // if ($numberUserNNext % $nchuki == 0) {
            //     $nUserParent = $nchuki;
            // } else {
            //     $numberUserNNext = $numberUserNNext % $nchuki;
            //     $x = $numberUserNNext % $numberChild;
            //     while ($x>=$numberChild) {

            //     }

            // }
            // vị trị của thằng cha là
            $stt = $numberUserN - pow($numberChild, $n) + $nUserParent;
            // dd($nchuki);
            //  dd($nUserParent);
            // dd($stt);
            $userParent = $this->user->where([
                'active' => 1
            ])->orderBy('order', 'asc')->offset($stt - 1)->limit(1)->first();
            //   dd($nchuki);
            //  dd($n);
            //   dd($userParent);
            $parent_id2 = $userParent->id;
        } else {
            $parent_id2 = 0;
        }
        return $parent_id2;
    }

    public function loadActive($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);
            $active = $user->active;
            $activeUpdate = 0;

            if ($active) {
                // $activeUpdate = 0;
            } else {
                $adminId = auth()->guard('admin')->user()->id;
                $parent_id2 = $this->user->getParentIdOfNewUser();
                $userParent = $this->user->find($parent_id2);
                $activeUpdate = 1;
                $orderUpdate = $this->user->getOrderOfNewUser();
                $updateResult =  $user->update([
                    'active' => $activeUpdate,
                    'order' => $orderUpdate,
                    'parent_id2' => $parent_id2,
                    'admin_id' => $adminId,
                    'created_at' => time(),
                ]);
                $user = $this->user->find($id);
                // $this->addPointTo7($user);
                // $transaction = $user->transactions->first();

                //if ($transaction) {
                    // $user->transactions()->update([
                    //     'active' => 1,
                    //     'add_point_20' => true,
                    //     'admin_id' => $adminId,
                    // ]);

                    // dd($transaction->products);
                    // foreach ($transaction->products as $product) {
                    //     $product->update([
                    //         'pay' => abs($product->stores()->whereIn('type', [3, 2])->select(\App\Models\Store::raw('SUM(quantity) as total'))->first()->total)
                    //     ]);
                    // }
                    // dd($transaction->products);

                    // update điểm thưởng lúc đầu
                    // $user->points()->update([
                    //     'active' => 1
                    // ]);

                    // $transaction->stores()->update([
                    //     'active' => 1,
                    //     'admin_id' => $adminId,
                    // ]);
                //}
                

                // $userParent->points()->create([
                //     'type' => $this->typePoint[10]['type'],
                //     'point' =>  moneyToPoint($transaction->total * ($this->typePoint['pointStart'] / 100 )),
                //     'active' => 1,
                // ]);

                // $this->checkLevel($user);
                // $this->addPointTo20($user, $transaction->total);

                // $this->canNhanhUser($user);
            }

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active-user', ['data' => $user, 'type' => 'user'])->render(),
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

    public function kicUser($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);
            $kic = $user->kic;
            $kicUpdate = 0;

            if ($kic) {
 
            } else {
                $kicUpdate = 1;
                $updateResult = $user->update([
                    'kic' => $kicUpdate,
                ]);
                $user = $this->user->find($id);
            }

            DB::commit();

            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-kic-user', ['data' => $user, 'type' => 'user'])->render(),
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
    // khóa tài khoản
    public function loadActiveKey($id)
    {


        $user   =  $this->user->find($id);
        $active = $user->active;

        if ($active) {
            try {
                DB::beginTransaction();
                $adminId = auth()->guard('admin')->user()->id;
                if ($active == 1) {
                    $activeUpdate = 2;
                } elseif ($active == 2) {
                    $activeUpdate = 1;
                }
                $orderUpdate = $this->user->getOrderOfNewUser();
                $updateResult =  $user->update([
                    'active' => $activeUpdate,
                    'admin_id' => $adminId,
                ]);
                DB::commit();
                if ($updateResult) {
                    return response()->json([
                        "code" => 200,
                        "html" => view('admin.components.load-change-active-user', ['data' => $user, 'type' => 'user'])->render(),
                        "message" => "success"
                    ], 200);
                } else {
                    return response()->json([
                        "code" => 500,
                        "message" => "fail"
                    ], 500);
                }
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return response()->json([
                    "code" => 500,
                    "message" => "fail",
                    'title' => "Khóa tài khoản không thành công",
                ], 500);
            }
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail",
                'title' => "Khóa tài khoản không thành công do tài khoản chưa được kích hoạt",
            ], 200);
        }
    }

    // load chi tiết user
    public function loadUserDetail($id)
    {
        $user = $this->user->find($id);
        $sumEachType = $this->point->sumEachType($id);
        $sumPointCurrent = $this->point->sumPointCurrent($id);
        //  dd($user);
        return response()->json([
            'code' => 200,
            'htmlTransactionDetail' => view('admin.components.user_frontend-detail', [
                'user' => $user,
                'sumEachType' => $sumEachType,
                'sumPointCurrent' => $sumPointCurrent,
                'typePoint' => $this->typePoint
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    // băn điểm với giá trị mặc định
    public function transferPoint($id)
    {
        try {
            DB::beginTransaction();


            $user = $this->user->whereIn('active', [1])->find($id);
            $adminId = auth()->guard('admin')->user()->id;
            $user->points()->create([
                'type' => $this->typePoint[8]['type'],
                'point' => $this->tranferPointDefault,
                'active' => 1,
                'userorigin_id' => $adminId
            ]);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => '',
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
    // bắn điểm từ STT x - y
    public function transferPointBetweenXY(ValidateTranferPointBetweenXY $request)
    {
        try {
            DB::beginTransaction();
            $adminId = auth()->guard('admin')->user()->id;
            $users   =  $this->user->whereIn('active', [1])->whereBetween('order', [$request->input('start'), $request->input('end')])->get();
            //  dd($users);
            $numberUser = $users->count();
            // dd($numberUser);
            foreach ($users as $user) {
                $user->points()->create([
                    'type' => $this->typePoint[8]['type'],
                    'point' => $this->tranferPointDefault,
                    'active' => 1,
                    'userorigin_id' => $adminId
                ]);
            }
            DB::commit();
            return redirect()->route("admin.user_frontend.index")->with("transferPointBetweenXY", "Bắn điểm thành công đên tổng số " . $numberUser . " thành viên từ STT " . $request->input('start') . "-" . $request->input('end'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.user_frontend.index")->with("transferPointBetweenXYError", "Bắn điểm không  thành công");
        }
    }

    // bắn điểm với giá trị tùy chọn
    public function transferPointRandom(ValidateTranferPointRandom $request)
    {
        try {
            DB::beginTransaction();
            $adminCurrent = auth()->guard('admin')->user();
            //    dd($adminCurrent);
            $users   =  $this->user->whereIn('active', [1])->where('order', $request->input('order'))->get();
            //  dd($users);
            $numberUser = $users->count();
            // dd($numberUser);
            foreach ($users as $user) {
                $user->points()->create([
                    'type' => $this->typePoint[1]['type'],
                    'point' => $request->input('point'),
                    'active' => 1,
                    'userorigin_id' => $adminCurrent->id,
                ]);
            }
            DB::commit();
            return redirect()->route("admin.user_frontend.index")->with("transferPointRandom", "Bắn điểm thành công đên tổng số " . $numberUser . " thành viên có  STT " . $request->input('order'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route("admin.user_frontend.index")->with("transferPointRandomError", "Bắn điểm không  thành công");
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function plusPoint(Request $request){
        if($request->ajax()){
            if ($request->user_id){
                $user_id = $request->user_id;
                $user = $this->user->find($user_id);

                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.plus-point', [
                        'user' => $user,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function storePlusPoint($id, Request $request)
    {
        $user = $this->user->find($id);
        $route = "admin.user_frontend.index";
        if ($user->type == 2) {
            $route = "admin.user_frontend.index2";
        }
        try {
            DB::beginTransaction();

            $user = $this->user->find($id);

            $adminId = auth()->guard('admin')->user()->id;
            $user->points()->create([
                'type' => $this->typePoint[8]['type'],
                'point' => $request->point,
                'content' => $request->content,
                'active' => 1,
                'userorigin_id' => $adminId
            ]);
            
            DB::commit();
            return redirect()->route($route)->with("alert", "Thưởng điểm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route($route)->with("error", "Thưởng điểm thất bại");
        }
    }

    public function minusPoint(Request $request){
        if($request->ajax()){
            if ($request->user_id){
                $user_id = $request->user_id;
                $user = $this->user->find($user_id);

                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.minus-point', [
                        'user' => $user,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function storeMinusPoint($id, Request $request)
    {
        $user = $this->user->find($id);
        $route = "admin.user_frontend.index";
        if ($user->type == 2) {
            $route = "admin.user_frontend.index2";
        }
        try {
            DB::beginTransaction();

            $user = $this->user->find($id);

            $adminId = auth()->guard('admin')->user()->id;
            $user->points()->create([
                'type' => $this->typePoint[13]['type'],
                'point' => - (abs($request->point)),
                'content' => $request->content,
                'active' => 1,
                'userorigin_id' => $adminId
            ]);
            
            DB::commit();
            return redirect()->route($route)->with("alert", "Trừ điểm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route($route)->with("error", "Trừ điểm thất bại");
        }
    }

    public function excelExportDatabase(Request $request)
    {
        // $start = $request->input('start');
        // $end = $request->input('end');
        // $typeUser = $request->input('typeUser');
        // dd($typeUser);
        // dd($start,$end);
        return Excel::download(new ExcelExportsDatabaseUser(), 'thanh-vien-kinh-doanh.xlsx');
    }

    public function excelExportDatabase2(Request $request)
    {
        // $start = $request->input('start');
        // $end = $request->input('end');
        // $typeUser = $request->input('typeUser');
        // dd($typeUser);
        // dd($start,$end);
        return Excel::download(new ExcelExportsDatabaseUser2(), 'thanh-vien-nha-thuoc.xlsx');
    }
}
