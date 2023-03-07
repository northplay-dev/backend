<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/auth/providers', function (Request $request) {
  return  array (
        'credentials' => 
        array (
          'id' => 'credentials',
          'name' => 'Credentials',
          'type' => 'credentials',
          'signinUrl' => 'https://dev.northplay.app/api/auth/signin/credentials',
          'callbackUrl' => 'https://dev.northplay.app/api/auth/callback/credentials',
        ),
    );

});


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
