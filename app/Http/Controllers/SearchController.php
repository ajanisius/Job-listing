<?php

namespace App\Http\Controllers;

use App\Models\Job;


class SearchController extends Controller
{
    public function __invoke()
    {
        $found_jobs = Job::with(['employer', 'tags'])->where('title', 'LIKE', '%' . request('q') . '%')->get();

        return view('/results', [
            'found_jobs' => $found_jobs,
        ]);
    }
}
