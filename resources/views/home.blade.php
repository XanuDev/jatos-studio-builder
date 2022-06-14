@extends('layouts.app')

@section('content')
    {{ __('Home') }}
    <br>
    {{ app()->getLocale() }}
@endsection
