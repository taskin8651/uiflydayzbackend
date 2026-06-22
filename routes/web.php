<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

     // Technology Pillars
    Route::delete('tech-pillars/destroy', 'TechPillarController@massDestroy')->name('tech-pillars.massDestroy');
    Route::resource('tech-pillars', 'TechPillarController');
    
    // About Section
Route::get('about-section', 'AboutSectionController@index')->name('about-section.index');
Route::put('about-section', 'AboutSectionController@update')->name('about-section.update');

// Download Items
Route::delete('download-items/destroy', 'DownloadItemController@massDestroy')->name('download-items.massDestroy');
Route::resource('download-items', 'DownloadItemController');

// Certificate Items
Route::delete('certificate-items/destroy', 'CertificateItemController@massDestroy')->name('certificate-items.massDestroy');
Route::resource('certificate-items', 'CertificateItemController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::view('/','frontend.index');

Route::get('/technology', [App\Http\Controllers\Frontend\TechPillarController::class, 'index'])->name('technology');
Route::get('/why-choose-us', [App\Http\Controllers\Frontend\WhychooseController::class, 'index'])->name('whychoose');
Route::get('/downloads', [App\Http\Controllers\Frontend\DownloadController::class, 'index'])->name('downloads');
Route::get('/certificates', [App\Http\Controllers\Frontend\CertificateController::class, 'index'])->name('certificates');