<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Route::post('login', 'App\Http\Controllers\Controller@login');
Route::get('login', 'App\Http\Controllers\Controller@login_form');

Route::post('signup', 'App\Http\Controllers\Controller@register');
Route::get('signup', 'App\Http\Controllers\Controller@register_form');

Route::get('logout', 'App\Http\Controllers\Controller@logout');

Route::get('signup/email/{query}', 'App\Http\Controllers\Controller@checkEmail');
Route::get('signup/username/{query}', 'App\Http\Controllers\Controller@checkUsername');


Route::get('home', 'App\Http\Controllers\Home_C@home');
Route::get('home/ricerca/{q}', 'App\Http\Controllers\Home_C@ricerca');

Route::get('home/ricerca_m1/{m}', 'App\Http\Controllers\Home_C@ricerca_m1');
Route::get('home/ricerca_m2/{m}', 'App\Http\Controllers\Home_C@ricerca_m2');


Route::get('create', 'App\Http\Controllers\Create_Controller@index');
Route::post('create', 'App\Http\Controllers\Create_Controller@create_p');

Route::get('post', 'App\Http\Controllers\Create_Controller@post');

Route::get('profilo', 'App\Http\Controllers\Profilo_Controller@index'); 
Route::get('my_post', 'App\Http\Controllers\Profilo_Controller@my_post'); 
Route::get('delete/{q}', 'App\Http\Controllers\Profilo_Controller@delete_post'); 










