<?php

namespace App\Http\Controllers\Crater\Invoice;

use App\Dictionaries\AppDomain;
use App\Dictionaries\Cms\CategoryType;
use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater;
use App\Http\Requests\Crater\DeleteInvoiceRequest;
use App\Jobs\Crater\GenerateInvoicePdfJob;
use App\Models\Crm\CompanySetting;
use App\Models\Crm\Currency;
use App\Models\Crm\Invoice;
use App\Models\Crm\InvoiceItem;
use App\Models\Crm\Item;
use App\Models\Crm\Unit;
use App\Models\User;
use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 30;

        $currency = Currency::findOrFail(17);
        //dd($currency);
        $invoices = Invoice::with(['items', 'user', 'creator', 'taxes'])
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->applyFilters($request->only([
                'status',
                'paid_status',
                'customer_id',
                'invoice_id',
                'invoice_number',
                'from_date',
                'to_date',
                'orderByField',
                'orderBy',
                'search',
            ]))
            //->whereCompany($this->getCompanyId())
            ->select('invoices.*', 'users.name')
            ->latest()
            ->paginateData($limit);

        $appDomain = AppDomain::all();
        $appCategoryType = CategoryType::euroSecurityType();
        $dataInvoiceStatus = Invoice::allStatus();
        $customers = User::query()->get();

        $data = [
            'invoices' => $invoices,
            'dataInvoiceStatus' => $dataInvoiceStatus,
            'invoiceTotalCount' => Invoice::count(),
            'appDomain' => $appDomain,
            'appCategoryType' => $appCategoryType,
            'customers' => $customers,
        ];

        return view('admin.crater.invoices.index', $data);
    }


    /*
     * Create Invoice
     * created 2021/11/15
     * */
    public function create()
    {
        $now = new Carbon();
        $invoice = new Invoice();
        $invoice_prefix = CompanySetting::getSetting(
            'invoice_prefix',
            1
        );
        $invoice->invoice_number = $invoice_prefix . "-" . Invoice::getNextInvoiceNumber($invoice_prefix);
        $invoice->invoice_date = $now->toDateString();
        $invoice->status = Invoice::STATUS_DRAFT;
        $invoice->due_date = $now->addDay(3)->toDateString();
        $units = Unit::query()->get();
        $invoiceItem = $invoice->items;
        $customers = User::query()->get();
        $customer = $invoice->user;
        if ($customer == false) {
            $customer = new User();
        }

        $domainID = AppDomain::FRUIT_STORE;
        $categoryTypeProduct = CategoryType::FRUIT_STORE_PRODUCT;
        $items = Posts::query()
            ->leftJoin('blog_categories', 'blog_posts.category_id', '=', 'blog_categories.id')
            ->where('blog_posts.domain_id', $domainID)
            ->where('blog_posts.category_type', $categoryTypeProduct)
            //->where('blog_categories.category_type_all', $categoryTypeTraining)
            ->select('blog_posts.*')
            ->orderBy('blog_posts.id', 'desc')
            ->take(10)
            ->orderBy('id', 'desc')
            ->get();

        $dataInvoiceStatus = Invoice::allStatus();

        $data = [
            'type' => 1,
            'invoice' => $invoice,
            'dataInvoiceStatus' => $dataInvoiceStatus,
            'invoiceItem' => $invoiceItem,
            'units' => $units,
            'customer' => $customer,
            'customers' => $customers,
            'items' => $items,
        ];

        return view('admin.crater.invoices.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$invoice = Invoice::createInvoice($request);
        $invoice = new Invoice();

        $input = $request->all();
        $now = new Carbon();
        $invoice_prefix = CompanySetting::getSetting(
            'invoice_prefix',
            1
        );
        $invoice->invoice_number = $invoice_prefix . "-" . Invoice::getNextInvoiceNumber($invoice_prefix);
        $invoice->user_id = $request->input('customer_id');
        $invoice->creator_id = 1;
        $invoice->invoice_date = $now->toDateString();
        $invoice->due_date = $now->toDateString();
        $invoice->paid_status = Invoice::STATUS_UNPAID;
        $invoice->template_name = 'invoice1';
        $invoice->company_id = 1;
        $invoice->tax_per_item = 0;
        $invoice->discount_per_item = 0;
        $invoice->due_amount = 0;
        $invoice->tax = 0;
        $invoice->total = 0;
        $invoice->sub_total = 0;
        $invoice->invoice_number = $request->input('invoice_number');
        $invoice->reference_number = $request->input('reference_number');
        $invoice->status = $request->input('status');

        $invoice->unique_hash = Str::random(60);
        //Todo save Invoice Item
        $invoice->save();
        //Todo save item product
        //Remover old item
        //InvoiceItem::query()->where('invoice_id', $invoice->id)->delete();
        $newProduct = isset($input['product']) ? $input['product'] : '';
        //dd($newProduct);
        foreach ($newProduct as $itemProduct) {
            $modelItem = new InvoiceItem();
            $modelItem->invoice_id = $invoice->id;
            $modelItem->item_id = $itemProduct['item_id'];
            $modelItem->name = $itemProduct['name'];
            $modelItem->description = $itemProduct['name'];
            $modelItem->quantity = $itemProduct['quantity'];
            $modelItem->tax = $itemProduct['tax'];
            $modelItem->price = isset($itemProduct['price']) ? $itemProduct['price'] : 0;
            $modelItem->total = isset($itemProduct['price']) ? $itemProduct['price'] : 0;
            $modelItem->discount_type = 1;
            $modelItem->discount_val = 1;
            //dd($modelItem->attributesToArray());
            $modelItem->save();
        }
        if ($request->has('invoiceSend')) {
            $invoice->send($request->subject, $request->body);
        }

        GenerateInvoicePdfJob::dispatch($invoice, true);

        $data = [
            'invoice' => $invoice,
        ];

        return redirect(route('admin.invoices.index'))->with('success', 'Invoice Update');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\Invoice $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Invoice $invoice)
    {
        $invoice->load([
            'items',
            'items.taxes',
            'user',
            'taxes.taxType',
            'fields.customField',
        ]);

        if (empty($invoice->unique_hash)){
            $invoice->unique_hash = Str::random(60);
            $invoice->save();
        }
        GenerateInvoicePdfJob::dispatchSync($invoice, true);

        //dd($invoice->invoicePdfUrl);
//Todo update Invoice
        $invoice->updateInvoiceValue($invoice->id);

        $siteData = [
            'invoice' => $invoice,
            'nextInvoiceNumber' => $invoice->getInvoiceNumAttribute(),
            'invoiceCustomer' => $invoice->user,
            'invoicePrefix' => $invoice->getInvoicePrefixAttribute(),
        ];

        return view('admin.crater.invoices.show', $siteData);
    }

    public function edit(Invoice $invoice)
    {
        $units = Unit::query()->get();
        $customers = User::query()->get();

        GenerateInvoicePdfJob::dispatch($invoice, true);

        $domainID = AppDomain::FRUIT_STORE;
        $categoryTypeProduct = CategoryType::FRUIT_STORE_PRODUCT;
        $categoryTypeBlog = CategoryType::FRUIT_STORE_BLOG;
        $categoryTypeTraining = CategoryType::FRUIT_STORE_CATEGORY;
        $items = Posts::query()
            ->leftJoin('blog_categories', 'blog_posts.category_id', '=', 'blog_categories.id')
            ->where('blog_posts.domain_id', $domainID)
            ->where('blog_posts.category_type', $categoryTypeProduct)
            //->where('blog_categories.category_type_all', $categoryTypeTraining)
            ->select('blog_posts.*')
            ->orderBy('blog_posts.id', 'desc')
            ->take(10)
            ->orderBy('id', 'desc')
            ->get();

        $invoiceItem = $invoice->items;
        $customer = $invoice->user;

        //dd($invoice->toArray());
        //dd($invoice->total);
        //dd($customer);
        //dd($invoice);
        //dd($invoiceItem);
        $invoice->updateInvoiceValue($invoice->id);
        $dataInvoiceStatus = Invoice::allStatus();

        $data = [
            'type' => 2,
            'items' => $items,
            'invoice' => $invoice,
            'dataInvoiceStatus' => $dataInvoiceStatus,
            'customer' => $customer,
            'customers' => $customers,
            'invoiceItem' => $invoiceItem,
            'units' => $units
        ];

        //dd($invoice);

        return view('admin.crater.invoices.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Invoice $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Invoice $invoice)
    {
        //dd('Invoice Update');
        //$invoice = $invoice->updateInvoice($request);
        $input = $request->all();

        $invoice->user_id = $request->input('customer_id');
        $invoice->invoice_number = $request->input('invoice_number');
        $invoice->reference_number = $request->input('reference_number');
        $invoice->status = $request->input('status');

        //Todo save Invoice Item
        //Todo save item product
        //Remover old item
        InvoiceItem::query()->where('invoice_id', $invoice->id)->delete();
        $newProduct = isset($input['product']) ? $input['product'] : '';
        //dd($newProduct);
        foreach ($newProduct as $itemProduct) {
            $modelItem = new InvoiceItem();
            $modelItem->invoice_id = $invoice->id;
            $modelItem->item_id = $itemProduct['item_id'];
            $modelItem->name = $itemProduct['name'];
            $modelItem->description = $itemProduct['name'];
            $modelItem->quantity = $itemProduct['quantity'] ? $itemProduct['quantity']: 1;
            $modelItem->tax = $itemProduct['tax'];
            $modelItem->price = isset($itemProduct['price']) ? $itemProduct['price'] : 0;
            $modelItem->total = $modelItem->quantity * $modelItem->price;
            $modelItem->discount_type = 1;
            $modelItem->discount_val = 1;
            //dd($modelItem->attributesToArray());
            $modelItem->save();
        }

        GenerateInvoicePdfJob::dispatch($invoice, true);

        $invoice->save();
        $data = [
            'invoice' => $invoice,
            'success' => true,
        ];

        return redirect(route('admin.invoices.index'))->with('success', 'Invoice Update');
    }

    /*
     * Add Invoice Item
     *
     * @created 2021/11/15
     * */
    public function addInvoiceItem(Request $request, Invoice $invoice)
    {
        /** @var Invoice $modelInvoice */
        //$modelInvoice = Invoice::find($invoiceCustomerID);

        //dd($request->input('item_id'));
        $modelInvoice = $invoice;

        if ($modelInvoice) {
            $getPostId = $request->input('item_id');
            if ($getPostId) {
                /** @var Posts $modelItemPost */
                $modelItemPost = Posts::query()
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
                    $modelItemInvoice->name = $modelItemPost->title;
                    $modelItemInvoice->description = $modelItemPost->excerpt;
                    $modelItemInvoice->price = $modelItemPost->price ? $modelItemPost->price : 0;
                    $total = 1;
                    $modelItemInvoice->total = $modelItemPost->price ? $modelItemPost->price : 0;
                    $modelItemInvoice->unit_name = $modelItemPost->unit ? $modelItemPost->unit->name : '';
                    $modelItemInvoice->thumbnail_base_url = $modelItemPost->thumbnail_base_url;
                    $modelItemInvoice->thumbnail_path = $modelItemPost->thumbnail_path;
                    $modelItemInvoice->quantity = $request->input('quantity_value');
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

            //return response()->json(array('msg' => 'Success'), 200);
        } else {
            //return response()->json(array('msg' => 'Error'), 422);
        }

        return redirect(route('admin.invoices.edit', $invoice))->with('success', 'Invoice Update');
    }

    /*
   * Xóa item cart
   * */
    public function removeItem(Request $request, $invoice_id, $id)
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

        return redirect(route('admin.invoices.edit', $modelInvoice))->with('success', 'Item deleted!');
    }

    /**
     * delete the specified resources in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteInvoiceRequest $request)
    {
        Invoice::destroy($request->ids);

        return response()->json([
            'success' => true,
        ]);

        return redirect(route('admin.invoices.index'))->with('success', 'Invoice Update');
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
        //dd('Invoice Delete');
        /** @var Invoice $invoice */
        $invoice = Invoice::find($id);
        $invoice->delete();

        return redirect(route('admin.invoices.index'))->with('success', 'Invoice Update');
    }

    public function loadCreateProduct($id, Request $request)
    {
        $modelItem = Posts::query()->findOrFail($id);
        $index = $modelItem->id;
        return response()->json([
            'code' => 200,
            'html' => view('admin.crater.invoices.components.load-create-product', [
                'data' => $modelItem,
                'index' => $index,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }
}
