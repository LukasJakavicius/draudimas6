<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Draudimas;

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/index', [Draudimas::class, 'index'])->name('indexRoute')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/index/createOwner', [Draudimas::class, 'createOwner'])->name('createOwnerRoute')->middleware('auth');
route::post('/index/createOwner', [Draudimas::class, 'storeOwner'])->name('storeOwnerRoute')->middleware('auth');
route::get('/index/{owner}/edit', [Draudimas::class, 'updateOwner'])->name('editOwnerRoute')->middleware('auth');
Route::put('/index/{owner}/update', [Draudimas::class, 'updateOwnerPost'])->name('editOwnerPost')->middleware('auth');
Route::delete('/index/{owner}/delete', [Draudimas::class, 'deleteOwner'])->name('deleteOwnerRoute')->middleware('auth');


