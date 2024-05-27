<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;

Route::match(['get', 'post'], '/', [todoController::class, 'login'])->name("todo.login");

Route::get('/', [TodoController::class, 'showLoginForm'])->name('todo.login')->middleware('alreadyLoggedIn');


// Handle login form submission
Route::post('/login', [TodoController::class, 'login'])->name('todo.login.post');

Route::get('/logout', [TodoController::class, 'logout'])->name('todo.logout');

Route::get('/registration', [TodoController::class, 'registration'])->name('todo.register')->middleware('alreadyLoggedIn');

Route::post('/registration', [TodoController::class, 'registerUser'])->name('todo.registerUser');

Route::get('/welcome', [TodoController::class, 'index'])->name('todo.home')->middleware('IsLoggedIn');


Route::get('/create', function () {
    return view('create');
})->name("todo.create");


//create todo route
Route::post('/create',[todoController::class,'store'])->name("todo.store");

//edit todo route
Route::get('/edit/{id}', [todoController::class,'edit']
 )->name("todo.edit");


 //delete todo route
Route::get('/delete/{id}',[todoController::class,'delete'])->name("todo.delete");

//update todo route
Route::post('/update',[todoController::class,'updateData'])->name("todo.updateData");

Route::get('/welcome/{id}',[todoController::class,'Complete'])->name("todo.Complete");

