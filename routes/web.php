<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
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
    return redirect()->route('dashboard');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('register','register')->name('register');
    Route::post('register','registersave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::controller(MahasiswaController::class)->prefix('mahasiswas')->group(function(){
        Route::get('','index')->name('mahasiswas');
        Route::get('create','create')->name('mahasiswas.create');
        Route::post('store', 'store')->name('mahasiswas.store');
        Route::get('show/{id}','show')->name('mahasiswas.show');
        Route::get('edit/{id}','edit')->name('mahasiswas.edit');
        Route::put('edit/{id}','update')->name('mahasiswas.update');
        Route::delete('destroy/{id}','destroy')->name('mahasiswas.destroy');
    });
});
