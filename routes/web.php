<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BatchController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::group(['middleware' => 'prevent-back-history'],function(){

    Auth::routes();

    Route::redirect('/', '/login');

    Route::get('/login', function(){
        return view('auth.login');
    })->name('login');

    Route::get('/register', function(){
        return view('auth.register');
    })->name('register');

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::post('/registration', [RegisterController::class,'create'])->name('reg.create');

    Route::get('/logout', [LogoutController::class,'logout'])->name('logout');

    Route::get('/products', [ProductController::class,'index'])->name('admin');
    Route::post('', [ProductController::class,'store'])->name('product.store');
    Route::get('/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/update', [ProductController::class,'update'])->name('product.update');
    Route::get('', [ProductController::class,'destroy'])->name('product.delete');

    Route::get('/batch', [BatchController::class,'index'])->name('batch');
    Route::post('/store', [BatchController::class,'store'])->name('batch.store');
    Route::get('/edit', [BatchController::class,'edit'])->name('batch.edit');
    Route::post('/update', [BatchController::class,'update'])->name('batch.update');
    Route::get('/destroy', [BatchController::class,'destroy'])->name('batch.delete');

});