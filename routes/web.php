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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Route Menu Company
Route::group(['prefix' => 'company'], function(){
	Route::get('/', 'CompanyController@index')->name('company.index');
	Route::get('/create', 'CompanyController@create')->name('company.create');
	Route::post('/store', 'CompanyController@store')->name('company.store');
	Route::get('/show/{id}', 'CompanyController@show')->name('company.show');
	Route::get('/edit/{id}', 'CompanyController@edit')->name('company.edit');
	Route::put('/update/{id}', 'CompanyController@update')->name('company.update');
	Route::get('/destroy/{id}', 'CompanyController@destroy')->name('company.destroy');
});

// Route Menu Employee
Route::group(['prefix' => 'employee'], function(){
	Route::get('/', 'EmployeeController@index')->name('employee.index');
	Route::get('/create', 'EmployeeController@create')->name('employee.create');
	Route::post('/store', 'EmployeeController@store')->name('employee.store');
	Route::get('/show/{id}', 'EmployeeController@show')->name('employee.show');
	Route::get('/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
	Route::put('/update/{id}', 'EmployeeController@update')->name('employee.update');
	Route::get('/destroy/{id}', 'EmployeeController@destroy')->name('employee.destroy');
});
