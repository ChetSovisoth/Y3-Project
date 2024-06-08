<div>
    @if ($isFollowing)
        @livewire('follow.unfollow-from-following', ['userId' => $userId])
    @else
        @livewire('follow.follow-from-following', ['userId' => $userId])
    @endif
</div>
