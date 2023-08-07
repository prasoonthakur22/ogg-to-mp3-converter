<?php

use App\Http\Controllers\AudioController;
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

Route::get('/', [AudioController::class, 'index']);

Route::get('/test', [AudioController::class, 'test']);

Route::post('audio/convert', [AudioController::class, 'audio_convert']);

Route::get('/about-site', [AudioController::class, 'about']);

Route::get('/privacy-policy', [AudioController::class, 'privacy']);

Route::get('/linkstorage', function () {
    $targetFolder = base_path() . '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});
