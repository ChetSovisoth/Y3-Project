@extends('layout.layout')

@section('content')
    <div class="container py-2">
        <div class="d-flex flex-column align-items-center mt-5 ">
            <div class="d-flex flex-row align-items-center w-100 justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="me-4">
                        <img src={{ $profile_picture }} alt="profile-picture" class="rounded-circle"
                            style="width: 150px; height: 150px; object-fit: cover;" />
                    </div>
                    <div class="text-light flex-grow-1">
                        <h5 style="font-size: 25px;">{{ $user->name }}</h5>
                        <p class="my-1", style="font-size: 13px;">{{ $user->email }}</p>
                        <p class="my-1", style="font-size: 13px;"> {{ ucfirst($user->role) }}</p>

                    </div>
                </div>

                <!-- Button trigger modal -->
                <div class=" ms-5 text-light flex-grow-1">
                    @livewire('follow.followers-count')
                    @livewire('follow.followings-count')
                </div>

                <div class="d-flex flex-column align-items-end">
                    @if ($user->role !== 'admin')
                        <a class="btn btn-outline-light rounded-5 px-4 py-2 mb-2" type="button"
                            href='{{ route('profile.edit') }}' wire:navigate.prevent>Edit Profile</a>
                    @endif
                    <button class="btn btn-danger rounded-5 px-4 py-2" type="button"
                        onclick="document.getElementById('logout-form').submit();">Log Out</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <hr class="text-white border-2 w-100 my-4" />
        @if ($user->role !== 'admin')
            <style>
                .custom-div {
                    height: 50px;
                    font-size: 20px;

                }
            </style>
            <div class="d-flex justify-content-center text-light px-5 gap-4 w-100 custom-div ">
                About
            </div>

            <div class="d-flex mt-2">
                <div class="w-25 text-white pe-3 border-end border-white", style="background-color:rgb(228, 228, 228);height: 400; border-radius: 10px;">
                    <span class="mx-3" style="font-size: 20px; color: black;">Bio:</span>
                    <div class="ms-2">
                        <p class="my-1", style="font-size: 13px;color: black;"> {{ $user->bio }}</p>

                    </div>
                </div>

                <span class="text-white ps-3"></span>
                @if ($user->role == 'mentor')
                    {{-- Mentor --}}
                    <div class="w-75 text-white mx-2"  style="background-color:rgb(228, 228, 228);height: 4  00; border-radius: 10px;">
                        <div class="d-flex my-1">
                            <div class="flex-grow-1 mx-3"  style="font-size: 15px;color: black;">Area of Expertise: </div>
                            <div  class="mx-3 text-end" style="font-size: 13px;color: black;">{{ $user->mentor->area_of_expertise }}</div>
                        </div>

                        <div class="d-flex my-2">
                            <div class="flex-grow-1 mx-3"  style="font-size: 15px;color: black;">Education Level: </div>
                            <div  class="mx-3 text-end" style="font-size: 13px;color: black;">{{ ucfirst($user->mentor->education_level) }}</div>
                        </div>

                        <div class="d-flex my-1">
                            <div class="flex-grow-1 mx-3"  style="font-size: 15px;color: black;">Experience: </div>
                            <div  class="mx-3 text-end" style="font-size: 13px;color: black;">{{ $user->mentor->experience }}</div>
                        </div>
                    </div>
                @elseif($user->role == 'student')
                    {{-- Student --}}
                    <div class="w-75 text-white mx-2" style="background-color:rgb(228, 228, 228);height: 4  00; border-radius: 10px;">
                        <div class="d-flex my-1">
                            <div class="flex-grow-1 mx-3", style="font-size: 15px;color: black;"> Institute:</div>
                            <div class="mx-3 text-end" style="font-size: 13px;color: black;">{{ $user->student->institute }}</div>
                        </div>

                        <div class="d-flex my-2">
                            <div class="flex-grow-1 mx-3", style="font-size: 15px;color: black;"> Field of Study:</div>
                            <div  class="mx-3 text-end" style="font-size: 13px;color: black;">{{ $user->student->field_of_study }}</div>
                        </div>

                        <div class="d-flex my-1">
                            
                            <div class="flex-grow-1 mx-3", style="font-size: 15px;color: black;">Academic Level: </div>
                            <div  class="mx-3 text-end" style="font-size: 13px;color: black;">{{ $user->student->academic_level }}</div>
                        </div>
                    </div>
                @endif

            </div>
        @endif
    </div>
    @livewire('follow.followers-list')
    @livewire('follow.followings-list')
@endsection
