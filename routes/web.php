<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{product:product_slug}', [ProductController::class, 'detail']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    $now = \Carbon\Carbon::now();
    $obat = \Carbon\Carbon::parse('2023-6-31')->format('Y-m-d');
    $different = $now->diffInDays($obat);
    if($different >= 7){
        echo 'lebih dari 7 hari | '.$different;
    } else if($different >= 3){
        echo 'lebih dari 3 hari | '.$different;
    } else {
        echo 'Masih bisa digunakan | '.$different;
    }

    return view('dashboard.home');
});

Route::get('/dashboard/product/checkSlug', [DashboardProductController::class, 'checkSlug']);
Route::resource('/dashboard/product', DashboardProductController::class);

Route::resource('/dashboard/category', AdminCategoryController::class);
Route::get('/dashboard/category/checkSlug', [AdminCategoryController::class, 'checkSlug']);

Route::resource('/dashboard/user', UserController::class);
//Route::put('/dashboard/admin', [AdminController::class, 'store']);

Route::resource('/dashboard/laporan', LaporanController::class);


//Route::get('/dashboard/product/delete/{id}', [DashboardProductController::class, 'delete']);
//Route::post('/dashboard/product', function () {
//    App\Models\Product::create(['product_title' => request('product_title')]);
//    return redirect()->back();
//});

//Route::get('check_slug', function () {
//    $product_slug = SlugService::createSlug(App\Models\Product::class, 'product_slug', request('product_name'));
//    return response()->json(['product_slug' => $product_slug]);
//});

