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

Route::get('/financial', 'FinancialController@index');

Route::get('/financial-owe', 'FinancialOweController@index');

Route::get('/financial-debt', 'FinancialDebtController@index');

Route::get('/item-buy', 'ItemBuyController@index');

Route::get('/item-history', 'ItemHistoryController@index');
