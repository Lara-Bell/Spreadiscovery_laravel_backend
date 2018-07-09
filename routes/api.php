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

Route::prefix('bitflyers')->name('bitflyers.')->group(function(){
    Route::get('tickers', 'Exchange\BitflyerController@index')->name('index');
    Route::post('/', 'Exchange\BitflyerController@store')->name('store');
    Route::delete('deleteTickers', 'Exchange\BitflyerController@destroy')->name('delete');
});

Route::prefix('coinchecks')->name('coinchecks.')->group(function(){
    Route::get('tickers', 'Exchange\CoincheckController@index')->name('index');
    Route::post('/', 'Exchange\CoincheckController@store')->name('store');
    Route::delete('deleteTickers', 'Exchange\CoincheckController@destroy')->name('delete');
});

Route::prefix('btcboxs')->name('btcboxs.')->group(function(){
    Route::get('tickers', 'Exchange\BtcboxController@index')->name('index');
    Route::post('/', 'Exchange\BtcboxController@store')->name('store');
    Route::delete('deleteTickers', 'Exchange\BtcboxController@destroy')->name('delete');
});

Route::prefix('quoinexs')->name('quoinexs.')->group(function(){
    Route::get('tickers', 'Exchange\QuoineController@index')->name('index');
    Route::post('/', 'Exchange\QuoineController@store')->name('store');
    Route::delete('deleteTickers', 'Exchange\QuoineController@destroy')->name('delete');
});

Route::prefix('zaifs')->name('zaifs.')->group(function(){
    Route::get('tickers', 'Exchange\ZaifController@index')->name('index');
    Route::post('/', 'Exchange\ZaifController@store')->name('store');
    Route::delete('deleteTickers', 'Exchange\ZaifController@destroy')->name('delete');
});

Route::prefix('bitbanks')->name('bitbanks.')->group(function(){
    Route::get('tickers', 'Exchange\BitbankController@index')->name('index');
    Route::post('/', 'Exchange\BitbankController@store')->name('store');
    Route::delete('deleteTickers', 'Exchange\BitbankController@destroy')->name('delete');
});
