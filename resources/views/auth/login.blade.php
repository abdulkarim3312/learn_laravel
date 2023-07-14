@section('frontEndTitle')
    {{ __('Login') }}
@endsection
@extends('frontend.layouts.master')

@section('content')

    <div class="container">

        <div class="banner d-flex login-banner">

            <div class="img-part mt-5 text-center" style="position: relative; color: red;">
                <img src="{{ asset('images/login_page.jpg') }}" alt="" width="700"
                     style="border-top-right-radius: 1px; ">
                <div style="position: absolute; top: 20px; left: 40px;">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('login') }}" class="text-decoration-none fs-3">
                                <span style="color: #0080CF; font-weight: 600;">
                                    Water Quality Testing & Report Management System
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-part">

                <h2>{{ __('Login') }}</h2>

                {{--<p>Sign in with your mobile number</p>--}}

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{--<input type="text" name="previous_url_define" value="{{ url()->previous() }}">--}}

                        <div class="row mt-2">
                        <span class="text-danger">
                            <b>{{ \Illuminate\Support\Facades\Session::get('phone_number') }}</b>
                        </span>

                            <label for="mobile" class="form-label">
                                <b>User Name</b>
                            </label>
                            <div class="full-name">
                                <img src="{{ asset('images/logoset/sms.svg') }}" alt="">
                                <input type="email" id="email" name="email" placeholder="Enter email address"
                                       required autofocus>
                                @error('email')
                                <span class="text-warning fa fa-warning">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="password" class="form-label">
                                <b>{{ __('Password') }}</b>
                            </label>
                            <div class="full-name">
                                <img src="{{ asset('images/logoset/lock.png') }}" alt="">
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="sign-button">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="bottom-part">
                        <p>Don’t have an account? <a href="{{ route('register') }}"> Register</a></p>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
