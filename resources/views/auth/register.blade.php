@extends('auth.layouts.master')
@section('content')
    <div class="col-xl-5 col-lg-7">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-title">
                        <p>Welcome</p>
                        <h1>Sign up</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus
                            autocomplete="name" class="form-control" placeholder="Enter your name" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Enter email" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group password-group">
                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                        <label for="">Password</label>
                        <input  id="password" name="password" type="password" placeholder="Password" class="form-control" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group password-group">
                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                        <label for="">Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Password" class="form-control" />
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (Route::has('password.request'))
                        <div class="">
                           By continuing, I agree to the <a href="{{route('terms-and-conditions')}}">Terms & Conditions</a> & <a href="{{route('privacy-policy')}}">Privacy Policy</a>
                        </div>
                        
                    @endif
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="f-btn">Sign Up</button>
                </div>
                <div class="col-lg-12">
                    <div class="bottom-link">
                        <p>Have an account? <a href="{{ route('login') }}">Sign in</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
