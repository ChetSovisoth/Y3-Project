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
                            <a href="{{ route('show.user.profile', ['name' => $follower->name, 'uuid' => $follower->uuid]) }}" wire:navigate class="text-decoration-none" style="color: inherit">
                                <img src="{{ (new App\Models\User())->getProfilePictureByAvatar($follower->avatar) }}"
                                    alt="profile-picture" class="rounded-circle mx-3 "
                                style="width: 75px; height: 75px; object-fit: cover;" >
                            </a>
                            <div class="d-flex flex-column justify-content-center flex-grow-1">
                                <a href="{{ route('show.user.profile', ['name' => $follower->name, 'uuid' => $follower->uuid]) }}" wire:navigate class="text-decoration-none" style="color: inherit">
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
                                @livewire('follow.is-following', ['userId' => $follower->id], key($follower->id))
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