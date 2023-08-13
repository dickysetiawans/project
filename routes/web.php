<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\CheckRoleOrPermission;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware([CheckRoleOrPermission::class . ':1,dashboard-admin'])->group(function () {
    // Definisikan rute yang hanya dapat diakses oleh pengguna dengan peran "admin" dan izin "edit-post"
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.index');
    // ... rute lainnya ...
});



Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration
    
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

