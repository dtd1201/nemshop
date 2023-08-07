<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/login', "Auth\AdminLoginController@showLoginForm")->name("admin.login");
Route::post('admin/logout', "Auth\AdminLoginController@logout")->name("admin.logout");
Route::post('admin/login', "Auth\AdminLoginController@login")->name("admin.login.submit");

Route::get('admin/password/confirm', 'Auth\AdminConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
Route::get('admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');





Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    // Route::get('/', function () {
    //     return view("admin.master.main");
    // });

    Route::get('/', "AdminHomeController@index")->name("admin.index");

    // Route::get('login', "AdminController@getLoginAdmin")->name("admin.getLoginAdmin");
    // Route::post('login', "AdminController@postLoginAdmin")->name("admin.postLoginAdmin");

    Route::group(['prefix' => 'ajax'], function () {
    });

    Route::get('/load-order/{table}/{id}', "AdminHomeController@loadOrderVeryModel")->name("admin.loadOrderVeryModel");
    //  Route::get('/lang-cr', "AdminCategoryProductController@langCr");
    Route::group(['prefix' => 'categoryproduct'], function () {
        Route::get('/', "AdminCategoryProductController@index")->name("admin.categoryproduct.index")->middleware(['can:category-product-list']);
        Route::get('/create', "AdminCategoryProductController@create")->name("admin.categoryproduct.create")->middleware('can:category-product-add');
        Route::post('/store', "AdminCategoryProductController@store")->name("admin.categoryproduct.store")->middleware('can:category-product-add');
        Route::get('/edit/{id}', "AdminCategoryProductController@edit")->name("admin.categoryproduct.edit")->middleware('can:category-product-edit');
        Route::post('/update/{id}', "AdminCategoryProductController@update")->name("admin.categoryproduct.update")->middleware('can:category-product-edit');
        Route::get('/destroy/{id}', "AdminCategoryProductController@destroy")->name("admin.categoryproduct.destroy")->middleware('can:category-product-delete');
        Route::post('/export/excel/database', "AdminCategoryProductController@excelExportDatabase")->name("admin.categoryproduct.export.excel.database");
        Route::post('/import/excel/database', "AdminCategoryProductController@excelImportDatabase")->name("admin.categoryproduct.import.excel.database");

        Route::get('/update-category-product-hot/{id}', "AdminCategoryProductController@loadHot")->name("admin.category-product.load.hot")->middleware('can:category-product-edit');
    });
    Route::group(['prefix' => 'categorypost'], function () {
        Route::get('/', "AdminCategoryPostController@index")->name("admin.categorypost.index")->middleware('can:category-post-list');
        Route::get('/create', "AdminCategoryPostController@create")->name("admin.categorypost.create")->middleware('can:category-post-add');
        Route::post('/store', "AdminCategoryPostController@store")->name("admin.categorypost.store")->middleware('can:category-post-add');
        Route::get('/edit/{id}', "AdminCategoryPostController@edit")->name("admin.categorypost.edit")->middleware('can:category-post-edit');
        Route::post('/update/{id}', "AdminCategoryPostController@update")->name("admin.categorypost.update")->middleware('can:category-post-edit');
        Route::get('/destroy/{id}', "AdminCategoryPostController@destroy")->name("admin.categorypost.destroy")->middleware('can:category-post-delete');
        Route::post('/export/excel/database', "AdminCategoryPostController@excelExportDatabase")->name("admin.categorypost.export.excel.database");
        Route::post('/import/excel/database', "AdminCategoryPostController@excelImportDatabase")->name("admin.categorypost.import.excel.database");

        Route::get('/update-category-post-hot/{id}', "AdminCategoryPostController@loadHot")->name("admin.categorypost.load.hot")->middleware('can:category-post-edit');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', "AdminMenuController@index")->name("admin.menu.index")->middleware('can:menu-list');
        Route::get('/create', "AdminMenuController@create")->name("admin.menu.create")->middleware('can:menu-add');
        Route::post('/store', "AdminMenuController@store")->name("admin.menu.store")->middleware('can:menu-add');
        Route::get('/edit/{id}', "AdminMenuController@edit")->name("admin.menu.edit")->middleware('can:menu-edit');
        Route::post('/update/{id}', "AdminMenuController@update")->name("admin.menu.update")->middleware('can:menu-edit');
        Route::get('/destroy/{id}', "AdminMenuController@destroy")->name("admin.menu.destroy")->middleware('can:menu-delete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', "AdminProductController@index")->name("admin.product.index")->middleware('can:product-list');
        Route::get('/create', "AdminProductController@create")->name("admin.product.create")->middleware('can:product-add');
        Route::post('/store', "AdminProductController@store")->name("admin.product.store")->middleware('can:product-add');
        Route::get('/edit/{id}', "AdminProductController@edit")->name("admin.product.edit")->middleware('can:product-edit');
        Route::post('/update/{id}', "AdminProductController@update")->name("admin.product.update")->middleware('can:product-edit');
        Route::get('/destroy/{id}', "AdminProductController@destroy")->name("admin.product.destroy")->middleware('can:product-delete');
        Route::get('/update-active/{id}', "AdminProductController@loadActive")->name("admin.product.load.active")->middleware('can:product-edit');
        Route::get('/update-hot/{id}', "AdminProductController@loadHot")->name("admin.product.load.hot")->middleware('can:product-edit');

        Route::get('/update-sp_km/{id}', "AdminProductController@loadKhuyenMai")->name("admin.product.load.sp_km")->middleware('can:product-edit');
        Route::get('/update-sp_ngoc/{id}', "AdminProductController@loadyeuThich")->name("admin.product.load.sp_ngoc")->middleware('can:product-edit');
        Route::get('/update-bo_suu_tap/{id}', "AdminProductController@boSuuTap")->name("admin.product.load.bo_suu_tap")->middleware('can:product-edit');


        Route::get('/delete-image/{id}', "AdminProductController@destroyProductImage")->name("admin.product.destroy-image")->middleware('can:product-edit');
        Route::post('/export/excel/database', "AdminProductController@excelExportDatabase")->name("admin.product.export.excel.database");
        Route::post('/import/excel/database', "AdminProductController@excelImportDatabase")->name("admin.product.import.excel.database");

        Route::get('load-option-product', "AdminProductController@loadOptionProduct")->name("admin.product.loadOptionProduct");
        Route::get('load-option-product-size', "AdminProductController@loadOptionProductSize")->name("admin.product.loadOptionSizeProduct");

        Route::get('/delete-option-product/{id}', "AdminProductController@destroyOptionProduct")->name("admin.product.destroyOptionProduct");

        Route::get('/delete-option-product-size/{id}', "AdminProductController@destroyOptionProductSize")->name("admin.product.destroyOptionProductSize");

        //Option sản phẩm
        Route::get('/list-product-option/{product_id}', "AdminProductController@listProductOption")->name("admin.product.option")->middleware('can:product-list');

        Route::get('/add-product-option/{product_id}', "AdminProductController@addProductOption")->name("admin.product.option.create")->middleware('can:product-add');

        Route::post('/option-store', "AdminProductController@optionStore")->name("admin.product.option.store")->middleware('can:product-add');

        Route::get('/edit-product-option/{id}', "AdminProductController@editProductOption")->name("admin.product.option.edit")->middleware('can:product-edit');

        Route::post('/update-product-option/{id}', "AdminProductController@updateProductOption")->name("admin.product.option.update")->middleware('can:product-edit');

        Route::get('/delete-product-option/{id}', "AdminProductController@destroyOption")->name("admin.product.destroyOption");

        Route::get('/delete-option-image/{id}', "AdminProductController@destroyProductOptionImage")->name("admin.product.option.destroy-image")->middleware('can:product-edit');

        // đoạn văn
        Route::get('load-paragraph-product', "AdminProductController@loadParagraphProduct")->name("admin.product.loadParagraphProduct");
        Route::get('/load-edit-paragraph-product/{id}', "AdminProductController@loadEditParagraphProduct")->name("admin.product.loadEditParagraphProduct");
        Route::get('/load-create-paragraph-product/{id}', "AdminProductController@loadCreateParagraphProduct")->name("admin.product.loadCreateParagraphProduct");
        Route::get('/load-parent-paragraph-product/{id}', "AdminProductController@loadParentParagraphProduct")->name("admin.product.loadParentParagraphProduct");
        Route::post('/store-paragraph-product/{id}', "AdminProductController@storeParagraphProduct")->name("admin.product.storeParagraphProduct");
        Route::post('/update-paragraph-product/{id}', "AdminProductController@updateParagraphProduct")->name("admin.product.updateParagraphProduct");
        Route::get('/delete-paragraph-product/{id}', "AdminProductController@destroyParagraphProduct")->name("admin.product.destroyParagraphProduct");
    });

    Route::group(['prefix' => 'variant'], function () {
        Route::get('/', "AdminVariantController@index")->name("admin.variant.index");
        Route::get('/create', "AdminVariantController@create")->name("admin.variant.create");
        Route::post('/store', "AdminVariantController@store")->name("admin.variant.store");
        Route::get('/edit/{id}', "AdminVariantController@edit")->name("admin.variant.edit");
        Route::post('/update/{id}', "AdminVariantController@update")->name("admin.variant.update");
        Route::get('/destroy/{id}', "AdminVariantController@destroy")->name("admin.variant.destroy");
    });

    Route::group(['prefix' => 'variant-value'], function () {
        Route::get('/', "AdminVariantValueController@index")->name("admin.variant-value.index");
        Route::get('/create', "AdminVariantValueController@create")->name("admin.variant-value.create");
        Route::post('/store', "AdminVariantValueController@store")->name("admin.variant-value.store");
        Route::get('/edit/{id}', "AdminVariantValueController@edit")->name("admin.variant-value.edit");
        Route::post('/update/{id}', "AdminVariantValueController@update")->name("admin.variant-value.update");
        Route::get('/destroy/{id}', "AdminVariantValueController@destroy")->name("admin.variant-value.destroy");
    });



    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', "AdminAttributeController@index")->name("admin.attribute.index")->middleware('can:product-list');
        Route::get('/create', "AdminAttributeController@create")->name("admin.attribute.create")->middleware('can:product-add');
        Route::post('/store', "AdminAttributeController@store")->name("admin.attribute.store")->middleware('can:product-add');
        Route::get('/edit/{id}', "AdminAttributeController@edit")->name("admin.attribute.edit")->middleware('can:product-edit');
        Route::post('/update/{id}', "AdminAttributeController@update")->name("admin.attribute.update")->middleware('can:product-edit');
        Route::get('/destroy/{id}', "AdminAttributeController@destroy")->name("admin.attribute.destroy")->middleware('can:product-delete');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('/', "AdminCommentController@index")->name("admin.comment.index");
        Route::get('/create', "AdminCommentController@create")->name("admin.comment.create");
        Route::post('/store', "AdminCommentController@store")->name("admin.comment.store");
        Route::get('/edit/{id}', "AdminCommentController@edit")->name("admin.comment.edit");
        Route::post('/update/{id}', "AdminCommentController@update")->name("admin.comment.update");
        Route::get('/destroy/{id}', "AdminCommentController@destroy")->name("admin.comment.destroy");
    });

    //Câu hỏi thường gặp
    Route::group(['prefix' => 'question'], function () {
        Route::get('/', "AdminQuestionController@index")->name("admin.question.index");
        Route::get('/create', "AdminQuestionController@create")->name("admin.question.create");
        Route::post('/store', "AdminQuestionController@store")->name("admin.question.store");
        Route::get('/edit/{id}', "AdminQuestionController@edit")->name("admin.question.edit");
        Route::post('/update/{id}', "AdminQuestionController@update")->name("admin.question.update");
        Route::get('/destroy/{id}', "AdminQuestionController@destroy")->name("admin.question.destroy");
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', "AdminSupplierController@index")->name("admin.supplier.index")->middleware('can:product-list');
        Route::get('/create', "AdminSupplierController@create")->name("admin.supplier.create")->middleware('can:product-add');
        Route::post('/store', "AdminSupplierController@store")->name("admin.supplier.store")->middleware('can:product-add');
        Route::get('/edit/{id}', "AdminSupplierController@edit")->name("admin.supplier.edit")->middleware('can:product-edit');
        Route::post('/update/{id}', "AdminSupplierController@update")->name("admin.supplier.update")->middleware('can:product-edit');
        Route::get('/destroy/{id}', "AdminSupplierController@destroy")->name("admin.supplier.destroy")->middleware('can:product-delete');
        Route::get('/update-active/{id}', "AdminSupplierController@loadActive")->name("admin.supplier.load.active")->middleware('can:product-edit');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', "AdminPostController@index")->name("admin.post.index")->middleware('can:post-list');
        Route::get('/create', "AdminPostController@create")->name("admin.post.create")->middleware('can:post-add');
        Route::post('/store', "AdminPostController@store")->name("admin.post.store")->middleware('can:post-add');
        Route::get('/edit/{id}', "AdminPostController@edit")->name("admin.post.edit")->middleware('can:post-edit');
        Route::post('/update/{id}', "AdminPostController@update")->name("admin.post.update")->middleware('can:post-edit');
        Route::get('/destroy/{id}', "AdminPostController@destroy")->name("admin.post.destroy")->middleware('can:post-delete');
        Route::get('/update-active/{id}', "AdminPostController@loadActive")->name("admin.post.load.active")->middleware('can:post-edit');
        Route::get('/update-hot/{id}', "AdminPostController@loadHot")->name("admin.post.load.hot")->middleware('can:post-edit');
        Route::post('/export/excel/database', "AdminPostController@excelExportDatabase")->name("admin.post.export.excel.database");
        Route::post('/import/excel/database', "AdminPostController@excelImportDatabase")->name("admin.post.import.excel.database");

        // đoạn văn
        Route::get('load-paragraph-post', "AdminPostController@loadParagraphPost")->name("admin.post.loadParagraphPost");
        Route::get('/load-edit-paragraph-post/{id}', "AdminPostController@loadEditParagraphPost")->name("admin.post.loadEditParagraphPost");
        Route::get('/load-create-paragraph-post/{id}', "AdminPostController@loadCreateParagraphPost")->name("admin.post.loadCreateParagraphPost");
        Route::get('/load-parent-paragraph-post/{id}', "AdminPostController@loadParentParagraphPost")->name("admin.post.loadParentParagraphPost");
        Route::post('/store-paragraph-post/{id}', "AdminPostController@storeParagraphPost")->name("admin.post.storeParagraphPost");
        Route::post('/update-paragraph-post/{id}', "AdminPostController@updateParagraphPost")->name("admin.post.updateParagraphPost");
        Route::get('/delete-paragraph-post/{id}', "AdminPostController@destroyParagraphPost")->name("admin.post.destroyParagraphPost");
    });
    Route::group(['prefix' => 'categoryslider'], function () {
        Route::get('/', "AdminCategorySliderController@index")->name("admin.categoryslider.index");
        Route::get('/create', "AdminCategorySliderController@create")->name("admin.categoryslider.create");
        Route::post('/store', "AdminCategorySliderController@store")->name("admin.categoryslider.store");
        Route::get('/edit/{id}', "AdminCategorySliderController@edit")->name("admin.categoryslider.edit");
        Route::post('/update/{id}', "AdminCategorySliderController@update")->name("admin.categoryslider.update");
        Route::get('/destroy/{id}', "AdminCategorySliderController@destroy")->name("admin.categoryslider.destroy");
    });
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', "AdminSliderController@index")->name("admin.slider.index")->middleware('can:slider-list');
        Route::get('/create', "AdminSliderController@create")->name("admin.slider.create")->middleware('can:slider-add');
        Route::post('/store', "AdminSliderController@store")->name("admin.slider.store")->middleware('can:slider-add');
        Route::get('/edit/{id}', "AdminSliderController@edit")->name("admin.slider.edit")->middleware('can:slider-edit');
        Route::post('/update/{id}', "AdminSliderController@update")->name("admin.slider.update")->middleware('can:slider-edit');
        Route::get('/destroy/{id}', "AdminSliderController@destroy")->name("admin.slider.destroy")->middleware('can:slider-delete');
        Route::get('/update-active/{id}', "AdminSliderController@loadActive")->name("admin.slider.load.active")->middleware('can:slider-edit');
    });
    Route::group(['prefix' => 'code'], function () {
        Route::get('/', "AdminCodeController@index")->name("admin.code.index");
        Route::get('/create', "AdminCodeController@create")->name("admin.code.create");
        Route::post('/store', "AdminCodeController@store")->name("admin.code.store");
        Route::get('/edit/{id}', "AdminCodeController@edit")->name("admin.code.edit");
        Route::post('/update/{id}', "AdminCodeController@update")->name("admin.code.update");
        Route::get('/destroy/{id}', "AdminCodeController@destroy")->name("admin.code.destroy");
        Route::get('/update-active/{id}', "AdminCodeController@loadActive")->name("admin.code.load.active");
    });
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', "AdminSettingController@index")->name("admin.setting.index")->middleware('can:setting-list');
        Route::get('/create', "AdminSettingController@create")->name("admin.setting.create")->middleware('can:setting-add');
        Route::post('/store', "AdminSettingController@store")->name("admin.setting.store")->middleware('can:setting-add');
        Route::get('/edit/{id}', "AdminSettingController@edit")->name("admin.setting.edit")->middleware('can:setting-edit');
        Route::post('/update/{id}', "AdminSettingController@update")->name("admin.setting.update")->middleware('can:setting-edit');
        Route::get('/destroy/{id}', "AdminSettingController@destroy")->name("admin.setting.destroy")->middleware('can:setting-delete');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', "AdminUserController@index")->name("admin.user.index")->middleware('can:admin-user-list');
        Route::get('/create', "AdminUserController@create")->name("admin.user.create")->middleware('can:admin-user-add');
        Route::post('/store', "AdminUserController@store")->name("admin.user.store")->middleware('can:admin-user-add');
        Route::get('/edit/{id}', "AdminUserController@edit")->name("admin.user.edit")->middleware('can:admin-user-edit');
        Route::post('/update/{id}', "AdminUserController@update")->name("admin.user.update")->middleware('can:admin-user-edit');
        Route::get('/destroy/{id}', "AdminUserController@destroy")->name("admin.user.destroy")->middleware('can:admin-user-delete');
    });

    // Route::group(['prefix' => 'user-frontend'], function () {
    //     Route::get('/', "AdminUserFrontendController@index")->name("admin.user_frontend.index")->middleware('can:admin-user_frontend-list');
    //     //  Route::get('/list-no-active', "AdminUserFrontendController@listNoActive")->name("admin.user_frontend.listNoActive")->middleware('can:admin-user_frontend-list');
    //     Route::get('/detail/{id}', "AdminUserFrontendController@detail")->name("admin.user_frontend.detail")->middleware('can:admin-user_frontend-list');
    //     Route::get('/create', "AdminUserFrontendController@create")->name("admin.user_frontend.create")->middleware('can:admin-user_frontend-add');
    //     Route::post('/store', "AdminUserFrontendController@store")->name("admin.user_frontend.store")->middleware('can:admin-user_frontend-add');
    //     Route::get('/update-active/{id}', "AdminUserFrontendController@loadActive")->name("admin.user_frontend.load.active")->middleware('can:admin-user_frontend-active');
    //     Route::get('/update-active-key/{id}', "AdminUserFrontendController@loadActiveKey")->name("admin.user_frontend.load.active-key")->middleware('can:admin-user_frontend-active');
    //     Route::get('/load-detail/{id}', "AdminUserFrontendController@loadUserDetail")->name("admin.user_frontend.loadUserDetail")->middleware('can:admin-user_frontend-list');
    //     Route::get('/transfer-point/{id}', "AdminUserFrontendController@transferPoint")->name("admin.user_frontend.transferPoint")->middleware('can:admin-user_frontend-transfer-point');
    //     Route::get('/transfer-point-between', "AdminUserFrontendController@transferPointBetweenXY")->name("admin.user_frontend.transferPointBetweenXY")->middleware('can:admin-user_frontend-transfer-point');
    //     Route::get('/transfer-point-random', "AdminUserFrontendController@transferPointRandom")->name("admin.user_frontend.transferPointRandom")->middleware('can:admin-user_frontend-transfer-point');
    //     Route::get('/edit/{id}', "AdminUserFrontendController@edit")->name("admin.user_frontend.edit")->middleware('can:admin-user_frontend-edit');
    //     Route::post('/update/{id}', "AdminUserFrontendController@update")->name("admin.user_frontend.update")->middleware('can:admin-user_frontend-edit');
    //      Route::get('/destroy/{id}', "AdminUserFrontendController@destroy")->name("admin.user_frontend.destroy")->middleware('can:admin-user_frontend-delete');
    // });
    Route::group(['prefix' => 'user-frontend'], function () {
        Route::get('/', "AdminUserFrontendController@index")->name("admin.user_frontend.index");
        //  Route::get('/list-no-active', "AdminUserFrontendController@listNoActive")->name("admin.user_frontend.listNoActive");
        Route::get('/detail/{id}', "AdminUserFrontendController@detail")->name("admin.user_frontend.detail");
        Route::get('/create', "AdminUserFrontendController@create")->name("admin.user_frontend.create");
        Route::post('/store', "AdminUserFrontendController@store")->name("admin.user_frontend.store");
        Route::get('/update-active/{id}', "AdminUserFrontendController@loadActive")->name("admin.user_frontend.load.active");
        Route::get('/update-active-key/{id}', "AdminUserFrontendController@loadActiveKey")->name("admin.user_frontend.load.active-key");
        Route::get('/load-detail/{id}', "AdminUserFrontendController@loadUserDetail")->name("admin.user_frontend.loadUserDetail");
        Route::get('/transfer-point/{id}', "AdminUserFrontendController@transferPoint")->name("admin.user_frontend.transferPoint");
        Route::get('/transfer-point-between', "AdminUserFrontendController@transferPointBetweenXY")->name("admin.user_frontend.transferPointBetweenXY");
        Route::get('/transfer-point-random', "AdminUserFrontendController@transferPointRandom")->name("admin.user_frontend.transferPointRandom");
        Route::get('/edit/{id}', "AdminUserFrontendController@edit")->name("admin.user_frontend.edit");
        Route::post('/update/{id}', "AdminUserFrontendController@update")->name("admin.user_frontend.update");
        //  Route::get('/destroy/{id}', "AdminUserFrontendController@destroy")->name("admin.user_frontend.destroy")->middleware('can:admin-user_frontend-delete');

        Route::post('/export/excel/database', "AdminUserFrontendController@excelExportDatabase")->name("admin.user_frontend.export.excel.database")->middleware('can:admin-user_frontend-export-excel');
        Route::get('/kic-user/{id}', "AdminUserFrontendController@kicUser")->name("admin.user_frontend.kicUser")->middleware('can:admin-user_frontend-active');
        Route::post('/export/excel/database2', "AdminUserFrontendController@excelExportDatabase2")->name("admin.user_frontend.export.excel.database2")->middleware('can:admin-user_frontend-export-excel');

        Route::get('/plus-point', "AdminUserFrontendController@plusPoint")->name("admin.user_frontend.plusPoint")->middleware('can:admin-user_frontend-transfer-point');
        Route::post('/plus-point/{id}', "AdminUserFrontendController@storePlusPoint")->name("admin.user_frontend.storePlusPoint")->middleware('can:admin-user_frontend-transfer-point');

        Route::get('/minus-point', "AdminUserFrontendController@minusPoint")->name("admin.user_frontend.minusPoint")->middleware('can:admin-user_frontend-transfer-point');
        Route::post('/minus-point/{id}', "AdminUserFrontendController@storeMinusPoint")->name("admin.user_frontend.storeMinusPoint")->middleware('can:admin-user_frontend-transfer-point');
    });
    Route::group(['prefix' => 'pay'], function () {
        Route::get('/', "AdminPayController@index")->name("admin.pay.index")->middleware('can:pay-list');
        Route::get('/update-draw-point', "AdminPayController@updateDrawPoint")->name("admin.pay.updateDrawPoint")->middleware('can:pay-update-draw-point');
        Route::get('/update-draw-point-all', "AdminPayController@updateDrawPointAll")->name("admin.pay.updateDrawPointAll")->middleware('can:pay-update-draw-point');
        Route::post('/export/excel/database', "AdminPayController@excelExportDatabase")->name("admin.pay.export.excel.database")->middleware('can:pay-export-excel');
    });


    Route::group(['prefix' => 'role'], function () {
        Route::get('/', "AdminRoleController@index")->name("admin.role.index")->middleware('can:role-list');
        Route::get('/create', "AdminRoleController@create")->name("admin.role.create")->middleware('can:role-add');
        Route::post('/store', "AdminRoleController@store")->name("admin.role.store")->middleware('can:role-add');
        Route::get('/edit/{id}', "AdminRoleController@edit")->name("admin.role.edit")->middleware('can:role-edit');
        Route::post('/update/{id}', "AdminRoleController@update")->name("admin.role.update")->middleware('can:role-edit');
        Route::get('/destroy/{id}', "AdminRoleController@destroy")->name("admin.role.destroy")->middleware('can:role-delete');
    });
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', "AdminPermissionController@index")->name("admin.permission.index")->middleware('can:permission-list');
        Route::get('/create', "AdminPermissionController@create")->name("admin.permission.create")->middleware('can:permission-add');
        Route::post('/store', "AdminPermissionController@store")->name("admin.permission.store")->middleware('can:permission-add');
        Route::get('/edit/{id}', "AdminPermissionController@edit")->name("admin.permission.edit")->middleware('can:permission-edit');
        Route::post('/update/{id}', "AdminPermissionController@update")->name("admin.permission.update")->middleware('can:permission-edit');
        Route::get('/destroy/{id}', "AdminPermissionController@destroy")->name("admin.permission.destroy")->middleware('can:permission-delete');
    });


    Route::group(['prefix' => 'transaction'], function () {
        Route::get('status-next/{id}', "AdminTransactionController@loadNextStepStatus")->name("admin.transaction.loadNextStepStatus")->middleware('can:transaction-status');
        Route::get('/', "AdminTransactionController@index")->name("admin.transaction.index")->middleware('can:transaction-list');
        Route::get('/show/{id}', "AdminTransactionController@show")->name("admin.transaction.show")->middleware('can:transaction-list');
        Route::get('/destroy/{id}', "AdminTransactionController@destroy")->name("admin.transaction.destroy")->middleware('can:transaction-delete');
        Route::get('/update-thanhtoan/{id}', "AdminTransactionController@loadThanhtoan")->name("admin.product.load.thanhtoan")->middleware('can:transaction-list');
        Route::get('/transaction-detail/{id}', "AdminTransactionController@loadTransactionDetail")->name("admin.transaction.detail")->middleware('can:transaction-list');
        Route::get('/transaction-detail/export/pdf/{id}', "AdminTransactionController@exportPdfTransactionDetail")->name("admin.transaction.detail.export.pdf");
        Route::get('/cancel/{id}', "AdminTransactionController@cancel")->name("admin.transaction.cancel")->middleware('can:transaction-list');
        Route::post('delete-multiple', "AdminTransactionController@deleteMultiple")->name('admin.transaction.multiple_transaction_delete');

        Route::get('/change-due-date', "AdminTransactionController@changeDueDateTransaction")->name("admin.transaction.changeDueDateTransaction")->middleware('can:transaction-list');
        Route::post('/store-change-due-date/{id}', "AdminTransactionController@storeChangeDueDateTransaction")->name("admin.transaction.storeChangeDueDateTransaction")->middleware('can:transaction-list');

        Route::get('/change-tien-no', "AdminTransactionController@changeTienNo")->name("admin.transaction.changeTienNo")->middleware('can:transaction-list');
        Route::post('/store-change-tien-no/{id}', "AdminTransactionController@storeChangeTienNo")->name("admin.transaction.storeChangeTienNo")->middleware('can:transaction-list');
        Route::get('/export/excel/database/{id}', "AdminTransactionController@excelExportsOrder")->name("admin.transaction.export.excel.one.order");
    });

    Route::group(['prefix' => 'productstar'], function () {
        Route::get('/', "AdminProductStarController@index")->name("admin.productstar.index");
        Route::get('/update-hot/{id}', "AdminProductStarController@loadHot")->name("admin.productstar.load.hot");

        Route::get('/destroy/{id}', "AdminProductStarController@destroy")->name("admin.productstar.destroy");
    });

    Route::group(['prefix' => 'kho_hang'], function () {
        Route::get('/', "AdminStoreController@listKhoHang")->name("admin.store.listKhoHang")->middleware('can:store-list');
        
        Route::get('/add-product', "AdminStoreController@addProduct")->name("admin.store.addProduct")->middleware('can:store-list');
        Route::get('/add-quantity-product', "AdminStoreController@addQuantityProduct")->name("admin.store.addQuantityProduct")->middleware('can:store-list');
        Route::post('/update-quantity-product/{id}', "AdminStoreController@updateQuantityProduct")->name("admin.store.updateQuantityProduct")->middleware('can:store-list');

        Route::get('/list-defective-product', "AdminStoreController@listDefectiveProduct")->name("admin.store.listDefectiveProduct")->middleware('can:store-list');
        Route::get('/list-defective-product/destroy/{id}', "AdminStoreController@destroyDefectiveProduct")->name("admin.store.destroyDefectiveProduct")->middleware('can:store-list');

        Route::get('/list-yeu-cau-doi-tra', "AdminStoreController@listYeuCau")->name("admin.store.listYeuCau")->middleware('can:store-list');
        Route::get('/change-status-yeu-cau/{id}', "AdminStoreController@changeStatusYeuCau")->name("admin.store.changeStatusYeuCau")->middleware('can:store-list');
        Route::get('/cancel/{id}', "AdminStoreController@cancel")->name("admin.store.yeucau.cancel")->middleware('can:store-list');

        Route::get('/add-defective-product', "AdminStoreController@addDefectiveProduct")->name("admin.store.addDefectiveProduct")->middleware('can:store-list');
        Route::post('/store-defective-product/{id}', "AdminStoreController@storeDefectiveProduct")->name("admin.store.storeDefectiveProduct")->middleware('can:store-list');

        Route::get('/create', "AdminStoreController@createNhapKhoHang")->name("admin.store.createNhapKhoHang")->middleware('can:store-list');
        Route::post('/store', "AdminStoreController@storeNhapKhoHang")->name("admin.store.storeNhapKhoHang")->middleware('can:store-list');
        Route::get('/san-pham-nhap', "AdminStoreController@listNhapKho")->name("admin.store.listNhapKho")->middleware('can:store-list');

        Route::get('/danh-sach-xuat', "AdminStoreController@listXuatKho")->name("admin.store.listXuatKho")->middleware('can:store-list');
        Route::get('/create-xuat-kho', "AdminStoreController@createXuatKho")->name("admin.store.createXuatKho")->middleware('can:store-list');
        Route::post('/store-xuat-kho', "AdminStoreController@storeXuatKho")->name("admin.store.storeXuatKho")->middleware('can:store-list');
        Route::get('/edit-xuat-kho/{id}', "AdminStoreController@editXuatKho")->name("admin.store.editXuatKho")->middleware('can:store-list');
        Route::post('/update-xuat-kho/{id}', "AdminStoreController@updateXuatKho")->name("admin.store.updateXuatKho")->middleware('can:store-list');

        Route::get('/list-san-pham-xuat', "AdminStoreController@listSanPhamXuat")->name("admin.store.listSanPhamXuat")->middleware('can:store-list');


        Route::get('/change-status-phieu-xuat/{id}', "AdminStoreController@changeStatusPhieuXuat")->name("admin.store.changeStatusPhieuXuat")->middleware('can:store-list');

        Route::get('/change-type-phieu-xuat', "AdminStoreController@changeTypePhieuXuat")->name("admin.store.changeTypePhieuXuat")->middleware('can:store-list');

        Route::get('/change-condition-phieu-xuat/{id}', "AdminStoreController@changeConditionPhieuXuat")->name("admin.store.changeConditionPhieuXuat")->middleware('can:store-list');

        Route::get('/change-status-nhap-kho/{id}', "AdminStoreController@changeStatusNhapKho")->name("admin.store.changeStatusNhapKho")->middleware('can:store-list');

        Route::post('/export/nhap-kho', "AdminStoreController@exportNhapKho")->name("admin.nhapKho.export.excel.database")->middleware('can:store-list');

        Route::get('/destroy-product-kho/{id}', "AdminStoreController@destroyProductKho")->name("admin.destroyProductKho")->middleware('can:store-list');

        Route::post('/export/xuat-kho', "AdminStoreController@exportXuatKho")->name("admin.xuatKho.export.excel.database")->middleware('can:store-list');
        Route::post('/export/kho', "AdminStoreController@exportKho")->name("admin.kho.export.excel.database")->middleware('can:store-list');

        Route::get('/edit/{id}', "AdminStoreController@edit")->name("admin.store.editKhoHang")->middleware('can:store-edit')->middleware('can:store-list');
        Route::post('/update/{id}', "AdminStoreController@update")->name("admin.store.update")->middleware('can:store-edit')->middleware('can:store-list');
        Route::get('/destroy/{id}', "AdminStoreController@destroy")->name("admin.store.destroy")->middleware('can:store-delete')->middleware('can:store-list');

        Route::get('status-next/{id}', "AdminStoreController@loadNextStepCondition")->name("admin.store.loadNextStepCondition")->middleware('can:store-list');
        Route::get('/export/excel/database/{id}', "AdminStoreController@excelExportsOrder")->name("admin.store.export.excel.one.order");
    });

    Route::group(['prefix' => 'lo_hang'], function () {
        Route::get('/', "AdminStoreController@listLoHang")->name("admin.store.listLoHang")->middleware('can:store-list');
        Route::get('/detail/{id}', "AdminStoreController@detailLoHang")->name("admin.store.detailLoHang")->middleware('can:store-list');
        Route::get('/create', "AdminStoreController@createLoHang")->name("admin.store.createLoHang")->middleware('can:store-list');
        Route::post('/store', "AdminStoreController@storeLoHang")->name("admin.store.storeLoHang")->middleware('can:store-list');
        Route::get('/edit/{id}', "AdminStoreController@editLoHang")->name("admin.store.editLoHang")->middleware('can:store-list');
        Route::post('/update/{id}', "AdminStoreController@updateLoHang")->name("admin.store.updateLoHang")->middleware('can:store-list');
        Route::get('/destroy/{id}', "AdminStoreController@destroyLoHang")->name("admin.store.destroyLoHang")->middleware('can:store-delete')->middleware('can:store-list');

        Route::post('/import', "AdminStoreController@importKhoHang")->name("admin.store.importKhoHang")->middleware('can:store-list');
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('status-next/{id}', "AdminContactController@loadNextStepStatus")->name("admin.contact.loadNextStepStatus");
        Route::get('/', "AdminContactController@index")->name("admin.contact.index");
        Route::get('/show/{id}', "AdminContactController@show")->name("admin.contact.show");
        Route::get('/destroy/{id}', "AdminContactController@destroy")->name("admin.contact.destroy");
        Route::get('/contact-detail/{id}', "AdminContactController@loadContactDetail")->name("admin.contact.detail");

        Route::post('delete-multiple', "AdminContactController@deleteMultiple")->name('admin.contact.multiple_contact_delete');
    });

    Route::group(['prefix' => 'bank'], function () {
        Route::get('/', "AdminBankController@index")->name("admin.bank.index")->middleware('can:bank-list');
        Route::get('/create', "AdminBankController@create")->name("admin.bank.create")->middleware('can:bank-add');
        Route::post('/store', "AdminBankController@store")->name("admin.bank.store")->middleware('can:bank-add');
        Route::get('/edit/{id}', "AdminBankController@edit")->name("admin.bank.edit")->middleware('can:bank-edit');
        Route::post('/update/{id}', "AdminBankController@update")->name("admin.bank.update")->middleware('can:bank-edit');
        Route::get('/destroy/{id}', "AdminBankController@destroy")->name("admin.bank.destroy")->middleware('can:bank-delete');
    });
    Route::group(['prefix' => 'store'], function () {
        Route::get('/', "AdminStoreController@index")->name("admin.store.index")->middleware('can:store-list');
        Route::get('/create', "AdminStoreController@create")->name("admin.store.create")->middleware('can:store-input');
        Route::post('/store', "AdminStoreController@store")->name("admin.store.store")->middleware('can:store-input');
        Route::get('/edit/{id}', "AdminStoreController@edit")->name("admin.store.edit")->middleware('can:store-edit');
        Route::post('/update/{id}', "AdminStoreController@update")->name("admin.store.update")->middleware('can:store-edit');
        Route::get('/destroy/{id}', "AdminStoreController@destroy")->name("admin.store.destroy")->middleware('can:store-delete');
    });

    Route::group(['prefix' => 'agency'], function () {
        Route::get('/', "AdminAgencyController@index")->name("admin.agency.index")->middleware('can:agency-list');
        Route::get('/create', "AdminAgencyController@create")->name("admin.agency.create")->middleware('can:agency-add');
        Route::post('/store', "AdminAgencyController@store")->name("admin.agency.store")->middleware('can:agency-add');
        Route::get('/edit/{id}', "AdminAgencyController@edit")->name("admin.agency.edit")->middleware('can:agency-edit');
        Route::post('/update/{id}', "AdminAgencyController@update")->name("admin.agency.update")->middleware('can:agency-edit');
        Route::get('/destroy/{id}', "AdminAgencyController@destroy")->name("admin.agency.destroy")->middleware('can:agency-delete');

        Route::get('/cong-no', "AdminAgencyController@congno")->name("admin.agency.congno")->middleware('can:agency-list');

        Route::get('/change-due-date', "AdminAgencyController@changeDueDateAgency")->name("admin.agency.changeDueDateAgency")->middleware('can:agency-list');
        Route::post('/store-change-due-date/{id}', "AdminAgencyController@storeChangeDueDateAgency")->name("admin.agency.storeChangeDueDateAgency")->middleware('can:agency-list');

        Route::get('/change-tien-no', "AdminAgencyController@changeTienNo")->name("admin.agency.changeTienNo")->middleware('can:agency-list');
        Route::post('/store-change-tien-no/{id}', "AdminAgencyController@storeChangeTienNo")->name("admin.agency.storeChangeTienNo")->middleware('can:agency-list');
    });
    Route::group(['prefix' => 'khoan-chi'], function () {
        Route::get('/', "AdminKhoanchiController@index")->name("admin.khoanChi.index")->middleware('can:khoan-chi-list');
        Route::get('/create', "AdminKhoanchiController@create")->name("admin.khoanChi.create")->middleware('can:khoan-chi-add');
        Route::post('/store', "AdminKhoanchiController@store")->name("admin.khoanChi.store")->middleware('can:khoan-chi-add');
        Route::get('/edit/{id}', "AdminKhoanchiController@edit")->name("admin.khoanChi.edit")->middleware('can:khoan-chi-edit');
        Route::post('/update/{id}', "AdminKhoanchiController@update")->name("admin.khoanChi.update")->middleware('can:khoan-chi-edit');
        Route::get('/destroy/{id}', "AdminKhoanchiController@destroy")->name("admin.khoanChi.destroy")->middleware('can:khoan-chi-delete');

        Route::get('/change-user', "AdminKhoanchiController@changeUser")->name("admin.khoanChi.changeUser")->middleware('can:khoan-chi-add');
        Route::get('/change-tk', "AdminKhoanchiController@changeTk")->name("admin.khoanChi.changeTk")->middleware('can:khoan-chi-add');

        Route::post('/export', "AdminKhoanchiController@exportKhoanChi")->name("admin.khoanChi.export.excel.database")->middleware('can:khoan-chi-edit');

        Route::get('/change-status-khoan-chi/{id}', "AdminKhoanchiController@changeStatusKhoanChi")->name("admin.store.changeStatusKhoanChi")->middleware('can:khoan-chi-active');
    });
    Route::group(['prefix' => 'report'], function () {
        Route::get('/', "AdminStoreController@report")->name("admin.report.index")->middleware('can:report-list');
        Route::get('/detail', "AdminStoreController@reportDetail")->name("admin.report.detail")->middleware('can:report-list');
        Route::get('/doanh-thu/detail/{date}', "AdminStoreController@reportDoanhThuDetail")->name("admin.report.doanhThuDetail")->middleware('can:report-list');
    });
});
