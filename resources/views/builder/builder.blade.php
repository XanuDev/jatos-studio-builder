@extends('layouts.app')

@section('content')
    <App :project_id="{{ $build->id }}" />
@endsection
