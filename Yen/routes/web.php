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

use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;

Route::get('/', function () {
    return View('welcome');
});

// Route::resource('khach-hang', KhachHangController::class);
// Route::resource('san-pham', SanPhamController::class);
// Route::resource('don-hang', DonHangController::class);
// Route::resource('gio-hang', GioHangController::class);

Route::View('/admin', 'admin');