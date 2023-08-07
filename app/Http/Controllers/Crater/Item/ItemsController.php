<?php

namespace App\Http\Controllers\Crater\Item;

//use App\Http\Controllers\Crater\Controller;
use  App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater;
use App\Http\Requests\Crater\DeleteItemsRequest;
use App\Models\Crm\Item;
use App\Models\Crm\TaxType;
use App\Models\Crm\Unit;
use App\Models\Posts;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;

class ItemsController extends Controller
{
    /**
     * Retrieve a list of existing Items.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $limit = $request->has('limit') ? $request->limit : 10;

        $items = Item::with(['taxes', 'creator'])
            ->leftJoin('units', 'units.id', '=', 'items.unit_id')
            ->applyFilters($request->only([
                'search',
                'price',
                'unit_id',
                'item_id',
                'orderByField',
                'orderBy',
            ]))
            //->whereCompany($request->header('company'))
            ->whereCompany($this->getCompanyId($request))
            ->select('items.*', 'units.name as unit_name')
            ->latest()
            ->paginateData($limit);

        $data = [
            'items' => $items,
            'taxTypes' => TaxType::latest()->get(),
            'itemTotalCount' => Item::count(),
        ];
        //($data);

        return view('admin.crater.items.index', $data);
    }

    public function create()
    {
        $item = new Item();
        $units = Unit::query()->get();

        $data = [
            'type' => 1,
            'item' => $item,
            'taxTypes' => TaxType::latest()->get(),
            'units' => $units
        ];

        return view('admin.crater.items.create', $data);
    }

    /**
     * Create Item.
     *
     * @param App\Http\Requests\Crater\ItemsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Crater\ItemsRequest $request)
    {
        $item = Item::createItem($request);

        return redirect(route('admin.items.index'))->with('success', 'Item Created!');
        //return response()->json(['item' => $item,]);
    }

    /**
     * get an existing Item.
     *
     * @param Item $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Item $item)
    {
        $item->load('taxes');

        return response()->json([
            'item' => $item,
        ]);
    }

    /*
     * Get Item Detail
     * */
    public function ajaxGetItemDetail(Request $request)
    {
        $getPostId = $request->input('id');
        /** @var Posts $item */
        $item = Posts::query()
            ->where('id', $getPostId)
            ->first();
        if ($item) {
            //$item->load('taxes');
            $data = [
                'item' => [
                    'id' => $item->id,
                    'price' => $item->price,
                    'url' => route('admin.loadCreateProduct',['id' => $item->id]),
                ],
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(array('msg' => 'Error'), 404);
        }
    }

    public function edit(Item $item)
    {
        $units = Unit::query()->get();

        $taxTypes = TaxType::whereCompany($this->getCompanyId())
            ->latest()
            ->paginateData(10);

        $data = [
            'type' => 2,
            'item' => $item,
            'taxTypes' => $taxTypes,
            'units' => $units
        ];

        return view('admin.crater.items.create', $data);
    }

    /**
     * Update an existing Item.
     *
     * @param Crater\Http\Requests\ItemsRequest $request
     * @param \App\Models\Crm\Item $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Crater\ItemsRequest $request, Item $item)
    {
        //dd($request->all());
        $item = $item->updateItem($request);

        return redirect(route('admin.items.index'))->with('success', 'Item updated!');
        //return response()->json(['item' => $item,]);
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
        /** @var Item $item */
        $item = Item::find($id);
        $item->delete();

        return redirect(route('sale.items.index'))->with('success', 'Contact deleted!');
    }

    /**
     * Delete a list of existing Items.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteItemsRequest $request)
    {
        Item::destroy($request->ids);

        return response()->json([
            'success' => true,
        ]);
    }
}
