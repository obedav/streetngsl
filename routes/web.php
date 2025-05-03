<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrendyController;
// Import other controllers as needed

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Trendy routes
Route::get('/trendy', [TrendyController::class, 'index'])->name('trendy');
Route::get('/trendy/services', [TrendyController::class, 'services'])->name('trendy.services');
Route::get('/trendy/gallery', [TrendyController::class, 'gallery'])->name('trendy.gallery');

// Add other routes that are referenced in your app.blade.php
Route::get('/tavern', function () {
    return view('tavern.index');
})->name('tavern');

Route::get('/tavern/menu', function () {
    return view('tavern.menu');
})->name('tavern.menu');

Route::get('/tavern/about', function () {
    return view('tavern.about');
})->name('tavern.about');

Route::get('/realtors', function () {
    return view('realtors.index');
})->name('realtors');

Route::get('/realtors/brokerage', function () {
    return view('realtors.brokerage');
})->name('realtors.brokerage');

Route::get('/realtors/management', function () {
    return view('realtors.management');
})->name('realtors.management');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');