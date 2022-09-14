<?php
declare(strict_types=1);

use App\Buyer\Application\Controllers\DeliveryController;
use App\Buyer\Application\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'buyer'], function () {
    Route::post('delivery/calculate', [DeliveryController::class, 'calculate']);
    Route::post('orders', [OrderController::class, 'create']);
});


Route::get('/', function (Request $request) {
    echo app()->version();
});
