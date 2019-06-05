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
//category
Route::resource('category', 'categoryController');
Route::get('category/delete/{id}','categoryController@destroy');


//user

Route::resource('user', 'userController');
Route::get('user/delete/{id}','userController@destroy');


//city

Route::resource('city', 'cityController');
Route::get('city/delete/{id}','cityController@destroy');


//country
Route::resource('country', 'countryController');
Route::get('country/delete/{id}','countryController@destroy');

//car 
Route::resource('car', 'carController');
Route::get('car/delete/{id}','carController@destroy');


//cruise 
Route::resource('cruise', 'cruiseController');
Route::get('cruise/delete/{id}','cruiseController@destroy');



//feature 
Route::resource('feature', 'featureController');
Route::get('delete/{id}','featureController@destroy');

//hotels
Route::resource('hotels', 'hotelController');

Route::post('/getCity','ajaxController@getCity');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    $config = array();

    $config['zoom'] = '3';
    $config['map_height'] = '500px';

    GMaps::initialize($config);
    $map = GMaps::create_map();

    echo $map['js'];
    echo $map['html'];
});