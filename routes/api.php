<?php

use Illuminate\Http\Request;

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

Route::post('ussd', 'ussdController@onlineUssdMenu');
Route::post('stock', 'StockApiController@store');
Route::post('healthstock', 'StockApiController@healthStore');
Route::post('washstock', 'StockApiController@washStore');
Route::post('educationstock', 'StockApiController@educationStore');
Route::get('all', 'StockApiController@index');

