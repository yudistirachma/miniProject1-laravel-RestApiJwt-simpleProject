<?php

// Auth user
Route::namespace('Auth')->group(function (){
    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController')->middleware('auth:api');
});

Route::prefix('userRole')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', function(){
        return 'userRole';
    });
});

Route::prefix('roleRoute')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', function(){
        return 'roleRoute';
    });   
});

// // CRUD Product
// Route::prefix('/product')->group(function() {
//     Route::get('/', 'ProductController@index');
//     Route::get('/{product}', 'ProductController@show');
//     Route::post('/', 'ProductController@store');
//     Route::put('/{product}', 'ProductController@update');
//     Route::delete('/{product}', 'ProductController@destroy');
// });

// // Transaction
// Route::namespace('Transaction')->group(function() {
//     Route::post('/sell', 'SellController');
//     Route::post('/order', 'OrderController');
// });