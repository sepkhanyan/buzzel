<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\GuideCategoryController;
use App\Http\Controllers\GuideWidgetController;
use App\Http\Controllers\GuideWidgetFieldController;
use App\Http\Controllers\Backend\Template\GuideTemplateController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//guide routes below
Route::group(['prefix' => 'guides'], function () {
    Route::get('guide_categories', [GuideCategoryController::class, 'index'])->name('guide-categories');
    Route::get('guide_categories/create', [GuideCategoryController::class, 'create'])->name('guide-categories-create');
    Route::post('guide_categories/store', [GuideCategoryController::class, 'store'])->name('guide-categories-store');
    // Specific Guide Category
    Route::group(['prefix' => 'guide_category/{category}'], function () {
        Route::patch('/', [GuideCategoryController::class, 'update'])->name('guide.categories.update');
        Route::get('/', [GuideCategoryController::class, 'show'])->name('guide.categories.show');
        Route::get('edit', [GuideCategoryController::class, 'edit'])->name('guide.categories.edit');
        Route::patch('/', [GuideCategoryController::class, 'update'])->name('guide.categories.update');
        Route::delete('/', [GuideCategoryController::class, 'destroy'])->name('guide.categories.destroy');
    });

    //guide widgets below
    Route::get('guide_widgets', [GuideWidgetController::class, 'index'])->name('guide-widgets');
    Route::get('guide_widgets/create', [GuideWidgetController::class, 'create'])->name('guide-widgets-create');
    Route::post('guide_widgets/store', [GuideWidgetController::class, 'store'])->name('guide-widgets-store');
    // Specific guide widget
    Route::group(['prefix' => 'guide_widget/{widget}'], function () {
        Route::patch('/', [GuideWidgetController::class, 'update'])->name('guide.widgets.update');
        Route::get('/', [GuideWidgetController::class, 'show'])->name('guide.widgets.show');
        Route::get('edit', [GuideWidgetController::class, 'edit'])->name('guide.widgets.edit');
        Route::patch('/', [GuideWidgetController::class, 'update'])->name('guide.widgets.update');
        Route::delete('/', [GuideWidgetController::class, 'destroy'])->name('guide.widgets.destroy');
        //widget fields
        Route::get('fields', [GuideWidgetFieldController::class, 'index'])->name('guide.widgets.fields');
        Route::post('fields', [GuideWidgetFieldController::class, 'store'])->name('guide.widgets.fields.store');
        Route::get('fields/create', [GuideWidgetFieldController::class, 'create'])->name('guide.widgets.fields.create');
        Route::get('fields/{field}/edit', [GuideWidgetFieldController::class, 'edit'])->name('guide.widgets.fields.edit');
        Route::patch('fields/update', [GuideWidgetFieldController::class, 'update'])->name('guide.widgets.fields.update');
        Route::get('fields/{field}', [GuideWidgetFieldController::class, 'show'])->name('guide.widgets.fields.show');
        Route::delete('fields/{field}', [GuideWidgetFieldController::class, 'destroy'])->name('guide.widgets.fields.destroy');
    });
});

//guide templates routes below
Route::group(['prefix' => 'templates'], function () {
    Route::get('/', [GuideTemplateController::class, 'index'])->name('guide.templates');
    Route::post('/', [GuideTemplateController::class, 'store'])->name('guide.templates.store');
    Route::get('create', [GuideTemplateController::class, 'create'])->name('guide.templates.create');
    Route::get('edit/{template}', [GuideTemplateController::class, 'edit'])->name('guide.templates.edit');
    Route::patch('/', [GuideTemplateController::class, 'update'])->name('guide.templates.update');
    Route::get('show/{template}', [GuideTemplateController::class, 'show'])->name('guide.templates.show');
    
    Route::delete('delete/{template}', [GuideTemplateController::class, 'destroy'])->name('guide.templates.destroy');

    Route::post('widgets', [GuideTemplateController::class, 'store_widgets'])->name('guide.templates.widgets.store');
    Route::get('widgets/create/{template}', [GuideTemplateController::class, 'create_widgets'])->name('guide.templates.widgets.create');
    Route::delete('widgets/delete/{widget}', [GuideTemplateController::class, 'removeWidget'])->name('guide.templates.widgets.destroy');
    Route::get('widgets/{template}', [GuideTemplateController::class, 'widgets'])->name('guide.templates.widgets');
});