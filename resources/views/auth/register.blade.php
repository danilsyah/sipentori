@extends('layouts.app')
@section('title','Register')

@section('content')
<div class="auth-content">
    <div class="card o-hidden">
        <div class="row">
            <div class="col-md-6 text-center "
                style="background-size: cover;background-image: url({{ url('backend/assets/images/photo-long-3.jpg') }})">
                <div class="pl-3 auth-right">
                    <div class="auth-logo text-center mt-4">
                        <img src="{{ url('backend/assets/images/logo.png') }}" alt="">
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="w-100 mb-4">
                        <a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="{{ route('login') }}">
                            <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                        </a>
                        <a class="btn btn-outline-google btn-block btn-icon-text btn-rounded">
                            <i class="i-Google-Plus"></i> Sign in with Google
                        </a>
                        <a class="btn btn-outline-facebook btn-block btn-icon-text btn-rounded">
                            <i class="i-Facebook-2"></i> Sign in with Facebook
                        </a>
                    </div>
                    <div class="flex-grow-1"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4">

                    <h1 class="mb-3 text-18">Sign Up</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Your name</label>
                            <input id="username"
                                class="form-control form-control-rounded @error('name') is-invalid @enderror"
                                type="text" value="{{ old('name') }}" name="name" required autocomplete="name"
                                autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" name="email"
                                class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                type="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password"
                                class="form-control form-control-rounded  @error('password') is-invalid @enderror"
                                type="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="repassword">Retype password</label>
                            <input id="repassword" class="form-control form-control-rounded" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
