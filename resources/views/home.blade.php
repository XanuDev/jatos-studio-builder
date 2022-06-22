@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Users</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $users_count }}</h1>
                                <div class="mb-0">
                                    <span class="text-danger">
                                        <i class="mdi mdi-arrow-bottom-right"></i>
                                        -3.65%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Projects</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="tool"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $builds_count }}</h1>
                                <div class="mb-0">
                                    <span class="text-success">
                                        <i class="mdi mdi-arrow-bottom-right"></i>
                                        5.25%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">My Projects</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="tool"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $builds_count }}</h1>
                                <div class="mb-0">
                                    <span class="text-success">
                                        <i class="mdi mdi-arrow-bottom-right"></i>
                                        5.25%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Latest Projects</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Date</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Owner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($builds as $build)
                            <tr>
                                <td>{{ $build->title }}</td>
                                <td class="d-none d-xl-table-cell">{{ $build->created_at }}</td>
                                @if ($build->is_private)
                                    <td><span class="badge bg-danger">Private</span></td>
                                @else
                                    <td><span class="badge bg-success">Public</span></td>
                                @endif
                                <td class="d-none d-md-table-cell">
                                    @foreach ($build->users as $user)
                                        {{ $user->name }}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
