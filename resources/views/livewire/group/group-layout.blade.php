<div class="row">
    @foreach ($groups as $group)
        @if (Auth::user()->role === 'mentor')
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mx-auto mt-3" style="width: 350px; height: 300px;">
                <a href="{{ route('show.group', ['name' => $group->name, 'uuid' => $group->uuid]) }}" wire:navigate.prevent class="text-decoration-none text-black">
                    <div class="bg-light d-flex flex-column text-center align-items-center rounded-3 p-3" role="button">
                        <img 
                            src={{ (new App\Models\Group())->getGroupPhotoByPhoto($group->photo) }}
                            alt="Group Picture"                      
                            class="img-fluid object-fit-cover"
                            style="width: 100px; height: 100px;"
                        />
                        <span class='my-3 fs-5 fw-bold'>{{ $group->name }}</span>
                    </div>
                </a>
            </div>     
        @else
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mx-auto mt-3" style="width: 350px; height: 300px;">
                <a href="{{ route('show.group', ['name' => $group->followable->name, 'uuid' => $group->followable->uuid]) }}" wire:navigate.prevent class="text-decoration-none text-black">
                    <div class="bg-light d-flex flex-column text-center align-items-center rounded-3 p-3" role="button">
                        <img 
                            src={{ (new App\Models\Group())->getGroupPhotoByPhoto($group->followable->photo) }}
                            alt="Group Picture" 
                            class="img-fluid object-fit-cover"
                            style="width: 100px; height: 100px;"
                        />
                        <span class='my-3 fs-5 fw-bold'>{{ $group->followable->name }}</span>
                    </div>
                </a>
            </div>    
        @endif
    @endforeach
</div>