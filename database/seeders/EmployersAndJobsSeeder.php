<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployersAndJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employer::factory(200)->create()
            ->each(fn($employer) =>
                Job::factory(3)->create(['employer_id' => $employer->id]));
    }
}
