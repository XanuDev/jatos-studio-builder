@extends('layouts.app')

@section('content')
    <App project_id="{{ $build->id }}" project_name="{{ $build->name }}" />
@endsection
