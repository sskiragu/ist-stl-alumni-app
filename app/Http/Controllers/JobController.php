<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'required_skills' => 'required',
        ]);

        JobPosting::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'required_skills' => $request->required_skills,
        ]);

        return redirect()->route('jobs.index');
    }

    public function notifications()
    {
        $user = Auth::user();

        // Check if the user has portfolios
        if ($user->portfolios->isEmpty()) {
            // If no portfolios exist, return an empty list of jobs or handle the case appropriately
            return view('jobs.notifications', ['jobs' => collect()]);
        }

        // Collect all skills from user's portfolios
        $skills = [];
        foreach ($user->portfolios as $portfolio) {
            $skills = array_merge($skills, explode(',', $portfolio->skills));
        }

        // Remove duplicate skills
        $skills = array_unique($skills);

        // Find jobs that match the user's skills
        $jobs = JobPosting::where(function ($query) use ($skills) {
            foreach ($skills as $skill) {
                $query->orWhere('required_skills', 'like', '%' . trim($skill) . '%');
            }
        })->get();

        return view('jobs.notifications', compact('jobs'));
    }


    // Add other methods as needed (show, edit, update, destroy)
}
