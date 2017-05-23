<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('landlords', 'Admin\LandlordsController');
    Route::post('landlords_mass_destroy', ['uses' => 'Admin\LandlordsController@massDestroy', 'as' => 'landlords.mass_destroy']);
    Route::resource('tenants', 'Admin\TenantsController');
    Route::post('tenants_mass_destroy', ['uses' => 'Admin\TenantsController@massDestroy', 'as' => 'tenants.mass_destroy']);
    Route::resource('houses', 'Admin\HousesController');
    Route::post('houses_mass_destroy', ['uses' => 'Admin\HousesController@massDestroy', 'as' => 'houses.mass_destroy']);
    Route::resource('bills', 'Admin\BillsController');
    Route::post('bills_mass_destroy', ['uses' => 'Admin\BillsController@massDestroy', 'as' => 'bills.mass_destroy']);
    Route::resource('tasks', 'Admin\TasksController');
    Route::post('tasks_mass_destroy', ['uses' => 'Admin\TasksController@massDestroy', 'as' => 'tasks.mass_destroy']);
    Route::resource('messages', 'Admin\MessagesController');
    Route::post('messages_mass_destroy', ['uses' => 'Admin\MessagesController@massDestroy', 'as' => 'messages.mass_destroy']);
    Route::resource('documents', 'Admin\DocumentsController');
    Route::post('documents_mass_destroy', ['uses' => 'Admin\DocumentsController@massDestroy', 'as' => 'documents.mass_destroy']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

});
