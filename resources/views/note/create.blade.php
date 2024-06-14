@extends('layout.layout')

@section('content')
<div class="container pt-4">
    <h1>Create Note for {{ $group->name }}</h1>
    <form action="{{ route('notes.store', $group->uuid) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection