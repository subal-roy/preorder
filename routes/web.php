<?php

use Illuminate\Support\Facades\Route;
use SubalRoy\Preorder\Http\Controllers\PreorderController;

Route::get('preorder', [PreorderController::class, 'create']);
Route::post('preorder', [PreorderController::class, 'store'])->middleware('throttle:10,1');;

Route::get('preorders', [PreorderController::class, 'index'])->name('preorders.index');

Route::delete('preorders/{id}', [PreorderController::class, 'destroy'])->name('preorders.destroy');