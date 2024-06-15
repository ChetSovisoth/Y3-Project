<div class="card mt-4">
    <div class="card-header w-100">
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
            <a href="{{ route('group.detail', ['name' => $name, 'uuid' => $uuid]) }}" class="text-decoration-none text-black d-flex">
                <div class="flex-grow-1">
                    <img src="{{ (new App\Models\Group())->getGroupPhotoByPhoto($photo) }}" alt="profile-picture" class="rounded-circle mx-3 " style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div class="align-self-center">
                    {{ $name }}
                </div>
            </a>
        @else
            <div class="d-flex">
                <div class="flex-grow-1">
                    <img src="{{ (new App\Models\Group())->getGroupPhotoByPhoto($photo) }}" alt="profile-picture" class="rounded-circle mx-3 " style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div class="align-self-center">
                    {{ $name }}
                </div>
            </div>
        @endif
    </div>
    <div class="card-body">
        <h5 class="card-title">Group Code: {{ $code }}</h5>
        <p class="card-text">Description: {{ $description }}</p>
    </div>
</div>