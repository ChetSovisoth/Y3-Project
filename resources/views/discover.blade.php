@extends('layout.layout')

@section('content')
    <div>
        <h3 class="ms-5 text-white">Discover our list of mentor</h3>
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="w-75 rounded-3 p-2 mb-2">
                @foreach ($users as $user)
                    <a href="{{ route('mentor.profile', [$user->name,  $user->uuid]) }}" class="text-decoration-none" style="color: inherit;" wire:navigate>
                        <div class="m-3 d-flex flex-grow-1 bg-dark-subtle my-3 py-3 rounded-3">
                            <!-- Profile Picture -->
                            <img src={{ (new App\Models\User())->getProfilePictureByAvatar($user->avatar) }}
                                alt="profile-picture" class="rounded-circle mx-3 "
                                style="width: 75px; height: 75px; object-fit: cover;" />
                            <!-- User's Name -->
                            <div class="d-flex flex-column justify-content-center mx-3">
                                <h5 class="m-0 mb-2">{{ $user->name }}</h5>
                                <p class="m-0">{{ $user->mentor->area_of_expertise }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
