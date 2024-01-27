<?php

use App\Livewire\Home;
use App\Livewire\Policy\Privacypolicy;
use App\Livewire\Policy\Termsofservice;
use App\Livewire\Summary\Index as SummaryIndex;
use App\Livewire\Summary\Summary;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', Home::class)->name('home');

// Summary
Route::scopeBindings()->group(function () {
    Route::get('/summaries', SummaryIndex::class)->name('summaries');
    Route::get('summary/{title}', Summary::class)->name('summary');
});

// Policy
Route::scopeBindings()->group(function () {
    Route::get('privacy-policy', Privacypolicy::class)->name('privacy-policy');
    Route::get('terms-of-service', Termsofservice::class)->name('terms-of-service');
});
