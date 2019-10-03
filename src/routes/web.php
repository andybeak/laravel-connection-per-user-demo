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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {

    Route::get('/login_normal_user', function () {
        $user = \App\User::where('name', 'standard')->firstOrFail();
        Auth::login($user);
        return view('user', ['username' => Auth::user()->name]);
    });

    Route::get('/login_admin_user', function () {
        $user = \App\User::where('name', 'root')->firstOrFail();
        Auth::login($user);
        return view('user', ['username' => Auth::user()->name]);
    });

    Route::get('/demo_page', function () {
        $transactions = \App\Transaction::all();
        return view('transactions', ['transactions' => $transactions]);
    });

});


