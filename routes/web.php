<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookOrderController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TypebookController;
use App\Http\Controllers\Admin\UserController;

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
    return view('layouts.admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/typebooks', TypebookController::class);
    Route::resource('/authors', AuthorController::class);
    Route::resource('/publishers', PublisherController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/book_orders', BookOrderController::class);
    Route::resource('/comments', CommentController::class);
    Route::resource('/discounts', DiscountController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);


});
