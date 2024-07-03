<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/meja', function () {
    return view('meja');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/review', function () {
    return view('review');
});
