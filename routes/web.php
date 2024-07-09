<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CMController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalespageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('update/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

//CRUD User
Route::controller(UserController::class)->prefix('admin/user')->group(function () {
    Route::get('', 'index')->name('user');
    Route::get('create', 'create')->name('user.create');
    Route::post('add', 'store')->name('user.store');
    Route::get('show/{id}', 'show')->name('user.show');
    Route::get('edit/{id}', 'edit')->name('user.edit');
    Route::post('update/{id}', 'update')->name('user.update');
    Route::delete('delete/{id}', 'destroy')->name('user.delete');
});

//transaksi
Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
    Route::get('', 'index')->name('transactions');
    Route::get('create', 'create')->name('transactions.create');
    Route::get('create_transaksi', 'create_transaksi')->name('transactions.create_transaksi'); //untuk admin
    Route::post('store', 'store')->name('transactions.store');
    Route::get('show/{id}', 'show')->name('transactions.show');
    Route::get('edit/{id}',  'edit')->name('transactions.edit');
    Route::put('update/{id}',  'update')->name('transactions.update');
    Route::delete('destroy/{id}',  'destroy')->name('transactions.destroy');

    Route::get('create_cm', 'create_cm')->name('transactions.create_cm');
    Route::post('store_cm', 'store_cm')->name('transactions.store_cm');
});


//page
Route::get('/', [SalespageController::class, 'index'])->name('landing.salespage.index');

Route::get('/upsell', [PageController::class, 'upsell'])->name('landing.upsell page.upsell');

Route::get('/downsell', [PageController::class, 'downsell'])->name('landing.downsell page.downsell');

Route::get('/privacy', [PageController::class, 'privacy'])->name('landing.privacy police.privacy');

Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('landing.disclaimer page.disclaimer');

//downloade page
Route::get('/Download_salespage', [DownloadController::class, 'download_salespage'])->name('landing.download.Download_salespage');
Route::get('/Download_upsell', [DownloadController::class, 'download_upsell'])->name('landing.download.Download_upsell');
Route::get('/Download_downsell', [DownloadController::class, 'download_downsell'])->name('landing.download.Download_downsell');

//download file
Route::get('downloadfe', [DownloadController::class, 'downloadfe']);
Route::get('lisensife', [DownloadController::class, 'lisensife']);

Route::get('downloadup', [DownloadController::class, 'downloadup']);
Route::get('lisensiup', [DownloadController::class, 'lisensiup']);

Route::get('downloaddwn', [DownloadController::class, 'downloaddwn']);
Route::get('lisensidwn', [DownloadController::class, 'lisensidwn']);

// Route::get('/array_image', [SalespageController::class, 'Arrayimage'])->name('landing.salespage.array_image');

//Multi User
// Auth::routes();

// //Normal Users Routes List
// Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

// //Admin Routes List
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });

// //Admin Routes List
// Route::middleware(['auth', 'user-access:manager'])->group(function () {

//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });