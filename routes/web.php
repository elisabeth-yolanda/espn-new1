<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\TextEditorController;
use App\Http\Controllers\ClientPartnerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductDescriptionController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WayWeDoBusinessController;
use App\Models\ContactUsMessage;

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

// Route::get('/', function () {
//     return view('app');
// });
if(explode('/', Request::path())[0] == config('fortify.prefix')) {
    Route::group(['prefix' => config('fortify.prefix')], function () {
        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified'
        ])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            Route::resource('news', NewsController::class);
            Route::post('news/dataTable', [NewsController::class, 'dataTable'])->name('news.dataTable');

            Route::resource('career', CareerController::class);
            Route::post('career/dataTable', [CareerController::class, 'dataTable'])->name('career.dataTable');

            Route::group(['prefix' => 'textEditor'], function() {
                Route::post('/uploadPhoto',  [TextEditorController::class, 'uploadPhoto'])->name('uploadPhoto');
                Route::post('/deletePhoto',  [TextEditorController::class, 'deletePhoto'])->name('deletePhoto');
            });

            Route::resource('partner', ClientPartnerController::class);
            Route::resource('client', ClientPartnerController::class);
            Route::delete('/clientPartner/delete/{id}', [ClientPartnerController::class, 'destroy'])->name('clientPartner.destory');
            Route::get('/clientPartner/{id}', [ClientPartnerController::class, 'show'])->name('clientPartner.show');
            Route::post('clientPartner/dataTable/{type}', [ClientPartnerController::class, 'dataTable'])->name('clientPartner.dataTable');

            Route::resource('/sejarah', SejarahController::class);
            Route::post('sejarah/dataTable', [SejarahController::class, 'dataTable'])->name('sejarah.dataTable');

            Route::resource('/our-team', OurTeamController::class);
            Route::post('our-team/dataTable', [OurTeamController::class, 'dataTable'])->name('ourTeam.dataTable');

            Route::resource('/product-service', ProductDescriptionController::class);
            Route::post('product-service/dataTable', [ProductDescriptionController::class, 'dataTable'])->name('productDescription.dataTable');
            Route::post('product-service/productDataTable', [ProductDescriptionController::class, 'productDataTable'])->name('productDescription.productDataTable');
            Route::post('product-service/productDetail/store', [ProductDescriptionController::class, 'storeProductDetail'])->name('productDescription.productDetail');
            Route::get('product-service/productDetail/{id}', [ProductDescriptionController::class, 'productDetail'])->name('productDescription.productDetail');
            Route::delete('product-service/productDetail/{id}', [ProductDescriptionController::class, 'productDetailDelete'])->name('productDescription.productDetail');

            Route::resource('/way-we-do-business', WayWeDoBusinessController::class);
            Route::post('way-we-do-business/dataTable', [WayWeDoBusinessController::class, 'dataTable'])->name('productDescription.dataTable');

            Route::resource('/setting', SettingController::class);

            Route::get('message', [ContactUsController::class, 'index'])->name('message.index');
            Route::post('message/dataTable', [ContactUsController::class, 'dataTable'])->name('message.dataTable');

        });
    });
}else {
    Route::get('/{any}', function () {
        return view('app');
    })->where('any', '.*');
    Route::fallback(function () {
        return view('errors.404');
    });
}
