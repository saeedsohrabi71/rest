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

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {

    return $request->user();
} );


Route::get( 'gab', 'BeaconController@all' );

Route::post( 'gaub', 'BeaconController@userAllBeacons' );


Route::post( 'cu', 'accountController@createUser' );

Route::group( [ 'middleware' => 'auth:api' ], function () {

    Route::post( 'sb', 'BeaconController@sendBeacon' );

    Route::get( 'guaflb', 'BeaconController@getUserAllFollowingsBeacons' );

    Route::get( 'gulb', 'BeaconController@getLastBeacon' );

    Route::get( 'gcu', 'accountController@getCurrentUser' );

    Route::post( 'gui', 'accountController@getUserInfo' );

    Route::post( 'gusi', 'accountController@getUsersInfo' );


    Route::post( 'su', 'accountController@searchUser' );

    Route::get( 'gau', 'accountController@getAllUsers' );

    Route::get( 'guaf', 'accountController@getUsersAllFollowings' );

    Route::post( 'af', 'accountController@followFriend' );

    Route::post( 'uff', 'accountController@unfollowFriend' );

    Route::post( 'tuf', 'accountController@toggleUsersFollowing' );

} );