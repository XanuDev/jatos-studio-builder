@extends('layouts.app')

@section('content')
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">Users</h5>
        </div>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</th>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('builder.edit', $user) }}"><i class="align-middle text-primary"
                                    data-feather="edit"></i></a>
                            <a href="{{ route('builder.show', $user) }}"><i class="align-middle" data-feather="eye"></i></a>
                            <a href="{{ route('builder.destroy', $user) }}"><i class="align-middle text-danger"
                                    data-feather="trash-2"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
