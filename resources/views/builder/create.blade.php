@extends('layouts.app')

@section('content')
<form action="{{ route('builder.store') }}" method="POST">
    @csrf

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ __('New project') }}</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group my-3">
                <label for="description">{{ __('Description') }}</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </div>

</form>
@endsection