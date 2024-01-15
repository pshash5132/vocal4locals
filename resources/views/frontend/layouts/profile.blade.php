@extends('frontend.layouts.main')
@section('content')
<section class="main-tab-section mt-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">My Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="title">
                    <h1>My Account</h1>
                </div>
                <div class="tabs-container">
                    <nav>

                        <div class="nav nav-tabs flex-column mobile-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link  {{ count(request()->query()) == 0 ? 'active' : '' }}" id="nav-app-language-tab" data-bs-toggle="tab" data-bs-target="#nav-app-language" type="button" role="tab" aria-controls="nav-app-language" aria-selected="true">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/UserProfile.svg')}}" alt="User Profile" />
                                </div>
                                User Profile
                            </button>
                            <button class="nav-link {{ request()->query('address') ? 'active' : '' }}" id="nav-address-add-tab" data-bs-toggle="tab" data-bs-target="#nav-address-add" type="button" role="tab" aria-controls="nav-mobile-number" aria-selected="false">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/Address-Management.svg')}}" alt="Address Management" />
                                </div>
                                Address Add
                            </button>
                            <button class="nav-link" id="nav-mobile-number-tab" data-bs-toggle="tab" data-bs-target="#nav-mobile-number" type="button" role="tab" aria-controls="nav-mobile-number" aria-selected="false">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/Address-Management.svg')}}" alt="Address Management" />
                                </div>
                                Address Management
                            </button>
                            <button class="nav-link  {{ request()->query('change-password') ? 'active' : '' }}" id="nav-help-tab" data-bs-toggle="tab" data-bs-target="#nav-help" type="button" role="tab" aria-controls="nav-help" aria-selected="false">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/Change-Password.svg')}}" alt="Change Password" />
                                </div>
                                Change Password
                            </button>
                            <button class="nav-link" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="false">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/order.svg')}}" alt="My Orders" />
                                </div>
                                My Orders
                            </button>
                            <button class="nav-link {{ request()->query('wishlist') ? 'active' : '' }}" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/wishlist.svg')}}" alt="Wishlist" />
                                </div>
                                Wishlist
                            </button>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <button  onclick="event.preventDefault();
                            this.closest('form').submit();" class="nav-link" id="nav-privacy-tab" data-bs-toggle="tab" data-bs-target="#nav-privacy" type="button" role="tab" aria-controls="nav-privacy" aria-selected="false">
                                <div class="my-acc-icon">
                                    <img src="{{asset('/frontend/assets/images/Logout.svg')}}" alt="Logout" />
                                </div>
                                Logout
                            </button>
                        </form>
                        </div>
                    </nav>
                </div>
            </div>
            @include($page)
        </div>
    </div>
</section>

@endsection
