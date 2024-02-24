<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkHistoryController;
use App\Http\Controllers\WorkItemController;
use Illuminate\Support\Facades\Route;


//Route::get('/', [HomeController::class,'home_page'])->name('home_page');
Route::get('/', function (){
    return to_route('work.history');
})->name('home_page');

Route::controller(WorkHistoryController::class)->group(function (){

    //иcтория тренировок
    Route::get('/work/history',  'history')
         ->name('work.history');
    //добавление трени (страница)
    Route::get('/work/create',  'create')
         ->name('work.create');
    //обновление трени  (страница)
    Route::get('/work/edit/{work_history_model}',  'edit')
         ->name('work.edit');
    //добавление трени
    Route::post('/work/store',  'store')
         ->name('work.store');
    //обновление трени
    Route::post('/work/update/{work_history_model}',  'update')
         ->name('work.update');
    //обновление трени
    Route::get('/work/duplicate/{work_history_model}',  'duplicate')
         ->name('work.duplicate');
    // удаление трени
    Route::get('/work/destroy/{work_history_model}',  'destroy')
         ->name('work.destroy');
});


Route::controller(WorkItemController::class)->group(function () {


    Route::get('/work/item/create', 'create')
         ->name('work.item.create');

    Route::get('/work/item/edit/{item_id}', 'edit')
         ->name('work.item.edit');

    Route::post('/work/item/update/{item_id}', 'update')
         ->name('work.item.update');

    Route::get('/work/item/destroy/{item_id}', 'destroy')
         ->name('work.item.destroy');
});
//
//Route::get('/work/create',  'create'])
//    ->name('work.create');
