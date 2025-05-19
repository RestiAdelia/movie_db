@extends('layouts.main')
@section('title', 'Create Movie')
@section('navMovie', 'active')

@section('content')
    <div class="container">
        <h1>Input Data Movie</h1>
        <form action="{{ route('movie.store') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="mb-3 row">
                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                        required>
                    @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3">{{ old('synopsis') }}</textarea>
                    @error('synopsis')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="year" class="col-sm-2 col-form-label">Year</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}"
                        required>
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="actors" class="col-sm-2 col-form-label">Actors</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="actors" name="actors" value="{{ old('actors') }}">
                    @error('actors')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="cover_image" class="col-sm-2 col-form-label">Cover Image URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cover_image" name="cover_image"
                        value="{{ old('cover_image') }}">
                    @error('cover_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Save</button>
                <a href="{{ route('movie.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
