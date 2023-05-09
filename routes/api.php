<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/auth/redirect', function () {
//    return Socialite::driver('github')->redirect();
//});

Route::get('/auth/{provider}/callback', function ($provider) {

    $user = Socialite::driver($provider)->stateless()->user();

    dd($user);
})->where('provider', '.*');