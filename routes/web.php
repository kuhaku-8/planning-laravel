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

Route::resource('/', 'HomeController');

Route::resource('financial', 'FinancialController');

Route::resource('profit', 'ProfitController');

Route::resource('financial-owe', 'FinancialOweController');

Route::resource('financial-owe-paid', 'FinancialOwePaidController');

Route::resource('financial-debt', 'FinancialDebtController');
Route::put('financial-debt/{id}', 'FinancialDebtController@move');

Route::resource('financial-debt-paid', 'FinancialDebtPaidController');

Route::resource('item-buy', 'ItemBuyController');
Route::put('item-buy-move/{id}', 'ItemBuyController@move');

Route::resource('item-history', 'ItemHistoryController');
