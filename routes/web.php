<?php

use App\Http\Controllers\RegistersController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;

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
    return to_route('dashboard');
});

//AUTENTICADOR PARA LOGAR
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});


//AUTENTICADOR DE USUARIOS LOGADO
Route::middleware('auth')->group(function () {

    //PROFILE
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/disable', [ProfileController::class, 'disable'])->name('profile.disable');

    //DASHBOARD
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    //USER
    Route::resource('/users', UsersController::class);
    Route::put('/users/disable/{user}', [UsersController::class, 'disable'])->name('users.disable');
    Route::put('/users/enable/{user}', [UsersController::class, 'enable'])->name('users.enable');

    //UNIDADES
    Route::resource('/unidades', UnidadesController::class);
    Route::put('/unidades/disable/{unidade}', [UnidadesController::class, 'disable'])->name('unidades.disable');
    Route::put('/unidades/enable/{unidade}', [UnidadesController::class, 'enable'])->name('unidades.enable');
    Route::post('/unidades/setUnidade', [UnidadesController::class, 'setUnidade'])->name('unidades.setUnidade');

    //CONFIGURAÇÕES
    Route::resource('/settings', SettingsController::class);

    //REGISTROS
    Route::resource('/registers', RegistersController::class);
});
