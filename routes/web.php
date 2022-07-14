<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $ch = curl_init();
//     $url = 'https://suppliers-stats.wildberries.ru/api/v1/supplier/incomes?dateFrom=2022-07-07T00:00:00.000Z&key=MDljY2M1MDgtMmMzNS00ZTY5LTljODMtMWI0NGVkOWRmYTM5';
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_URL, $url);
//     $result = curl_exec($ch);
//     curl_close($ch);

//     dd(json_decode($result));
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'showMain'])->name('main');

Route::post('/create-incomes', [CreateController::class, 'createIncomes']);
Route::get('/show-incomes', [ShowController::class, 'showIncomes']);

Route::post('/create-stocks', [CreateController::class, 'createStocks']);
Route::get('/show-stocks', [ShowController::class, 'showStocks']);

Route::post('/create-orders', [CreateController::class, 'createOrders']);
Route::get('/show-orders', [ShowController::class, 'showOrders']);

Route::post('/create-sales', [CreateController::class, 'createSales']);
Route::get('/show-sales', [ShowController::class, 'showSales']);

Route::post('/create-sales-reports', [CreateController::class, 'createSalesReports']);
Route::get('/show-sales-reports', [ShowController::class, 'showSalesReports']);

Route::post('/create-excises-reports', [CreateController::class, 'createExcisesReports']);
Route::get('/show-excises-reports', [ShowController::class, 'showExcisesReports']);