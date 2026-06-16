<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\DocumentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\DocumentVerificationController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ZonasiController;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;


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

// Route::middleware([
//     'auth',
//     'admin'
// ])->group(function () {

//     Route::get('/admin/dashboard', [
//         AdminDashboard::class,
//         'index'
//     ])->name('admin.dashboard');
// });

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
    });

Route::get(
    '/student/documents',
    [DocumentController::class, 'create']
)->name('student.documents');

Route::post(
    '/student/documents',
    [DocumentController::class, 'store']
)->name('student.documents.store');

require __DIR__ . '/auth.php';
