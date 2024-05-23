@extends('layout.layout')

@section('content')
<div class="col-lg-3 bg-light d-flex flex-column text-center align-items-center rounded-3 mx-auto mt-5" role="button" style="width: 300px; height: 100%;" onclick="redirectToPage('{{ $groupName }}')">
    <img 
        src="{{ $imageUrl ?? '' }}"
        alt="Group Picture" 
        class="mt-4 img-fluid text-center object-fit-cover rounded"
        style="width: 100px; height: 100px;"
    />
    <span class='my-3 fs-5 fw-bold'>{{ $groupName }}</span>
</div>

<script>
    function redirectToPage(groupName) {
        // Replace 'your-url' with the actual URL you want to redirect to.
        // For example, '/groups/' + groupName to go to a group-specific page
        window.location.href = encodeURIComponent(groupName);
    }
</script>

@endsection