<?php

use App\User;
use App\Wallet;
use App\Deposit;

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

Route::get('/', function () {

    // dd($deposits);
        $a=$deposits->each(function($deposit){
                return $deposit->invested;
        });
        dd($a);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cabinete/{user}', 'UserController@index')->name('user.cabinete');

//wallet action

Route::get('/walletcreate/{user}', 'WalletController@create')->name('wallet.create');
Route::post('/walletstore', 'WalletController@store')->name('wallet.store');

//deposit action

Route::get('/{user}/{wallet}/depositcreate','DepositController@create')->name('deposit.create');
Route::post('/depositstore','DepositController@store')->name('deposit.store');
