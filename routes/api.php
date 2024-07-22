<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableStatusController;
use App\Http\Controllers\TestJarakController; // Add this line to import the TestJarakController class


Route::post('/update-status', [TableStatusController::class, 'updateStatus']);

Route::post('/test-jarak', [TestJarakController::class, 'store']);
Route::get('/get-data', [TestJarakController::class, 'getAllData']);


