@extends('layouts.main')

@section('title', 'Data Movie')
@section('navMovie', 'active')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Movie</h1>

       
        <a href="{{ route('movie.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Tambah Movie
        </a>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class=" text-center">
                    <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Year</th>
                        <th>Slug</th>
                        <th>Synopsis</th>
                        <th>Actors</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>

                            <td class="text-center">{{ $movie->id }}</td>
                            <td class="text-center">
                                <img src="{{ $movie->cover_image }}" alt="Cover" class="img-thumbnail"
                                    style="width: 100px; height: 120px; object-fit: cover;">
                            </td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->category->category_name ?? '-' }}</td>
                            <td class="text-center">{{ $movie->year }}</td>
                            <td>{{ $movie->slug }}</td>
                            <td style="max-width: 250px; white-space: normal;">{{ Str::limit($movie->synopsis, 150) }}</td>
                            <td>{{ $movie->actors }}</td>

                            <td class="text-center">
                                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-sm btn-warning mb-1">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('movie.destroy', $movie->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus movie ini?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $movies->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
