<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\RedirectResponse;
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

Route::get('/', function (): RedirectResponse {
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resources group

Route::resources(
    [
        'schools'               => App\Http\Controllers\SchoolController::class,
        'school-years'          => App\Http\Controllers\SchoolYearController::class,
        'school-subjects'       => App\Http\Controllers\SchoolSubjectController::class,
        'school-plans'          => App\Http\Controllers\SchoolPlanController::class,
        'courses'               => App\Http\Controllers\CourseController::class,
        'banks'                 => App\Http\Controllers\BankController::class,
        'payment-descriptions'  => App\Http\Controllers\PaymentDescriptionController::class,
        'seal-notes'            => App\Http\Controllers\SealNoteController::class,
        'prices'                => App\Http\Controllers\PriceController::class,
        'students'              => App\Http\Controllers\StudentController::class,
        'counties'              => App\Http\Controllers\CountyController::class,
        'created-classes'       => App\Http\Controllers\CreatedClassController::class,
        'registrations'         => App\Http\Controllers\RegistrationController::class
    ],
);

// Resources

Route::resource(
    'fine-percentage',
    \App\Http\Controllers\FinePercentageController::class,
    ['only' => ['index', 'store', 'update']]
);

Route::resource(
    'payment-limit',
    \App\Http\Controllers\PaymentLimitController::class,
    ['only' => ['index', 'store', 'update']]
);

Route::resource(
    'last-month-payment',
    \App\Http\Controllers\LastMonthPaymentController::class,
    ['only' => ['index', 'edit', 'update']]
);

// Common routes

Route::post('school-plans/get',
    [App\Http\Controllers\SchoolPlanController::class, 'get']
)->name('school-plans.get');

Route::get('search/students', [\App\Http\Controllers\StudentController::class, 'search']);
Route::get('search/counties', [\App\Http\Controllers\CountyController::class, 'search']);

Route::get('pdf/student/{student}', [\App\Http\Controllers\PdfController::class, 'student'])
    ->name('pdf.student');

require __DIR__ . '/auth.php';
