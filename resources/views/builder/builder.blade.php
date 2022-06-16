@extends('layouts.app')

@section('content')
    <App project_id="{{ $build->id }}" project_name="{{ $build->name }}" project_file="{{ $build->zip_file }}" />
@endsection
