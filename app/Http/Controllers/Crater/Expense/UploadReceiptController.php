<?php

namespace App\Http\Controllers\Crater\Expense;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\Expense;
use Illuminate\Http\Request;

class UploadReceiptController extends Controller
{
    /**
     * Upload the expense receipts to storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Expense $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, Expense $expense)
    {
        $data = json_decode($request->attachment_receipt);

        if ($data) {
            if ($request->type === 'edit') {
                $expense->clearMediaCollection('receipts');
            }

            $expense->addMediaFromBase64($data->data)
                ->usingFileName($data->name)
                ->toMediaCollection('receipts', 'local');
        }

        return response()->json([
            'success' => 'Expense receipts uploaded successfully',
        ]);
    }
}
