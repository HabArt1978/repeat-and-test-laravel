<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all()
    {
        return [
            ['id' => 1, 'job' => 'учитель', 'salary' => '50,000 руб.'],
            ['id' => 2, 'job' => 'PHP разработчик', 'salary' => '10,000 руб'],
            ['id' => 3, 'job' => 'Оператор станков с ПУ', 'salary' => '70,000 руб'],
        ];
        ;
    }

    public static function find(string $id)
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] === (int) $id);
        // Пока выкидываем код ошибки (404) для обработки Laravel по умолчанию
        if (!$job) {
            abort(404);
        }
        return $job;
    }
}
