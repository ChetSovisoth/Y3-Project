@extends('layout.layout')
@section('content')
<div class="row w-100">
    @include('group.group_sidebar')
    <div class="col-md-10 content">
        <div class="mt-4">
            <h1>Group Members:</h1>
            <div class="row">
                <div class="col-md-4 mb-4">
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
                                <td>{{ (new App\Models\User())::find($member->followable->id)->name }}</td>
                                <td>{{ (new App\Models\User())::find($member->followable->id)->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
