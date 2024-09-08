@extends('auth.layouts.master')
@section('content')
    <div class="col-xl-5 col-lg-7">
        <form id="login_form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-title">
                        <p>Welcome</p>
                        <h1>Sign in</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                             autofocus placeholder="Enter your email" />
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group password-group">
                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                        <label for="">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" />



                    </div>
                </div>
                <div class="col-lg-12">
                    @if (Route::has('password.request'))
                    <div class="text-end">
                        <a href="{{ route('password.request') }}"class="fp-link">Forgot Password?</a>
                    </div>
                </a>
                @endif
            </div>
            <div class="col-lg-12">
                @if (Route::has('password.request'))
                    <div class="">
                       By continuing, I agree to the <a href="{{route('terms-and-conditions')}}">Terms & Conditions</a> & <a href="{{route('privacy-policy')}}">Privacy Policy</a>
                    </div>
                    
                @endif
            </div>
                <div class="col-lg-12">
                    <button class="f-btn">Sign In</button>
                </div>
                <div class="col-lg-12">
                    <div class="bottom-link">
                        <p>No Account? <a href="{{ route('register') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
