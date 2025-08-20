<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['greeting' => 'Привет', 'name' => 'Артур']);
Route::view('/about', 'about');
Route::view('/contacts', 'contacts');

//========= Jobs CRUD =========//
//? Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(12);

    // $jobs = Job::with('employer')->simplePaginate(12);
    // $jobs = Job::with('employer')->cursorPaginate(12);

    return view('jobs.index', ['jobs' => $jobs]);
});

//? Create
Route::view('/jobs/create', 'jobs.create');

//? Show
Route::get('/jobs/{job}', fn(Job $job) => view('jobs.show', compact('job')));

//? Store
Route::post('/jobs', function () {
    request()->validate([
        'job_title' => 'required|string|min:3|max:100',
        'salary' => 'required|string|min:2|max:15'
    ]);

    Job::create([
        'title' => request('job_title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

//? EDIT
Route::get('/jobs/{job}/edit', fn(Job $job) => view('jobs.edit', compact('job')));

//? UPDATE
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'job_title' => 'required|string|min:3|max:100',
        'salary' => 'required|string|min:2|max:15'
    ]);

    $job->update([
        'title' => request('job_title'),
        'salary' => request('salary')
    ]);

    return redirect("/jobs/{$job}");
});

//? DELETE
Route::delete('/jobs/{job}', function ($job) {

    $job->delete();

    return redirect("/jobs");
});




