<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserRelationController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'basicauth'], function() {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // テンプレート編集機能
        Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
        Route::get('/templates/edit', [TemplateController::class, 'edit'])->name('templates.edit');
        Route::post('/templates/edit', [TemplateController::class, 'update'])->name('templates.update');

        // アカウント連携機能
        Route::get('/connect', [UserRelationController::class, 'index'])->name('relation.index');
        Route::get('/connect/create', [UserRelationController::class, 'create'])->name('relation.create');
        Route::get('/connect/invite', [UserRelationController::class, 'code'])->name('relation.code');
        Route::get('/connect/get', [UserRelationController::class, 'get'])->name('relation.get');
        Route::post('/connect/get', [UserRelationController::class, 'readCode'])->name('relation.readCode');

        // ログ機能
        Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
        Route::get('/logs/{id}', [LogController::class, 'edit'])->name('logs.edit');
        Route::post('/logs/{id}', [LogController::class, 'update'])->name('logs.update');
        Route::get('/logs/view/{id}', [LogController::class, 'view'])->name('logs.view');
    });
});

require __DIR__.'/auth.php';
