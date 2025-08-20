<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['greeting' => 'Привет', 'name' => 'Артур']);
});

Route::get('/about', function () {

    return view('about');
});

Route::get('/contacts', function () {
    return view('contacts');
});

//========= Jobs CRUD =========//
//? Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(12);

    // $jobs = Job::with('employer')->simplePaginate(12);
    // $jobs = Job::with('employer')->cursorPaginate(12);

    return view('jobs.index', ['jobs' => $jobs]);
});

//? Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//? Show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::findOrFail($id);

    return view('jobs.show', ['job' => $job]);
});

//? Store
Route::post('/jobs', function () {
    // dd(request()->all());

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
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::findOrFail($id);

    return view('jobs.edit', ['job' => $job]);
});

//? UPDATE
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'job_title' => 'required|string|min:3|max:100',
        'salary' => 'required|string|min:2|max:15'
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('job_title'),
        'salary' => request('salary')
    ]);

    return redirect("/jobs/{$id}");
});

//? DELETE
Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail($id)->delete();

    return redirect("/jobs");
});




