<?php

// Auth user
Route::namespace('Auth')->group(function (){
    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController')->middleware('auth:api');
});