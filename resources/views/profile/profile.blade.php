@extends('layout.layout')

@section('content')
<div class="container py-5 my-5">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="d-flex flex-row align-items-center w-100 justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div class="me-4">
                    <img 
                        src={{ (new App\Models\User())->getProfilePicture() }}
                        alt="profile-picture"
                        class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover;"
                    />
                </div>
                <div class="text-light flex-grow-1">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p class="my-1">{{ Auth::user()->email }}</p>
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
    </div>
    <hr class="text-white border-2 w-100 my-4" />
    <div class="d-flex justify-content-center text-light px-5 gap-4 w-100">
        About
    </div>
    <div class="d-flex mt-2">
        <div class="w-25 text-white pe-3 border-end border-white">
            <span>Bio:</span>
            <div class="ms-2">
                {{ Auth::user()->bio }}
            </div>
        </div>
        <span class="text-white ps-3"></span>
        <div class="w-75">
            <!-- Content for the second div -->
        </div>
    </div>
    
</div>
@endsection





