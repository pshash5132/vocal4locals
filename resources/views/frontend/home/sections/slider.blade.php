 <!-- banner-section -->
 <section class="banner-section">
    <div class="owl-carousel owl-theme banner-slider">
        @foreach ($sliders as $slider)


            <div class="item">
                <div class="banner-slider-wrap text-center">
                    <img src="{{$slider->banner}}" alt="Banne" />
                    <div class="banner-slider-content">
                        <h2>{!!$slider->type!!} </h2>
                        <h3>{!!$slider->title!!}</h3>
                        <p>{!!$slider->starting_price!!}</p>
                        <a href="{{$slider->btn_url}}" class="cmn-btn buy-now">Buy Now!</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- <div class="item">
            <a href="#">
                <div class="banner-slider-wrap text-center">
                    <img src="{{asset('frontend')}}/assets/images/Banne-1.png" alt="Banne" />
                </div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="banner-slider-wrap text-center">
                    <img src="{{asset('frontend')}}/assets/images/Banne-2.png" alt="Banne" />
                </div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="banner-slider-wrap text-center">
                    <img src="{{asset('frontend')}}/assets/images/Banne-3.png" alt="Banne" />
                </div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="banner-slider-wrap text-center">
                    <img src="{{asset('frontend')}}/assets/images/Banne-4.png" alt="Banne" />
                </div>
            </a>
        </div> --}}
    </div>
</section>
