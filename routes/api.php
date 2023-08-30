<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ClientPartnerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductDescriptionController;
use App\Http\Controllers\WayWeDoBusinessController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    Route::get('/getAll', [NewsController::class, 'getAll'])->name('getData');
    Route::get('/getDetail/{slug}', [NewsController::class, 'getDetail'])->name('getDetail');
});

Route::group(['prefix' => 'career', 'as' => 'career.'], function() {
    Route::get('/getAll', [CareerController::class, 'getAll'])->name('getData');
});

Route::group(['prefix' => 'clientPartner', 'as' => 'clientPartner.'], function() {
    Route::get('/{type}', [ClientPartnerController::class, 'getAll'])->name('getData');
});

Route::group(['prefix' => 'sejarah', 'as' => 'sejarah.'], function() {
    Route::get('/getAll', [SejarahController::class, 'getAll'])->name('getData');
});

Route::group(['prefix' => 'ourTeam', 'as' => 'ourTeam.'], function() {
    Route::get('/getAll', [OurTeamController::class, 'getAll'])->name('getData');
});

Route::group(['prefix' => 'way-we-do-business', 'as' => 'way-we-do-business.'], function() {
    Route::get('/getAll', [WayWeDoBusinessController::class, 'getAll'])->name('getData');
});

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function() {
    Route::get('/', [SettingController::class, 'getSetting'])->name('getSetting');
});

Route::group(['prefix' => 'product-service', 'as' => 'product-service.'], function() {
    Route::get('/', [ProductDescriptionController::class, 'getAll'])->name('getProduct');
});

Route::group(['prefix' => 'contact-us', 'as' => 'contact-us.'], function() {
    Route::post('/', [ContactUsController::class, 'sendMessage'])->name('getProduct');
});
