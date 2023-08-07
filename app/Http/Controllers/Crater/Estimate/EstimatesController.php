<?php

namespace App\Http\Controllers\Crater\Estimate;

use App\Dictionaries\AppDomain;
use App\Dictionaries\Cms\CategoryType;
use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\DeleteEstimatesRequest;
use App\Http\Requests\Crater\EstimatesRequest;
use App\Jobs\Crater\GenerateEstimatePdfJob;
use App\Models\Crm\Estimate;
use App\Models\Crm\Invoice;
use App\Models\Crm\Unit;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class EstimatesController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;

        $estimates = Estimate::with([
            'items',
            'user',
            'taxes',
            'creator',
        ])
            ->join('users', 'users.id', '=', 'estimates.user_id')
            ->applyFilters($request->only([
                'status',
                'customer_id',
                'estimate_id',
                'estimate_number',
                'from_date',
                'to_date',
                'search',
                'orderByField',
                'orderBy',
            ]))
            ->whereCompany(1)
            ->select('estimates.*', 'users.name')
            ->latest()
            ->paginateData($limit);

        $siteData = [
            'estimates' => $estimates,
            'estimateTotalCount' => Estimate::count(),
        ];

        return view('admin.crater.estimates.index', $siteData);
    }

    /*
     * Create estimate
     * created 2021/11/15
     * */
    public function create()
    {
        $estimate = new Estimate();
        $units = Unit::query()->get();
        $estimateItem = $estimate->items;
        $customers = User::query()->get();
        $customer = $estimate->user;
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

        $data = [
            'type' => 1,
            'estimate' => $estimate,
            'estimateItem' => $estimateItem,
            'units' => $units,
            'customer' => $customer,
            'customers' => $customers,
            'items' => $items,
        ];

        return view('admin.crater.estimates.create', $data);
    }


    public function store(EstimatesRequest $request)
    {
        $estimate = Estimate::createEstimate($request);

        if ($request->has('estimateSend')) {
            $estimate->send($request->title, $request->body);
        }

        GenerateEstimatePdfJob::dispatch($estimate, true);

        $data = [
            'estimate' => $estimate,
        ];

        return redirect(route('admin.estimates.index'))->with('success', 'Estimate Update');
    }

    public function show(Request $request, Estimate $estimate)
    {
        $estimate->load([
            'items',
            'items.taxes',
            'user',
            'creator',
            'taxes',
            'taxes.taxType',
            'fields.customField',
        ]);

        $siteData = [
            'estimate' => $estimate,
            'nextEstimateNumber' => $estimate->getEstimateNumAttribute(),
            'estimatePrefix' => $estimate->getEstimatePrefixAttribute(),
        ];

        return view('admin.crater.estimates.show', $siteData);
    }

    public function edit(Estimate $estimate)
    {
        $units = Unit::query()->get();
        $customers = User::query()->get();

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

        $estimateItem = $estimate->items;
        $customer = $estimate->user;

        //dd($estimate->total);
        //dd($customer);
        //dd($estimate);
        //dd($estimateItem);
        //$estimate->updateEstimateValue($estimate->id);

        $data = [
            'type' => 2,
            'items' => $items,
            'estimate' => $estimate,
            'customer' => $customer,
            'customers' => $customers,
            'estimateItem' => $estimateItem,
            'units' => $units
        ];

        //dd($estimate);

        return view('admin.crater.estimates.create', $data);
    }

    public function update(EstimatesRequest $request, Estimate $estimate)
    {
        $estimate = $estimate->updateEstimate($request);

        GenerateEstimatePdfJob::dispatch($estimate, true);

        $data = [
            'estimate' => $estimate,
        ];

        return redirect(route('admin.estimates.index'))->with('success', 'Estimate Update');
    }

    public function delete(DeleteEstimatesRequest $request)
    {
        Estimate::destroy($request->ids);

        $data = [
            'success' => true,
        ];

        return redirect(route('admin.estimates.index'))->with('success', 'Estimate Update');
    }
}
