@extends('layouts.main')
@section('title', 'Edit Movie')
@section('navMovie', 'active')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4 border-0">
        <div class="card-header bg-dark text-white rounded-top-4">
            <h4 class="mb-0">Edit Movie</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('movie.update', $movie->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="row mb-3">
                    <label for="title" class="col-sm-3 col-form-label fw-semibold">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $movie->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Slug --}}
                <div class="row mb-3">
                    <label for="slug" class="col-sm-3 col-form-label fw-semibold">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ old('slug', $movie->slug) }}" required>
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Synopsis --}}
                <div class="row mb-3">
                    <label for="synopsis" class="col-sm-3 col-form-label fw-semibold">Synopsis</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="synopsis" name="synopsis" rows="4">{{ old('synopsis', $movie->synopsis) }}</textarea>
                        @error('synopsis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Category --}}
                <div class="row mb-3">
                    <label for="category_id" class="col-sm-3 col-form-label fw-semibold">Category</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Year --}}
                <div class="row mb-3">
                    <label for="year" class="col-sm-3 col-form-label fw-semibold">Year</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="year" name="year"
                            value="{{ old('year', $movie->year) }}" required>
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Actors --}}
                <div class="row mb-3">
                    <label for="actors" class="col-sm-3 col-form-label fw-semibold">Actors</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="actors" name="actors"
                            value="{{ old('actors', $movie->actors) }}">
                        @error('actors')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Cover Image --}}
                <div class="row mb-3">
                    <label for="cover_image" class="col-sm-3 col-form-label fw-semibold">Cover Image URL</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cover_image" name="cover_image"
                            value="{{ old('cover_image', $movie->cover_image) }}">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Current Cover Preview --}}
                @if ($movie->cover_image)
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-semibold">Current Cover</label>
                        <div class="col-sm-9">
                            <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="cover" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>
                @endif

                {{-- Buttons --}}
                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-success me-2">Update</button>
                        <a href="{{ route('movie.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
