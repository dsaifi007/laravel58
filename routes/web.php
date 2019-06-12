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
use App\User;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('welcome');
});//->middleware('verified');


Auth::routes(['verify' => true]);

Route::post('form-submit','PostsController@store')->name('form.submited');

Route::get('form',function(){
	return view('form');
});

Route::get("verify",function(){
	return "Your email has been verified!";
});

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::group(['namespace'=>'Admin','middleware'=>['verified'],'prefix'=>'admin'],function(){
	//Route::get("admin-list","AdminController@index");
	Route::get("send-email/{id}","AdminController@sendemail");
	Route::get("eventdispatch/{id}","AdminController@eventDispatch");
	Route::get("gate","AdminController@index")->middleware('can:create,App\User');
	Route::get("test","AdminController@test");
	Route::get("create","AdminController@create");
	Route::get("index","AdminController@index");
	Route::get("test1","AdminController@test1")->name('test1');
	Route::resource("admn","AdminController",['names'=>['create'=>'admn.usercreate']]);
	Route::get("tempurl","AdminController@tempUrl");
	Route::get("lang",function(){
		session('key', 'default');
		echo session('key');
	});
});



Route::get('notify/index', 'NotificationController@index');
Route::get('userinfo/{user}', function (App\User $user) {
    echo $user->email;
})->middleware('verified');
Route::get("postinfo","PostsController@index")->middleware('verified','auth','test');
Route::get("retry","PostsController@retry")->middleware('verified','auth');
Route::get("postcreate","PostsController@create");
Route::resource('postcurd','PostsController');

Route::get('gate/verify','StudentController@index');
Route::get('app/test','StudentController@test');
Route::get('/policy/verify','StudentController@create');
Route::post('/ajax/call','StudentController@store')->name("ajaxcall");
Route::get('email/list','StudentController@getEmail');
Route::get('middleware/{parm}','StudentController@index')->middleware('middleware_parameter:parm');
Route::get('stringa','StudentController@string');
Route::get('event','StudentController@eventGenrate');
