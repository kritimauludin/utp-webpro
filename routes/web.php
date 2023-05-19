<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LandingController;
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

//disini diimplementasi middleware untuk mengatur proses authentication

//rute halaman landing page
Route::get('/', [LandingController::class, 'index'])->name('landing');

//rute group untuk proses authentication
Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register')->middleware('guest');
Route::post('/auth/register', [AuthenticationController::class, 'userRegister']);
Route::post('/auth/login', [AuthenticationController::class, 'userLogin']);
Route::post('/auth/logout', [AuthenticationController::class, 'logout'])->middleware('auth');

//rute resource untuk menghandle semua proses mengenai banner
Route::resource('banner', BannerController::class)->middleware('auth');



