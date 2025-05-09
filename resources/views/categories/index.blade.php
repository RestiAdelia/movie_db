@extends('layouts.main')
@section('title', 'Data Category')
@section('navCategory', 'active')

@section('content')
    <div class="container">
        
        <h1>Daftar Category Movie</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Input data
            Category</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        {{-- <td>{{ $categories->firstItem() + $loop->index }}</td> --}}
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>

                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this data?')"><i
                                        class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
