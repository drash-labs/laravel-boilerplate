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


Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'verified']);

Auth::routes([
    'verify' => true,
]);

Route::match(['get', 'put'], '/users/{token}/welcome', 'Auth\WelcomeController@setPassword')->name('users.welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users/{user}/delete', 'UserController@delete')->name('users.delete');
    Route::resource('users', 'UserController')->except('show', 'edit', 'update');
});

Route::resource('users', 'UserController')->only('show', 'edit', 'update')->middleware('auth');

Route::namespace('Admin')->middleware(['auth', 'verified'])->name('admin.')->prefix('setup/')->group(function () {
    Route::get('/roles/{role}/delete', 'RoleController@delete')->name('roles.delete');
    Route::resource('roles', 'RoleController');

    Route::resource('permissionGroups', 'PermissionGroupController')->except('index', 'show', 'destroy');

    Route::get('/permissions/{permission}/delete', 'PermissionController@delete')->name('permissions.delete');
    Route::resource('permissions', 'PermissionController');

    Route::get('/audits', 'AuditController@auditing')->name('auditing.index');
});

Route::get('/blogs','BlogsController@index')->name('blogs');
Route::get('/blogs/create','BlogsController@create')->name('Write blog');
Route::post('/blogs', 'Blogscontroller@store')->name('store_blog_path');
Route::get('/blogs/{id}', 'BlogsController@show')->name('blog_path');
Route::get('/blogs/{id}/edit','BlogsController@edit')->name('edit_blog');
Route::put('/blogs/{id}', 'BlogsController@update')->name('update_blog_path');
Route::delete('/blogs/{id}', 'BlogsController@destroy')->name('delete_blog_path');
