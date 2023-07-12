<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', [App\Http\Controllers\LandingController::class, 'beranda'])->name('/');
Route::get('investasi', [App\Http\Controllers\LandingController::class, 'invest'])->name('investasi');


Route::get('form', function () {
    return Inertia::render('Landing/Form');
})->name('form');
Route::post('/form-submit', [App\Http\Controllers\LandingController::class, 'submit'])->name('form-submit');

Route::get('peta', function () {
    return Inertia::render('Landing/Peta');
})->name('peta');

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/markers', [App\Http\Controllers\LandingController::class, 'marker']);
Route::get('/kecamatans', [App\Http\Controllers\LandingController::class, 'getKecamatan']);
Route::get('/kelurahans/{parentId}', [App\Http\Controllers\LandingController::class, 'getKelurahan']);

require __DIR__.'/auth.php';
