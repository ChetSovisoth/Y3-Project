@extends('layout.layout')

@section('content')
<div class="container py-5 my-5">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="d-flex mb-4 bg-dark-subtle w-75 rounded-3 p-2">
                <!-- Profile Picture and Name Section -->
                <div class="me-3 d-flex flex-grow-1">
                    <!-- Profile Picture -->
                    <img 
                        src={{(new App\Models\User())->getProfilePicture() }}
                        alt="profile-picture"
                        class="rounded-circle me-3"
                        style="width: 75px; height: 75px; object-fit: cover;"
                    />
                    <!-- User's Name -->
                    <div class="d-flex flex-column justify-content-center">
                        <h5 class="m-0">{{ Auth::user()->name }}</h5>
                        <p class="m-0">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            
                <!-- Form for Profile Picture Upload -->
                <form id="profile-picture-form" action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data" class="align-self-center me-2">
                    @csrf
                    <label for="profile-picture-input" class="btn btn-sm bg-light-subtle mb-2 py-2" style="cursor: pointer;">
                        Change Photo
                    </label>
                    <!-- File Input -->
                    <input type="file" id="profile-picture-input" name="avatar" class="d-none" onchange="document.getElementById('profile-picture-form').submit();">
                </form> 
                
                @if (Auth::user()->avatar != 'avatar.png')
                    <form id="remove-profile-picture-form" action="{{ route('profile.picture.remove') }}" method="POST" class="align-self-center">
                        @csrf
                        @method('PUT')
                        <!-- Remove Photo Button -->
                        <button type="submit" class="btn btn-sm btn-danger mb-2 py-2">Remove Photo</button>
                    </form>       
                @endif
            </div>
        </div>

        <hr class="text-white border-2 w-75 my-4" />

        <form action="{{ route('profile.bio.update') }}" method="POST" class="w-75" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="bio" class="form-label text-light">Bio</label>
                <textarea class="form-control bg-dark-subtle" id="bio" name="bio" rows="3" placeholder="Bio" style="resize: none;">{{ Auth::user()->bio }}</textarea>
                @error('bio')
                    <div class="text-danger mt-2">{{ $message }}</div>    
                @enderror
                <p class="text-white mt-2" style="font-size: 14px">Max: 256</p>
            </div>
        
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-light">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
