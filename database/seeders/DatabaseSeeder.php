<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Employer::factory(10)->create()
            ->each(fn($employer) =>
                Job::factory(3)->create(['employer_id' => $employer->id]));
    }
}
