
<link rel="stylesheet" href="https://unpkg.com/swiper@6.5.4/swiper-bundle.min.css">
    <section class="product-detail-section">
        <div class="container">
            <div class="row">
                <div class="row align-items-center listing-row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{$product->subCategory->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="product-detail-slider-main">
                            <div id="sync1" class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{asset($product->thumb_image)}}" alt="..."  alt="Image">
                                </div>
                                @foreach ($product->productImageGallery as $image)
                                <div class="item">
                                    <img src="{{asset($image->image)}}" alt="..."  class="Image">
                                </div>
                                @endforeach

                            </div>

                              <div id="sync2" class="owl-carousel owl-theme">
                                <div class="item">
                                    <div class="slider-btn">
                                        <img src="{{asset($product->thumb_image)}}" alt="..."  alt="Image">
                                    </div>
                                </div>
                                @foreach ($product->productImageGallery as $image)
                                <div class="item">
                                    <div class="slider-btn">
                                        <img src="{{asset($image->image)}}" alt="..."  class="Image">
                                    </div>
                                </div>
                                @endforeach

                              </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-detail-wrapper">
                            <h2>{{$product->name}}</h2>
                            <p class="p-reg-16">{{$product->short_description}}</p>
                            <div class="rating-wrapper-main rating-main-sec">
                                <div class="rating__stars">
                                    @php
                                    $avgRating = $product->reviews->avg('rating');
                                    $fullRating = round($avgRating);
                                    @endphp
                                    @for ($i = 1; $i <=5 ; $i++)
                                        @if ($i<= $fullRating)
                                            <img class="rating_img" src="{{asset('frontend')}}/assets/images/fill-star.svg" alt="Star" />
                                        @else
                                            <img class="rating_img" src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
                                        @endif
                                    @endfor

                                    ({{count($product->reviews)}})


                                </div>
                            </div>
                            <div class="product-prices-wrapper">
                                @if(checkDiscount($product))
                                <p class="p-primary-24 offerPrice">₹{{$product->variants[0]->offer_price}}</p>
                                <p class="p-light-24 regularPrice">₹{{$product->variants[0]->price}}</p>
                                <p class="p-green-24"><span class="discount">{{$product->variants[0]->discount_percent}}</span>% off</p>
                                @else
                                <p class="p-primary-24 regularPrice">₹{{$product->variants[0]->price}}</p>

                                @endif

                            </div>
                            <div class="size-main-wrapper">
                                <p>{{@$product->package->name}}</p>
                                <div class="select-size">
                                    <?php $i = 0; ?>
                                    @foreach ($product->variants as $variant)
                                    <div class="button variantBTN" data-id="{{$variant->id}}">
                                        <input type="radio" {{$i==0 ? "checked":""}} data-id="{{$variant->id}}" class="" name="variantItem">
                                        <label class="btn btn-default" for="XXS">{{$variant->name}}</label>
                                    </div>
                                    <?php $i++; ?>
                                    @endforeach

                                </div>
                            </div>
                            <input type="hidden" class="selectedVariant" value="{{$product->variants[0]->id}}">
                            <div class="text-center buttons-wrap submit-btn-wrap">
                                <button type="submit" class="g-btn f-btn border-btn mb-0 addToCart" data-variantId="{{$product->variants[0]->id}}">Add To Cart</button>
                                <a href="{{route('user.checkout')}}" class="g-btn f-btn mb-0 addToCart" data-variantId="{{$product->variants[0]->id}}">Buy Now</a>
                            </div>
                            <div class="free-main-text">
                                <p>Delivery before<span class="b-text-category"> {{getFormattedShippingTimeAttribute($product->expected_delivery_days)}} <span class="star">*</span></span></p>
                                {{-- <p>Category: <span class="b-text-category">{{$product->subCategory->category->name;}}</span> </p>
                                <p>Sub Category: <span class="b-text-category">{{$product->subCategory->name}}</span> </p> --}}
                                <p>Sold By: <span class="b-text-category">{{$product->brand->name}}</span> </p>
                            </div>
                        </div>
                        <div class="products-details-lists">
                            <h2>Products Details</h2>
                             {!!$product->long_description!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- {{dd($product->variants->toArray())}} --}}
    <!-- top-products-section -->
    <section class="top-products-section">
        @if (count($related_products)!=0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title">
                            <h2>Similar Products</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all">
                            <a href="#" class="view-all-text">View all <img src="{{asset('frontend')}}/assets/images/view-all-arrow.svg" alt="view-all-arrow" /></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="owl-carousel owl-theme similar-products-slider">
            {{-- {{dd($product->variant->price)}} --}}
            @foreach ($related_products as $product)
                <div class="item">
                    <div class="products-wrap">
                        <div class="products-wrap-img position-relative">
                            <div class="discount-wrap"><p>-{{calculateDiscountPercent($product->variants[0]->price,$product->variants[0]->offer_price)}}%</p></div>
                            <a href="{{route('product-detail',$product->slug)}}">
                                <img src="{{asset($product->thumb_image)}}" alt="Product" />
                            </a>
                            <div class="product-like-cart">
                                <a href="javascript:;" class="product-btn"><img src="{{asset('frontend')}}/assets/images/like-white.svg" alt="Like" /></a>
                                <a href="javascript:;" class="product-btn addToCart"  data-variantId="{{$product->variants[0]->id}}"><img src="{{asset('frontend')}}/assets/images/cart-white.svg" alt="Cart" /></a>
                            </div>
                        </div>
                        <div class="products-detail">
                            <a href="{{route('product-detail',$product->slug)}}">
                                <h3>{{$product->name}}</h3>
                            </a>
                            <div class="products-price-rating">
                                <p>₹{{$product->variants[0]->price}}</p>
                                <div class="rating-wrap">
                                    <a href="javascript:;">
                                        @php
                                        $avgRating = $product->reviews->avg('rating');
                                        $fullRating = round($avgRating);
                                        @endphp
                                        @for ($i = 1; $i <=5 ; $i++)
                                            @if ($i<= $fullRating)
                                                <img src="{{asset('frontend')}}/assets/images/fill-star.svg" alt="Star" />
                                            @else
                                                <img src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
                                            @endif
                                        @endfor

                                        ({{count($product->reviews)}})
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@push('scripts')
@include('frontend.product.js')
@endpush
