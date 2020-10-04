<?php

// Auth user
Route::namespace('Auth')->group(function (){
    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController')->middleware('auth:api');
});

Route::prefix('userRole')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'UserRoleController@index');
    Route::get('/{user}', 'UserRoleController@show');
    Route::post('/', 'UserRoleController@store');
    Route::put('/{user}', 'UserRoleController@update');
    Route::delete('/{user}', 'UserRoleController@destroy');
});

Route::prefix('roleRoute')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'RoleRouteController@index');
    Route::get('/{roleRoute}', 'RoleRouteController@show');
    Route::post('/', 'RoleRouteController@store');
    Route::put('/{roleRoute}', 'RoleRouteController@update');
    Route::delete('/{roleRoute}', 'RoleRouteController@destroy');
});

Route::prefix('role')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'RoleController@index');
    Route::get('/{role}', 'RoleController@show');
    Route::post('/', 'RoleController@store');
    Route::put('/{role}', 'RoleController@update');
    Route::delete('/{role}', 'RoleController@destroy');
});

Route::prefix('route')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'RouteController@index');
    Route::get('/{route}', 'RouteController@show');
    Route::post('/', 'RouteController@store');
    Route::put('/{route}', 'RouteController@update');
    Route::delete('/{route}', 'RouteController@destroy');
});

Route::namespace('Transaction')->middleware(['auth:api','role'])->group(function() {
    Route::post('/sell', 'SellController');
    Route::post('/order', 'OrderController');
});

Route::prefix('/product')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'ProductController@index');
    Route::get('/{product}', 'ProductController@show');
    Route::post('/', 'ProductController@store');
    Route::put('/{product}', 'ProductController@update');
    Route::delete('/{product}', 'ProductController@destroy');
});

Route::prefix('/supplier')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'SupplierController@index');
    Route::get('/{supplier}', 'SupplierController@show');
    Route::post('/', 'SupplierController@store');
    Route::put('/{supplier}', 'SupplierController@update');
    Route::delete('/{supplier}', 'SupplierController@destroy');
});

Route::prefix('/customer')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'CustomerController@index');
    Route::get('/{customer}', 'CustomerController@show');
    Route::post('/', 'CustomerController@store');
    Route::put('/{customer}', 'CustomerController@update');
    Route::delete('/{customer}', 'CustomerController@destroy');
});

Route::prefix('/employee')->middleware(['auth:api','role'])->group(function() {
    Route::get('/', 'EmployeeController@index');
    Route::get('/{employee}', 'EmployeeController@show');
    Route::post('/', 'EmployeeController@store');
    Route::put('/{employee}', 'EmployeeController@update');
    Route::delete('/{employee}', 'EmployeeController@destroy');
});
