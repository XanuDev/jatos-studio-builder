@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">{{ __('Dashboard') }}</h1>
<div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">{{ __('Users') }}</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">{{ $users_count }}</h1>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">{{ __('Total Projects') }}</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="tool"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">{{ $builds_count }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">{{ __('My Projects') }}</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="tool"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">{{ $my_builds_count }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-xxl-7 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Latest Projects') }}</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th class="d-none d-xl-table-cell">{{ __('Date') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th class="d-none d-md-table-cell">{{ __('Owner') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($builds as $build)
                    <tr>
                        <td>{{ $build->title }}</td>
                        <td class="d-none d-xl-table-cell">{{ $build->created_at }}</td>
                        @if ($build->is_private)
                        <td><span class="badge bg-danger">{{ __('Private') }}</span></td>
                        @else
                        <td><span class="badge bg-success">{{ __('Public') }}</span></td>
                        @endif
                        <td class="d-none d-md-table-cell">{{ $build->user->name }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection