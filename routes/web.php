<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::group(['middleware' => 'auth'], function () {

Route::get('/', 'BranchController@index');

Route::get('/branchs', 'BranchController@index');
Route::post('/branch/update/{branch}', 'BranchController@update');
Route::post('/branch', 'BranchController@store');

Route::get('/addamployee', 'GraduateController@addamployee');
Route::get('/graduates', 'GraduateController@index');
Route::get('/graduate/branchs', 'GraduateController@branch');
Route::get('/graduate/branch/{description}', 'GraduateController@description');
Route::post('/graduate/update/{branch}', 'GraduateController@update');
Route::post('/graduate', 'GraduateController@store');
Route::post('/graduate/branch/{description}/prints', 'GraduateController@print');
Route::post('/graduate/import/excel', 'GraduateController@import');
Route::get('/search/graduate', 'GraduateController@search');

Route::get('/graduate/admin/users', 'UserController@lists');
Route::post('/graduate/admin/user/{user}', 'UserController@update');
Route::post('/user/register', 'UserController@store');

Route::get('/graduate/admin/roles', 'RoleController@index');
Route::get('/graduate/admin/role/create', 'RoleController@create');
Route::post('/graduate/admin/role', 'RoleController@store');
Route::get('/graduate/admin/role/{role}/edit', 'RoleController@edit');
Route::patch('/graduate/admin/role/{role}', 'RoleController@update');

Route::get('/graduate/admin/permissions', 'PermissionController@index');
Route::get('/graduate/admin/permission/create', 'PermissionController@create');
Route::post('/graduate/admin/permission', 'PermissionController@store');
Route::get('/graduate/admin/permission/{permission}/edit', 'PermissionController@edit');
Route::patch('/graduate/admin/permission/{permission}', 'PermissionController@update');

});

Route::get('/home', 'BranchController@index');
