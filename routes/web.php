<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;

Route::match(['get', 'post'], '/', [todoController::class, 'login'])->name("todo.login");

Route::post('/', [todoController::class,'login'])->name("todo.login");

Route::get('/registration',function(){
        return view('register');
});


Route::get('/welcome',[todoController::class,'index'])->name("todo.home");

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

