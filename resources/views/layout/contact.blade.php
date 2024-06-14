@extends('layout.layout')
@section('content')
    <div class="">
        <h1 class="">Contact Page</h1>
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
                                        required style="resize: none">{{ old('message') }}</textarea>

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