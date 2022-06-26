<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Ward;
use App\Models\District;
use App\Models\Thuoctinh;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Attribute;

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
    //return view('index');

});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);

Route::resource('/warehouse','App\Http\Controllers\WarehouseController');
Route::post('/export-warehouse','App\Http\Controllers\WarehouseController@export_warehouse');
Route::post('/import-warehouse','App\Http\Controllers\WarehouseController@import_warehouse');




Route::resource('/product','App\Http\Controllers\ProductController');
Route::post('/export-product','App\Http\Controllers\ProductController@export_product');
Route::post('/import-product','App\Http\Controllers\ProductController@import_product');
//Route::resource('/image','App\Http\Controllers\ImageController');


//Route::get('/chon-thuoctinh/{id}','App\Http\Controllers\ThuoctinhController@chonthuoctinh');
//Route::post('/thuoctinh/store/{id}','App\Http\Controllers\ThuoctinhController@store')->name('thuoctinh.store');

Route::get('/select-attribute/{id}','App\Http\Controllers\AttributeController@select_attribute');
Route::post('/store_attribute/{id}','App\Http\Controllers\AttributeController@store_attribute')->name('attribute.store');
Route::get('/delete-attribute/{id}','App\Http\Controllers\AttributeController@delete_attribute');
Route::post('/update-attribute/{id}','App\Http\Controllers\AttributeController@update_attribute')->name('attribute.update');
Route::post('/export-attribute','App\Http\Controllers\AttributeController@export_attribute');
Route::post('/import-attribute','App\Http\Controllers\AttributeController@import_attribute');

Route::get('/thuoctinh',function(){
    
    // $product=Product::find(14);
    
    
    // return $product->warehouse->Name;
    
    //$sp=Thuoctinh::find(2);
    //return $sp->color;
    //return $sp->product->Name;
    //return $sp->size;
    //return $sp->product->Image;
    //$id=$sp->product->warehouse_id;

    //$attribute=Attribute::all();
    //return $attribute;
    //return Warehouse::find($id);
   return view('admin.thuoctinh.siderbar');

});

Route::post('/select_district','App\Http\Controllers\WarehouseController@select_district');
Route::post('/select_ward', 'App\Http\Controllers\WarehouseController@select_ward');

Route::post('/uploadanh','App\Http\Controllers\ProductController@uploadanh');


