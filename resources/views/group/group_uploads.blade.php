@extends('layout.layout')

@section('content')
<div class="row w-100">
    @include('group.group_sidebar')
    <div class="col-md-10 content pt-4">
        <h1>Uploads for {{ $group->name }}</h1>
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
            <a href="{{ route('uploads.create', $group->uuid) }}" class="btn btn-primary mb-3">Upload File</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uploads as $upload)
                <tr>
                    <td>{{ $upload->title }}</td>
                    <td><a href="{{ route('uploads.download', $upload->id) }}" target="_blank">Download File</a></td>
                    <td>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
                            <a href="{{ route('uploads.edit', $upload->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('uploads.destroy', $upload->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this upload?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection