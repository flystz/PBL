<?php

use App\Http\Controllers\SentimenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MenuController; // Add this line to import MenuController
use App\Http\Controllers\ApiProxyController; // Add this line to import ApiProxyController
use App\Http\Controllers\TableStatusController;
use App\Http\Controllers\TestJarakController; // Add this line to import TestJarakController



Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/meja', function () {
    return view('user.meja');
});

Route::get('/menu', function () {
    return view('admin.menu');
});

Route::get('/reviews', function () {
    return view('user.review');
});
Route::get('/rekomendasi', function () {
    return view('user.rekomendasi');
});
                                 

Route::post('/test-jarak', [TestJarakController::class, 'store']);
Route::get('/get-data', [TestJarakController::class, 'getAllData']);

Route::get('/get-status', [TableStatusController::class, 'getStatus']);

Route::post('/proxy-apriori', [ApiProxyController::class, 'proxyApriori']);


Route::get('/menumakan', [MenuController::class, 'showUserMenu'])->name('user.menumakan');
Route::resource('menu', MenuController::class);
#Sentimen::Route();
Route::post('submit-review', [SentimenController::class, 'store'])->name('submit.review');
Route::resource('sentimen', SentimenController::class);
#Auth::routes();
Route::get('admin/login', [AuthController::class, 'index'])->name('login');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
