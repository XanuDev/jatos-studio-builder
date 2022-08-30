@extends('layouts.app')

@section('content')
@include('partials.messages')
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    @include('user._form', ['title' => 'New User', 'btn_text' => 'Create'])
</form>
@endsection