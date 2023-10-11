<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('book.index');
});





    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', [AuthController::class, 'register'])->name('register');
        Route::post('/', [AuthController::class, 'registerPost'])->name('register');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    });

    Route::group(['middleware' => 'auth'], function () {;
        Route::get('/book/all', [BookController::class, 'index'])->name('book.index');
        Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::group(['prefix'=> 'book'], function(){
            Route::get('/all', [BookController::class, 'index'])->name('book.index');
            Route::get('/create', [BookController::class, 'create'])->name('book.create');
            Route::post('/store', [BookController::class, 'store'])->name('book.store');
            Route::get('/{book_id}', [BookController::class, 'edit'])->name('book.edit');
            Route::put('/{book_id}', [BookController::class, 'update'])->name('book.update');
            Route::delete('/{book_id}', [BookController::class, 'destroy'])->name('book.destroy');

            Route::post('/issue/{book}', [BookController::class, 'issue'])->name('book.issue');
            Route::post('/return/{book}', [BookController::class, 'return'])->name('book.return');
            });



    });



