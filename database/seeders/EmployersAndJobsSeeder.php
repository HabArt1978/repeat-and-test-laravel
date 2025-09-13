<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployersAndJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Employer::factory(200)->create()
        //     ->each(fn($employer) =>
        //         Job::factory(3)->create(['employer_id' => $employer->id]));

        Employer::factory(200)->has(Job::factory(3))->create();
    }
}
