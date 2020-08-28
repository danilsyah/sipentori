@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="auth-content">
    <div class="card o-hidden">
        <div class="row">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="auth-logo text-center mb-4">
                        <img src="{{ url('backend/assets/images/logo.png') }}" alt="">
                    </div>
                    <h1 class="mb-3 text-18">Sign In</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email"
                                class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                type="email" name="email" value="{{ old('email') }}" aria-describedat="emailHelp"
                                autofocus required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password"
                                class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                type="password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="checkbox checkbox-danger">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Remember Me</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>

                    </form>

                    <div class="mt-3 text-center">
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-muted"><u>Forgot Password?</u></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center "
                style="background-size: cover;background-image: url({{ url('backend/assets/images/photo-long-3.jpg') }})">
                <div class="pr-3 auth-right">
                    <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text"
                        href="{{ route('register') }}">
                        <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                    </a>
                    <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text">
                        <i class="i-Google-Plus"></i> Sign up with Google
                    </a>
                    <a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook">
                        <i class="i-Facebook-2"></i> Sign up with Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
