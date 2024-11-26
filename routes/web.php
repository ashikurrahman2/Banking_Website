<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


require __DIR__ . '/admin.php';
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
// ->middleware(UserMiddleware::class);
/*** Main page route ***/ 
Route::get('/', [FrontendController:: class, 'index'])->name('index');
/*** Loan apply route ***/ 
Route::get('/apply', [FrontendController:: class, 'submission'])->name('submit');
/*** Loan type form route ***/ 
Route::get('/loan/{type}', [FrontendController::class, 'loanForm'])
    ->middleware('auth')
    ->name('loan.form');

/*** Loan type form submission route ***/ 
Route::post('/apply-loan', [FrontendController::class, 'applyLoan'])->name('loan.apply');
// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('status', 'You have been logged out.');
})->name('logout');
//  Loan History route
Route::get('/history', [FrontendController::class, 'history'])->name('loan.history');

/*** Withdraw form route ***/ 
Route::get('/withdraw', [FrontendController::class, 'withdrawForm'])
    ->middleware('auth')
    ->name('withdraw.form');

/*** Withdraw form submission route ***/ 
Route::post('/withdraw-submit', [FrontendController::class, 'withdrawSubmit'])
    ->middleware('auth')
    ->name('withdraw.submit');


    Route::get('/withdraw-success', function () {
        return view('frontend.pages.withdraw_success');
    })->name('withdraw.success');







