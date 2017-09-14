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
    return view('welcome');
});

Auth::routes();

Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'backend\LanguageController@switchLang']);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account/activate/{token}', 'Auth\RegisterController@activate');

Route::group(['prefix' => trans('routes.admin')], function() {

	Route::get(trans('routes.dashboard'), [
      'as' => 'dashboard',
      'uses' => 'backend\AdminController@dashboard',
   	]);
	
	Route::resource('/permissions', 'backend\PermissionController');

	Route::resource('/roles', 'backend\RolesController');

	Route::resource('/users', 'backend\UsersController');

	//Route::resource('/brands', 'backend\BrandController');
	Route::get(trans('routes.indexBrand'), [
      'as' => 'brands.index',
      'uses' => 'backend\BrandController@index',
   	]);

	Route::get(trans('routes.createBrand'), [
      'as' => 'brands.create',
      'uses' => 'backend\BrandController@create',
   	]);

   Route::post(trans('routes.saveBrand'), [
      'as' => 'brands.store',
      'uses' => 'backend\BrandController@store',
   	]);
 
   Route::get(trans('routes.editBrand'), [
      'as' => 'brands.edit',
      'uses' => 'backend\BrandController@edit',
   	]);

   Route::patch(trans('routes.updateBrand'), [
      'as' => 'brands.update',
      'uses' => 'backend\BrandController@update',
   	]);

   Route::delete(trans('routes.deleteBrand'), [
      'as' => 'brands.destroy',
      'uses' => 'backend\BrandController@destroy',
   	]);

	Route::resource('/categories', 'backend\CategoriesController');

	Route::resource('/sliders', 'backend\SliderController');

	Route::resource('/icons', 'backend\IconSocialController');

	Route::resource('/payments', 'backend\PaymentController');

	Route::resource('/colors', 'backend\ColorController');

	Route::resource('/sizes', 'backend\SizeController');

	Route::resource('/discounts', 'backend\DiscountController');

	Route::resource('/products', 'backend\ProductController');

	Route::resource('/stocks', 'backend\StockController');


    Route::get('test', function() {
	   //return Auth::user()->with('roles')->get();
	   return Auth::user()->roles->pluck('name');
	});

    Route::get('test1', function() {
      return \App\models\User::with(['token' => function ($query) {
            $query->where('status', 0);
      }])->get();
   });
});