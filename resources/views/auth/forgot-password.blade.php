@extends('auth.layouts.master')
@section('content')
<div class="col-xl-5 col-lg-7">
    <form action="{{ route('password.email') }}" method="POST" >
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-title">
                    <h1>Forgot Password</h1>
                    <p>Enter the email you use for <span>Vocaal<span>4</span>local's</span> , and we'll help you create a new password.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Enter your email" />
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="f-btn">Send</button>
            </div>
            <div class="col-lg-12">
                <div class="bottom-link">
                    <p><a href="{{route('login')}}">Back to login</a></p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
