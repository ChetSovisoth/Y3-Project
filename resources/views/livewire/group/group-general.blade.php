<div class="card mt-4">
    <div class="card-header w-100">
        <a href="{{ route('group.detail', ['name' => $name, 'uuid' => $uuid]) }}" class="text-decoration-none text-black d-flex">
            <div class="flex-grow-1">
                <img src="{{ (new App\Models\Group())->getGroupPhotoByPhoto($photo) }}" alt="profile-picture" class="rounded-circle mx-3 " style="width: 50px; height: 50px; object-fit: cover;">
            </div>
            <div class="align-self-center">
                {{ $name }}
            </div>

            <div class="align-self-center ms-4">
                <form action="{{ route('group.delete', ['name' => $name, 'uuid' => $uuid]) }}" method="POST" class="m-0">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
                </form>
            </div>
        </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Group Code: {{ $code }}</h5>
        <p class="card-text">Description: {{ $description }}</p>
    </div>
</div>