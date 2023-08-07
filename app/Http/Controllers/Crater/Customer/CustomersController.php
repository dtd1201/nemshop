<?php

namespace App\Http\Controllers\Crater\Customer;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater;
use App\Models\Crm\Country;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;

        $customers = User::query()
            ->with('creator')
            // ->customer()
            ->applyFilters($request->only([
                'search',
                'contact_name',
                'display_name',
                'phone',
                'customer_id',
                'orderByField',
                'orderBy',
            ]))
            //->whereCompany($this->getCompanyId())
            ->select(
                'users.*',
                DB::raw('sum(invoices.due_amount) as due_amount')
            )
            ->groupBy('users.id')
            ->leftJoin('invoices', 'users.id', '=', 'invoices.user_id')
            ->paginateData($limit);

        $data = [
            'customers' => $customers,
            'customerTotalCount' => User::whereRole('customer')->count(),
        ];

        //dd($data);

        return view('admin.crater.customers.index', $data);
    }


    public function create()
    {
        $customer = new User();
        $countries = Country::query()->get();

        $data = [
            'type' => 1,
            'customer' => $customer,
            'countries' => $countries
        ];
        return view('admin.crater.customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\CustomerRequest $request)
    {
        $customer = User::createCustomer($request);

        return response()->json([
            'customer' => $customer,
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $customer)
    {
        $customer->load([
            'billingAddress.country',
            'shippingAddress.country',
            'fields.customField',
            'creator',
        ]);

        $currency = $customer->currency;

        return response()->json([
            'customer' => $customer,
            'currency' => $currency,
        ]);
    }


    /*
     * Get Item Detail
     * */
    public function ajaxGetCustomerDetail(Request $request)
    {
        $getPostId = $request->input('id');
        /** @var User $customer */
        $customer = User::query()
            ->where('id', $getPostId)
            ->first();
        if ($customer) {
            //$item->load('taxes');
            $data = [
                'customer' => $customer,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(array('msg' => 'Error'), 404);
        }
    }

    public function edit(User $customer)
    {
        $countries = Country::query()->get();

        $data = [
            'type' => 2,
            'countries' => $countries,
            'customer' => $customer,
        ];

        return view('admin.crater.customers.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Crm\User $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Requests\CustomerRequest $request, User $customer)
    {
        $customer = User::updateCustomer($request, $customer);

        $customer = User::with('billingAddress', 'shippingAddress', 'fields')->find($customer->id);

        return response()->json([
            'customer' => $customer,
            'success' => true,
        ]);
    }

    /**
     * Remove a list of Customers along side all their resources (ie. Estimates, Invoices, Payments and Addresses)
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        User::deleteCustomers($request->ids);

        return response()->json([
            'success' => true,
        ]);
    }
}
