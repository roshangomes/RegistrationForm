<?php

use App\Http\Controllers\RegistrationController;

Route::get('/', [RegistrationController::class, 'showForm'])->name('registration.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.register');
Route::get('/view', [RegistrationController::class, 'viewData'])->name('registration.view');
