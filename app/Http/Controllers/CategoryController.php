<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::paginate(10);
       return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|unique:categories,id',
            'category_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'category_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // If the ID is changed, update it manually
        if ($validated['id'] != $category->id) {
            DB::table('categories')->where('id', $category->id)->update(['id' => $validated['id']]);
            $category = Category::findOrFail($validated['id']);
        }

        $category->update([
            'category_name' => $validated['category_name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $moviesCount = Movie::where('category_id', $category->id)->count();

        if ($moviesCount > 0) {

            return redirect()->route('category.index')->with('error', 'Kategori ini tidak dapat dihapus karena masih digunakan oleh ' . $moviesCount . ' Movie.');
        }

        
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
