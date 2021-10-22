@extends('layouts.app')

@section('title', $pokemon->name)

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('detail', ['id' => $prev->id]) }}" class="btn btn-danger btn-block">
                <strong>{{ '# ' . str_pad($prev->id, 3, 0, STR_PAD_LEFT) }}</strong> {{ $prev->name }}
            </a>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('detail', ['id' => $next->id]) }}" class="btn btn-danger btn-block">
                <strong>{{ '# ' . str_pad($next->id, 3, 0, STR_PAD_LEFT) }}</strong> {{ $next->name }}
            </a>
        </div>
    </div>
    <div class="card card-detail mt-3 px-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <div class="text-center">
                    <img src="{{ asset('img/' . $pokemon->image) }}" alt="">
                </div>
            </div>
            <div class="col-6">
                <p class="card-text">{{ '# ' . str_pad($pokemon->id, 3, 0, STR_PAD_LEFT) }}</p>
                <h1 class="car-title">{{ $pokemon->name }}</h1>
                <h4 class="car-title mt-2">Abilities</h4>
                @foreach (json_decode($pokemon->abilities) as $ability)
                    <div class="badge bg-dark text-white">{{ $ability }}</div>
                @endforeach
                <h4 class="car-title mt-3">Profile</h4>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-2 pr-0">
                            <p class="mb-0"><strong>Height</strong></p>
                        </div>
                        <div class="col-4 pr-0">
                            <p class="mb-0">
                                {{ round($pokemon->height * 3.28084, 2) . ' ft. (' . $pokemon->height . ' m)' }}</p>
                        </div>
                        <div class="col-2 pr-0">
                            <p class="mb-0"><strong>Weight</strong></p>
                        </div>
                        <div class="col-4 pr-0">
                            <p class="mb-0">
                                {{ round($pokemon->weight * 2.20462262, 2) . ' lbs. (' . $pokemon->weight . ' kg)' }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-2 pr-0">
                            <p class="mb-0"><strong>Species</strong></p>
                        </div>
                        <div class="col-4 pr-0">
                            <p class="mb-0">{{ $pokemon->species }}</p>
                        </div>
                        <div class="col-2 pr-0">
                            <p class="mb-0"><strong>Types</strong></p>
                        </div>
                        <div class="col-4 pr-0">
                            @foreach (json_decode($pokemon->types) as $type)
                                <div class="badge bg-dark text-white">{{ $type }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <h4 class="car-title mt-4">Stats</h4>
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0"><strong>HP</strong></p>
                    </div>
                    <div class="col-9">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar"
                                style="{{ 'width: ' . ($pokemon->hp / 225) * 100 . '%;' }}" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100">{{ $pokemon->hp }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0"><strong>Attack</strong></p>
                    </div>
                    <div class="col-9">
                        <div class="progress">
                            <div class="progress-bar bg-orange" role="progressbar"
                                style="{{ 'width: ' . ($pokemon->attack / 225) * 100 . '%;' }}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">{{ $pokemon->attack }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0"><strong>Defense</strong></p>
                    </div>
                    <div class="col-9">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar"
                                style="{{ 'width: ' . ($pokemon->defense / 225) * 100 . '%;' }}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">{{ $pokemon->defense }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0"><strong>Sp. Attack</strong></p>
                    </div>
                    <div class="col-9">
                        <div class="progress">
                            <div class="progress-bar bg-cyan" role="progressbar"
                                style="{{ 'width: ' . ($pokemon->sp_attack / 225) * 100 . '%;' }}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">{{ $pokemon->sp_attack }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0"><strong>Sp. Defense</strong></p>
                    </div>
                    <div class="col-9">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="{{ 'width: ' . ($pokemon->sp_defense / 225) * 100 . '%;' }}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">{{ $pokemon->sp_defense }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0"><strong>Speed</strong></p>
                    </div>
                    <div class="col-9">
                        <div class="progress">
                            <div class="progress-bar bg-pink" role="progressbar"
                                style="{{ 'width: ' . ($pokemon->speed / 225) * 100 . '%;' }}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">{{ $pokemon->speed }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="card-title text-center mt-5">Evolutions</h4>
        <div class="row justify-content-center">
            @if ($evolutions->count() > 0)
                @foreach ($evolutions as $evolution)
                    <div class="col-3 mb-5">
                        <div class="card with-hover">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                {{ '#' . str_pad($evolution->id, 3, 0, STR_PAD_LEFT) }}</div>
                            <!-- Product image-->
                            <img class="card-img-top img-fluid" src="{{ asset('img/' . $evolution->image) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body pt-4 pb-0">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $evolution->name }}</h5>
                                    <a href="{{ route('detail', ['id' => $evolution->id]) }}" class="stretched-link"></a>
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
                                <p class="card-text">No Evolution for this Pokemon</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
