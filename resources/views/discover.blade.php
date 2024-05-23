@extends('layout.layout')

@section('content')
    <div class="text-white">
        <h1>Mentor List</h1>
        @foreach($users as $user)
            <div>
                <div class="me-3 d-flex flex-grow-1">
                    <img 
                        src={{ (new App\Models\User)->getProfilePictureByAvatar($user->avatar) }}
                        alt="profile-picture"
                        class="rounded-circle me-3"
                        style="width: 75px; height: 75px; object-fit: cover;"
                    />
                    <div class="d-flex flex-column justify-content-center">
                        <h5 class="m-0">{{ $user->name }}</h5>
                        <p class="m-0">{{ $user->email }}</p>
                        @error('avatar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Role: {{ $user->role }}</p>
                <p>Bio: {{ $user->bio }}</p>
                <p>Expertise: {{ $user->mentor->area_of_expertise }}</p>
                <p>Experience: {{ $user->mentor->experience }}</p>
                <p>Education Level: {{ $user->mentor->education_level }}</p>
            </div>
        @endforeach
    </div>
@endsection