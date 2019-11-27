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

Route::post('/checkIn/create', 'CheckInController@store');
Route::get('/checkIn/edit/{id}', 'CheckInController@edit');
Route::post('/checkIn/update/{id}', 'CheckInController@update');
Route::delete('/checkIn/delete/{id}', 'CheckInController@delete');
Route::get('/checkIn', 'CheckInController@index');


//DVD
Route::post('/dvd/create', 'DvdController@store');
Route::get('/dvd/edit/{id}', 'DvdController@edit');
Route::post('/dvd/update/{id}', 'DvdController@update');

Route::delete('/dvd/delete/{id}', 'DvdController@delete');
Route::get('/dvd', 'DvdController@index');
Route::get('/dvd/autocomplete/search', 'DvdController@autocompleteSearch');


//Customer
Route::post('/customer/create', 'CustomerController@store');
Route::get('/customer/edit/{id}', 'CustomerController@edit');
Route::post('/customer/update/{id}', 'CustomerController@update');
Route::delete('/customer/delete/{id}', 'CustomerController@delete');
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/autocomplete/search', 'CustomerController@autocompleteSearch');


//History
Route::post('/history/create', 'HistoryController@store');
Route::get('/history/edit/{id}', 'HistoryController@edit');
Route::post('/history/update/{id}', 'HistoryController@update');
Route::delete('/history/delete/{id}', 'HistoryController@delete');
Route::get('/history', 'HistoryController@index');

//Treatment

Route::post('/treatment/create', 'TreatmentController@store');
Route::get('/treatment/edit/{id}', 'TreatmentController@edit');
Route::post('/treatment/update/{id}', 'TreatmentController@update');
Route::delete('/treatment/delete/{id}', 'TreatmentController@delete');
Route::get('/treatment', 'TreatmentController@index');

//Referals

Route::post('/refferals/create', 'RefferalsController@store');
Route::get('/refferals/edit/{id}', 'RefferalsController@edit');
Route::post('/refferals/update/{id}', 'RefferalsController@update');
Route::delete('/refferals/delete/{id}', 'RefferalsController@delete');
Route::get('/refferals', 'RefferalsController@index');