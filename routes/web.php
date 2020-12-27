<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//frontend
Route::get('collection', 'App\Http\Controllers\Frontend\CollectionController@index' );
Route::get('collection/{group_url}', 'App\Http\Controllers\Frontend\CollectionController@groupview' );

Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/role-register','App\Http\Controllers\Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','App\Http\Controllers\Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}','App\Http\Controllers\Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}','App\Http\Controllers\Admin\DashboardController@registerdelete');

    Route::get('/service-category/','App\Http\Controllers\Admin\ServiceController@index');
    Route::get('/service-create/','App\Http\Controllers\Admin\ServiceController@create');
    Route::post('/category-store1/','App\Http\Controllers\Admin\ServiceController@store');
    Route::get('/service-cate-edit/{id}', 'App\Http\Controllers\Admin\ServiceController@edit');
    Route::put('/category_update/{id}', 'App\Http\Controllers\Admin\ServiceController@update');
    Route::delete('/category_delete/{id}', 'App\Http\Controllers\Admin\ServiceController@catedelete');

    Route::get('/service-list','App\Http\Controllers\Admin\ServicelistController@index');
    Route::post('/servicelist-add','App\Http\Controllers\Admin\ServicelistController@store')->name('servicelist-add');
    Route::get('/service-list-edit/{id}','App\Http\Controllers\Admin\ServicelistController@edit');
    Route::put('/service-list-listadd','App\Http\Controllers\Admin\ServicelistController@listadd');
    Route::put('/servicelist-update/{id}','App\Http\Controllers\Admin\ServicelistController@update');
    Route::delete('/service-list-delete/{id}','App\Http\Controllers\Admin\ServicelistController@listdelete');

    
    Route::get('group','App\Http\Controllers\Admin\GroupController@index');
    Route::get('group-add','App\Http\Controllers\Admin\GroupController@viewpage');
    Route::post('group-store','App\Http\Controllers\Admin\GroupController@store');
    Route::get('group-edit/{id}','App\Http\Controllers\Admin\GroupController@edit');
    Route::put('group-update/{id}', 'App\Http\Controllers\Admin\GroupController@gupdate');
    Route::get('group-delete/{id}', 'App\Http\Controllers\Admin\GroupController@delete');
    Route::get('group-delete-records', 'App\Http\Controllers\Admin\GroupController@deletedrecords');
    Route::get('group-re-store/{id}', 'App\Http\Controllers\Admin\GroupController@deletedrestore');

    Route::get('/category', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::get('/category-add', 'App\Http\Controllers\Admin\CategoryController@create');
    Route::post('/category-store', 'App\Http\Controllers\Admin\CategoryController@store');
    Route::get('/category-edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
    Route::put('/category-update/{id}', 'App\Http\Controllers\Admin\CategoryController@update');
    Route::get('/category-delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete');

    //Sub Category
    Route::get('/sub-category', 'App\Http\Controllers\Admin\SubcategoryController@index');
    Route::post('/sub-category-store', 'App\Http\Controllers\Admin\SubcategoryController@store');
    Route::get('/subcategory-edit/{id}', 'App\Http\Controllers\Admin\SubcategoryController@edit');
    Route::put('sub-category-update/{id}', 'App\Http\Controllers\Admin\SubcategoryController@update');
    Route::get('subcategory-delete/{id}', 'App\Http\Controllers\Admin\SubcategoryController@delete');

    //Product
    Route::get('products', 'App\Http\Controllers\Admin\ProductController@index');
    Route::get('add-products', 'App\Http\Controllers\Admin\ProductController@create');
    Route::post('store-products','App\Http\Controllers\Admin\ProductController@store');
    Route::get('/edit-products/{id}', 'App\Http\Controllers\Admin\ProductController@edit');
    Route::put('/update-product/{id}', 'App\Http\Controllers\Admin\ProductController@update');

    

    
    Route::post('/dashboard','App\Http\Controllers\EmployeeController@store')->name('addimage');
});
