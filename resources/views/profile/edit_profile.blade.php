@extends('layout.layout')

@section('content')
<div class="container pt-2">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="d-flex bg-dark-subtle w-75 rounded-3 p-2 mb-2">
                <!-- Profile Picture and Name Section -->
                <div class="me-3 d-flex flex-grow-1">
                    <!-- Profile Picture -->
                    <img 
                        src={{ $profile_picture }}
                        alt="profile-picture"
                        class="rounded-circle me-3"
                        style="width: 75px; height: 75px; object-fit: cover;"
                    />
                    <!-- User's Name -->
                    <div class="d-flex flex-column justify-content-center">
                        <h5 class="m-0">{{ $user->name }}</h5>
                        <p class="m-0">{{ $user->email }}</p>
                        @error('avatar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <!-- Form for Profile Picture Upload -->
                <div class="d-flex justify-content-center">
                    <form id="profile-picture-form" action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data" class="align-self-center me-2">
                        @csrf
                        <label for="profile-picture-input" class="btn btn-sm bg-light-subtle mb-2 py-2" style="cursor: pointer;">
                            Change Photo
                        </label>
                        <!-- File Input -->
                        <input type="file" id="profile-picture-input" name="avatar" class="d-none" onchange="document.getElementById('profile-picture-form').submit();">
                    </form> 
                    
                    @if ($profile_picture != '/storage/users-avatar/avatar.png')
                        <form id="remove-profile-picture-form" action="{{ route('profile.picture.remove') }}" method="POST" class="align-self-center">
                            @csrf
                            @method('PUT')
                            <!-- Remove Photo Button -->
                            <button type="submit" class="btn btn-sm btn-danger mb-2 py-2">Remove Photo</button>
                        </form>       
                    @endif
                </div>
            </div>
            @if ($isVerified !== true)
                <div class="d-flex w-75">
                    <p class="flex-grow-1 m-0 text-white">Have not verify your email?</p>
                    <a href="{{ route('verification.notice.send') }}" class="text-white">Do it here</a>
                </div>
            @endif
        </div>

        <hr class="text-white border-2 w-75 mb-4 mt-3" />

        <div class="text-white w-75">
            <h3 class="text-start w-100 m-0">Profile Information</h3>
            <div>Details about the user's profile.</div>

            @if ($user->role == 'mentor')
                {{-- Mentor --}}
                @livewire('profile-info.mentor-profile-info', ['user' => Auth::user()])
            @else
                {{-- Student --}}
                @livewire('profile-info.student-profile-info', ['user' => Auth::user()])
            @endif
        </div>
    </div>
</div>
@endsection
