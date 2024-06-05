@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Students</h1>
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Email Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>{{ $user->email_verified_at !== null ? "Yes" : "No" }}</td>
                    <td>
                        <form action="{{ route('admin.ban.user', $user->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('POST')
                            <button class="btn btn-danger btn-sm">Ban</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection