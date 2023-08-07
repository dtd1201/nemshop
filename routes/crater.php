<?php

use Illuminate\Support\Facades\Route;

//Crater
use App\Http\Controllers\Admin\Crater\Item\ItemsController as CraterItemsController;
use App\Http\Controllers\Admin\Crater\Item\UnitsController as CraterUnitsController;
use App\Http\Controllers\Admin\Crater\Settings\TaxTypesController as CraterTaxTypesController;

use App\Http\Controllers\Admin\Crater\Invoice\ChangeInvoiceStatusController;
use App\Http\Controllers\Admin\Crater\Invoice\CloneInvoiceController;
use App\Http\Controllers\Admin\Crater\Invoice\InvoicesController;
use App\Http\Controllers\Admin\Crater\Invoice\InvoiceTemplatesController;
use App\Http\Controllers\Admin\Crater\Invoice\SendInvoiceController;
use App\Http\Controllers\Admin\Crater\Settings\MailConfigurationController;

use App\Http\Controllers\Admin\Crater\Estimate\ChangeEstimateStatusController;
use App\Http\Controllers\Admin\Crater\Estimate\ConvertEstimateController;
use App\Http\Controllers\Admin\Crater\Estimate\EstimatesController;
use App\Http\Controllers\Admin\Crater\Estimate\EstimateTemplatesController;
use App\Http\Controllers\Admin\Crater\Estimate\SendEstimateController;
use App\Http\Controllers\Admin\Crater\Expense\ExpenseCategoriesController;
use App\Http\Controllers\Admin\Crater\Expense\ExpensesController;
use App\Http\Controllers\Admin\Crater\Expense\ShowReceiptController;
use App\Http\Controllers\Admin\Crater\Expense\UploadReceiptController;

use App\Http\Controllers\Admin\Crater\Payment\PaymentMethodsController;
use App\Http\Controllers\Admin\Crater\Payment\PaymentsController;
use App\Http\Controllers\Admin\Crater\Payment\SendPaymentController;


use App\Http\Controllers\Admin\Crater\Customer\CustomersController;
use App\Http\Controllers\Admin\Crater\Customer\CustomerStatsController;
use App\Http\Controllers\Admin\Crater\SettingController as CraterSettingController;

//Frontend
use App\Http\Controllers\Domain\FruitStore\ItemController as FruitStorItemController;
use App\Http\Controllers\Domain\FruitStore\OrderController as FruitStorOrderController;

//Crater
use App\Http\Controllers\Admin\Crater\Invoice\InvoicePdfController;

use App\Http\Controllers\Domain\FruitStore\Auth\LoginController;
use App\Http\Controllers\Domain\FruitStore\Auth\RegisteredUserController;
use App\Http\Controllers\Domain\FruitStore\Auth\AuthController as AdminAuthController;

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'as' => 'admin.'], function () {
    //CRM Crater
    Route::prefix('crater')->group(function () {
        Route::get('/users', function () {
            // Matches The "/admin/users" URL
        });
    });
    Route::get('/crater-setting', [CraterSettingController::class, 'index'])->name('craterSetting');

    // Items
    //----------------------------------


    Route::post('/items/delete', [CraterItemsController::class, 'delete']);

    Route::get('get-item-detail', [CraterItemsController::class, 'ajaxGetItemDetail'])->name('ajaxGetItemDetail');
    Route::get('load-create-product/{id}', [InvoicesController::class, 'loadCreateProduct'])->name("loadCreateProduct");

    Route::resource('items', CraterItemsController::class);

    Route::resource('units', CraterUnitsController::class);

    // Customers
    //----------------------------------

    Route::post('/customers/delete', [CustomersController::class, 'delete']);

    Route::get('customers/{customer}/stats', CustomerStatsController::class);

    Route::resource('customers', CustomersController::class);
    //Ajax Customer Detail
    Route::get('get-customer-detail', [CustomersController::class, 'ajaxGetCustomerDetail'])->name('ajaxGetCustomerDetail');

    // Invoices
    //-------------------------------------------------

    Route::post('/invoices/{invoice}/send', SendInvoiceController::class)->name('sendInvoiceToCustomer');

    Route::post('/invoices/{invoice}/clone', CloneInvoiceController::class);

    Route::post('/invoices/{invoice}/status', ChangeInvoiceStatusController::class);

    Route::post('/invoices/delete', [InvoicesController::class, 'delete']);

    Route::get('/invoices/templates', InvoiceTemplatesController::class);

    Route::resource('invoices', InvoicesController::class);

    // update post
    //Route::post('invoice/update/{id}', [InvoicesController::class, 'update'])->name('postInvoiceUpdate');
    Route::post('invoice/add-item/{invoice?}', [InvoicesController::class, 'addInvoiceItem'])->name('postInvoiceAddItem');
    Route::delete('invoice/remove-item/{invoice_id}/{id}', [InvoicesController::class, 'removeItem'])->name('removeItemInvoice');
    // Estimates
    //-------------------------------------------------

    //Gửi báo giá
    Route::post('/estimates-send', [\App\Http\Controllers\Admin\AdminQuoteController::class, 'sendEmailEstimate'])->name('sendEstimateItemCustomer');

    Route::get('/estimates-show/{id}', [\App\Http\Controllers\Admin\AdminQuoteController::class, 'showEstimate'])->name('showEstimate');

    //Tải phiếu in phiếu
    Route::get('/invoice-show/{id}', [InvoicesController::class, 'showInvoice'])->name('showInvoice');

    Route::post('/estimates/{estimate}/send', SendEstimateController::class)->name('sendEstimateToCustomer');

    Route::post('/estimates/{estimate}/status', ChangeEstimateStatusController::class);

    Route::post('/estimates/{estimate}/convert-to-invoice', ConvertEstimateController::class);

    Route::get('/estimates/templates', EstimateTemplatesController::class);

    Route::post('/estimates/delete', [EstimatesController::class, 'delete']);

    Route::resource('estimates', EstimatesController::class);


    // Expenses
    //----------------------------------

    Route::get('/expenses/{expense}/show/receipt', ShowReceiptController::class);

    Route::post('/expenses/{expense}/upload/receipts', UploadReceiptController::class);

    Route::post('/expenses/delete', [ExpensesController::class, 'delete']);

    Route::resource('expenses', ExpensesController::class);

    //Route::resource('crater-categories', ExpenseCategoriesController::class);


    // Payments
    //----------------------------------

    Route::post('/payments/{payment}/send', SendPaymentController::class);

    Route::post('/payments/delete', [PaymentsController::class, 'delete']);

    Route::resource('payments', PaymentsController::class);

    Route::resource('payment-methods', PaymentMethodsController::class);

});

