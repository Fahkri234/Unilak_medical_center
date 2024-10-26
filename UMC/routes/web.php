<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KasirController;

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
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/consultations/dashboard', [ConsultationController::class, 'index'])->name('consultations.dashboard'); // Untuk role lainnya
});


Route::get('/check-patient', [PatientController::class, 'checkPatientForm'])->name('check.patient.form');
Route::post('/check-patient', [PatientController::class, 'checkPatient'])->name('check.patient');
Route::get('/patients/register', [PatientController::class, 'showRegistrationForm'])->name('patients.register');
Route::post('/patients/register', [PatientController::class, 'register']);
Route::resource('patients', PatientController::class);


Route::middleware('auth')->group(function () {
    Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');
    Route::get('/consultations/create/{patientId}', [ConsultationController::class, 'create'])->name('consultations.create');
    Route::post('/consultations/store/{patientId}', [ConsultationController::class, 'store'])->name('consultations.store');
});

Route::get('/payments/create/{patientId}', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/store/{patientId}', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/report', [PaymentController::class, 'report'])->name('payments.report');
Route::get('/kasir/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard')->middleware('auth');

// Show patient details
Route::get('/patients/{id}', [AdminController::class, 'show'])->name('patients.show');

// Edit patient details
Route::get('/patients/{id}/edit', [AdminController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [AdminController::class, 'update'])->name('patients.update');

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

