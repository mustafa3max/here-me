<?php

use App\Globals;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\SignIn;
use App\Livewire\Auth\SignInGuest;
use App\Livewire\Auth\SignUp;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\CallMe;
use App\Livewire\Employee\Index as EmployeeIndex;
use App\Livewire\Job\Index as JobIndex;
use App\Livewire\Home;
use App\Livewire\Policy\Privacypolicy;
use App\Livewire\Policy\Termsofservice;

use App\Livewire\User\Delete as UserDelete;
use App\Livewire\User\Profile as UserProfile;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', Home::class)->name('home');
Route::get('call-me/{id}', CallMe::class)->middleware('auth:sanctum')->name('call-me');

// Auth
Route::scopeBindings()->group(function () {
    Route::get('sign-in', SignIn::class)->name('sign-in');
    Route::get('sign-up', SignUp::class)->name('sign-up');

    Route::get('/forgot-password', ForgotPassword::class)->middleware('guest')->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->middleware('guest')->name('password.reset');

    Route::get('sign-in-guest', SignInGuest::class)->name('sign-in-guest');
});

// User
Route::prefix('user')->group(function () {
    Route::get('profile/{userId}', UserProfile::class)->name('profile');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', function () {
            return Globals::logout();
        })->name('logout');
    });
    Route::middleware('auth:sanctum', 'verified')->group(function () {
        Route::get('delete-account', UserDelete::class)->name('delete-account');
    });

    // Email Verify
    Route::scopeBindings()->group(function () {
        Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');

        Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();
            return redirect('articles');
        })->middleware(['auth', 'signed'])->name('verification.verify');

        Route::post('/email/verification-notification', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('message', 'Verification link sent!');
        })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    });
});

// Employees
Route::prefix('employees')->group(function () {
    Route::get('/', EmployeeIndex::class)->name('employees');
});

// Jobs
Route::prefix('jobs')->group(function () {
    Route::get('/', JobIndex::class)->name('jobs');
});

// Policy
Route::scopeBindings()->group(function () {
    Route::get('privacy-policy', Privacypolicy::class)->name('privacy-policy');
    Route::get('terms-of-service', Termsofservice::class)->name('terms-of-service');
});

