<form action="{{ route('establishment.update', ['establishment' => $establishment]) }}" method="POST">
    @csrf
    @method('PUT')
    @include('establishment._form', ['btnText' => __('Submit')])
</form>
@extends('layouts.app')

@section('content')
@include('partials.messages')
<form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
    @csrf
    @method('PUT')
    @include('user._form')
</form>
@endsection