<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\DocumentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
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

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    Route::get('/admin/dashboard', [
        AdminDashboard::class,
        'index'
    ])->name('admin.dashboard');

});
Route::get(
    '/student/documents',
    [DocumentController::class,'create']
)->name('student.documents');

Route::post(
    '/student/documents',
    [DocumentController::class,'store']
)->name('student.documents.store');

require __DIR__.'/auth.php';