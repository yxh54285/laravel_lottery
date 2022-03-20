<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotteryController;
use App\Http\Controllers\LotteryGiftController;
use App\Http\Middleware\CheckMaxPeople;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('lottery_gifts', [LotteryGiftController::class, 'store'])
    ->middleware([CheckMaxPeople::class]);

Route::resources([
    'lotteries'     =>  LotteryController::class,
    // 'lottery_gifts' =>  LotteryGiftController::class,
]);
