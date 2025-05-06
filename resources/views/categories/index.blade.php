@extends('layouts.main')
@section('title', 'Data Category')
@section('navCategory', 'active')

@section('content')
    <div class="container">
        <h1>Daftar Category Movie</h1>
        {{-- <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Input data Mahasiswa</a> --}}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th>ID</th>
                    <th>Category Name</th>
                    <th> Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        {{-- <td>{{ $categories->firstItem() + $loop->index }}</td> --}}
                        <td><?= $category->id ?></td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->category_id }}</td>
                        <td>
                            {{-- <!-- Tombol Edit -->
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-end">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div> --}}
    </div>
@endsection
