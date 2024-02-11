<!-- footer -->
<footer>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="footer-wrap contact-us-wrap text-end">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <p>Phone</p>
                            <a href="tel:{{$company->mobile}}">{{$company->mobile}}</a>
                        </li>
                        <li>
                            <p>Website</p>
                            <a href="mailto:{{$company->website}}">{{$company->website}}</a>
                        </li>
                        <li>
                            <p>Email</p>
                            <a href="mailto:{{$company->email}}">{{$company->email}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-main text-center">
                    <a href="{{route('home')}}">
                        <img src="{{ asset('frontend') }}/assets/images/footer-logo.svg" alt="Logo" />
                    </a>
                    <p>
                        {{$company->footer_tag}}
                    </p>
                    <div class="social-media-wrap">
                        <ul>
                            <li><a href="{{$company->instagram}}"><img src="{{ asset('frontend') }}/assets/images/Insta.svg"
                                        alt="Insta" /></a></li>
                            <li><a href="{{$company->facebook}}"><img src="{{ asset('frontend') }}/assets/images/fb.svg"
                                        alt="Facebook" /></a></li>
                            <li><a href="{{$company->twitter}}"><img src="{{ asset('frontend') }}/assets/images/linkedin.svg"
                                        alt="Twiter" /></a></li>
                            <li><a href="{{$company->whatsapp}}"><img src="{{ asset('frontend') }}/assets/images/whatsapp.svg"
                                        alt="whatsapp" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-wrap">
                    <h2>Links</h2>
                    <ul class="footer-links">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About US</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="{{route('terms-and-conditions')}}">Terms & Conditions</a></li>
                        <li><a href="{{route('privacy-policy')}}">Privacy Notice</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2023 vocal4locals</p>
                    <div class="to-top"><img src="{{asset('frontend/assets/images/up-arrow.svg')}}" alt="Up Arrow" /></div>
                </div>
            </div>
        </div>
    </div>
</footer>
