<?php

namespace App\Http\Controllers\Crater\Item;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\UnitRequest;
use App\Models\Crm\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 15;

        $units = Unit::whereCompany(1)
            ->applyFilters($request->only([
                'unit_id',
            ]))
            ->latest()
            ->paginateData($limit);

        $data = [
            'units' => $units,
        ];

        return view('admin.crater.units.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Unit();
        $data = [
            'type' => 1,
            'unit' => $model
        ];

        return view('admin.crater.units.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $data = $request->validated();
        $data['company_id'] = 1;
        $unit = Unit::create($data);

        $data = [
            'unit' => $unit,
        ];

        return redirect(route('admin.units.index'))->with('success', 'Unit saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $data = [
            'unit' => $unit,
        ];

        return view('admin.crater.units.create', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $data = [
            'unit' => $unit,
            'type' => 2
        ];

        return view('admin.crater.units.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Crm\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        $data = [
            'unit' => $unit,
        ];

        return redirect(route('admin.units.index'))->with('success', 'Unit saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Crm\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        if ($unit->items()->exists()) {
            $data = [
                'error' => 'items_attached',
            ];
        }

        $unit->delete();

        $data = [
            'success' => 'Unit deleted successfully',
        ];

        return redirect(route('admin.units.index'))->with('success', 'Unit deleted!');
    }
}
