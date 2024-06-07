<div class="d-flex bg-dark-subtle w-75 rounded-3 p-2 mb-2">
    <div class="me-3 d-flex flex-grow-1">
        <!-- Profile Picture -->
        <img src={{ $profile_picture }} alt="profile-picture" class="rounded-circle me-3"
            style="width: 75px; height: 75px; object-fit: cover;" />
        <!-- User's Name -->
        <div class="d-flex flex-column justify-content-center">
            <h5 class="m-0">{{ $name }}</h5>
            <p class="m-0">{{ $email }}</p>
            @error('avatar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Form for Profile Picture Upload -->
    <div class="d-flex justify-content-center align-items-center">
        <form id="profile-picture-form" action="{{ route('profile.picture.upload') }}" method="POST"
            enctype="multipart/form-data" class="align-self-center me-2">
            @csrf
            <label for="profile-picture-input" class="btn btn-sm bg-light-subtle mb-2 py-2" style="cursor: pointer;">
                Change Photo
            </label>
            <!-- File Input -->
            <input type="file" id="profile-picture-input" name="avatar" class="d-none"
                onchange="document.getElementById('profile-picture-form').submit();">
        </form>
        {{-- @livewire('profile-picture.update-profile-picture') --}}

        @if ($profile_picture != '/storage/users-avatar/avatar.png')
            @livewire('profile-picture.remove-profile-picture')
        @endif
    </div>

</div>
