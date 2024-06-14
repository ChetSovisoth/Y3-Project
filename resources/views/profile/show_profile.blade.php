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

                    <div class="d-flex align-items-end justify-content-center">
                        @livewire('follow.is-following', ['userId' => $user->id])
                        <a href="{{ route('user.chat.id', $user->id) }}" class="btn btn-secondary text-white text-decoration-none" style="color: inherit;" wire:navigate.prevent>
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
            @if ($user->role === 'mentor')
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
            @else
                <div class="w-75 text-white">
                    <div class="d-flex my-1">
                        <div class="flex-grow-1">Institute: </div>
                        <div>{{ $user->student->institute }}</div>
                    </div>

                    <div class="d-flex my-2">
                        <div class="flex-grow-1">Field of Study: </div>
                        <div>{{ $user->student->field_of_study }}</div>
                    </div>

                    <div class="d-flex my-1">
                        <div class="flex-grow-1">Academic Level: </div>
                        <div>{{ $user->student->academic_level }}</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
