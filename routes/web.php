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

//Route::get('/home', function () {
//
//});



Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::get('/', function () {return view('welcome');});
    Route::get('/clients',  [App\Http\Controllers\clientController::class, 'index'])->name("clients");
    Route::post('/clients',[App\Http\Controllers\clientController::class,'store'])->name("clients");
    Route::get('/edit_client/{id}',[App\Http\Controllers\clientController::class,'edit']);
    Route::put('/update_client/{id}',[App\Http\Controllers\clientController::class,'update']);
    Route::delete('/clients/{id}',[App\Http\Controllers\clientController::class,'delete']);
    Route::get('/getProducts',[\App\Http\Controllers\productController::class,'getProducts'])->name("getProducts");
    Route::get('/products', [\App\Http\Controllers\productController::class, 'index'])->name("products");

    Route::get('/productsDatatable',[\App\Http\Controllers\productController::class,'productsDatatable'])->name("productsDatatable");

    Route::resource('brands',\App\Http\Controllers\BrandController::class);
    Route::post('/store_product',[\App\Http\Controllers\productController::class,'store'])->name('store_product');

});






//Route::resource('users_data','clientController');

// share user data to all allowed routes
//$routes_with_my_user = array('data_table','welcome');
//
//View::composer($routes_with_my_user, function($view)
//{
//    $user = \Illuminate\Support\Facades\Auth::user();
//    $view->with('my_user', $user);
//});
