<?php

namespace App\Http\Controllers\Crater\Settings;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\TaxTypeRequest;
use App\Models\Crm\TaxType;
use Illuminate\Http\Request;

class TaxTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 15;

        $taxTypes = TaxType::whereCompany($request->header('company'))
            ->applyFilters($request->only([
                'tax_type_id',
                'search',
                'orderByField',
                'orderBy',
            ]))
            ->latest()
            ->paginateData($limit);

        $data = [
            'taxTypes' => $taxTypes,
        ];

        return view('admin.crater.settings.tax-types.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'type' => 1
        ];

        return view('admin.crater.settings.tax-types.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxTypeRequest $request)
    {
        $data = $request->validated();

        $data['company_id'] = $request->header('company');

        $taxType = TaxType::create($data);

        $data = [
            'taxType' => $taxType,
        ];

        return redirect(route('admin.tax-types.index'))->with('success', 'Unit saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\TaxType $taxType
     * @return \Illuminate\Http\Response
     */
    public function show(TaxType $taxType)
    {
        $data = [
            'taxType' => $taxType,
        ];

        return view('admin.crater.settings.tax-types.create', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\TaxType $taxType
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxType $taxType)
    {
        $data = [
            'type' => 2,
            'taxType' => $taxType,
        ];

        return view('admin.crater.settings.tax-types.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Crm\TaxType $taxType
     * @return \Illuminate\Http\Response
     */
    public function update(TaxTypeRequest $request, TaxType $taxType)
    {
        $taxType->update($request->validated());

        $data = [
            'taxType' => $taxType,
        ];

        return redirect(route('admin.tax-types.index'))->with('success', 'Unit saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Crm\TaxType $taxType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxType $taxType)
    {
        if ($taxType->taxes() && $taxType->taxes()->count() > 0) {
            $data = [
                'success' => false,
            ];
        }
        $taxType->delete();

        $data = [
            'success' => true,
        ];

        return redirect(route('admin.tax-types.index'))->with('success', 'Tag deleted!');
    }
}
