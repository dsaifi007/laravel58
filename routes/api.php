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
use App\User;
use App\Http\Resources\User as UserResource;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes(['verify' => true]);
//'middleware'=>'apiauth:api'
Route::group(['namespace'=>'Api','middleware'=>['auth:api']],function(){
    Route::get('user-info','UserController@index');
	Route::resource('users', 'UserController');
	Route::get('/user', function () {
    	return  UserResource::collection(User::all()->keyBy->id);
	});
	Route::get('user/login/{id?}','UserController@loginById')->middleware('throttle:4,1');

	
	//register
	Route::post('user/register','UserController@usercreate');//->middleware('throttle:4,1');
});

Route::namespace('Api')->group(function () {
    Route::post("login",'UserController@login');//->middleware('throttle:1,1');
});
Route::group(['namespace'=>'Api'],function(){

	Route::get('user/detail/{id?}','UserController@show')->middleware('auth:api');

});
