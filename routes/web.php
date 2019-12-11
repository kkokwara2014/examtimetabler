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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');


// Auth::routes();

$timeIt = '2020-01-29';

if ($timeIt > date('Y-m-d')) {

    // Route::get('/', 'Auth\LoginController@showLogin')->name('homepage');

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');


    Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');


    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
        Route::get('/', 'AdminController@index')->name('dashboard.index');
        Route::resource('invigilator', 'InvigilatorController');
        Route::resource('course', 'CourseController');
        Route::resource('department', 'DepartmentController');
        Route::resource('block', 'BlockController');
        Route::resource('room', 'RoomController');
       
        Route::get('user/profile', 'UserController@profileimage')->name('user.profile');
        Route::post('user/profile', 'UserController@updateprofileimage')->name('user.profile.update');

        Route::get('/admins', 'AdminController@admins')->name('admin.admins');
    });
} else {
    Route::get('/', 'TimerController@calldeveloper');
}
