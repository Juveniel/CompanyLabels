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

Route::get('/', function () {
    return view('front.homepage');
});

Route::get('/login', function () {
    return view('front.login');
});

Route::get('/admin', function () {
    if(Auth::check())
    {
        return redirect('/admin/dashboard');
    }

    return view('backend.login');
});

// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@logout');


// Company Routes
Route::group(['namespace' => 'Company', 'middleware' => ['auth', 'auth.role:company']], function()
{
    # Base controller
    Route::get('/company', [
        'uses' => 'CompanyUserController@index'
    ]);

    # Dashboard
    Route::get('/company/dashboard', ['as' => 'dashboard', 'uses' => 'CompanyUserController@dashboard', function () {}]);

});

// Administration routes
Route::group(['namespace' => 'Admin', 'middleware' => ['auth','auth.role:admin']], function()
{
    # Base controller
    Route::get('/admin/check', [
        'uses' => 'AdminController@index'
    ]);

    # Dashboard
    Route::get('/admin/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard', function () {}]);

    # User related
    Route::get('admin/users', ['as' => 'users', 'uses' => 'AdminUsersController@index', function () {}]);
    Route::get('admin/users/create', ['as' => 'create', 'uses' => 'AdminUsersController@create', function () {}]);
    Route::post('admin/users/create', ['as' => 'create ', 'uses' => 'AdminUsersController@store', function () {}]);
    Route::post('admin/users/create/getCities/{id}', ['as' => 'get_cities ', 'uses' => 'AdminUsersController@get_cities', function ($id) {}]);
    Route::get('admin/users/{id?}', ['as' => 'profile', 'uses' => 'AdminUsersController@show', function ($id = null) {}]);
    Route::get('admin/users/edit/{id?}', ['as' => 'user-edit', 'uses' => 'AdminUsersController@edit', function ($id = null) {}]);
    Route::patch('admin/users/edit/{id?}', ['as' => 'user-edit', 'uses' => 'AdminUsersController@update', function ($id = null) {}]);
    Route::get('admin/users/delete/{id?}', ['as' => 'user-delete', 'uses' => 'AdminUsersController@destroy', function ($id = null) {}]);
    Route::get('/admin/lockscreen', ['as' => 'lockscreen', 'uses' => 'AdminUsersController@lock_screen', function () {}]);

    # Company
    Route::get('/admin/companies', ['as' => 'companies', 'uses' => 'CompaniesController@index', function() {}]);
    Route::get('admin/companies/create', ['as' => 'create', 'uses' => 'CompaniesController@create', function () {}]);
    Route::post('admin/companies/create', ['as' => 'create ', 'uses' => 'CompaniesController@store', function () {}]);
    Route::get('admin/companies/{id?}', ['as' => 'companyProfile', 'uses' => 'CompaniesController@show', function ($id = null) {}]);
    Route::get('admin/companies/edit/{id?}', ['as' => 'company-edit', 'uses' => 'CompaniesController@edit', function ($id = null) {}]);
    Route::patch('admin/companies/edit/{id?}', ['as' => 'company-edit', 'uses' => 'CompaniesController@update', function ($id = null) {}]);

    # Label Templates
    Route::get('/admin/labels', ['as' => 'labels', 'uses' => 'LabelTemplatesController@index', function() {}]);
    Route::get('admin/labels/create', ['as' => 'create', 'uses' => 'LabelTemplatesController@create', function () {}]);
    Route::post('admin/labels/create', ['as' => 'create ', 'uses' => 'LabelTemplatesController@store', function () {}]);

    # Settings
    Route::get('/admin/settings', ['as' => 'settings', 'uses' => 'SettingsController@edit', function () {}]);
    Route::patch('/admin/settings', ['as' => 'settings', 'uses' => 'SettingsController@update', function () {}]);

    # Logs
    Route::get('/admin/logs', ['as' => 'logs', 'uses' => 'LogsController@index', function () {}]);
    Route::get('/admin/logs/access', ['as' => 'access-log', 'uses' => 'LogsController@index', function () {}]);
});
