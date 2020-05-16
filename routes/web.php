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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::group(['middleware'=>['verified','change.language']],function(){

	// ------------------------------ Institution Resource Controller  -------------------------------------
	Route::resource('institution', 'Admin\InstitutionController');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/user/add', 'StudentController@create');
    Route::post('/user/add', 'StudentController@store');
	Route::get('users/list/{id?}', ['uses'=>'StudentController@index', 'as'=>'users.index']);
	Route::get('/user/edit/{id}', 'StudentController@edit');
	Route::get('/user/profile', 'StudentController@show');


	// ------------------------------ Common Ajax Controller  -------------------------------------
	Route::post('check-email', 'Xhttp\CommonAjaxController@checkEmail')->name('check.email');
	Route::get('city/list', 'Xhttp\CommonAjaxController@getcitylist')->name('city.list');

});
Route::get('/user/register', 'Auth\RegisterController@show')->name('user.register');
Route::post('/user/registartion', 'Auth\RegisterController@add')->name('user.registered');


///Salary 
Route::get('/user/salary', 'SalaryController@index')->middleware("verified");


Route::get('send/email/{id}', "TestingController@sendemail");


