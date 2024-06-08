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
                            <a href="{{ route('show.user.profile', ['name' => $following->followable->name, 'uuid' => $following->followable->uuid]) }}" wire:navigate class="text-decoration-none" style="color: inherit">
                                <img src="{{ (new App\Models\User())->getProfilePictureByAvatar($following->followable->avatar) }}"
                                alt="profile-picture" class="rounded-circle mx-3"
                                style="width: 75px; height: 75px; object-fit: cover;">
                            </a>
                            <div class="d-flex flex-column justify-content-center flex-grow-1">
                                <a href="{{ route('show.user.profile', ['name' => $following->followable->name, 'uuid' => $following->followable->uuid]) }}" wire:navigate class="text-decoration-none" style="color: inherit">
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
                                @livewire('follow.is-following-from-following', ['userId' => $following->followable->id], key($following->followable->id))
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

<script>
    document.addEventListener('livewire:navigated', function () {
        var followingsModal = document.getElementById('followings');
        
        followingsModal.addEventListener('hide.bs.modal', function () {
            Livewire.dispatch('followingUpdated');
            Livewire.dispatch('followingUpdatedFollowing');
            Livewire.dispatch('followsUpdated');
            Livewire.dispatch('followerUpdated');
        });
    });
</script>
