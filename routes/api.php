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

Route::prefix('/product')->group(function() {
    Route::get('/', 'ProductController@index');
    Route::get('/{product}', 'ProductController@show');
    Route::post('/', 'ProductController@store');
    Route::put('/{product}', 'ProductController@update');
    Route::delete('/{product}', 'ProductController@destroy');
});

Route::namespace('Transaction')->group(function() {
    Route::post('/sell', 'SellController');
    Route::post('/order', 'OrderController');
});

Route::prefix('/supplier')->group(function() {
    Route::get('/', 'SupplierController@index');
    Route::get('/{supplier}', 'SupplierController@show');
    Route::post('/', 'SupplierController@store');
    Route::put('/{supplier}', 'SupplierController@update');
    Route::delete('/{supplier}', 'SupplierController@destroy');
});

Route::prefix('/customer')->group(function() {
    Route::get('/', 'CustomerController@index');
    Route::get('/{customer}', 'CustomerController@show');
    Route::post('/', 'CustomerController@store');
    Route::put('/{customer}', 'CustomerController@update');
    Route::delete('/{customer}', 'CustomerController@destroy');
});

Route::prefix('/employee')->group(function() {
    Route::get('/', 'EmployeeController@index');
    Route::get('/{employee}', 'EmployeeController@show');
    Route::post('/', 'EmployeeController@store');
    Route::put('/{employee}', 'EmployeeController@update');
    Route::delete('/{employee}', 'EmployeeController@destroy');
});
