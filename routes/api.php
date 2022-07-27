<?php

use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\HeaderController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\RowItemController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\UploadImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::get('/hinh-anh/', [UploadImageController::class, 'index']);
Route::post('/hinh-anh/upload', [UploadImageController::class, 'upload']);

Route::controller(HeaderController::class)
    ->prefix('header')
    ->group(function () {
        Route::post('change-color', 'changeColor');
        Route::get('/{id}/styles', 'styles');
    });

Route::controller(SliderController::class)
    ->prefix('/slider')
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/active', 'active');
        Route::get('/{id}', 'show');
    });

Route::controller(CarouselController::class)
    ->prefix('/carousel')
    ->group(function () {
        Route::post('/', 'store');
    });


Route::controller(RowItemController::class)
    ->prefix('row-item')
    ->group(function() {
        Route::get('/{id}/card/{cardId}', 'card');
        Route::post('/{id}/card/{cardId}', 'updateCard');
        Route::post('/{id}/image/{imageId}', 'updateImage');
    });

Route::controller(CardController::class)
    ->prefix('card')
    ->group(function() {
        Route::get('/{id}', 'show');
        Route::post('/update-or-create', 'updateOrCreate');
    });

Route::controller(PageController::class)
    ->prefix('page')
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/menu-item', 'update');
        Route::post('/carousel', 'updateCarousel');
        Route::post('/add-new-row', 'addNewRow');
        Route::post('/update-col', 'updateColumn');
        Route::post('/update-column-type', 'updateColumnType');
        Route::get('/{slug}', 'show');
    });


Route::controller(ContentController::class)
    ->prefix('content')
    ->group(function() {
        Route::post('/', 'store');
    });
