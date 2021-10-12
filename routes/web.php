<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
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

Route::get('/', [HomeController::class, 'index'] )->name('home');

Route::get('/checkuser', [HomeController::class, 'checkuser'] );

Route::post('/booking', [HomeController::class, 'booking'] )->name('booking');


Route::prefix('checkuser')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'] )->name('admin.dashboard');
    Route::get('user', [AdminController::class, 'user'] )->name('admin.user');
    Route::get('deleteuser/{id}', [AdminController::class, 'deleteuser'] )->name('admin.deleteuser');

    Route::resource('food', FoodController::class);
    Route::resource('reserve', ReservationController::class);
    Route::resource('chef', ChefController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('category', CategoryController::class);
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
