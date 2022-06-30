@extends('layouts.app')

@section('content')
    @livewire('builder-nav', ['build' => $build])

    @livewire('builder', ['build' => $build])
@endsection
