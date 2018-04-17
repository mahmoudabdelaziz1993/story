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


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create', 'PostController@create')->name('create');
Route::get('/post/{id}', 'PostController@show')->name('show');
Route::get('/profile/{id}', 'PostController@pro')->name('profile');
Route::get('/cat/{name}', 'CategoryController@show')->name('cat');
Route::post('/comment/{name}', 'PostController@comment')->name('comment');
Route::get('/fuck', 'PostController@fuck')->name('fuck');

Route::get('/x', function()
{
  # code...
//  return view(postajax)->with(['data' =>(new \App\Post)->latest()->paginate(3)]);
$x =(new \App\Post)->latest()->paginate(3);

  return view('postajax',['data' => $x]);
})->name('x');
