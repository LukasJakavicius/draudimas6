<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Draudimas;

Route::get('/test', function () {
    return view('welcome');
});
Route::get('setLanguage/{lang}', [Draudimas::class, 'switchLang'])->name('setLanguage')->middleware('setLanguage');

Route::get('/index', [Draudimas::class, 'index'])->name('indexRoute')->middleware('auth')->middleware('Replace')->middleware('setLanguage');
Route::get('/indexCars', [Draudimas::class, 'indexCars'])->name('indexCarRoute')->middleware('auth')->middleware('Replace')->middleware('setLanguage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/index/createOwner', [Draudimas::class, 'createOwner'])->name('createOwnerRoute')->middleware('auth')->middleware('isAdmin')->middleware('setLanguage');
route::post('/index/createOwner', [Draudimas::class, 'storeOwner'])->name('storeOwnerRoute')->middleware('auth')->middleware('isAdmin');
route::get('/index/{owner}/edit', [Draudimas::class, 'updateOwner'])->name('editOwnerRoute')->middleware('auth')->middleware('isAdmin')->middleware('setLanguage');
Route::put('/index/{owner}/update', [Draudimas::class, 'updateOwnerPost'])->name('editOwnerPost')->middleware('auth')->middleware('isAdmin');
Route::delete('/index/{owner}/delete', [Draudimas::class, 'deleteOwner'])->name('deleteOwnerRoute')->middleware('auth')->middleware('isAdmin');

route::get('/index/{owner}/createCar', [Draudimas::class, 'createCar'])->name('createCarRoute')->middleware('auth')->middleware('isAdmin')->middleware('setLanguage');
route::post('/index/{owner}/createCar', [Draudimas::class, 'storeCar'])->name('storeCarRoute')->middleware('auth')->middleware('isAdmin');
route::get('/index/{car}/editCar', [Draudimas::class, 'updateCar'])->name('editCarRoute')->middleware('auth')->middleware('isAdmin')->middleware('setLanguage');
Route::put('/index/{car}/updateCar', [Draudimas::class, 'updateCarPost'])->name('editCarPost')->middleware('auth')->middleware('isAdmin');
Route::delete('/index/{car}/deleteCar', [Draudimas::class, 'deleteCar'])->name('deleteCarRoute')->middleware('auth')->middleware('isAdmin');

