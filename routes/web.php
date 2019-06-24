<?php

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('screen-lock/{currtime}/{id}/{randnum}', 'NoMiddlewareController@screenlock')->name('screenlock');

Auth::routes(['verify' => true]);
Route::group(['middleware' => 'prevent-back-history'],function(){
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
		Route::get('/edit-profile', 'AdminController@editprofile')->name('edit-profile');
		Route::post('/change-password', 'AdminController@changePassword')->name('change-password');
		Route::post('/update-profile', 'AdminController@updateProfile')->name('update-profile');
		Route::get('need-help', 'NoMiddlewareController@needhelp')->name('need-help');

        Route::get('app-setting', 'AppsettingController@appSetting')->name('app-setting');
        Route::post('app-setting-update', 'AppsettingController@appSettingUpdate')->name('app-setting-update');

		Route::resource('permissions','PermissionController');
        Route::get('permission-delete/{id}','PermissionController@permissionDelete')->name('permission-delete');
        Route::resource('roles','RoleController');
        Route::get('role-delete/{id}','RoleController@roleDelete')->name('role-delete');

        Route::get('users-list', 'UserController@users')->name('users-list');
        Route::get('add-user', 'UserController@adduser')->name('user-create');
        Route::get('edit-user/{id}', 'UserController@edituser')->name('user-edit');
        Route::get('view-user/{id}', 'UserController@viewuser')->name('user-view');
        Route::post('saveuser', 'UserController@saveuser')->name('user-save');
        Route::get('delete-user/{id}', 'UserController@deleteuser')->name('user-delete');
        Route::post('actionUsers', 'UserController@actionUsers')->name('user-action');
        Route::post('update-status', 'UserController@updateStatus')->name('update-status');

        //...Supplier...
       Route::get('admin/supplier-list', 'SupplierController@supplierList')->name('supplier-list');

       Route::get('admin/add-supplier', 'SupplierController@suplierAdd')->name('add-supplier');
        Route::get('admin/supplier-edit/{id}', 'SupplierController@supplierEdit')->name('supplier-edit');
        Route::post('admin/savesupplier', 'SupplierController@supplierSave')->name('supplier-save');
        Route::get('admin/delete-supplier/{id}', 'SupplierController@supplierDelete')->name('supplier-delete');
         //...Supplier Item...
       Route::get('admin/supplier-item-list', 'SupplierItemsController@supplierItemList')->name('supplier-item-list');
      Route::get('admin/add-supplier-item', 'SupplierItemsController@suplierItemAdd')->name('add-supplier-item');
        Route::get('admin/supplier-item-edit/{id}', 'SupplierItemsController@supplierItemEdit')->name('supplier-edit-item');
        Route::post('admin/supplier-item-save', 'SupplierItemsController@supplierItemSave')->name('supplier-item-save');
        Route::get('admin/delete-supplier-item/{id}', 'SupplierItemsController@supplierItemDelete')->name('supplier-item-delete');
       

       
    
	});

});

