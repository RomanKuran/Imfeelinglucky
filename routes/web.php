<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',  [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('main');
Route::post('/register',  [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/logout',  [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\Pages\Home\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::group(['middleware' => ['is_block_unique_link']], function () {
    Route::get('/A/{link}', [App\Http\Controllers\Pages\A\AController::class, 'a'])->name('a');
    Route::get('/A/{link}/recreate', [App\Http\Controllers\Pages\A\RecreateLinkController::class, 'recreate'])->name('a.recreate');
    Route::get('/A/{link}/deactivate', [App\Http\Controllers\Pages\A\DeactivateLinkController::class, 'deactivate'])->name('a.deactivate');

    Route::post('/A/{link}/createHistory', [App\Http\Controllers\Pages\A\CreateHistoryController::class, 'create'])->name('a.createHistory');
});
