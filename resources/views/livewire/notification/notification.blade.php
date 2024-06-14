<div class="dropdown">
    <a class="nav-link text-white" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="bi bi-bell"></i>
        @if ($notificationCount !== 0)
            <span class="translate-middle badge rounded-pill bg-danger"
                style="font-size: 10px;" id="notificationCount">{{ $notificationCount }}
            </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-light dropdown-menu-end p-3 w-auto" aria-labelledby="navbarDropdownMenuLink" id="notificationsDropdown">
        <div class="d-flex">
            <h3 class="flex-grow-1">Notifications</h3>
            <a wire:click.prevent="markAsRead" class="text-black text-center align-self-center mb-2" type="button" id="markAsReadbutton">Mark as read</a>
        </div>
        <ul class="nav-item p-0" style="width: 300px">
            @if (!empty($notifications))
                @foreach ($notifications as $notification)
                    <li class="nav-link p-0">
                        @if ($notification->type === 'App\Notifications\FollowNotification')
                            <div class="d-flex my-3 p-2">
                                <a href="{{ route('show.user.profile', ['name' => $notification->data['follower_name'], 'uuid' => $notification->data['follower_uuid']]) }}" 
                                    wire:navigate.prevent class="text-decoration-none" style="color: inherit">
                                    <img src="{{ (new App\Models\User())->getProfilePictureByAvatar($notification->data['follower_avatar']) }}"
                                        alt="profile-picture" class="rounded-circle me-3 "
                                    style="width: 50px; height: 50px; object-fit: cover;" >
                                </a>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="m-0">
                                        <a href="{{ route('show.user.profile', ['name' => $notification->data['follower_name'], 'uuid' => $notification->data['follower_uuid']]) }}" 
                                            wire:navigate.prevent class="text-decoration-none fw-bold" style="color: inherit">
                                            {{ $notification->data['follower_name'] }}
                                        </a>
                                        <span>followed you.</span>
                                    </h6>
                                
                                    <span class="{{ is_null($notification->read_at) ? 'text-primary' : ''}}">{{ $notification->time_ago }}</span>
                                </div>
                            </div>
                        @elseif ($notification->type === 'App\Notifications\JoinGroupNotification')
                            <div class="d-flex my-3 p-2">
                                <a href="{{ route('show.user.profile', ['name' => $notification->data['follower_name'], 'uuid' => $notification->data['follower_uuid']]) }}" 
                                    wire:navigate.prevent class="text-decoration-none" style="color: inherit">
                                    <img src="{{ (new App\Models\User())->getProfilePictureByAvatar($notification->data['follower_avatar']) }}"
                                        alt="profile-picture" class="rounded-circle me-3 "
                                    style="width: 50px; height: 50px; object-fit: cover;" >
                                </a>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="m-0">
                                        <a href="{{ route('show.user.profile', ['name' => $notification->data['follower_name'], 'uuid' => $notification->data['follower_uuid']]) }}" 
                                            wire:navigate.prevent class="text-decoration-none fw-bold" style="color: inherit">
                                            {{ $notification->data['follower_name'] }}
                                        </a>
                                        <span>joined
                                            <a href="{{ route('show.group', ['name' =>  $notification->data['group_name'], 'uuid' => $notification->data['group_uuid']]) }}" 
                                                class="text-decoration-none fw-bold" style="color: inherit;">{{ $notification->data['group_name'] }}.
                                            </a>
                                        </span>
                                    </h6>
                                
                                    <span class="{{ is_null($notification->read_at) ? 'text-primary' : ''}}">{{ $notification->time_ago }}</span>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
            @else
                <li class="nav-link p-0">No notifications yet.</li>
            @endif
        </ul>
    </div>
</div>
