@extends('layout.layout')

@section('content')

    <div class="p-4 d-flex justify-content-end me-5 mt-5">
        @if (Auth::user()->role === 'mentor')
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                <span>Create Group</span>
                <i class="fa fa-plus-circle ps-2"></i>
            </button>
        @else 
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#joinGroupModal">
                <span>Join Group</span>
                <i class="fa fa-plus-circle ps-2"></i>
            </button>
        @endif
    </div>
    <div class="container-fluid">
        @livewire('group.group-layout')
    </div>


    {{-- Modal --}}
    <div class="modal fade" id="createGroupModal" tabindex="-1" aria-labelledby="createGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createGroupModalLabel">Create Group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('group.create-group')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="joinGroupModal" tabindex="-1" aria-labelledby="joinGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="joinGroupModalLabel">Join Group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('group.join-group')
                </div>
            </div>
        </div>
    </div>
@endsection
