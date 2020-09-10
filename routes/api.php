<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\PassportController;
use App\Http\Controllers\API\GuideController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'API\PassportController@details');
    Route::post('logout', 'API\PassportController@logout'); 
    Route::get('get-guide-categories', 'API\GuideController@getGuideCategory')->name('get-guide-category');
    Route::get('get-guide-templates/{category_id}', 'API\GuideController@getGuideTemplate')->name('get-guide-template');
});
Route::get('get-guide-widget', 'API\GuideController@getGuideWidget')->name('get-guide-widget');
Route::post('downloadGuide', 'API\GuideController@downloadGuide'); 



