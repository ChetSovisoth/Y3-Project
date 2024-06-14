<div class="d-none d-md-inline col-md-1 bg-light-gray sidebar" >
    <ul class="d-flex justify-content-center flex-column align-items-center p-0 text-white">
        <li class="nav-link text-primary my-2"><a href="{{ route('show.group', ['name' => $name, 'uuid' => $uuid]) }}" class="nav-link text-decoration-none" wire:navigate>General</a></li>
        <li class="nav-link text-primary my-2"><a href="{{ route('group.notes', ['name' => $name, 'uuid' => $uuid]) }}" class="nav-link text-decoration-none" wire:navigate>Notes</a></li>
        <li class="nav-link text-primary my-2"><a href="{{ route('group.uploads', ['name' => $name, 'uuid' => $uuid]) }}" class="nav-link text-decoration-none" wire:navigate>Upload</a></li>
    </ul>
</div>
