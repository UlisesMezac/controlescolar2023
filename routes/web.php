<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;



Route::get('/', function () {
    return view('login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

////MENU////

Route::get('/menu',[MenuController::class,'create'])->name('menu.index');