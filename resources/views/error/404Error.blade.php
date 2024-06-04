@extends('layout.layout')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="fw-bold text-center mx-3 mt-5">That page does not exist!</h1>
        <p class="lead text-center mx-4">Sorry, what you were looking for could not be found."</p>
        <span class="nav-link">Return to: <a class="text-secondary" href="{{ route('home') }}" wire:navigate>Homepage</a></span>
    </div>
@endsection