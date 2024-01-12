<section class="product-detail-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>

                <div class="banner-wrapper-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="our-story-wrap">
                                <h1>{!!$about->title!!}</h1>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="our-story-img-wrap">
                                <img src="{{asset('frontend')}}/assets/images/our-story-1.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3">
                    <div class="our-story-lists-wrap">
                        <div class="our-story-lists-img">
                            <div class="our-story-lists-inner">
                                <img src="{{asset('frontend/assets/images/icon1.svg')}}" alt="{!!$about->about_title1!!}" />
                            </div>
                        </div>
                        <h2> {!!$about->about1!!}</h2>
                        <p>{!!$about->about_title1!!}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="our-story-lists-wrap">
                        <div class="our-story-lists-img">
                            <div class="our-story-lists-inner">
                                <img src="{{asset('frontend/assets/images/icon1.svg')}}" alt="{!!$about->about_title2!!}" />
                            </div>
                        </div>
                        <h2> {!!$about->about2!!}</h2>
                        <p>{!!$about->about_title2!!}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="our-story-lists-wrap">
                        <div class="our-story-lists-img">
                            <div class="our-story-lists-inner">
                                <img src="{{asset('frontend/assets/images/icon1.svg')}}" alt="{!!$about->about_title3!!}" />
                            </div>
                        </div>
                        <h2> {!!$about->about3!!}</h2>
                        <p>{!!$about->about_title3!!}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="our-story-lists-wrap">
                        <div class="our-story-lists-img">
                            <div class="our-story-lists-inner">
                                <img src="{{asset('frontend/assets/images/icon1.svg')}}" alt="{!!$about->about_title4!!}" />
                            </div>
                        </div>
                        <h2> {!!$about->about4!!}</h2>
                        <p>{!!$about->about_title4!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
