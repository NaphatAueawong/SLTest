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

Route::get('/', 'LoginController@showLogin');
Route::post('/login', 'LoginController@checkLogin');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@checkRegister');

Route::get('/main/homePage/{id}', 'MainController@showHomePage');
Route::get('/main/editProfile/{id}', 'MainController@showEditProfile');
Route::post('/main/editProfile/{id}', 'MainController@editProfile');
Route::get('/main/createCourse/{id}', 'MainController@showCreateCourse');
Route::post('/main/createCourse/{id}', 'MainController@createCourse');
Route::get('/main/course/{id}', 'MainController@showCourse');
Route::post('/main/search/{id}/{type}', 'MainController@searchCouse');