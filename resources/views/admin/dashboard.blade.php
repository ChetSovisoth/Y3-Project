@extends('layout.layout')

@section('content')
    <div class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 my-2 ms-5">Administrator Dashboard</h1>
                </div>

                <div class="row mb-3 d-flex justify-content-evenly">
                    <!-- Users Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('admin.display.users') }}" type="button" class="w-100 text-decoration-none" wire:navigate.prevent>
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <h4 class="text-xs font-weight-bold text-uppercase mb-1">Users</h4>
                                            <div class="fs-4 font-weight-bold ">
                                                {{ $totalUsers }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Mentors Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('admin.display.mentors') }}" type="button" class="w-100 text-decoration-none" wire:navigate.prevent>
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <h4 class="text-xs font-weight-bold text-uppercase mb-1">Mentors</h4>
                                            <div class="fs-4 font-weight-bold ">
                                                {{ $totalMentors }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-chalkboard-user fa-2x text-info-emphasis"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Students Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('admin.display.students') }}" type="button" class="w-100 text-decoration-none" wire:navigate.prevent>
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <h4 class="text-xs font-weight-bold text-uppercase mb-1">Students</h4>
                                            <div class="fs-4 font-weight-bold ">
                                                {{ $totalStudents }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-user fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Banned Users Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('admin.display.banned.users') }}" type="button" class="w-100 text-decoration-none" wire:navigate.prevent>
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <h4 class="text-xs font-weight-bold text-uppercase mb-1">Banned Users</h4>
                                            <div class="fs-4 font-weight-bold ">
                                                {{ $totalUsersBanned }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-ban fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
