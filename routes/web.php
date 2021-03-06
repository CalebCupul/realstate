<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
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

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Files Controller
    Route::get('/files/{filenName}/{group?}', FilesController::class)->name('getFile');

    // Users
    Route::get('users/get-index-table', [UserController::class, 'getIndexTable'])->name('users.getIndexTable');
    Route::resource('users', UserController::class);

    // Roles
    Route::get('roles/get-index-table', [RoleController::class, 'getIndexTable'])->name('roles.getIndexTable');
    Route::resource('roles', RoleController::class);

    // Sales
    //Rutas para combobox de Pais/estado/ciudad/colonia
    Route::post('/get-states', [SaleController::class, 'getStates'])->name('getStates');
    Route::post('/get-cities', [SaleController::class, 'getCities'])->name('getCities');
    Route::post('/get-suburbs', [SaleController::class, 'getSuburbs'])->name('getSuburbs');
    Route::get('sales/get-index-table', [SaleController::class, 'getIndexTable'])->name('sales.getIndexTable');
    Route::resource('sales', SaleController::class);

});

// Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [UserController::class, 'getProfile'])->name('users.getProfile');

Route::get('/market/{searchSales?}', [SaleController::class, 'searchSales'])->name('sales.searchSales');

Route::get('/my-sales/{searchUserSales?}', [SaleController::class, 'getUserSales'])->name('sales.getUserSales');

Route::fallback(function () {

    return redirect('home')->with('toast_errors', 'Algo salio mal!.');

});
