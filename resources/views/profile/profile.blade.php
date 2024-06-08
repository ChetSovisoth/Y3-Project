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
                    @livewire('follow.followers-count', ['followersCount', 'followers', 'followingsCount', 'followings'])
                    @livewire('follow.followings-count', ['followingsCount', 'followings', 'followersCount', 'followers'])
                </div>

                <div class="d-flex flex-column align-items-end">
                    @if ($user->role !== 'admin')
                        <a class="btn btn-outline-light rounded-5 px-4 py-2 mb-2" type="button"
                            href='{{ route('profile.edit') }}' wire:navigate>Edit Profile</a>
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
@endsection

<!-- Modal -->
<div class="modal fade" id="followers" tabindex="-1" aria-labelledby="followersModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="followersModal">Followers</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($followersCount !== 0)
                    @foreach ($followers as $follower)
                        <div class="d-flex my-3">
                            <a href="{{ route('show.user.profile', ['name' => $follower->name, 'uuid' => $follower->uuid]) }}"
                                wire:navigate class="text-decoration-none" style="color: inherit">
                                <img src="{{ (new App\Models\User())->getProfilePictureByAvatar($follower->avatar) }}"
                                    alt="profile-picture" class="rounded-circle mx-3 "
                                    style="width: 75px; height: 75px; object-fit: cover;">
                            </a>
                            <div class="d-flex flex-column justify-content-center flex-grow-1">
                                <a href="{{ route('show.user.profile', ['name' => $follower->name, 'uuid' => $follower->uuid]) }}"
                                    wire:navigate class="text-decoration-none" style="color: inherit">
                                    <h5 class="m-0">{{ $follower->name }}</h5>
                                </a>
                                @if ($follower->role === 'student')
                                    <p class="m-0">{{ $follower->student->field_of_study }}</p>
                                @else
                                    <p class="m-0">{{ $follower->mentor->area_of_expertise }}</p>
                                @endif
                                <p>{{ ucfirst($follower->role) }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                @livewire('follow.is-following', ['userId' => $follower->id])
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>You have not follower</div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="followings" tabindex="-1" aria-labelledby="followingsModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="followingsModal">Followings</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($followingsCount !== 0)
                    @foreach ($followings as $following)
                        <div class="d-flex my-3">
                            <a href="{{ route('show.user.profile', ['name' => $follower->name, 'uuid' => $follower->uuid]) }}"
                                wire:navigate class="text-decoration-none" style="color: inherit">
                                <img src="{{ (new App\Models\User())->getProfilePictureByAvatar($following->followable->avatar) }}"
                                    alt="profile-picture" class="rounded-circle mx-3 "
                                    style="width: 75px; height: 75px; object-fit: cover;">
                            </a>
                            <div class="d-flex flex-column justify-content-center flex-grow-1">
                                <a href="{{ route('show.user.profile', ['name' => $follower->name, 'uuid' => $follower->uuid]) }}"
                                    wire:navigate class="text-decoration-none" style="color: inherit">
                                    <h5 class="m-0">{{ $following->followable->name }}</h5>
                                </a>
                                @if ($following->followable->role === 'student')
                                    <p class="m-0">{{ $following->followable->student->field_of_study }}</p>
                                @else
                                    <p class="m-0">{{ $following->followable->mentor->area_of_expertise }}</p>
                                @endif
                                <p>{{ ucfirst($following->followable->role) }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                @livewire('follow.is-following', ['userId' => $following->followable->id])
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>You have not following</div>
                @endif
            </div>
        </div>
    </div>
</div>