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
        

        /////////////Raw Material////////////////////
        Route::get('admin/raw-material','RawMaterialMasterController@rawmaterialList')->name('raw-material');
        Route::get('admin/raw-material-add','RawMaterialMasterController@rawmaterialadd')->name('raw-material-add');
        Route::post('admin/raw-material-save','RawMaterialMasterController@rawmaterialsave')->name('raw-material-save');
        Route::get('admin/raw-material-edit/{id}','RawMaterialMasterController@rawmaterialedit')->name('raw-material-edit');
        Route::get('admin/raw-material-delete/{id}','RawMaterialMasterController@rawmaterialdelete')->name('raw-material-delete');


        /////////////units////////////////////

        Route::get('admin/unit-master','UnitMasterController@unitlist')->name('unit-master');
        Route::get('admin/unit-add','UnitMasterController@unitadd')->name('unit-add');
        Route::post('admin/unit-save','UnitMasterController@unitsave')->name('unit-save');
        Route::get('admin/unit-edit/{id}','UnitMasterController@unitedit')->name('unit-edit');
        Route::get('admin/unit-delete/{id}','UnitMasterController@unitdelete')->name('unit-delete');
        /////////////Meals ////////////////////
        Route::get('admin/meals','MealMasterController@mealslist')->name('meals');
        Route::get('admin/meals-add','MealMasterController@mealsadd')->name('meals-add');
        Route::post('admin/meals-save','MealMasterController@mealssave')->name('meals-save');  
        Route::get('admin/meals-edit/{id}','MealMasterController@mealsedit')->name('meals-edit');
        Route::get('admin/meals-delete/{id}','MealMasterController@mealsdelete')->name('meals-delete');

        /////////////Recipe////////////////////
  
        Route::get('admin/recipe','RecipeMasterController@recipelist')->name('recipe');
        Route::get('admin/recipe-add','RecipeMasterController@recipeadd')->name('recipe-add');
        Route::post('admin/recipe-save','RecipeMasterController@recipesave')->name('recipe-save');
        Route::get('admin/recipe-edit/{id}','RecipeMasterController@recipeedit')->name('recipe-edit');
        Route::get('admin/recipe-delete/{id}','RecipeMasterController@recipedelete')->name('recipe-delete');

        Route::post('gettheunit','RecipeMasterController@gettheunit');

       //////////////////////Meal and recipe ///////////////////////
        Route::get('admin/meal-recipe','MealMasterController@mealrecipe')->name('meal-recipe'); 
        Route::post('admin/getmealinfofillform','MealMasterController@showmealandrecipepage')->name('getmealinfofillform');  
        Route::post('admin/meal_recipe_save','MealMasterController@meal_recipe_save')->name('meal_recipe_save');     
        Route::get('admin/meal-recipe-delete/{id}','MealMasterController@mealrecipedelete')->name('mealrecipedelete');

        ///////////////////////////////////////////////Now task assign
        Route::get('admin/task-assign','TaskAssignController@tasks')->name('task-assign');
        Route::post('admin/gettaskassignfillform','TaskAssignController@showtaskassigningpage')->name('gettaskassignfillform');
        Route::post('admin/filltaskassign','TaskAssignController@fillthetask')->name('filltaskassign');  
        Route::get('admin/delete-assigned-task/{id}','TaskAssignController@deleteassignedtask')->name('delete-assigned-task');
        Route::get('admin/edit-assigned-task/{id}','TaskAssignController@editassignedtask')->name('edit-assigned-task');
        Route::get('admin/saving-updated-value','TaskAssignController@savethetargetupdated')->name('savethetargetupdated');

        Route::post('admin/task_assign','TaskAssignController@getthebusycheflist')->name('getthebusycheflist');
        Route::get('admin/delete-chef-task/{id}','TaskAssignController@deleteallofthischef')->name('delete-chef-task');
        //////////////////////////////////////////Now assigned task accept and deduct the qty from the stock
        


          Route::post('deductthestockquantity','TaskAssignController@deductthestockquantity')->name('deductthestockquantity');




        Route::resource('admin-purchaseindent','PurchaseIndentController');
        Route::resource('admin-purchaseindentitem','PurchaseIndentItemController');
        Route::get('searchdata','PurchaseIndentItemController@getUnit')->name('data');
    });





});

