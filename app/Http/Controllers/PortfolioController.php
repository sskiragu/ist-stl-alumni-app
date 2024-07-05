<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('user_id', Auth::id())->get();
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required',
        ]);

        Portfolio::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'skills' => $request->skills,
        ]);

        return redirect()->route('portfolios.index');
    }

    // Add other methods as needed (show, edit, update, destroy)
}
