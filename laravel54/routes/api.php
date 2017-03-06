<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/report', 'FinancialController@report');
Route::group(
    ['middleware' => 'auth:api'],
    function () {
        Route::resource('/customer', 'MainController');
        Route::post('/deposit', 'FinancialController@addDeposit');
        Route::post('/withdraw', 'FinancialController@withDraw');

        Route::get('/financial/{id?}', 'FinancialController@show');
    }
);
