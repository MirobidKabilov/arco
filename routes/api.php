<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\FloorController;
use App\Http\Controllers\Api\NewsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// objects
Route::get('objects', [BlockController::class, 'index']);
Route::get('objects/{block_id}', [FloorController::class, 'index'])
                ->where(['block_id' => '[0-9]+']);
Route::get('objects/{block_id}-{floor_id}', [ApartmentController::class, 'index'])
                ->where(['block_id' => '[0-9]+', 'floor_id' => '[0-9]+']);

// news
Route::get('news', [NewsController::class, 'index']);
Route::get('events', [NewsController::class, 'events']);

// sliders
Route::get('sliders', [SliderController::class, 'index']);

//partners
Route::get('partners', [PartnerController::class, 'index']);