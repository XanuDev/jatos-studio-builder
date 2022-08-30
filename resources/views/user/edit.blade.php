@extends('layouts.app')

@section('content')
@include('partials.messages')
<form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
    @csrf
    @method('PUT')
    @include('user._form', ['title' => 'Update User', 'btn_text' => 'Update'])
</form>
@endsection