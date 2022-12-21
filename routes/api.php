<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\traveler\RegisterController;
use App\Http\Controllers\Api\traveler\LoginController;
use App\Http\Controllers\Api\traveler\ProfileController;
use App\Http\Controllers\Api\traveler\BadgeController;
use App\Http\Controllers\Api\traveler\WisataController;
use App\Http\Controllers\Api\traveler\MissionController;
use App\Http\Controllers\Api\traveler\HartakarunController;
use App\Http\Controllers\Api\traveler\TravelerRedeemController;
use App\Http\Controllers\Api\traveler\TravelerScanController;

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

//group route with prefix "traveler"
Route::prefix('traveler')->group(function () {

    //route register
    Route::post('/register', [App\Http\Controllers\Api\traveler\RegisterController::class, 'store'], ['as' => 'traveler']);
    
    //route login
    Route::post('/login', [App\Http\Controllers\Api\traveler\LoginController::class, 'index'], ['as' => 'traveler']);

    //group route with middleware "auth:api_traveler"
    Route::group(['middleware' => 'auth:api_traveler'], function() {

        //data user
        Route::get('/user', [App\Http\Controllers\Api\traveler\LoginController::class, 'getUser'], ['as' => 'traveler']);

        //refresh token JWT
        Route::get('/refresh', [App\Http\Controllers\Api\traveler\LoginController::class, 'refreshToken'], ['as' => 'traveler']);

        //logout
        Route::post('/logout', [App\Http\Controllers\Api\traveler\LoginController::class, 'logout'], ['as' => 'traveler']);

        //profile
        Route::post('/profile', [App\Http\Controllers\Api\traveler\ProfileController::class, 'update'], ['as' => 'traveler']);
        
        //badge
        Route::apiResource('/badges', App\Http\Controllers\Api\traveler\BadgeController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit'], 'as' => 'traveler']);
        
        //wisata 
        Route::apiResource('/wisatas', App\Http\Controllers\Api\traveler\WisataController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit'], 'as' => 'traveler']);
        
        //mision
        Route::apiResource('/missions', App\Http\Controllers\Api\traveler\MissionController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit'], 'as' => 'traveler']);
        
        //hartakarun
        Route::apiResource('/hartakaruns', App\Http\Controllers\Api\traveler\HartakarunController::class, ['except' => ['store', 'show', 'update', 'destroy', 'create', 'edit'], 'as' => 'traveler']);
        
        //travelerReedem
        Route::apiResource('/travelerRedeem', App\Http\Controllers\Api\traveler\TravelerRedeemController::class, ['except' => ['index', 'show', 'update', 'destroy', 'create', 'edit'], 'as' => 'traveler']);
        
        //travelerScan
        Route::apiResource('/travelerScan', App\Http\Controllers\Api\traveler\TravelerScanController::class, ['except' => ['index', 'show', 'update', 'destroy', 'create', 'edit'], 'as' => 'traveler']);




    });

});