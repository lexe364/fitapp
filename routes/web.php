<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkHistoryController;
use App\Http\Controllers\WorkItemController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'home_page'])->name('home_page');

//итория тренировок
Route::get('/work/history', [WorkHistoryController::class, 'history'])
    ->name('work.history');
//добавление трени (страница)
Route::get('/work/create', [WorkHistoryController::class, 'create'])
    ->name('work.create');
//обновление трени  (страница)
Route::get('/work/edit/{work_history_model}', [WorkHistoryController::class, 'edit'])
    ->name('work.edit');
//добавление трени
Route::post('/work/store', [WorkHistoryController::class, 'store'])
    ->name('work.store');
//обновление трени
Route::post('/work/update/{work_history_model}', [WorkHistoryController::class, 'update'])
    ->name('work.update');


Route::get('/work/item/create', [WorkItemController::class, 'create'])
    ->name('work.item.create');
//
//Route::get('/work/create', [WorkHistoryController::class, 'create'])
//    ->name('work.create');
