@extends('layouts.app')

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __('New User') }}</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group my-3">
                    <label for="description">{{ __('email') }}</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group my-3">
                    <label for="password">{{ __('password') }}</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
            </div>
        </div>

    </form>
@endsection
