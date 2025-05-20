@extends('layouts.main')
@section('title', 'Data Home')
@section('navHome', 'active')
@section('content')
    <h1>Lates Movies</h1>

    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$movie->cover_image}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{Str::words($movie->synopsis,20,'.....')}}</p>
                                <a href="#" class="btn btn-success">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$movies->links()}}
    </div>
@endsection


{{--

@extends('layouts.main')
@section('title', 'Data Home')
@section('navHome', 'active')

@section('content')

<h1 class="mt-5">Sticky footer with fixed navbar</h1>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p>
    <p>Back to <a href="/docs/5.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>

@endsection --}}
