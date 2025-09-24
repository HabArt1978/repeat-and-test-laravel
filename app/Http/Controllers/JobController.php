<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->orderByDesc('updated_at')->paginate(12);

        // $jobs = Job::with('employer')->simplePaginate(12);
        // $jobs = Job::with('employer')->cursorPaginate(12);

        return view('jobs.index', ['jobs' => $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'title' => 'required|string|min:3|max:100',
            'salary' => 'required|string|min:2|max:15'
        ]);

        Job::create([
            ...$validatedAttributes,
            'employer_id' => $request->user()->employer->id,
        ]);

        return redirect('/jobs');
    }
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_title' => 'required|string|min:3|max:100',
            'salary' => 'required|string|min:2|max:15'
        ]);

        $job->update([
            'title' => request('job_title'),
            'salary' => request('salary')
        ]);

        return redirect("/jobs/{$job->id}");
    }
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect("/jobs");
    }
}
