@extends('auth.layouts.master')
@section('content')
<div class="col-xl-5 col-lg-7">
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-title">
                    <h1>Thanks for signing up!</h1>
                    <p> Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="f-btn">Resend Varification Link</button>
                </div>

            </div>
    </form>
    <div class="row">
        <div class="col-lg-12">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="f-btn">Logout</button>
                    </div>
                </div>

        </form>
        </div>
    </div>
</div>
@endsection
{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
