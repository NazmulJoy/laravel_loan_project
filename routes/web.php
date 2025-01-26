<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanApplicationController;
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



Route::get('/', [HomeController::class, 'index'])->name('frontend.home');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/my-loan', [ProfileController::class, 'loan'])->name('my.loan');
    Route::post('/profile/make-payment', [ProfileController::class, 'makePayment'])->name('profile.makePayment');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); 

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


// Loan Application Routes
Route::get('/loan-details', [LoanApplicationController::class, 'loanDetails'])->name('loan.details1');
Route::post('/loan-details', [LoanApplicationController::class, 'processLoanDetails'])->name('loan.details');
Route::get('/personal-details', [LoanApplicationController::class, 'showPersonalDetails'])->name('personal.details');
Route::post('/personal-details', [LoanApplicationController::class, 'savePersonalDetails'])->name('save.personal.details');
Route::post('/loan/personal-details', [LoanApplicationController::class, 'storeLoanDetails'])->name('loan.application.personal.details');
Route::post('/clear-loan-session', [LoanApplicationController::class, 'clearLoanSession'])->name('clear.loan.session');

Route::get('/loan-types', [HomeController::class, 'loanTypes'])->name('loan-types');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');
Route::get('/contact', [HomeController::class, 'contactUs'])->name('contact');
Route::get('/blog-details', [HomeController::class, 'blogdetails'])->name('blog.details');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
 

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';


Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');


    Route::resource('loan-types', LoanTypeController::class);

    Route::resource('users', UserController::class);

    Route::resource('loans', LoanController::class);

    Route::patch('loans/{loan}/status', [LoanController::class, 'updateStatus'])->name('loans.updateStatus');
    Route::get('/loan/details/{loanId}', [LoanController::class, 'showLoanDetails']);

    Route::resource('repayments', RepaymentController::class);
    Route::put('repayments/{repayment}/update-status', [RepaymentController::class, 'updateStatus'])->name('repayments.updateStatus');
    Route::delete('repayments/{repayment}', [RepaymentController::class, 'destroy'])->name('repayments.destroy');

    Route::resource('payments', PaymentController::class);
    Route::patch('payments/{payment}/status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
    Route::get('payments/get-loans/{userId}', [PaymentController::class, 'getLoans']);
Route::get('payments/get-repayments/{loanId}', [PaymentController::class, 'getRepayments']);
Route::get('payments/get-repayment-details/{repaymentId}', [PaymentController::class, 'getRepaymentDetails']);

Route::get('logout', [AdminController::class, 'logout'])->name('logout');

});
