@extends('layout.layout')

@section('content')
    <a href=" {{ route('show.group', ['name' => $groupName]) }}" wire:navigate class="text-decoration-none text-black">
        <div class="col-lg-3 bg-light d-flex flex-column text-center align-items-center rounded-3 mx-auto mt-5" role="button" style="width: 300px; height: 100%;" onclick="redirectToPage('{{ $groupName }}')">
            <img 
                src="{{ $imageUrl ?? '' }}"
                alt="Group Picture" 
                class="mt-4 img-fluid text-center object-fit-cover rounded"
                style="width: 100px; height: 100px;"
            />
            <span class='my-3 fs-5 fw-bold'>{{ $groupName }}</span>
        </div>
    </a>
@endsection