<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Pagina Privacy Policy
Route::view('/privacy', 'privacy')->name('privacy');

// Pagina Termini e Condizioni
Route::view('/terms', 'terms')->name('terms');

// Pagina Termini e Condizioni
Route::view('/cookie', 'cookie')->name('cookie');

// Pagina More Info
Route::view('/more-info', 'more-info')->name('more-info');


/*
 * // Pagina di benvenuto (puoi personalizzarla in futuro)
 * Route::get('/welcome', function () {
 *     return view('welcome');
 * })->name('welcome');
 *
 * // Pagina di login tramite socialite
 * Route::get('/login/{provider}', function ($provider) {
 *     return redirect()->route('filament-socialite.login', ['provider' => $provider]);
 * })->name('login.provider');
 *
 * // Pagina di logout
 * Route::post('/logout', function () {
 *     auth()->logout();
 *     return redirect()->route('welcome');
 * })->name('logout')->middleware('auth');
 *
 * // Pagina di registrazione tramite socialite
 * Route::get('/register/{provider}', function ($provider) {
 *     return redirect()->route('filament-socialite.register', ['provider' => $provider]);
 * })->name('register.provider')->middleware('guest');
 */
