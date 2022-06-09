@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Private</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($builds as $build)
                <tr>
                    <th scope="row">{{ $build->id }}</th>
                    <td>{{ $build->name }}</td>
                    <td>{{ $build->is_private }}</td>
                    <td><a href="{{ route('builder.show', $build) }}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
