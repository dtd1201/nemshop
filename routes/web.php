<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require_once __DIR__ . '/admin.php';


//\Artisan::call('storage:link');
Route::get('test', function () {
    // $a = bcrypt('1234567890');
    // echo $a;
    $data = App\Models\District::find(1)->communes()->get();
    $countView = new \App\Helper\CountView();
    $model = new \App\Models\Product();
    $countView->countView($model, 'view', 'product', 5);
});

Route::group(
    [
        'prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']
    ],
    function () {
        UniSharp\LaravelFilemanager\Lfm::routes();
    }
);
Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function () {
    Route::group(['prefix' => 'address'], function () {
        Route::get('district', 'AddressController@getDistricts')->name('ajax.address.districts');
        Route::get('communes', 'AddressController@getCommunes')->name('ajax.address.communes');
    });
});
// 'middleware' => ['auth', 'cartToggle']
Route::group(['prefix' => 'cart'], function () {
    Route::get('list', 'ShoppingCartController@list')->name('cart.list');
    Route::get('add/{id}', 'ShoppingCartController@add')->name('cart.add');
    Route::get('buy/{id}', 'ShoppingCartController@buy')->name('cart.buy');
    Route::get('remove/{id}', 'ShoppingCartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'ShoppingCartController@update')->name('cart.update');
    Route::get('clear', 'ShoppingCartController@clear')->name('cart.clear');
    Route::post('order', 'ShoppingCartController@postOrder')->name('cart.order.submit');
    Route::get('order/sucess/{id}', 'ShoppingCartController@getOrderSuccess')->name('cart.order.sucess');
    Route::get('order/error', 'ShoppingCartController@getOrderError')->name('cart.order.error');
});
// compare product
Route::group(['prefix' => 'drugstore'], function () {
    Route::get('/', 'DrugStoreController@index')->name('drugstore.list');
    Route::get('/create', "DrugStoreController@create")->name("drugstore.create");
	 Route::get('/prescription', "DrugStoreController@prescription")->name("drugstore.prescription");


    // Route::get('add/{id}', 'CompareController@add')->name('compare.add');
    // Route::get('add-redirect/{id}', 'CompareController@addAndRedirect')->name('compare.addAndRedirect');
    // Route::get('remove/{id}', 'CompareController@remove')->name('compare.remove');
    // Route::get('update/{id}', 'CompareController@update')->name('compare.update');
    // Route::get('clear', 'CompareController@clear')->name('compare.clear');
});

Route::group(['prefix' => 'profile/register'], function () {
    Route::get('/{code}', 'ProfileController@createRegisterReferral')->name('profile.register-referral.create');
    Route::post('/store', 'ProfileController@storeRegisterReferral')->name('profile.register-referral.store');
});
// //drugstore
// Route::group(['prefix' => 'drugstore'], function () {
//     Route::get('/index', "DrugStoreController@index")->name("drugstore.index");
//     Route::get('/create', "DrugStoreController@create")->name("drugstore.create");
// });

Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
});
Route::post('/quickview', 'ProductController@quickview')->name('quickview');

Route::get('product-sale', 'ProductController@sale')->name('product.sale');

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::get('/history', 'ProfileController@history')->name('profile.history');
    Route::get('/transaction-detail/{id}', "ProfileController@loadTransactionDetail")->name("profile.transaction.detail");
    Route::get('/list-rose', 'ProfileController@listRose')->name('profile.listRose');
    Route::get('/list-member', 'ProfileController@listMember')->name('profile.listMember');
    Route::get('/create-member', 'ProfileController@createMember')->name('profile.createMember');
    Route::post('/store-member', 'ProfileController@storeMember')->name('profile.storeMember');
    Route::post('/draw_point', 'ProfileController@drawPoint')->name('profile.drawPoint');
    Route::get('/history-draw-point', 'ProfileController@historyDrawPoint')->name('profile.history-draw-point');
    Route::get('/diem-thuong-phat', 'ProfileController@pointThuongPhat')->name('profile.pointThuongPhat');

    Route::get('/edit-info', 'ProfileController@editInfo')->name('profile.editInfo');
    Route::post('/update-info/{id}', 'ProfileController@updateInfo')->name('profile.updateInfo')->middleware('profileOwnUser');

    Route::get('/edit-pass-word', 'ProfileController@editPassWord')->name('profile.editPassWord');
    Route::post('/update-pass-word/{id}', 'ProfileController@updatePassWord')->name('profile.updatePassWord')->middleware('profileOwnUser');

    //  Route::get('{id}-{slug}', 'ProductController@detail')->name('product.detail');
    //  Route::get('/category-product/{id}-{slug}', 'ProductController@productByCategory')->name('product.productByCategory');
});


// Route::get('/danh-muc-tin-tuc/{slug}', 'PostController@postByCategory')->name('post.postByCategory');


