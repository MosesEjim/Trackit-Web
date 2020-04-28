<?php

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
//     return view('welcome');
// });



Route::get('/', 'AdminController@index');
Route::get('ssquestioniares','SSQuestioniareController@index');
Route::get('ssquestioniares/statistics','SSQuestioniareController@statistics');
Route::get('ssquestioniares/{id}','SSQuestioniareController@show');
Route::resource('FSQuestioniares','FSQuestionaireController');
Route::get('statistics', 'SSQuestioniareController@statistics' );
Route::get('personnelstatistics', 'FSQuestionaireController@statistics' );
Route::post('ssquestioniares/statistics/usable', 'SSQuestioniareController@usableDetail');
Route::get('ssquestioniares/statistics/usable', 'SSQuestioniareController@usableDetail');
Route::get('charts', 'ChartsViewController@statistics');
Route::post('charts', 'ChartsViewController@statistics');
Route::get('register', 'CollectorsController@create');
Route::get('store', 'CollectorsController@store');
Route::get('fsquestionaire', 'FSQuestionaireController@index');
Route::get('fsquestioniares/statistics', 'FSQuestionaireController@statistics');
Route::get('adhoc', 'AdhocController@index');
Route::post('adhoc','AdhocController@store');
