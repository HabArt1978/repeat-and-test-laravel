<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['greeting' => 'Привет', 'name' => 'Артур']);
Route::view('/about', 'about');
Route::view('/contacts', 'contacts');

Route::resource('jobs', JobController::class);

//========= Jobs CRUD =========//
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', [JobController::class, 'index']);
//     Route::get('/jobs/create', [JobController::class, 'create']);
//     Route::get('/jobs/{job}', [JobController::class, 'show']);
//     Route::post('/jobs', [JobController::class, 'store']);
//     Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//     Route::patch('/jobs/{job}', [JobController::class, 'update']);
//     Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// });








