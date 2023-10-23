@extends('layouts.app')

@section('content')
    <div class="container login-text">
        <h1 class="font">Eat 'n Joy</h1>
        <img class="logo" src="{{ asset('assets/Logo.svg') }}" alt="Logo">
    </div>
    <div class="container main-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name"
                               class="col-md-4 text-center col-form-label text-md-end">{{ __('Leerlingnummer') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class=" form-input form-control py-2 rounded-5 @error('name') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="password"
                               class="col-md-4 text-center col-form-label text-md-center">{{ __('Wachtwoord') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-input form-control py-2 rounded-5 @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    {{--                           Remember me setting                                         --}}
                    {{--                            <div class="row mb-3">--}}
                    {{--                                <div class="col-md-6 offset-md-4">--}}
                    {{--                                    <div class="form-check">--}}
                    {{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                                        <label class="form-check-label" for="remember">--}}
                    {{--                                            {{ __('Remember Me') }}--}}
                    {{--                                        </label>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    <div class="row mb-0">
                        <div class=" login-btn-container col-md-8 offset-md-4">
                            <button id="login-btn" type="submit" class="btn btn-primary">
                                <img src="{{asset('assets/inloggen.svg')}}" alt="Log in button">
                                {{ __('Login') }}
                            </button>
                            {{--                                                Forgot password     --}}
                            {{--                                    @if (Route::has('password.request'))--}}
                            {{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--                                            {{ __('Forgot Your Password?') }}--}}
                            {{--                                        </a>--}}
                            {{--                                    @endif--}}

                        </div>
                        <div class="bottom-text">
                            <h2>Powered by</h2>
                            <div class="img-container">
                                <img class="footer-logo" src="{{asset('assets/rocLogo.png')}}" alt="Logo ROC Rivor">
                                <img class="footer-logo" src="{{asset('assets/logoMarkies.png')}}"
                                     alt="Log Markies Catering">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
