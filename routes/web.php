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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/financial-owe', 'FinancialOweController@show');

Route::get('/financial-debt', 'FinancialDebtController@show');

Route::get('/item-buy', 'ItemBuyController@show');

Route::get('/item-history', 'ItemHistoryController@show');
