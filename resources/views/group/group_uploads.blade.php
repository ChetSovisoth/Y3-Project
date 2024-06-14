@extends('layout.layout')

@section('content')
    <div class="row w-100">
        @include('group.group_sidebar')
        <div class="col-md-10 content ">
           @livewire('group.group-uploads')
        </div> 
    </div>
@endsection