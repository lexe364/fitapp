<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkHistoryController;
use App\Http\Controllers\WorkItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'home_page'])->name('home_page');

Route::get('/work/history', [WorkHistoryController::class, 'history'])
    ->name('work.history');

Route::get('/work/create', [WorkHistoryController::class, 'create'])
    ->name('work.create');

Route::get('/work/edit/{work_history_model}', [WorkHistoryController::class, 'edit'])
    ->name('work.edit');

Route::post('/work/store', [WorkHistoryController::class, 'store'])
    ->name('work.store');

Route::post('/work/update/{work_history_model}', [WorkHistoryController::class, 'update'])
    ->name('work.update');

Route::get('/work/item/create', [WorkItemController::class, 'create'])
    ->name('work.item.create');
//
//Route::get('/work/create', [WorkHistoryController::class, 'create'])
//    ->name('work.create');
