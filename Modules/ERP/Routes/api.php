<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'Admin\UserController@login');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('login-check', function () {
        return json_encode([
            'status' => true
        ]);
    });
    Route::get('permission-list', 'Admin\UserController@list_permission');
    Route::get('role-list', 'Admin\UserController@list_role');
    Route::get('get-roles', 'Admin\UserController@get_roles');
    Route::get('get-permissions', 'Admin\UserController@get_permissions');
    Route::get('user-list', 'Admin\UserController@list_user');
    Route::post('save-user', 'Admin\UserController@save_user');
    Route::post('update-user', 'Admin\UserController@update_user');
    Route::post('delete-user', 'Admin\UserController@delete_user');
    Route::post('save-permission', 'Admin\UserController@save_permission');
    Route::post('update-permission', 'Admin\UserController@update_permission');
    Route::post('update-role', 'Admin\UserController@update_role');
    Route::post('save-role', 'Admin\UserController@save_role');
    Route::post('save-role-permissions', 'Admin\UserController@save_role_permission');
    Route::post('save-user-roles', 'Admin\UserController@save_user_roles');
    
});
Route::post('/register','Auth\RegisterController@create');
// Route::middleware('auth:sanctum')->get('/schemes','Api\Api@get_schemes');
Route::get('/schemes','Api\Api@get_schemes');