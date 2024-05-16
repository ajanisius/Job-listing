<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class  JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');
        $tags = Tag::all();

        return view('jobs.index', [
            'jobs' => $jobs[0],
            'featured_jobs' => $jobs[1],
            'tags' => $tags,

        ]);
    }
    public function show($id)
    {
        $job = Job::with('tags')->find($id);
        return view('jobs.show', ['job' => $job]);
    }
    public function showAll()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();
        return view('jobs.show-all', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);
        $attributes['featured'] = $request->has('featured');

        $job =  Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }
        return redirect('/');
    }
    public function edit(Job $job)
    {
        Gate::authorize('edit-job', $job);

        // if you want to handle yourself
        // if (Gate::denies('edit-job', $job)) {
        //     abort(...);
        // }

        $job = Job::with('tags')->find($job->id);

        $tags_string = $job->tags->pluck('name')->implode(', ');

        return view('jobs.edit', ['job' => $job, 'tags_string' => $tags_string]);
    }
    public function update(Request $request, $job)
    {
        $job = Job::findOrFail($job);

        request()->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required'],
            'feature' => ['nullable'],
            'url' => ['required'],
            'description' => ['required'],

        ]);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'location' => request('location'),
            'schedule' => request('schedule'),
            'feature' => request('feature'),
            'url' => request('url'),
            'description' => request('description'),
        ]);
        return redirect('/jobs/view/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);
        $job->delete();
        return redirect('/');
    }
}
