<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LogController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // テンプレート編集機能
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
    Route::get('/templates/edit', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::post('/templates/edit', [TemplateController::class, 'update'])->name('templates.update');

    // ログ機能
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    Route::get('/logs/edit', [LogController::class, 'edit'])->name('logs.edit');
    Route::post('/logs/edit', [LogController::class, 'update'])->name('logs.update');
});

require __DIR__.'/auth.php';
