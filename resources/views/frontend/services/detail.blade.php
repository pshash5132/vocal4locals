<section class="product-detail-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12">
                    <div class="common-form-section cmn-bg-tab services-inquiry-wrap">
                        <h1>{{$services->name}}</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="conditioner-service-wrapper">
                        <h3>{{$services->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="service-detail-section">

    <div class="container">
        <div class="row">
            @foreach ($services->ServiceProducts as $product)

            <div class="col-lg-6 col-md-6">
                <div class="service-detail-wrap">
                    <div class="service-detail-img-wrap">
                        <img src="{{asset($product->image)}}" alt="Service" />
                    </div>
                    <div class="service-detail-content">
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->title}}</p>
                        <div class="price-wrap">
                            @if(checkDiscountService($product))
                            <p>₹{{$product->offer_price}} <del>₹{{$product->price}}</del><span> {{$product->discount_percent}}% off</span></p>
                            @else
                            <p>₹{{$product->price}} </p>
                            @endif

                        </div>
                        <div class="service-detail-wrapper">
                            {!!$product->detail!!}
                            <a href="{{route('service-inquiry',$product->slug)}}" class="cmn-btn">Inquiry</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>
