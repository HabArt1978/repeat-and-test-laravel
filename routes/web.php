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
    $jobs = Job::with('employer')->get();

    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('job', ['job' => $job]);
});
