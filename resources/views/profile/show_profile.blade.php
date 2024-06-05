@extends('layout.layout')

@section('content')
    <div class="container py-2">
        <div class="d-flex flex-column align-items-center mt-5 ">
            <div class="d-flex flex-row align-items-center w-100 justify-content-between">
                <div class="d-flex align-items-center w-100">
                    <div class="me-4">
                        <img src="{{ $profile_picture }}" alt="profile-picture" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;" />
                    </div>
                    <div class="text-light d-flex flex-column flex-grow-1">
                        <h5>{{ $user->name }}</h5>
                        <p class="my-1">{{ $user->email }}</p>
                        <div>{{ ucfirst($user->role) }}</div>
                    </div>
                    <div class="ms-auto w-25 d-flex justify-content-center">
                        @if ($isFollowing ?? false)
                        <form action="{{ route('user.unfollow', $user->id) }}" method="POST" class="me-3">
                            @csrf
                            <button type="submit" class="btn btn-secondary text-white text-decoration-none">
                                Unfollow
                            </button>
                        </form>
                        @else
                            <form action="{{ route('user.follow', $user->id) }}" method="POST" class="me-3">
                                @csrf
                                <button type="submit" class="btn btn-secondary text-white text-decoration-none">
                                    Follow
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('user.chat.id', $user->id) }}" class="btn btn-secondary text-white text-decoration-none" style="color: inherit;" wire:navigate>
                            Message
                        </a>
                    </div>
                    
                </div>                
            </div>
        </div>
        <hr class="text-white border-2 w-100 my-4" />
        <div class="d-flex justify-content-center text-light px-5 gap-4 w-100">
            About
        </div>
        <div class="d-flex mt-2">
            <div class="w-25 text-white pe-3 border-end border-white">
                <span>Bio:</span>
                <div class="ms-2">
                    {{ $user->bio }}
                </div>
            </div>

            <span class="text-white ps-3"></span>
            {{-- Left --}}
            <div class="w-75 text-white">
                <div class="d-flex my-1">
                    <div class="flex-grow-1">Area of Expertise: </div>
                    <div>{{ $user->mentor->area_of_expertise }}</div>
                </div>

                <div class="d-flex my-2">
                    <div class="flex-grow-1">Education Level: </div>
                    <div>{{ ucfirst($user->mentor->education_level) }}</div>
                </div>

                <div class="d-flex my-1">
                    <div class="flex-grow-1">Experience: </div>
                    <div>{{ $user->mentor->experience }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
