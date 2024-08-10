<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('{id}/job-detail', [LandingController::class, 'job_detail'])->name('job_detail');
Route::post('{id}/job-detail', [LandingController::class, 'submit_form'])->name('submit_form');

