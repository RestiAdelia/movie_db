<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('category')->paginate(10);
        return view('movies.index', ['movies' => $movies]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        Movie::create($validated);

        return redirect()->route('movie.index')->with('success', 'Movie created successfully.');
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([

            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug,' . $movie->id,
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $movie->update($validated);

        return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    }
}
