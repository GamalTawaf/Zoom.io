<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','UserIndexController@index');

Route::get('home',function(){
	if (Auth::guest()) {
		return Redirect::to('/');
	} else {
		//return Redirect::to('ControlPanel');
		return view('Admin/ControlPanel');
	}
});
// Authentication routes...
Route::get('login',function (){
	return view('login');
});
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('LoginError',function () {
    return redirect()->back()->with('message', 'Try Again!');
});



// Registration routes...
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('Services', 'ServicesController@index');
Route::post('CreateService', 'ServicesController@create');
Route::post('EditService'  , 'ServicesController@edit');
Route::post('DeleteService'  , 'ServicesController@delete');

Route::get('Testimonials', 'TestimonialController@index');
Route::post('upload','TestimonialController@create');
Route::get('ShowTestimonials','TestimonialController@show');
Route::post('EditTestimonial','TestimonialController@edit');
Route::post('uploadupdate','TestimonialController@update');
Route::post('DeleteTestimonial','TestimonialController@delete');


Route::get('AboutUs','AboutUsController@index');
Route::post('UpdateAboutus','AboutusController@update');
Route::post('UpdateAboutus','AboutusController@update');

Route::get('UpdateAccount','AccountController@index');
Route::post('UpdateAccountEdit','AccountController@update');
Route::get('index','UserIndexController@index');

Route::post('CreateContact','UserIndexController@create');

Route::get('ContactUs','ContactController@ContactUsShow');
Route::post('ReadContact','ContactController@ContactUsRead');
Route::post('OpenNotification','ContactController@OpenNotification');


 