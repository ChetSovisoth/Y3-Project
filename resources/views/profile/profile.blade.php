{{-- @extends('layout.layout')

@section('content')
<div class="container py-5 my-5">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="position-relative">
            <img 
                src={{'storage/users-avatar/' . Auth::user()->avatar }}
                alt="profile-picture"
                class="rounded-circle"
                style="width: 150px; height: 150px; object-fit: cover;"
            />
            <form id="profile-picture-form" action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data" class="position-absolute bottom-0 start-50 translate-middle-x w-100 text-center">
                @csrf
                <label for="profile-picture-input" class="btn btn-sm bg-light-subtle" style="cursor: pointer;">
                    Change
                </label>
                <input type="file" id="profile-picture-input" name="avatar" class="d-none" onchange="document.getElementById('profile-picture-form').submit();">
            </form>
        </div>
        <div class="text-light pt-4 text-center">
            <h5>{{ Auth::user()->name }}</h5>
        </div>
        <div class="text-light text-center">{{ ucfirst(Auth::user()->role) }}</div>
        <div class="d-flex justify-content-center m-4 gap-3">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <button class="btn btn-danger rounded-5" style="width: 100px;" type="button" onclick="document.getElementById('logout-form').submit();">Log Out</button>
        </div>
        <hr class="text-white border-2 w-100" />
        <div class="d-flex justify-content-start text-light px-5 gap-4 w-100">
            <div>About</div>
            <div><a href="{{ url('/group') }}" class="text-light text-decoration-none">Group</a></div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layout.layout')

@section('content')
<div class="container py-5 my-5">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="d-flex flex-row align-items-center w-100 justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div class="position-relative me-4">
                    <img 
                        src={{ (new App\Models\User())->getProfilePicture() }}
                        alt="profile-picture"
                        class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover;"
                    />
                    <form id="profile-picture-form" action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data" class="position-absolute bottom-0 start-50 translate-middle-x w-100 text-center">
                        @csrf
                        <label for="profile-picture-input" class="btn btn-sm bg-light-subtle" style="cursor: pointer;">
                            Change
                        </label>
                        <input type="file" id="profile-picture-input" name="avatar" class="d-none" onchange="document.getElementById('profile-picture-form').submit();">
                    </form>
                </div>
                <div class="text-light flex-grow-1">
                    <h5>{{ Auth::user()->name }}</h5>
                    <div>{{ ucfirst(Auth::user()->role) }}</div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-end">
                <a class="btn btn-outline-light rounded-5 px-4 py-2 mb-2" type="button" href='{{ route('profile.edit') }}' wire:navigate>Edit Profile</a>
                <button class="btn btn-danger rounded-5 px-4 py-2" type="button" onclick="document.getElementById('logout-form').submit();">Log Out</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <hr class="text-white border-2 w-100 my-4" />
        <div class="d-flex justify-content-center text-light px-5 gap-4 w-100">
            <div>About</div>
            <div><a href="{{ url('/group') }}" class="text-light text-decoration-none" wire:navigate>Group</a></div>
        </div>
    </div>
</div>
@endsection





