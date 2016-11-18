<?php

/**
 * Employee
 */

//Employee Login
Route::get('/login', 'LoginController@showLoginForm')->name('get_login');
Route::post('/login', 'LoginController@login')->name('post_login');
Route::get('/logout', 'LoginController@logout')->name('get_logout');

//Employee Register
Route::get('/register', 'RegisterController@showRegistrationForm')->name('get_register');
Route::post('/register', 'RegisterController@register')->name('post_register');

//Employee Passwords
Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('post_email');
Route::post('/password/reset', 'ResetPasswordController@reset')->name('post_reset');
Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('get_reset');
Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('get_reset_token');

Route::group(array('middleware' => 'employee'), function () {

});