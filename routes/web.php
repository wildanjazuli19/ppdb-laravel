<?php

use App\Http\Controllers\Admin\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\DocumentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\DocumentVerificationController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ZonasiController;
use App\Http\Controllers\Student\CertificateController;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Student\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('student.dashboard');
    })->name('dashboard');

    Route::resource('students', StudentController::class);

    Route::get('/student/dashboard', [
        StudentDashboard::class,
        'index'
    ])->name('student.dashboard');

    // PROFILE
    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/dashboard', [
            AdminDashboard::class,
            'index'
        ])->name('dashboard');

        Route::resource('students', StudentController::class);

        Route::get('/document-verifications', [
            DocumentVerificationController::class,
            'index'
        ])->name('document-verifications.index');

        Route::get('/document-verifications/{student}', [
            DocumentVerificationController::class,
            'show'
        ])->name('document-verifications.show');

        Route::patch('/document-verifications/{student}', [
            DocumentVerificationController::class,
            'update'
        ])->name('document-verifications.update');

        Route::get('/zonasi', [
            ZonasiController::class,
            'index'
        ])->name('zonasi.index');

        Route::post('/zonasi/process', [
            ZonasiController::class,
            'process'
        ])->name('zonasi.process');

        Route::get('/prestasi', [
            PrestasiController::class,
            'index'
        ])->name('prestasi.index');

        Route::post('/prestasi/process', [
            PrestasiController::class,
            'process'
        ])->name('prestasi.process');

        Route::resource(
            'announcements',
            AnnouncementController::class
        )->names('announcements');

        Route::get('/reports', [
            ReportController::class,
            'index'
        ])->name('reports.index');

        Route::patch('/certificates/{certificate}/verify', [DocumentVerificationController::class, 'verifyCertificate'])
            ->name('certificates.verify');
    });


Route::middleware(['auth', 'student'])
    ->prefix('student')
    ->as('student.')
    ->group(function () {
        Route::get('/dashboard', [
            StudentDashboard::class,
            'index'
        ])->name('dashboard');

        Route::get('/registration', [
            RegistrationController::class,
            'index'
        ])->name('registration');

        Route::post('/registration', [
            RegistrationController::class,
            'store'
        ])->name('registration.store');

        Route::put('/registration', [
            RegistrationController::class,
            'update'
        ])->name('registration.update');

        Route::get('/documents', [
            DocumentController::class,
            'index'
        ])->name('documents');

        Route::post('/documents', [
            DocumentController::class,
            'store'
        ])->name('documents.store');

        Route::post('/certificate/{student}', [CertificateController::class, 'store'])->name('certificate.store');
        Route::put('/certificate/{certificate}', [CertificateController::class, 'update'])->name('certificate.update');
        Route::delete('/certificate/{certificate}', [CertificateController::class, 'destroy'])->name('certificate.destroy');
    });

// Route::get(
//     '/student/documents',
//     [DocumentController::class, 'create']
// )->name('student.documents');

// Route::post(
//     '/student/documents',
//     [DocumentController::class, 'store']
// )->name('student.documents.store');

require __DIR__ . '/auth.php';
