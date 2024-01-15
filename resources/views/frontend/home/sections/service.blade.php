<!-- our-services-section -->
<section class="our-services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Services</h2>
            </div>
        </div>
    </div>
    <div class="{{ count($services) > 5 ? 'owl-carousel owl-theme our-services-slider':'owl-carousel owl-theme our-services-slider' }}">
        <div class="item">
            <a href="{{route('inquiry')}}">
                <div class="our-services-wrap text-center">
                    <div class="our-services-img">
                        <img src="{{asset('frontend')}}/assets/images/Travel.svg" alt="Travel" />
                    </div>
                    <p>Travel</p>
                </div>
            </a>
        </div>
        @foreach ($services as $service)
            <div class="item">
                <a href="{{route('service-detail',$service->slug)}}" class="our-services-slide-wrap">

                    <div class="our-services-wrap text-center">
                        <div class="our-services-img">
                            <img src="{{asset($service->image)}}" alt="Healing & Yoga" />
                        </div>
                        <p>{{$service->name}}</p>
                    </div>
                </a>
            </div>
        @endforeach


    </div>
</section>
