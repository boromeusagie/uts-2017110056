@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <form action="{{ route('home', ['filter' => 'search']) }}" method="get">
        <div class="input-group mb-3">
            <input type="text" name="search_query" class="form-control" placeholder="Search" value="{{ $search }}">
            <button class="btn btn-danger" type="submit">Search Pok<span>&#233;</span>mon</button>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('home', ['filter' => 'randomize']) }}" class="btn btn-block btn-warning mb-3">Surprise
                Me!</a>
        </div>
        <div class="col-lg-6">
            <div class="dropdown">
                <button class="btn btn-block btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Order By
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 100%">
                    <li><a class="dropdown-item" href="{{ route('home', ['filter' => 'o-id-asc']) }}">Lowest Number</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('home', ['filter' => 'o-id-desc']) }}">Highest Number</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('home', ['filter' => 'o-a-z']) }}">A-Z</a></li>
                    <li><a class="dropdown-item" href="{{ route('home', ['filter' => 'o-z-a']) }}">Z-A</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @if ($pokemons->count() > 0)
            @foreach ($pokemons as $pokemon)
                <div class="col-3 mb-5">
                    <div class="card with-hover">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                            {{ '#' . str_pad($pokemon->id, 3, 0, STR_PAD_LEFT) }}</div>
                        <!-- Product image-->
                        <img class="card-img-top img-fluid" src="{{ asset('img/' . $pokemon->image) }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body pt-4 pb-0">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $pokemon->name }}</h5>
                                <a href="{{ route('detail', ['id' => $pokemon->id]) }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer pt-0 pb-4 border-top-0 bg-transparent">
                            <div class="text-center">
                                @foreach (json_decode($pokemon->types) as $type)
                                    <div class="badge bg-dark text-white">{{ $type }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-3 mb-5">
                <div class="card">
                    <!-- Product details-->
                    <div class="card-body py-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <p class="card-text">No Pokemons found.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
