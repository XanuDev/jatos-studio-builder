@extends('layouts.app')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        <h1 class="h2">{{ __('Jatos Audio Builder') }}</h1>
                        <p class="lead">
                            {{ __('Sign in to your account to continue') }}
                        </p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                {{-- <div class="text-center">
                                    <img src="img/avatars/avatar.jpg" alt="Charles Hall"
                                        class="img-fluid rounded-circle" width="132" height="132" />
                                </div> --}}
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            type="email" name="email" placeholder="Enter your email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Password') }}</label>
                                        <input
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            type="password" name="password" required autocomplete="current-password"
                                            placeholder="Enter your password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small>
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </small>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember-me"
                                                name="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="form-check-label">
                                                {{ __('Remember me next time') }}
                                            </span>
                                        </label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">{{ __('Sign in')
                                            }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection