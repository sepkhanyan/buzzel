<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\DemoController;
use App\Http\Controllers\Frontend\Guide\GuideController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('demo_request', [DemoController::class, 'index'])->name('demo');
Route::post('demo_request/send', [DemoController::class, 'send'])->name('demo.send');
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Route::get('/guide/{vue_capture?}', function () {
        //     return view('frontend.guide.vue.index');
        //    })->where('vue_capture', '[\/\w\.-]*');

        // User guide 
        Route::get('guides/view', [GuideController::class, 'view'])->name('view_guide');
        Route::get('guides/build/{guide_id}', [GuideController::class, 'build'])->name('build_guide');
       // Route::get('get-guide-widget', [\App\Http\Controllers\GuideWidgetController::class, 'getGuideWidget'])->name('get-guide-widget');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('guide/categories', [GuideController::class, 'chose_category'])->name('profile.chose_category');
        Route::get('guide/templates', [GuideController::class, 'chose_template'])->name('profile.chose_template');
        Route::get('guide/details/{template_id}', [GuideController::class, 'guide_details'])->name('profile.guide.details');
        Route::post('api/save-guide', [GuideController::class, 'save_guide'])->name('save-guide');
        Route::get('api/get-guide/{guide_id}', [GuideController::class, 'get_guide'])->name('get-guide');
        Route::get('api/get-all-user-guides', [GuideController::class, 'get_all_user_guides'])->name('get-all-guide');
        Route::get('api/add-widget-guide/{guide_id}/{widget_id}', [GuideController::class, 'add_widget_guide'])->name('add-guide-widget');
        Route::get('api/remove-widget-guide/{guide_id}/{widget_id}', [GuideController::class, 'remove_widget_guide'])->name('remove-guide-widget');
        Route::get('api/get-widget-fields/{widget_id}', [GuideController::class, 'get_widget_fields'])->name('get-widget-fields');
        Route::post('api/update-user-guide-widget', [GuideController::class, 'update_user_guide_widget'])->name('update-user-guide-widget');
        Route::get('api/restore-guide-widget/{id}', [GuideController::class, 'restore_guide_widget'])->name('restore-guide-widget');

        Route::post('api/save-guide-widget-field-value', [GuideController::class, 'save_guide_widget_field_value'])->name('save-guide-widget-field-value');
        Route::get('api/get-guide-widget-field-value/{widget_id}/{field_id}', [GuideController::class, 'get_guide_widget_field_value'])->name('get-guide-widget-field-value');
        Route::get('api/get-album-fields/{widget_id}/{field_id}', [GuideController::class, 'get_album_fields'])->name('get-album-fields');
        Route::get('api/get-ads-fields/{widget_id}/{field_id}', [GuideController::class, 'get_ads_fields'])->name('get-ads-fields');
        Route::post('api/open_website', [GuideController::class, 'getWebsite'])->name('open_website');
        Route::get('api/open_website', [GuideController::class, 'getWebsite2'])->name('open_website2');
    });
});
