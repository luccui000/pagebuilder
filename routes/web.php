<?php

use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DangNhapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HinhAnhController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;


Route::get('/', [PageController::class, 'template']);
Route::get('/{slug}', [PageController::class, 'render']);
Route::get('/trang-chu', [PageController::class, 'template']);
Route::get('/tin-tuc', [PageController::class, 'template2']);
Route::view('/vite', 'welcome');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', fn() => redirect('/admin/dang-nhap'));
    Route::get('/dang-nhap', [DangNhapController::class, 'formDangNhap'])->name('admin.formDangNhap');
    Route::post('/dang-nhap', [DangNhapController::class, 'dangnhap'])->name('admin.danhnhap');
    Route::get('/trang-chu', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::group(['prefix' => 'menus'], function() {
        Route::get('/', [MenuController::class, 'index'])->name('admin.menus.index');
        Route::get('/{id}', [MenuController::class, 'show'])->name('admin.menus.show');
    });

    Route::group(['prefix' => 'trang'], function() {
       Route::get('/', [ContentController::class, 'index']);
       Route::get('/them', [ContentController::class, 'create']);
       Route::get('/moi', [ContentController::class, 'moi']);
    });

    Route::group(['prefix' => 'footer'], function() {
        Route::get('/', [FooterController::class, 'index']);
    });

    Route::group(['prefix' => 'hinh-anh'], function() {
        Route::get('/', [HinhAnhController::class, 'index']);
    });

    Route::group(['prefix' => 'slider'], function() {
        Route::get('/', [SliderController::class, 'index']);
    });

    Route::group(['prefix' => 'card'], function() {
        Route::get('/', [CardController::class, 'index']);
    });

    Route::group([
        'prefix' => 'quan-ly-file',
        'middleware' => ['web', 'auth']], function () {
            Lfm::routes();
    });
});

