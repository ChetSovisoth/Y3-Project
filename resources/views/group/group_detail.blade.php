@extends('layout.layout')
@section('content')
<div class="row w-100">
    @include('group.group_sidebar')
    <div class="col-md-10 content">
        <div class="mt-4">
            <h1>Group Members:</h1>
            <div class="row">
                <div class="col-md-4 mb-4 w-75">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr class="text-center">
                                    @php
                                        $user = App\Models\User::find($member->followable->id);
                                    @endphp
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="align-self-center ms-4">
            <form action="{{ route('group.delete', ['name' => $name, 'uuid' => $uuid]) }}" method="POST" class="m-0">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this group?')">Delete Group</button>
            </form>
        </div>
    </div> 
</div>
@endsection
