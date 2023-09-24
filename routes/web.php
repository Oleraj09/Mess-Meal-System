<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeControlle;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;

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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
Route::post('/login/conf',[AdminController::class,'logins'])->name('logins');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeControlle::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mess-member', [MemberController::class, 'index'])->name('member');
    Route::get('/my-meal', [MemberController::class, 'meal'])->name('meal');
    Route::get('/bazar', [MemberController::class, 'bazar'])->name('bazar');
    Route::get('/submit/bazar', [MemberController::class, 'listsubmit'])->name('listsubmit');
    Route::post('/submit/bazar/conf', [MemberController::class, 'listsubmitconf'])->name('listsubmitconf');
    Route::get('/complain', [MemberController::class, 'complain'])->name('complain');
    Route::post('/complain/conf', [MemberController::class, 'complainconf'])->name('complainconf');
    Route::get('/profile', [MemberController::class, 'profile'])->name('profile');
    Route::post('/profile/conf', [MemberController::class, 'profileconf'])->name('profileconf');
    Route::post('/meal/conf', [MemberController::class, 'mealconf'])->name('mealconf');
});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:manager'])->group(function () {
        Route::post('/notice/conf', [AdminController::class, 'noticeconf'])->name('noticeconf');
        Route::post('/balance/conf', [AdminController::class, 'balanceconf'])->name('balanceconf');
        Route::post('/add/member/conf', [AdminController::class, 'addconf'])->name('addconf');
        Route::get('/status/member/{id}', [AdminController::class, 'delete'])->name('delete');
        Route::post('/meal/update/{id}', [HomeControlle::class, 'mealupdate'])->name('mealupdate');
        Route::get('/summary', [AdminController::class, 'summary'])->name('summary');
        Route::get('/summary/show/{id}', [AdminController::class, 'showsummary'])->name('showsummary');
        Route::get('/make/manager/{id}', [AdminController::class, 'makemanager'])->name('makemanager');
        Route::get('/send/mail', [AdminController::class, 'sendmail'])->name('sendmail');
        Route::post('/send/mail/conf', [AdminController::class, 'sendemailconf'])->name('sendemailconf');
    });
});
