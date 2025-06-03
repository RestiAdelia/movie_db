<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    public function homepage()
    {
        $movies = Movie::latest()->paginate(10);
        return view('layouts.home', compact('movies'));
    }
    public function detail($id, $slug)

    {
        $movie = Movie::find($id);
        return view('movies.detailmovie', compact('movie'));
    }



    public function index()
    {
        $movies = Movie::latest()->paginate(10);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request)
    {
         $slug = Str::slug($request->title);

        // Tambahkan slug ke dalam request
        $request->merge(['slug' => $slug]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required | integer| min:1950 | max: ' . date('Y'),
            'actors' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp,|max:2048',
        ]);
        $slug = Str::slug($request->title);
        // Simpan input ke storage
        $cover = null;

        if ($request->hasFile('cover_image')) {
            $cover  = $request->file('cover_image')->store('covers', 'public');
        }
        //simpan ke tabel movies database
        Movie::create(
            [
                'title' => $validated['title'],
                'slug' => $slug,
                'synopsis' => $validated['synopsis'],
                'category_id' => $validated['category_id'],
                'year' => $validated['year'],
                'actors' => $validated['actors'],
                'cover_image' => $cover,
            ]
        );

        return redirect('home')->with('success', 'Data berhasil disimpan!');
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
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Update data movie
    $movie->title = $validated['title'];
    $movie->slug = $validated['slug'];
    $movie->synopsis = $validated['synopsis'];
    $movie->category_id = $validated['category_id'];
    $movie->year = $validated['year'];
    $movie->actors = $validated['actors'];

    // // Jika ada file cover_image baru yang diunggah
    // if ($request->hasFile('cover_image')) {
    //     // Hapus gambar lama jika ada
    //     if ($movie->cover_image && \Storage::exists('public/' . $movie->cover_image)) {
    //         \Storage::delete('public/' . $movie->cover_image);
    //     }

    //     // Simpan gambar baru
    //     $coverPath = $request->file('cover_image')->store('covers', 'public');
    //     $movie->cover_image = $coverPath;
   // }

    // $movie->save();

    return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
}

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    }
}
