@extends('layouts.app')

@section('title', __('Not Found'))

@section('content')
    <div class="card card-detail mt-3 px-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <div class="text-center">
                    <h2>Page Not Found!</h2>
                    <p>Sorry! The page you're looking for is not here.</p>
                    <a href="{{ route('home') }}" class="btn btn-block btn-primary">Go Back</a>
                </div>
            </div>
            <div class="col-6">
                <div class="text-center">
                    <img src="{{ asset('img/psyduck.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
