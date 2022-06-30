@extends('layouts.app')

@section('content')
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">Projects</h5>
        </div>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="d-none d-xl-table-cell">Date</th>
                    <th>Visibility</th>
                    <th class="d-none d-md-table-cell">Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($builds as $build)
                    <tr>
                        <td>{{ $build->id }}</th>
                        <td>{{ $build->title }}</td>
                        <td class="d-none d-xl-table-cell">31/06/2021</td>
                        @if ($build->is_private)
                            <td><span class="badge bg-success">Public</span></td>
                        @else
                            <td><span class="badge bg-danger">Private</span></td>
                        @endif
                        <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        <td>
                            <a href="{{ route('builder.edit', $build) }}"><i class="align-middle text-primary"
                                    data-feather="edit"></i></a>
                            <a href="{{ route('builder.destroy', $build) }}"><i class="align-middle text-danger"
                                    data-feather="trash-2"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
