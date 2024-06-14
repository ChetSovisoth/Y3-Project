@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Groups</h1>
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Group Name</th>
                    <th>Group Owner</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr class="text-center">
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ (new App\Models\User())::find($group->user_id)->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection