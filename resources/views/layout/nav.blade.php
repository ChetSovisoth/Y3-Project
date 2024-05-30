<nav class="navbar navbar-expand-xl bg-black fixed-top navigation-bar">
    <div class="container-fluid text-white">
        <a class="navbar-brand mx-5 fw-bold fs-3 text-white" href="{{ url('/') }}" wire:navigate>Mentorship</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-4" id="navbarNavDropdown">
            <ul class="navbar-nav flex-grow-1 justify-content-end align-items-center">
                <div class=" d-flex align-items-center flex-column chat-user-container mx-3">
                    <input type="text" class="w-100 rounded-5 border-0 p-2 search-input" placeholder="Search" />
                    <div class="d-flex flex-column align-items-center w-100"
                        style="max-height: calc(100vh - 170px); overflow-y: auto;">
                    </div>
                </div>
                <li class="nav-item">
                    <a href="{{ url('/') }}" wire:navigate class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="{{ url('/contact') }}" wire:navigate class="nav-link text-white">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chat') }}" wire:navigate class="nav-link text-white">Chat</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="{{ route('group') }}" wire:navigate class="nav-link text-white">Group</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-bell"></i>
                            <span class="translate-middle badge rounded-pill bg-danger"
                                style="font-size: 10px;">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <!-- Your Notification List Blade Component or HTML Goes Here -->
                        </div>
                    </div>
                </li>
                <li class="nav-link mx-1">
                    @if (Route::has('login'))
                        <nav class="flex flex-1 justify-end">
                            @auth
                                <a href="{{ route('user.profile') }}" 
                                    wire:navigate
                                    class="text-decoration-none text-white rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    <i class="bi bi-person"></i></a>
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-decoration-none text-white rounded-md text-black pe-3 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-decoration-none text-white rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
