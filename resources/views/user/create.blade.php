@extends('layouts.app')

@section('content')
@include('partials.messages')
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    @include('user._form')
</form>
@endsection