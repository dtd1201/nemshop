<?php

namespace App\Http\Controllers\Crater\Expense;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\ExpenseCategoryRequest;
use App\Models\Crm\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 15;

        $categories = ExpenseCategory::whereCompany($this->getCompanyId())
            ->applyFilters($request->only([
                'category_id',
                'search',
            ]))
            ->latest()
            ->paginateData($limit);


        $data = [
            'categories' => $categories,
        ];

        return view('admin.crater.settings.expense.category', $data);
    }

    public function create()
    {
        $model = new ExpenseCategory();
        $data['model'] = $model;

        return view('admin.crater.settings.expense.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCategoryRequest $request)
    {
        $data = $request->validated();
        $data['company_id'] = $request->header('company');
        $category = ExpenseCategory::create($data);

        return response()->json([
            'category' => $category,
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crm\ExpenseCategory $category
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $category)
    {
        return response()->json([
            'category' => $category,
        ]);
    }


    public function edit($id)
    {
        $model = ExpenseCategory::query()->where('id', $id)->first();

        $data['model'] = $model;

        return view('admin.crater.settings.expense.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Crm\ExpenseCategory $ExpenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseCategoryRequest $request, ExpenseCategory $category)
    {
        $category->update($request->validated());

        return response()->json([
            'category' => $category,
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Crater\ExpensesCategory $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $category)
    {
        if ($category->expenses() && $category->expenses()->count() > 0) {
            return response()->json([
                'success' => false,
            ]);
        }

        $category->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
