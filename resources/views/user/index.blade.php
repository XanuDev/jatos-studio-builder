@extends('layouts.app')

@section('content')
<div class="card flex-fill">
    <div class="card-header">
        <h5 class="card-title mb-0">{{ __('Users') }}</h5>
    </div>
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.edit', $user) }}"><i class="align-middle text-primary"
                            data-feather="edit"></i></a>
                    {{-- <a href="{{ route('user.show', $user) }}"><i class="align-middle" data-feather="eye"></i></a>
                    --}}
                    <a href="{{ route('user.destroy', $user) }}"><i class="align-middle text-danger"
                            data-feather="trash-2"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection