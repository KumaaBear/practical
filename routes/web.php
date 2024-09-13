<?php

use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//index | home
Route::get('/', [PositionController::class, 'index'])->name('position.index');
//position store data
Route::post('/position', [PositionController::class, 'store'])->name('position.store');
//edit
Route::get('/position/{position}/edit', [PositionController::class, 'edit'])->name('position.edit');
//update
Route::put('/position/{position}/update', [PositionController::class, 'update'])->name('position.update');
//delete
Route::delete('/position/{position}/destroy', [PositionController::class, 'destroy'])->name('position.destroy');

