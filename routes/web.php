<?php

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

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', ['jobs' => $jobs]);
});

// Route::get('/jobs/{id}', function ($id) use ($jobs) {
//     $currentJob = null;

//     // dd($id, $jobs);

//     foreach ($jobs as $job) {
//         if ($job['id'] === (int) $id) {
//             $currentJob = [...$job];
//             break;
//         }
//     };

//     if (!$currentJob) {
//         abort(404);
//     };

//     return view('job', ['job' => $currentJob]);
// });

Route::get('/jobs/{id}', function ($id) use ($jobs) {

    $job = Arr::first($jobs, fn($job) => $job['id'] === (int) $id);

    // Пока выкидываем код ошибки (404) для обработки Laravel по умолчанию
    if (!$job) {
        abort(404);
    }

    return view('job', ['job' => $job]);
});
