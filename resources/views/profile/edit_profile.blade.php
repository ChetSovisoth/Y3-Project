@extends('layout.layout')

@section('content')
<div class="container pt-2">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="w-100 d-flex flex-column align-items-center">

            <!-- Profile Picture and Name Section -->
            @livewire('profile-picture.is-profile-picture-updated', ['user' => $user, 'profile_picture' => $profile_picture])
            @if ($isVerified !== true)
                <div class="d-flex w-75">
                    <p class="flex-grow-1 m-0 text-white">Have not verify your email?</p>
                    <a href="{{ route('verification.notice.send') }}" class="text-white" wire:navigate>Do it here</a>
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
