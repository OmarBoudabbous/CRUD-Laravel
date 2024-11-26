<?php

use App\Http\Controllers\MembersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/members',[MembersController::class,'index'])->name('members.index');
Route::get('/members/create',[MembersController::class,'create'])->name('members.create');
Route::post('/members',[MembersController::class,'store'])->name('members.store');
Route::get('/members/{id}',[MembersController::class,'show'])->name('members.show');
Route::get('/members/{id}/edit',[MembersController::class,'edit'])->name('members.edit');
Route::put('/members/{id}',[MembersController::class,'update'])->name('members.update');
Route::delete('/members/{id}',[MembersController::class,'destory'])->name('members.destroy');






