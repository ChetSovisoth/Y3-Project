@extends('layout.layout')

@section('content')
<div class="container mt-5">
    <h1>Upload File for {{ $group->name }}</h1>
    <form action="{{ route('uploads.store', $group->uuid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection