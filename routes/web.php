<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('auth.login');
});
//Route::get('login', [AuthController::class, 'login'])->name('login');

//Route::group(['middleware' => ['guest']], function () {
//
//    Route::any('login', [AuthController::class, 'login'])->name('login');
//    Route::any('/register', [AuthController::class, 'register'])->name('register');
//    Route::any('/otp', [AuthController::class, 'otp'])->name('otp');
//    Route::any('/otp-resend', [AuthController::class, 'otpResend'])->name('otp.resend');
//    Route::any('/otp-again', [AuthController::class, 'otpAgain'])->name('otp.again');
//
//    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
