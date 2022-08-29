@extends('layouts.app')

@section('content')
@livewire('builder-nav', ['build' => $build])
@php
if(!isset($json)) $json = false;
@endphp
@livewire('builder', ['build' => $build, 'json' => $json])
@endsection