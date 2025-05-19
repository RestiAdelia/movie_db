@extends('layouts.main')
@section('title', 'Create Category')
@section('navCategory', 'active')

@section('content')
    <div class="container">
        <h1>New Category</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="id" name="id" required>
                    @error('id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category_name" name="category_name" required>
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
