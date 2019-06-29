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
        Route::get('admin/raw-material','RawMaterialMasterController@RawMaterialList')->name('raw-material');
        Route::get('admin/raw-material-add','RawMaterialMasterController@RawMaterialAdd')->name('raw-material-add');
        Route::post('admin/raw-material-save','RawMaterialMasterController@RawMaterialSave')->name('raw-material-save');
        Route::get('admin/raw-material-edit/{id}','RawMaterialMasterController@RawMaterialEdit')->name('raw-material-edit');
        Route::get('admin/raw-material-delete/{id}','RawMaterialMasterController@RawMaterialDelete')->name('raw-material-delete');


        /////////////units////////////////////

        Route::get('admin/unit-master','UnitMasterController@UnitList')->name('unit-master');
        Route::get('admin/unit-add','UnitMasterController@UnitAdd')->name('unit-add');
        Route::post('admin/unit-save','UnitMasterController@UnitSave')->name('unit-save');
        Route::get('admin/unit-edit/{id}','UnitMasterController@UnitEdit')->name('unit-edit');
        Route::get('admin/unit-delete/{id}','UnitMasterController@UnitDelete')->name('unit-delete');
        /////////////Meals ////////////////////
        Route::get('admin/meals','MealMasterController@MealsList')->name('meals');
        Route::get('admin/meals-add','MealMasterController@MealsAdd')->name('meals-add');
        Route::post('admin/meals-save','MealMasterController@MealsSave')->name('meals-save');  
        Route::get('admin/meals-edit/{id}','MealMasterController@MealsEdit')->name('meals-edit');
        Route::get('admin/meals-delete/{id}','MealMasterController@MealsDelete')->name('meals-delete');

        /////////////Recipe////////////////////
  
        Route::get('admin/recipe','RecipeMasterController@RecipeList')->name('recipe');
        Route::get('admin/recipe-add','RecipeMasterController@RecipeAdd')->name('recipe-add');
        Route::post('admin/recipe-save','RecipeMasterController@RecipeSave')->name('recipe-save');
        Route::get('admin/recipe-edit/{id}','RecipeMasterController@RecipeEdit')->name('recipe-edit');
        Route::get('admin/recipe-delete/{id}','RecipeMasterController@RecipeDelete')->name('recipe-delete');

        Route::post('gettheunit','RecipeMasterController@GetTheUnit');

       //////////////////////Meal and recipe ///////////////////////
        Route::get('admin/meal-recipe','MealMasterController@MealRecipe')->name('meal-recipe'); 
        Route::post('admin/getmealinfofillform','MealMasterController@ShowMealandRecipePage')->name('getmealinfofillform');  
        Route::post('admin/meal_recipe_save','MealMasterController@MealRecipeSave')->name('meal_recipe_save');     
        Route::get('admin/meal-recipe-delete/{id}','MealMasterController@MealRecipeDelete')->name('mealrecipedelete');

        ///////////////////////////////////////////////Now task assign
        Route::get('admin/task-assign','TaskAssignController@Tasks')->name('task-assign');
        Route::post('admin/gettaskassignfillform','TaskAssignController@ShowTaskAssigningPage')->name('gettaskassignfillform');
        Route::post('admin/filltaskassign','TaskAssignController@FillTheTask')->name('filltaskassign');  
        Route::get('admin/delete-assigned-task/{id}','TaskAssignController@DeleteAssignedTask')->name('delete-assigned-task');
        Route::get('admin/edit-assigned-task/{id}','TaskAssignController@editassignedtask')->name('edit-assigned-task');
        Route::get('admin/saving-updated-value','TaskAssignController@SavetheTargetUpdated')->name('savethetargetupdated');

        Route::post('admin/task_assign','TaskAssignController@GetTheBusyChefList')->name('getthebusycheflist');
        Route::get('admin/delete-chef-task/{id}','TaskAssignController@DeleteAllofThisChef')->name('delete-chef-task');
        //////////////////////////////////////////Now assigned task accept and deduct the qty from the stock

        /*Route::post('editthetaskassigned','TaskAssignController@gettasksubmitmodal')->name('editthetaskassigned');
*/
        Route::post('submit-daily-chef-task','TaskAssignController@SubmitDailyChefTask')->name('submitdailycheftask'); 
        Route::post('deductthestockquantity','TaskAssignController@DeducttheStockQuantity')->name('deductthestockquantity');




        Route::resource('admin-purchaseindent','PurchaseIndentController');
        Route::resource('admin-purchaseindentitem','PurchaseIndentItemController');
        Route::get('searchdata','PurchaseIndentItemController@getUnit')->name('data');
    });





});

