<?php
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::view('/', 'homepage');
Route::get('/messages-list', [App\Http\Controllers\MessageController::class, 'messages'])->name('messages.list')->middleware(['auth', 'verified']);

Route::resource('messages', MessageController::class)->only(['index', 'store', 'edit', 'update', 'destroy'])->middleware(['auth', 'verified']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
Route::post('/dashboard', [App\Http\Controllers\UserController::class, 'store']);

Route::get('/email/verify', function () { return view('auth.verify-email'); })->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) { $request->fulfill(); return redirect('/dashboard'); })->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) { $request->user()->sendEmailVerificationNotification(); return back()->with('message', 'Verification link sent!'); })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
