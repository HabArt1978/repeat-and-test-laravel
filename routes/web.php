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

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(12);

    // $jobs = Job::with('employer')->simplePaginate(12);
    // $jobs = Job::with('employer')->cursorPaginate(12);

    return view('jobs.index', ['jobs' => $jobs]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // dd(request()->all());

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});
