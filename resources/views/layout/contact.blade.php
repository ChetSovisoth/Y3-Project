@extends('layout.layout')
@section('content')
    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Contact Us') }}</div>
                    <style>
                        .center-text {
                            text-align: center;
                        }
                        .center-container {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            flex-direction: column;
                            padding: 20px;
                        }
                    </style>
                    <div class="center-text">
                        <p>Are you seeking guidance to navigate your career path or personal development journey? Our mentoring program is designed to connect you with experienced professionals who can provide valuable insights, advice, and support.</p>
                        <p>
                            <strong>What We Offer:</strong><br>
                            <strong>Career Guidance:</strong> Get advice on career choices, job search strategies, and professional development.<br>
                            <strong>Skill Development:</strong> Learn new skills or enhance existing ones with the help of an expert.<br>
                            <strong>Networking Opportunities:</strong> Connect with professionals in your field and expand your network.<br>
                            <strong>Personal Growth:</strong> Receive support in setting and achieving personal goals.
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="message"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                                <div class="col-md-6">
                                    <textarea id="message"
                                        class="form-control @error('message') is-invalid @enderror" name="message"
                                        required>{{ old('message') }}</textarea>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 text-center">
                                    <button type="submit" class="btn btn-primary btn-black">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" class="bg-light-gray">
        <div class="row text-white mx-2">
            <div class="col-4">
                <h3 class="py-3 fw-bold">Mentorship</h3>
                <p style="max-width: 500px;">Royal University of Phnom Penh (Campus 1), Russian Federation Blvd (110), Touk Kork, Phnom Penh, Cambodia</p>
            </div>
            <div class="col-4">
                <h3 class="py-3 fw-bold">Explore</h3>
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                <a href="{{ url('/contact') }}" class="nav-link">Contact Us</a>
                <a href="{{ url('/chat') }}" class="nav-link">Chat</a>
                <a href="{{ url('/group') }}" class="nav-link">Group</a>
            </div>
            <div class="col-4">
                <h3 class="py-3 ms-3">Follow Us</h3>
                <i class="bi bi-facebook mx-3 fs-2"></i>
                <i class="bi bi-telegram mx-3 fs-2"></i>
                <i class="bi bi-instagram mx-3 fs-2"></i>
                <i class="bi bi-github mx-3 fs-2"></i>         
            </div>
            <div class="pt-3 text-white">
                <h3>Contact Us</h3>
                <p>Email: support@mentorship.com</p>
                <p>Tel: +855 96 311 8521</p>
            </div>
            <hr class="border-2 mx-2"/>
            <p class="text-center">Copyright &#64; Mentorship 2023</p>
        </div>
    </div>
    
@endsection
