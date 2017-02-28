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
Route::get('/', 'PlaceController@index');

Route::get('/organization', 'OrganizationController@index');
Route::post('/organization/save', 'OrganizationController@save');
Route::post('/organization/getorganization', 'OrganizationController@getorganization');
Route::get('/organization/delete/{id}', 'OrganizationController@delete');

Route::get('/requests', 'RequestsController@index');
Route::get('/requests/add', 'RequestsController@manage');
Route::get('/requests/edit/{id}', 'RequestsController@manage');
Route::post('/requests/save', 'RequestsController@save');
Route::get('/requests/delete/{id}', 'RequestsController@delete');

Route::get('/home', 'UserController@index');
Route::get('/dashboard', 'HomeController@index');

Route::get('/route', 'RouteController@index');
Route::get('/route/add', 'RouteController@manage');
Route::get('/route/edit/{id}', 'RouteController@manage');
Route::post('/route/getplace', 'RouteController@getplace');
Route::post('/route/save', 'RouteController@save');
Route::get('/route/delete/{id}', 'RouteController@delete');

Route::get('/event', 'EventController@index');
Route::get('/event/add', 'EventController@manage');
Route::get('/event/edit/{id}', 'EventController@manage');
Route::post('/event/save', 'EventController@save');
Route::get('/event/delete/{id}', 'EventController@delete');

Route::get('/knowledge', 'KnowledgeController@index');
Route::get('/knowledge/add', 'KnowledgeController@manage');
Route::get('/knowledge/edit/{id}', 'KnowledgeController@manage');
Route::post('/knowledge/save', 'KnowledgeController@save');
Route::get('/knowledge/delete/{id}', 'KnowledgeController@delete');

Route::get('/place', 'PlaceController@index');
Route::get('/place/add', 'PlaceController@manage');
Route::get('/place/edit/{id}', 'PlaceController@manage');
Route::post('/place/save', 'PlaceController@save');
Route::get('/place/delete/{id}', 'PlaceController@delete');
Route::post('/place/getAmphur', 'PlaceController@getAmphur');
Route::post('/place/deleteimg', 'PlaceController@deleteimg');
Route::post('/place/galleryupload', 'PlaceController@galleryupload');

Route::get('/category', 'CategoryController@index');
Route::post('/category/save', 'CategoryController@save');
Route::post('/category/getcategory', 'CategoryController@getcategory');
Route::get('/category/delete/{id}', 'CategoryController@delete');

Route::get('/smart', 'SmartController@index');
Route::get('/smart/add', 'SmartController@manage');
Route::get('/smart/edit/{id}', 'SmartController@manage');
Route::post('/smart/save', 'SmartController@save');
Route::get('/smart/delete/{id}', 'SmartController@delete');
Route::post('/smart/galleryupload', 'SmartController@galleryupload');

Route::get('/userreview', 'UserreviewController@index');
Route::get('/userreview/approve/{id}', 'UserreviewController@approve');
Route::get('/userreview/delete/{id}', 'UserreviewController@delete');
Route::post('/userreview/getUserreview', 'UserreviewController@getUserreview');
Route::post('/userreview/getFullreview', 'UserreviewController@getFullreview');

Route::get('/user', 'UserController@index');
Route::get('/user/delete/{id}', 'UserController@delete');
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
