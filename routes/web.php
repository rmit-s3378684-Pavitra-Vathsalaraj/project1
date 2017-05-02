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
    return view('layouts/login');
});

Route::get('/edit_post', function () {
    return view('layouts/edit_post');
});

Route::get('/create_post', function () {
    return view('layouts/create_post');
});

Route::get('/register', function () {
    return view('layouts/register');
});

Route::get('/change_password', function () {
    return view('layouts/change_password');
});

Route::get('/description', function () {
    return view('layouts/description');
});

Route::get('/log_out', function () {
    return view('layouts/log_out');
});

Route::get('/register_success', function () {
    return view('layouts/register_success');
});

Route::get('/side_bar', function () {
    return view('layouts/side_bar');
});

Route::get('/upload_article', function () {
    return view('layouts/upload_article');
});

Route::get('/edit_profile', function () {
    return view('layouts/edit_profile');
});

Route::get('/my_account', function () {
    return view('layouts/my_account');
});

Route::get('/register', function () {
    return view('layouts/register');
});

Route::get('/login', function () {
    return view('layouts/login');
});

Route::get('/home', function () {
    return view('layouts/home');
});

Route::get('/nav', function () {
    return view('layouts/nav');
});

//Auth::routes();


Route::get('/index','PostController@index');
//Auth::routes();
//RegisterController route
Route::post('/register_action','RegisterController@store');
Route::get('/userdetail', 'RegisterController@show_userprofile');
//LoginController route
Route::post('/login_check','LoginController@postlogin');
Route::get('/logout','LoginController@user_logout')->middleware("auth");
//Postcontroller route
Route::post('/search','PostController@search');
Route::post('/create_sellerpost','PostController@storesellerpost');
Route::post('/create_buyerpost','PostController@storebuyerpost');
Route::get('/filtercontent_meat','PostController@display_meat');
Route::get('/filtercontent_milk','PostController@display_milk');
Route::get('/filtercontent_fruit','PostController@display_fruit');
Route::get('/filtercontent_vegetable','PostController@display_vegetable');
Route::get('/filtercontent_cheese','PostController@display_cheese');
Route::get('/filtercontent_wine','PostController@display_wine');
Route::get('/filtercontent_grain','PostController@display_grain');
Route::get('/view_description', 'PostController@show_description');
Route::delete('/edit_profile/delete', 'RegisterController@destroy');
