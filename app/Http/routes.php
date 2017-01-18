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

Route::get('/', ['middleware' => 'guest',function(){
	return view('login');
}]);

Route::get('/login', ['middleware' => 'guest',function(){
	return view('login');
}]);

Route::get('/register', ['middleware' => 'guest', function(){
	return view('register');
}]);


Route::get('logout', 'Auth\AuthController@getLogout');
Route::post('check/login', 'Auth\AuthController@postLogin');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['middleware' => 'auth'], function(){
  Route::get('dashboard', 'AddressBookController@index');
  Route::resource('address','AddressBookController');
});
Route::post('oauth/access_token', function() {
 return Response::json(Authorizer::issueAccessToken());
});

Route::group(['prefix' => 'api/v1','before' => 'oauth'], function(){
	Route::resource('address', 'APIController');

	Route::get('user_data',function(){
     $user_id=Authorizer::getResourceOwnerId(); // the token user_id
	 $user=\App\User::find($user_id);// get the user data from database
	 return Response::json($user);
	});


});
