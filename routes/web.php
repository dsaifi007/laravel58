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

Route::get('/model', function () {
    return view('model');
});

Auth::routes(['verify' => true]);

Route::post('form-submit','PostsController@store')->name('form.submited');

Route::post('fsumbit','PostsController@store')->name('form.submited1');

Route::get('form',function(){
	return view('form');
});

Route::get('post',function(){
	return view('posts');
})->name('post');

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
	Route::get("string/encrypt","AdminController@encrypt");
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
Route::get('/policy/verify/{id}','StudentController@edit');
Route::post('/ajax/call','StudentController@store')->name("ajaxcall");
Route::get('email/list','StudentController@getEmail');
Route::get('middleware/{parm}','StudentController@index')->middleware('middleware_parameter:parm');
Route::get('matrix','StudentController@matrix');
Route::get('event','StudentController@eventGenrate');

Route::post('/ajax/imgupload','StudentController@imgupload')->name('ajaximg.upload');
Route::get('/user/info','StudentController@show');///////
Route::get('/user/access','StudentController@given_access_to_user');
Route::get('/user/post/access','PostsController@user_post_access');
Route::get('/sendmail','PostsController@sendEmail');


// Role 
Route::group(['middleware'=>'verified'],function(){
	Route::get('/add/role', 'RoleController@index');
	Route::post('/submited/role', 'RoleController@store')->name('role.submited');
	Route::get('/city/map', 'StudentController@map_city');
});




// Use For the Social login Facebook/Twitter/Linkedin/Instagram/Gmail/Github
Route::get('login/fb', 'SocialLoginController@redirectToProvider');
Route::get('login/fb/callback', 'SocialLoginController@handleProviderCallback');
Route::get('login/fb/user', 'SocialLoginController@index');