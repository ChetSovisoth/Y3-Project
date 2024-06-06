<div>
    @if ($isFollowing)
        @livewire('follow.unfollow', ['userId' => $userId])
    @else
        @livewire('follow.follow', ['userId' => $userId])
    @endif
</div>
