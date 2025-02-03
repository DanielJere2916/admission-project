<?php
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityRegistrartController;
use App\Http\Controllers\Uregistrar\DepartmentController;
use App\Http\Controllers\Uregistrar\FacultyController;
use App\Http\Controllers\Uregistrar\IntakeController;
use App\Http\Controllers\Uregistrar\ProgramController;
use App\Http\Controllers\Uregistrar\UserSettingController;
use Illuminate\Support\Facades\Route;



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

//websitepages routes
Route::get('/programs', [PagesController::class, 'programpage'])->name('programpage');
Route::get('/campuses', [PagesController::class, 'campuspage'])->name('campusespage');
Route::get('/studentlife', [PagesController::class, 'studentpage'])->name('studentpage');
Route::get('/research', [PagesController::class, 'researchpage'])->name('researchpage');
Route::get('/contact', [PagesController::class, 'contactpage'])->name('contactpage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');



//Applicant routes
Route::middleware(['auth', 'verified', 'rolemanager:Applicant'])->group(function () {
    Route::controller(ApplicantController::class)->group(function () {
        Route::prefix('Applicant')->group(function () {
            Route::get('/dashboard', 'index')->name('applicant');
            Route::get('/select-application-type', 'selectApplicationType')->name('applicant.select-application-type');
            Route::get('/transactions', 'showTransactions')->name('applicant.transactions');
            Route::get('/bridgingform', 'showBridging')->name('applicant.showbridgingform');
            Route::get('/undergraduateform', 'showUndergraduate')->name('applicant.showUndergraduateform');
            Route::get('/Postgraduateform', 'showPostgraduate')->name('applicant.showPostgraduateform');
            Route::get('/continue-application/{transaction}', 'continueApplication')->name('applicant.continue-application');
        });
        
    });
    Route::controller(PaymentController::class)->group(function () {
        Route::prefix('payments')->group(function () {
            Route::get('/checkout/{intake}', 'showPaymentPage')->name('payments.checkout');
            Route::post('/callback', 'handleCallback')->name('payments.callback')->withoutMiddleware(['auth', 'verified', 'rolemanager:Applicant']);
            Route::get('/status/{txRef}', 'showPaymentStatus')->name('payments.status');
            Route::get('/verify/{txRef}', 'verifyPayment')->name('payments.verify');
            Route::get('/transactions', 'showTransactions')->name('payments.transactions');
            Route::get('/transaction/{txRef}', 'showTransactionDetails')->name('payments.transaction.details');
        });
    });
});
//Univesity Registrar routes
Route::middleware(['auth', 'verified', 'rolemanager:Uregistrar'])->group(function () {
    Route::controller(UniversityRegistrartController::class)->group(function () {
        Route::prefix('Uregistrar')->group(function () {
            Route::get('/dashboard', 'index')->name('Uregistrar');
          

        });
    });
    Route::prefix('Uregistrar')->group(function () {
            Route::resource('faculties', FacultyController::class);
         

        });
        Route::prefix('Uregistrar')->group(function () {
            Route::resource('departments', DepartmentController::class);
         

        });
        Route::prefix('Uregistrar')->group(function () {
            Route::resource('programs', ProgramController::class);
         

        });
        Route::prefix('Uregistrar')->group(function () {
            Route::resource('intakes', IntakeController::class);
            Route::patch('intakes/{intake}/toggle-status', [IntakeController::class, 'toggleStatus'])->name('intakes.toggle-status');
         

        });
        Route::prefix('Uregistrar')->group(function () {
            Route::resource('users', UserSettingController::class)->names([
                'index' => 'users.index',
                'create' => 'users.create',
                'store' => 'users.store',
                'show' => 'users.show',
                'edit' => 'users.edit',
                'update' => 'users.update',
                'destroy' => 'users.destroy',
            ]);
         

        });
        
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Payment Routes
Route::middleware(['auth'])->group(function () {
    Route::get('payments/checkout/{intake}', [PaymentController::class, 'showPaymentPage'])->name('payments.checkout');
    Route::post('payments/initiate/{intake}', [PaymentController::class, 'initiatePayment'])->name('payments.initiate');
    Route::get('payments/status/{txRef}', [PaymentController::class, 'showPaymentStatus'])->name('payments.status');
    Route::get('payments/verify/{txRef}', [PaymentController::class, 'verifyPayment'])->name('payments.verify');
    Route::post('payments/callback', [PaymentController::class, 'handleCallback'])->name('payments.callback');
    Route::get('payments/transactions', [PaymentController::class, 'showTransactions'])->name('payments.transactions');
});
require __DIR__.'/auth.php';

