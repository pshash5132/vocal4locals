@extends('auth.layouts.master')
@section('content')
<div class="col-xl-5 col-lg-7">
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-title">
                    <h1>Reset Password</h1>
                    <p>Choose a password that's hard to guess and unique to this account.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group password-group">

                    <label for="">Email</label>
                    <input readonly type="email" name="email" value="{{old('email', $request->email)}}" placeholder="Enter a new password" class="form-control" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group password-group">
                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    <label for="">Create New Password</label>
                    <input type="password" name="password" placeholder="Enter a new password" class="form-control" autocomplete="new-password" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group password-group">
                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" autocomplete="new-password" />
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="f-btn">Save</button>
            </div>
            <div class="col-lg-12">
                <div class="bottom-link text-center">
                    <p class="text-center mt-lg-4">Return to Vocaal4local's? <a href="{{route('login')}}">Back to login</a></p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