Route::get('/diem-ban', 'ContactController@diemBan')->name('diemBan');
Route::get('/diem-ban/{slug}', 'ContactController@diemBanChilds')->name('diemBanChilds');


// auth
Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/he-thong-nha-thuoc', 'HomeController@heThong')->name('home.he-thong');

Route::get('/hang-moi', 'ProductController@new')->name('home.new');
Route::get('/new-products', 'ProductController@index')->name('home.new.en');

Route::get('/ban-chay', 'ProductController@selling')->name('home.selling');
Route::get('/selling', 'ProductController@selling')->name('home.selling.en');

Route::get('/bo-suu-tap', 'ProductController@collection')->name('home.collection');
Route::get('/collection', 'ProductController@collection')->name('home.collection.en');

Route::get('/change-language/{language}', 'LanguageController@index')->name('language.index');

// giới thiệu
Route::get('/gioi-thieu', 'HomeController@aboutUs')->name('about-us');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us.en');
Route::get('/설명하다', 'HomeController@aboutUs')->name('about-us.ko');

// báo giá
Route::get('/cam-nhan-cua-khach-hang', 'HomeController@camnhan')->name('camnhan');
Route::get('/quote', 'HomeController@bao_gia')->name('bao-gia.en');
Route::get('/인용문', 'HomeController@bao_gia')->name('bao-gia.ko');

// tuyển dụng
Route::get('/tuyen-dung', 'HomeController@tuyen_dung')->name('tuyen-dung');
Route::get('/recruitment', 'HomeController@tuyen_dung')->name('tuyen-dung.en');
Route::get('/신병-모집', 'HomeController@tuyen_dung')->name('tuyen-dung.ko');

// chi tiết tuyển dụng
Route::get('/tuyen-dung/{slug}', 'HomeController@tuyendungDetail')->name('tuyendung_link');
Route::get('/recruitment/{slug}', 'HomeController@tuyendungDetail')->name('tuyendung_link.en');
Route::get('/신병-모집/{slug}', 'HomeController@tuyendungDetail')->name('tuyendung_link.ko');



// thông tin liên hệ
Route::post('contact/store-ajax-load', 'ContactController@storeAjaxLoad')->name('contact.storeAjaxLoad');
Route::post('contact/store-ajax', 'ContactController@storeAjax')->name('contact.storeAjax');
Route::post('contact/store-ajax1', 'ContactController@storeAjax1')->name('contact.storeAjax1');
Route::post('contact/store-ajax2', 'ContactController@storeAjax2')->name('contact.storeAjax2');
Route::get('/lien-he', 'ContactController@index')->name('contact.index');
Route::get('/contact', 'ContactController@index')->name('contact.index.en');
Route::get('/접촉', 'ContactController@index')->name('contact.index.ko');

// tìm kiếm đại lý

Route::get('/tim-kiem-dai-ly', 'HomeController@search_daily')->name('search-daily');
Route::get('/search-agent', 'HomeController@search_daily')->name('search-daily.en');
Route::get('/에이전트-검색', 'HomeController@search_daily')->name('search-daily.ko');

Route::group(['prefix' => 'comment'], function () {
    Route::post('/{type}/{id}', 'CommentController@store')->name('comment.store');
});

Route::group(['prefix' => 'search'], function () {
    Route::get('/', 'HomeController@search')->name('home.search');
});


// Route::group(['prefix' => 'tin-tuc'], function () {
//     Route::get('/', 'PostController@index')->name('post.index');
//     Route::get('{slug}', 'PostController@detail')->name('post.detail');

//     Route::get('tag/{slug}', 'PostController@tag')->name('post.tag');
// });
Route::get('tag/{slug}', 'PostController@tag')->name('post.tag');
Route::post('view-product', 'HomeController@renderProductView')->name('home.renderProductView');

// Route::get('{slug}', 'PostController@detail')->name('post.detail');
Route::post('product/rating/{id}', 'ProductController@rating')->name('product.rating');


Route::get('/change-size', 'ProductController@changeSize')->name('option.changeSize');
Route::post('/create/comment', 'ProductController@createComment')->name('product.create.comment');
Route::post('/load/comment', 'ProductController@loadComment')->name('product.load.comment');
Route::get('/filter/comment', 'ProductController@filterComment')->name('product.filter.comment');

//like
Route::post('/like/comment', 'ProductController@like')->name('product.like.comment');




// Route::get('{category}/{slug}', 'ProductController@detail')->name('product.detail');
// Route::get('{slug}', 'ProductController@productByCategory')->name('product.productByCategory');
Route::get('{slug}', 'KeyController@checkKey')->name('checkKey');
Route::get('storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path("app/public/{$folder}/{$filename}");
    if (!File::exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('filename', '(.*)');