Route::group(['middleware' => [\App\Http\Middleware\Store\FruitStoreMiddleware::class], 'as' => 'FruitStore.'], function () {
    //Auth
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('fruitStoreLogin');
    Route::post('login', [LoginController::class, 'login'])->name('fruitStorePostLogin');

    Route::get('profile-user', [LoginController::class, 'profile'])->name('fruitStoreUserProfile');
    Route::post('profile-user', [LoginController::class, 'profileUpdate'])->name('fruitStoreUserProfileUpdate');
    //Auth
    Route::get('/telegram-callback', [AdminAuthController::class, 'handleTelegramCallback'])->name('telegramAuthfruitStore');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('fruitStoreRegister');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('fruitStorePostRegister');

    //Logout
    Route::get('auth/logout', function () {
        Auth::guard('web')->logout();
        return redirect()->intended('/');
        // return redirect(\route('logout'));
    })->name('logoutfruitWeb');
    Route::group(['prefix' => 'ajax', 'namespace' => 'Auth'], function () {
        Route::get('check-login', 'LoginController@checkLoginAjax')->name('ajax.login.checkLoginAjax');
    });
    Route::get('logout', [LoginController::class, 'logout'])->name('fruitStore.logout');
    Route::post('logout', [LoginController::class, 'logout'])->name('fruitStorePostLogout');


    //Cart order
    Route::get('cart/{id?}', [FruitStorOrderController::class, 'cart'])->name('cartFruitStore');
//Route::get('load-item-cart/{id?}', [FruitStorOrderController::class, 'cart'])->name('cartFruitStore');
//cart info
    Route::get('item-cart/get-card-info', [FruitStorOrderController::class, 'ajaxGetCartItemDetail'])->name('ajaxGetCartItem');

    Route::post('invoice', [FruitStorOrderController::class, 'invoice'])->name('invoiceFruitStore');
    Route::get('add-to-cart/{id}', [FruitStorOrderController::class, 'addToCart'])->name('addtocartcartFruitStore');
    Route::patch('update-cart', [FruitStorOrderController::class, 'update'])->name('updatecartcartFruitStore');
    Route::delete('remove-from-cart', [FruitStorOrderController::class, 'remove'])->name('removefromcartcartFruitStore');
    Route::delete('remove-cart-item/{invoice_id}/{id}', [FruitStorOrderController::class, 'remove'])->name('removeCartItemFruitStore');

    Route::post('add-card-item', [FruitStorOrderController::class, 'ajaxAddCartItem'])->name('ajaxAddCartItem');

// download invoice pdf
// -------------------------------------------------

    Route::get('/invoices/pdf/{invoice:unique_hash}', InvoicePdfController::class)->name('invoicePdfFruit');

});
