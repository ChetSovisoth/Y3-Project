@extends('layout.layout')

@section('content')
<div class="container pt-2">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="d-flex mb-4 bg-dark-subtle w-75 rounded-3 p-2">
                <!-- Profile Picture and Name Section -->
                <div class="me-3 d-flex flex-grow-1">
                    <!-- Profile Picture -->
                    <img 
                        src={{ $profile_picture }}
                        alt="profile-picture"
                        class="rounded-circle me-3"
                        style="width: 75px; height: 75px; object-fit: cover;"
                    />
                    <!-- User's Name -->
                    <div class="d-flex flex-column justify-content-center">
                        <h5 class="m-0">{{ $user->name }}</h5>
                        <p class="m-0">{{ $user->email }}</p>
                        @error('avatar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                
                @if ($profile_picture != '/storage/users-avatar/avatar.png')
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

        <div class="text-white w-75">
            <h3 class="text-start w-100 m-0">Profile Information</h3>
            <div>Details about the user's profile.</div>

            @if ($user->role == 'mentor')
            {{-- Mentor --}}
                <div class="my-3">
                    <form action="{{ route('profile.mentor.info.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex my-1">
                            <label for="area_of_expertise" class="flex-grow-1">Area of Expertise: </label>
                            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Area of Expertise" name="area_of_expertise" value="{{ $user->mentor->area_of_expertise ?? '' }}">
                        </div>
                        @error('area_of_expertise')
                            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror
                        
                        <div class="d-flex my-2">
                            <label for="education_level" class="flex-grow-1">Education Level: </label>
                            <select name="education_level" id="education_level" class="w-25 rounded-2 p-1">
                                @if(!isset($user->mentor) || !$user->mentor->education_level)
                                    <option selected disabled>Education Level</option>
                                @endif
                                @if(isset($user->mentor) && $user->mentor->education_level)
                                    <option value="{{ $user->mentor->education_level }}">{{ ucfirst($user->mentor->education_level) }}</option>
                                @endif
                                <option disabled>──────────</option>
                                <option value="bachelor">Bachelor</option>
                                <option value="master">Master</option>
                                <option value="phd">PhD</option>
                            </select>
                            
                        </div>
                        @error('education_level')
                            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror
                        
                        <div class="d-flex my-1">
                            <label for="experience" class="flex-grow-1">Experience: </label>
                            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Experience" name="experience" value="{{ $user->mentor->experience ?? '' }}">
                        </div>
                        @error('experience')
                            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror
                
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-outline-light">Save Changes</button>
                        </div>
                    </form>
                </div>
            @else
                {{-- Student --}}
                <div class="my-3">
                    <form action="{{ route('profile.student.info.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex my-1">
                            <label for="institute" class="flex-grow-1">Institute: </label>
                            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Institute" name="institute" value="{{ $user->student->institute ?? '' }}">
                        </div>
                        @error('institute')
                            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror


                        <div class="d-flex my-2">
                            <label for="field_of_study" class="flex-grow-1">Field of Study: </label>
                            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Field of Study" name="field_of_study" value="{{ $user->student->field_of_study ?? '' }}">
                        </div>
                        @error('field_of_study')
                            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror


                        <div class="d-flex my-1">
                            <label for="academic_level" class="flex-grow-1">Academic Level: </label>
                            <input type="text" class="w-25 rounded-2 border border-0 p-1" placeholder="Academic Level" name="academic_level" value="{{ $user->student->academic_level ?? '' }}">
                        </div>
                        @error('academic_level')
                            <div class="d-flex justify-content-end text-danger mt-1 mb-2">{{ $message }}</div>
                        @enderror
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-outline-light">Save Changes</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>

        <form action="{{ route('profile.bio.update') }}" method="POST" class="w-75" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="bio" class="form-label text-light">Bio</label>
                <textarea class="form-control bg-dark-subtle" id="bio" name="bio" rows="3" placeholder="Bio" style="resize: none;">{{ $user->bio }}</textarea>
                @error('bio')
                    <div class="text-danger mt-2">{{ $message }}</div>    
                @enderror
                <p class="text-white mt-2" style="font-size: 14px">Max: 256</p>
            </div>
        
            <div class="d-flex justify-content-end">
                <a type="submit" class="btn btn-outline-light">Save Changes</a>
            </div>
        </form>
    </div>
</div>
@endsection
