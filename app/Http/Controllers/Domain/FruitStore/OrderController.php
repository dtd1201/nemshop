<?php

namespace App\Http\Controllers\Domain\FruitStore;

use App\Dictionaries\AppDomain;
use App\Helpers\TimeHelper;
use App\Http\Controllers\Controller;
use App\Jobs\Crater\GenerateInvoicePdfJob;
use App\Jobs\Crater\Invoice\NewInvoice;
use App\Jobs\Crater\Invoice\NewInvoiceOrder;
use App\Models\Crm\CompanySetting;
use App\Models\Crm\District;
use App\Models\Crm\Invoice;
use App\Models\Crm\InvoiceItem;
use App\Models\Crm\Ward;
use App\Models\Customer;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /*
     * 1. Kiểm tra hóa đơn đang tạo
     * nếu có lấy ra => chưa có khởi tạo
     *
     * */
    public function cart(Request $request, $id = null)
    {
        //
        /** @var User $user */
        //$user = Auth::guard('fruit')->user();
        $user = $this->getFruitUserActive($request);
        $idUser = $user ? $user->id : null;
        //Guess account
        if ($idUser == false) {
            $keyName = 'str1';
            $keyCookieGuess = $this->getCookie($request, $keyName);
            $value = Str::random(5);
            if ($keyCookieGuess == false) {
                $minutes = TimeHelper::SECONDS_IN_A_WEEK;
                return response('Hello World')->cookie(
                    $keyName, $value, $minutes
                );
            }
            //Todo assign user id with coookie
            //1.Finder user by cookie
            $userByCookie = User::query()
                ->where('key_cookie', $keyCookieGuess)
                ->first();
            if ($userByCookie) {
                $user = $userByCookie;
                $idUser = $user ? $user->id : null;
            } else {
                //Create new
                /** @var User $modelByCoookie */
                $modelByCoookie = new User();
                $modelByCoookie->domain_id = AppDomain::FRUIT_STORE;
                $modelByCoookie->name = 'Guess User';
                $modelByCoookie->address = 'Hà Nội';
                $modelByCoookie->email = $keyCookieGuess . '@gmail.com';
                $modelByCoookie->password = $keyCookieGuess;
                $modelByCoookie->key_cookie = $keyCookieGuess;
                $modelByCoookie->save();
                //Assigin user
                $user = $modelByCoookie;
                $idUser = $user ? $user->id : null;
            }
        }
        //Format user display
        if ($user->name == 'Guess User') {
            $user->name = '';
            $user->email = '';
        }

        $idInvoice = 1;
        $companyId = 1;
        /** @var Invoice $invoice */
        $invoice = Invoice::query()
            //->where('id', $idInvoice)
            ->where('creator_id', $idUser)
            ->where('status', Invoice::STATUS_DRAFT)
            ->first();

        //Create new invoice
        if ($invoice == false) {
            //abort(404);
            $invoiceModel = $this->inititalNewInvoice($idUser, $companyId);

            $invoice = $invoiceModel;
        }
        //Check empty hash
        if (empty($invoice->unique_hash)) {
            $invoice->unique_hash = Str::random(60);
            $invoice->save();
        }

        $invoice->updateInvoiceValue($invoice->id);

        //dd($invoice->unique_hash);
        //dd($invoice);
        //Load invoice
        $invoice->load([
            'items',
            'items.taxes',
            'user',
            'taxes.taxType',
            'fields.customField',
        ]);

        //dd($invoice->items);
        $invoiceItem = $invoice->items;

        $seo = [
            'title' => 'Saigon360 - Danh sách bài viết',
            'description' => 'Saigon360 - Danh sách bài viết',
            //'image' => url('/og_image.png'),
            'image' => 'https://res.cloudinary.com/dfeqcehdw/image/upload/w_1156,h_606,c_fill,q_auto,f_auto/v1635610469/yik50c1ikl06y9pvepn2.png',
            'type' => 'website',
            'image_w' => 345,
            'image_h' => 345,
        ];

        $dataDistrict = District::query()
            ->where('city_id', 2)
            ->get();
        /* $dataWard = Ward::query()
             ->where('district_id', 22)
             ->get();*/
        //dd($invoice);
        //NewInvoiceOrder::dispatchSync($invoice);

        $data = [
            'seo' => $seo,
            'user' => $user,
            'dataDistrict' => $dataDistrict,
            'invoice' => $invoice,
            'invoiceItem' => $invoiceItem,
            'nextInvoiceNumber' => $invoice->getInvoiceNumAttribute(),
            'invoicePrefix' => $invoice->getInvoicePrefixAttribute(),
        ];

        return view('domain.fruitstore.cart.checkout', $data);
    }

    public function deleteItem($invoice_id, $id)
    {

    }

    /*
     * Confirm Order and redirect to invoice
     *
     * */
    public function processOrder()
    {

    }

    /*
     * Invoice
     * =>Send invoice => Update Invoice status
     * Tạo liên kết khách hàng
     * Cập nhật id invoice vào khách hàng
     * Todo load from submit form
     * */
    public function invoice(Request $request, $id = false)
    {
        //
        $inputAll = $request->input();

        //
        $request->validate([
            'name' => 'required',
            //'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        /** @var User $user */
        //$user = Auth::guard('fruit')->user();
        $user = $this->getFruitUserActive($request);
        $idUser = $user ? $user->id : null;

        if ($idUser == false) {
            return redirect(route('home.index'));
        }
        //Update User Info
        if ($request->input('name')) {
            $user->name = $request->input('name');
        }
        if ($request->input('email')) {
            $user->email = $request->input('email');
        }
        if ($request->input('phone')) {
            $user->phone = $request->input('phone');
        }
        if ($request->input('address')) {
            $user->address = $request->input('address');
        }
        //Update User Info
        $user->save();
        //Save customer
        $customer = Customer::query()->where('user_id', $user->id)->first();
        if ($customer == false) {
            $modeCustomer = new Customer();
            $modeCustomer->user_id = $user->id;
            $modeCustomer->name = $user->name;
            $modeCustomer->email = $user->email;
            $modeCustomer->phone = $user->phone;
            $modeCustomer->address = $user->address;

            $modeCustomer->save();

            $customer = $modeCustomer;
        }
        $idInvoice = 1;
        /** @var Invoice $invoice */
        $invoice = Invoice::query()
            //->where('id', $idInvoice)
            ->where('creator_id', $idUser)
            ->where('status', Invoice::STATUS_DRAFT)
            ->first();

        if ($invoice == false) {
            //abort(404);
            return redirect(route('FruitStore.cartFruitStore'));
        }
        if (empty($invoice->user_id)) {
            $invoice->user_id = $idUser;
            $invoice->save();
        }

        //Load invoice
        $invoice->load([
            'items',
            'items.taxes',
            'user',
            'taxes.taxType',
            'fields.customField',
        ]);
        // dd($invoice->unique_hash);
        GenerateInvoicePdfJob::dispatchSync($invoice, true);
        //dd($invoice);
        // dd($invoice->invoicePdfUrl);
        $invoiceItem = $invoice->items;
        // GenerateInvoicePdfJob::dispatchSync($invoice);


        //Update Invoice Status
        $invoice->status = Invoice::STATUS_VIEWED;
        $invoice->user_id = $modeCustomer->id;
        $invoice->is_guess = 0;
        $invoice->save();

        //Send Alarm
        NewInvoice::dispatchSync($invoice);
        if (env('APP_ENV') == 'local') {
            //NewInvoice::dispatchSync($invoice);
        } else {
            //NewInvoiceOrder::dispatchSync($invoice);
        }

        //dd($invoice);

        $seo = [
            'title' => 'Saigon360 - Danh sách bài viết',
            'description' => 'Saigon360 - Danh sách bài viết',
            //'image' => url('/og_image.png'),
            'image' => 'https://res.cloudinary.com/dfeqcehdw/image/upload/w_1156,h_606,c_fill,q_auto,f_auto/v1635610469/yik50c1ikl06y9pvepn2.png',
            'type' => 'website',
            'image_w' => 345,
            'image_h' => 345,
        ];

        $data = [
            'seo' => $seo,
            'user' => $user,
            'invoice' => $invoice,
            'invoiceItem' => $invoiceItem,
            'nextInvoiceNumber' => $invoice->getInvoiceNumAttribute(),
            'invoicePrefix' => $invoice->getInvoicePrefixAttribute(),
        ];

        return view('domain.fruitstore.cart.invoice', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * Xóa item cart
     * */
    public function remove(Request $request, $invoice_id, $id)
    {
        //
        $type = 1;
        /** @var User $user */
        //$user = Auth::guard('fruit')->user();
        $user = $this->getFruitUserActive($request);
        $idUser = $user->id;
        $success_delete = 0;
        /** @var Invoice $modelInvoice */
        $modelInvoice = Invoice::query()
            ->where('id', $invoice_id)
            // ->where('creator_id', $idUser)
            //->where('status', Invoice::STATUS_DRAFT)
            ->first();

        if ($modelInvoice) {
            $invoiceItem = InvoiceItem::query()->where('id', $id)->first();
            if ($invoiceItem) {
                $invoiceItem->forceDelete();
                $success_delete = 1;
            }
        }
        //Todo update Cart

        return redirect(route('FruitStore.cartFruitStore', ['update' => 1, 'success' => $success_delete]))
            ->with('success', 'Xóa item thành công');
    }


    /*Update User*/
    /*
     * Load customer Invoice
     * */
    public function ajaxAddCartItem(Request $request)
    {
        /** @var User $user */
        //$user = Auth::guard('fruit')->user();
        $user = $this->getFruitUserActive($request);

        $idUser = $user ? $user->id : null;
        $getId = $request->input('id');

        if ($idUser == false) {
            return response()->json(array('msg' => 'User not set'), 422);
        }
        $invoiceCustomerID = 1;
        $companyId = 1;
        /** @var Invoice $modelInvoice */
        //$modelInvoice = Invoice::find($invoiceCustomerID);

        $modelInvoice = Invoice::query()
            //->where('id', $idInvoice)
            ->where('creator_id', $idUser)
            ->where('status', Invoice::STATUS_DRAFT)
            ->first();
        //Todo add new invoice
        if ($modelInvoice == false) {
            $modelInvoice = $this->inititalNewInvoice($idUser, $companyId);
        }

        if ($modelInvoice) {
            $getPostId = $request->input('id');
            if ($getPostId) {
                /** @var Product $modelItemPost */
                $modelItemPost = Product::query()
                    ->where('id', $getPostId)
                    ->first();
                //Check item has exist
                if ($modelItemPost == false) {
                    return response()->json(array('msg' => 'Item not found'), 404);
                }
                //Add item to invoice
                //Check Item has add to invoice
                /** @var InvoiceItem $itemInvoice */
                $itemInvoice = InvoiceItem::query()
                    ->where('invoice_id', $modelInvoice->id)
                    ->where('item_id', $modelItemPost->id)
                    ->first();

                //Đã có sp trong giỏ hàng
                if ($itemInvoice) {
                    $itemInvoice->quantity = $itemInvoice->quantity + 1;
                    $totalItemExits = $itemInvoice->price * $itemInvoice->quantity;
                    $itemInvoice->total = $totalItemExits;

                    $itemInvoice->save();
                } else {
                    //If not create new
                    $modelItemInvoice = new InvoiceItem();
                    $modelItemInvoice->invoice_id = $modelInvoice->id;
                    $modelItemInvoice->company_id = 1;
                    $modelItemInvoice->item_id = $modelItemPost->id;
                    $modelItemInvoice->article_id = $modelItemPost->id;
                    $modelItemInvoice->name = $modelItemPost->name;
                    $modelItemInvoice->description = $modelItemPost->description_ban_hang;
                    $modelItemInvoice->price = $modelItemPost->price ? $modelItemPost->price : 0;
                    $modelItemInvoice->total = $modelItemPost->price ? $modelItemPost->price : 0;
                    //$modelItemInvoice->unit_name = $modelItemPost->unit ? $modelItemPost->unit->name : '';
                    $modelItemInvoice->unit_name = 'Chiếc';
                    $modelItemInvoice->thumbnail_base_url = $modelItemPost->avatar_path;
                    $modelItemInvoice->thumbnail_path = '';
                    $modelItemInvoice->quantity = 1;
                    $modelItemInvoice->discount_type = 'fixed';
                    $modelItemInvoice->discount_val = 0;
                    $modelItemInvoice->discount = 0;
                    $modelItemInvoice->tax = 0;

                    $modelItemInvoice->save();
                }

                //Todo update Invoice
                $modelInvoice->updateInvoiceValue($modelInvoice->id);
            }

            GenerateInvoicePdfJob::dispatchSync($modelInvoice, true);

            //$modelInvoice->save();

            return response()->json(array('msg' => 'Success'), 200);
        } else {
            return response()->json(array('msg' => 'Error'), 422);
        }
    }

    /*
     * Get cart info
     *
     * @created 2021/11/10
     * */
    public function ajaxGetCartItemDetail(Request $request)
    {
        sleep(1);
        $data = [];
        /** @var User $user */
        //$user = Auth::guard('fruit')->user();
        $user = $this->getFruitUserActive($request);

        $idUser = $user ? $user->id : null;
        $getId = $request->input('id');

        if ($idUser == false) {
            return response()->json(array('msg' => 'User not set'), 422);
        }
        $invoiceCustomerID = 1;
        $companyId = 1;
        /** @var Invoice $modelInvoice */
        //$modelInvoice = Invoice::find($invoiceCustomerID);

        $modelInvoice = Invoice::query()
            //->where('id', $idInvoice)
            ->where('creator_id', $idUser)
            ->where('status', Invoice::STATUS_DRAFT)
            ->first();

        $data['id'] = $modelInvoice->id;
        $data['price'] = $modelInvoice->total;
        $data['priceText'] = format_money_vnd($modelInvoice->total);
        $data['qualityTotal'] = $modelInvoice->totalItemCart();
        $data['qualityText'] = $modelInvoice->totalItemCart() . '+';

        $invoiceItem = $modelInvoice->items;
        $htmlItem = view('domain.fruitstore.data.cart-item-list', [
            'invoiceItem' => $invoiceItem,
            'userInvoice' => $modelInvoice,
        ])->render();

        $data['htmlItem'] = $htmlItem;

        if ($modelInvoice) {
            return response()->json(['output' => $data], 200);
        } else {
            return response()->json(array('msg' => 'Error'), 422);
        }

    }

    private function checkInvoiceValid($invoiceID)
    {

    }

    private function inititalNewInvoice($idUser, $companyId)
    {
        $invoice_prefix = CompanySetting::getSetting(
            'invoice_prefix',
            $companyId
        );

        $date = Carbon::now();
        $data['invoice_number'] = $invoice_prefix . "-" . Invoice::getNextInvoiceNumber($invoice_prefix);
        $data['creator_id'] = $idUser;
        $data['user_id'] = $idUser;
        $data['template_name'] = 'invoice1';
        $data['status'] = Invoice::STATUS_DRAFT;
        $data['company_id'] = $companyId;
        $data['paid_status'] = Invoice::STATUS_UNPAID;
        $data['tax_per_item'] = CompanySetting::getSetting('tax_per_item', $companyId) ?? 'NO ';
        $data['discount_per_item'] = CompanySetting::getSetting('discount_per_item', $companyId) ?? 'NO';
        $data['sub_total'] = 0;
        $data['total'] = 0;
        $data['tax'] = 0;
        $data['due_amount'] = 0;
        $data['invoice_date'] = $date->format('Y-m-d');
        $data['due_date'] = $date->format('Y-m-d');

        /*if ($request->has('invoiceSend')) {
            $data['status'] = Invoice::STATUS_SENT;
        }*/

        $invoiceModel = Invoice::create($data);

        //$invoiceModel->unique_hash = Hashids::connection(Invoice::class)->encode($invoiceModel->id);
        $invoiceModel->unique_hash = Str::random(60);
        $invoiceModel->save();

        return $invoiceModel;
    }
}
