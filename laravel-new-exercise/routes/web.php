<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WantedController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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
    return view('pages.page');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\WantedController::class, 'index'])->name('home');


Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/wanted', [WantedController::class, 'index'])->name('wanted.home');
    Route::get('/wanted/create', [WantedController::class, 'create'])->name('wanted.create');
    Route::get('/wanted/{id}', [WantedController::class, 'show'])->name('wanted.show');
    Route::post('/wanted', [WantedController::class, 'store'])->name('wanted.store');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');