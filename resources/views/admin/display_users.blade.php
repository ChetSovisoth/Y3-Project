@extends('layout.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">All Users</h1>
    {{-- <div>
        <div class="w-25 mt-4">
            @include('shared.search-bar')
        </div>
        <div class="align-self-end">
            <form action="" method="GET">6
                <div class="mb-3 d-inline-block me-3">
                    <label for="shift">Role:</label>
                    <select name="user_role" id="user_role" class="form-select">
                        <option value="" {{$roles == "" ? 'selected' : ''}}>All Roles</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{$role == $role ? 'selected' : ''}}>{{ ucfirst($role->role) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div> --}}
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
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="DELETE" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection