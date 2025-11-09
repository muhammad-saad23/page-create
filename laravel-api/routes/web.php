<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('page',PageController::class);
// Route::get('/{link}',PageController::class,'index');
// Route::get('/create',PageController::class,'create');
// Route::post('/create',PageController::class,'store');

Route::get('/filter',[PageController::class,'filter'])->name('page.filter');


Route::get('/{link}', [PageController::class, 'showByLink']);

