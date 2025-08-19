<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

$jobs = [
    ['id' => 1, 'job' => 'учитель', 'salary' => '50,000 руб.'],
    ['id' => 2, 'job' => 'PHP разработчик', 'salary' => '10,000 руб'],
    ['id' => 3, 'job' => 'Оператор станков с ПУ', 'salary' => '70,000 руб'],
];

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
