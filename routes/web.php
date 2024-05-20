<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;

Route::match(['get', 'post'], '/', [todoController::class, 'login'])->name("todo.login");

Route::post('/', [todoController::class,'login'])->name("todo.login");




Route::get('/welcome',[todoController::class,'index'])->name("todo.home");

Route::get('/create', function () {
    return view('create');
})->name("todo.create");


//create todo route
Route::post('/create',[todoController::class,'store'])->name("todo.store");





