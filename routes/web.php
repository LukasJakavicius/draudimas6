<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Draudimas;

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/index', [Draudimas::class, 'index'])->name('indexRoute');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/index/createOwner', [Draudimas::class, 'createOwner'])->name('createOwnerRoute');
route::post('/index/createOwner', [Draudimas::class, 'storeOwner'])->name('storeOwnerRoute');
route::get('/index/{owner}/edit', [Draudimas::class, 'updateOwner'])->name('editOwnerRoute');
Route::put('/index/{owner}/update', [Draudimas::class, 'updateOwnerPost'])->name('editOwnerPost');
Route::delete('/index/{owner}/delete', [Draudimas::class, 'deleteOwner'])->name('deleteOwnerRoute');


