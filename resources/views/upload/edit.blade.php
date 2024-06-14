@extends('layout.layout')

@section('content')
<div class="container pt-4">
    <h1>Edit Upload</h1>
    <form action="{{ route('uploads.update', $upload->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $upload->title }}" required>
        </div>
        <div class="form-group">
            <label for="file">File (leave empty to keep existing file)</label>
            <input type="file" name="file" id="file" class="form-control">
            @if ($upload->file_path)
            <p>Current file: <a href="{{ route('uploads.download', $upload->id) }}" target="_blank">{{ basename($upload->file_path) }}</a></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection