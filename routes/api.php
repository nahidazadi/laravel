<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/book/all', 'Newbook1Controller@Book')->middleware('cors');
Route::post('/book', 'Newbook1Controller@index')->middleware('cors');
Route::post('/postbook', 'Newbook1Controller@post')->middleware('cors');
Route::post('/delete', 'Newbook1Controller@delete')->middleware('cors');
Route::post('/book-put', 'Newbook1Controller@put')->middleware('cors');
Route::post('/register', 'Api\Authcontroller@register')->middleware('cors');
Route::post('/login', 'Api\Authcontroller@login')->middleware('cors');


