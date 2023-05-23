<?php

use App\Http\Controllers\CategoryController;
use  App\Http\Controllers\PictureActionControllers;
use App\Http\Controllers\PictureControllers;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth', 'verified'])->group(function() {
    Route::resource('orders', OrderController::class);
//Route::resource('files', FileController::class);
    Route::resource('pictures', PictureControllers::class);
    Route::post('/up/{picture}', [App\Http\Controllers\PictureActionControllers::class, 'up'])->name('up');
    Route::post('/down/{picture}', [App\Http\Controllers\PictureActionControllers::class, 'down'])->name('down');
    Route::get('/orderpdf/{order}', [App\Http\Controllers\OrderController::class, 'downloadPDF'])->name('downloadPDF');
    Route::get('/orderconfirm/{order}', [App\Http\Controllers\OrderController::class, 'confirm'])->name('orderconfirm');
    Route::get('/sendmail/{order}', [App\Http\Controllers\OrderController::class, 'sendmail'])->name('sendmail');

    Route::resource('category', CategoryController::class);


    Route::middleware(['can:isAdmin'])->group(function() {
        Route::get('/admin', [App\Http\Controllers\AdminControllers::class, 'index'])->name('adminIndex');
        Route::get('/adminOrderList', [App\Http\Controllers\AdminControllers::class, 'list'])->name('adminOrderList');
        Route::get('/adminOrderListToDo', [App\Http\Controllers\AdminControllers::class, 'listToDo'])->name('adminOrderListToDo');
        Route::get('/adminOrderListToDelete', [App\Http\Controllers\AdminControllers::class, 'listToDelete'])->name('adminOrderListToDelete');
        Route::get('/adminPicturesDownload/{order}', [App\Http\Controllers\AdminControllers::class, 'download'])->name('adminPicturesDownload');
    });
});





/*Auth::routes();*/
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\CategoryController::class, 'welcome'])->name('welcome');
Route::resource('product', ProductController::class);
//Route::get('/product/indexWithParameters/{category}', [App\Http\Controllers\ProductController::class, 'indexWithParameters'])->name('product.indexWithParameters');

