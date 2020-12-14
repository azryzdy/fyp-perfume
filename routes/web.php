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
    Route::post('/category-store/','App\Http\Controllers\Admin\ServiceController@store');
    Route::get('/service-cate-edit/{id}', 'App\Http\Controllers\Admin\ServiceController@edit');
    Route::put('/category_update/{id}', 'App\Http\Controllers\Admin\ServiceController@update');
    Route::delete('/category_delete/{id}', 'App\Http\Controllers\Admin\ServiceController@catedelete');

    Route::get('/service-list','App\Http\Controllers\Admin\ServicelistController@index');
    Route::post('/servicelist-add','App\Http\Controllers\Admin\ServicelistController@store')->name('servicelist-add');
    Route::get('/service-list-edit/{id}','App\Http\Controllers\Admin\ServicelistController@edit');
    Route::put('/service-list-listadd','App\Http\Controllers\Admin\ServicelistController@listadd');
    Route::put('/servicelist-update/{id}','App\Http\Controllers\Admin\ServicelistController@update');
    Route::delete('/service-list-delete/{id}','App\Http\Controllers\Admin\ServicelistController@listdelete');
  
    Route::post('/dashboard','App\Http\Controllers\EmployeeController@store')->name('addimage');
});
