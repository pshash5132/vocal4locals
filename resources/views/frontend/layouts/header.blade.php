 <!-- header -->
 <header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{route('home')}}">
                      <img src="{{asset('frontend/assets/images/logo.svg')}}" alt="logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                          <a class="nav-link" href="{{route('inquiry')}}">Service Inquiry</a>
                        </li> --}}
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('collaborator')}}">Grow With Us</a>
                        </li>
                      </ul>
                    </div>
                    <div class="header-login-wrap">
                          <div class="login-wrap">
                              <a href="{{(Auth::check())?route('user.profile'):route('login')}}"><img src="{{asset('frontend')}}/assets/images/profile.svg" alt="Profile" />{{(Auth::check())?Auth::user()->name:'Login'}}</a>
                          </div>
                          <div class="link-cart-wrap">
                              <a href="{{route('cart-details')}}"><img src="{{asset('frontend')}}/assets/images/Cart.svg" alt="Cart" /></a>
                              <a href="{{ route('user.profile', ['wishlist' => true]) }}"><img src="{{asset('frontend')}}/assets/images/Like.svg" alt="Like" /></a>
                          </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


