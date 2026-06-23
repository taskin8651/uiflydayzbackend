<?php

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

// Review Items
Route::delete('review-items/destroy', 'ReviewItemController@massDestroy')->name('review-items.massDestroy');
Route::resource('review-items', 'ReviewItemController');

// Blog posts
Route::delete('blog-posts/destroy', 'BlogPostController@massDestroy')->name('blog-posts.massDestroy');
Route::resource('blog-posts', 'BlogPostController')->except('show');

// Career Jobs
Route::delete('career-jobs/destroy', 'CareerJobController@massDestroy')->name('career-jobs.massDestroy');
Route::resource('career-jobs', 'CareerJobController');

// Distributor Enquiries
Route::delete('distributor-enquiries/destroy', 'DistributorEnquiryController@massDestroy')->name('distributor-enquiries.massDestroy');
Route::resource('distributor-enquiries', 'DistributorEnquiryController', ['except' => ['create', 'store', 'edit', 'update']]);

// Contact Enquiries
Route::delete('contact-enquiries/destroy', 'ContactEnquiryController@massDestroy')->name('contact-enquiries.massDestroy');
Route::resource('contact-enquiries', 'ContactEnquiryController', ['except' => ['create', 'store', 'edit', 'update']]);

// Website Settings
Route::get('website-settings', 'WebsiteSettingController@index')->name('website-settings.index');
Route::put('website-settings', 'WebsiteSettingController@update')->name('website-settings.update');

 // FAQ Items
    Route::delete('faq-items/destroy', 'FaqItemController@massDestroy')->name('faq-items.massDestroy');
    Route::resource('faq-items', 'FaqItemController');

    // Product Size Categories
Route::delete('product-size-categories/destroy', 'ProductSizeCategoryController@massDestroy')->name('product-size-categories.massDestroy');
Route::resource('product-size-categories', 'ProductSizeCategoryController');

// Protection Types
Route::delete('protection-types/destroy', 'ProtectionTypeController@massDestroy')->name('protection-types.massDestroy');
Route::resource('protection-types', 'ProtectionTypeController');

// Products
Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
Route::resource('products', 'ProductController');

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


Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [App\Http\Controllers\Frontend\ProductController::class, 'show'])->name('products.show');
Route::get('/technology', [App\Http\Controllers\Frontend\TechPillarController::class, 'index'])->name('technology');
Route::get('/why-choose-us', [App\Http\Controllers\Frontend\WhychooseController::class, 'index'])->name('whychoose');
Route::get('/downloads', [App\Http\Controllers\Frontend\DownloadController::class, 'index'])->name('downloads');
Route::get('/certificates', [App\Http\Controllers\Frontend\CertificateController::class, 'index'])->name('certificates');
Route::get('/reviews', [App\Http\Controllers\Frontend\ReviewController::class, 'index'])->name('reviews');
Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost:slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');

Route::get('/careers', [App\Http\Controllers\Frontend\CareerController::class, 'index'])->name('careers');

Route::get('/distributors', [App\Http\Controllers\Frontend\DistributorEnquiryController::class, 'index'])->name('distributor');
Route::post('distributor-enquiry', [App\Http\Controllers\Frontend\DistributorEnquiryController::class, 'store'])->name('distributor-enquiry.store');

Route::get('/contacts', [App\Http\Controllers\Frontend\ContactEnquiryController::class, 'index'])->name('contact');
Route::post('contact-enquiry', [App\Http\Controllers\Frontend\ContactEnquiryController::class, 'store'])->name('contact-enquiry.store');
Route::get('/faqs', [App\Http\Controllers\Frontend\FaqController::class, 'index'])->name('faqs');
Route::view('/privacy-policy', 'frontend.privacy-policy')->name('privacy');
Route::view('/terms-and-conditions', 'frontend.term-condition')->name('terms');
