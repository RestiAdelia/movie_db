@extends('layouts.main')
@section('title', 'Edit Category')
@section('navCategory', 'active')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="id" name="id" value="{{ old('id', $category->id) }}" readonly>
                    @error('id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category_name" name="category_name"
                        value="{{ old('category_name', $category->category_name) }}" required>
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
