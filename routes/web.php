<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth
Auth::routes(['register' => false]);
Route::get('/auth/{driver}/redirect', [SocialiteController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auth/{driver}/callback', [SocialiteController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function () {

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Files Controller
    Route::get('/files/{filenName}/{group?}', FilesController::class)->name('getFile');

    // Users

    Route::get('users/get-index-table', [UserController::class, 'getIndexTable'])->name('users.getIndexTable');
    Route::resource('users', UserController::class);

    // Roles
    Route::get('roles/get-index-table', [RoleController::class, 'getIndexTable'])->name('roles.getIndexTable');
    Route::resource('roles', RoleController::class);

});

Route::fallback(function () {

    return redirect('home')->with('toast_errors', 'Algo salio mal!.');

});
