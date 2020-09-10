<?php

use App\Http\Controllers\Frontend\Guide\GuideCategoryController;
use App\Http\Controllers\Frontend\Guide\GuideTemplateController;
/*
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend'.
 */

//guide routes below
Route::group(['prefix' => 'guides'], function () {
    Route::get('categories', [GuideCategoryController::class, 'index'])->name('guide.front.categories');
    Route::get('templates/{category}', [GuideTemplateController::class, 'templatebycategory'])->name('guide.front.category.template');
});

?>