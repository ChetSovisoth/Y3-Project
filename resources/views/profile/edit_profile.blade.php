@extends('layout.layout')

@section('content')
<div class="container py-5 my-5">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="d-flex mb-4">
                <img 
                        src={{ (new App\Models\User())->getProfilePicture() }}
                        alt="profile-picture"
                        class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover;"
                    />
                <form id="profile-picture-form" action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data" class="text-center mt-2">
                    @csrf
                    <div class="d-flex flex-column align-items-center">
                        <label for="profile-picture-input" class="btn btn-sm bg-light-subtle mb-2" style="cursor: pointer;">
                            Change Photo
                        </label>
                        <input type="file" id="profile-picture-input" name="avatar" class="d-none" onchange="document.getElementById('profile-picture-form').submit();">
                        <button type="button" class="btn btn-sm btn-danger">Remove Photo</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- {{ route('profile.update') }} --}}
        <form action="" method="POST" class="w-100" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="bio" class="form-label text-light">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3">{{ Auth::user()->bio }}</textarea>
            </div>
        
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-light">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
