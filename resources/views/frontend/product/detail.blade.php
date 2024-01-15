
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
                                    <input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
                                    <input id="rating-2" class="rating__input rating__input-2" type="radio" name="rating" value="2">
                                    <input id="rating-3" class="rating__input rating__input-3" type="radio" name="rating" value="3">
                                    <input id="rating-4" class="rating__input rating__input-4" type="radio" name="rating" value="4">
                                    <input id="rating-5" class="rating__input rating__input-5" type="radio" name="rating" value="5">
                                    <label class="rating__label" for="rating-1">
                                        <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                            <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1"></ellipse>
                                            <g class="rating__star-body-g">
                                                <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z"></path>
                                            </g>
                                        </svg>
                                        <span class="rating__sr">1 star</span>
                                    </label>
                                    <label class="rating__label" for="rating-2">
                                        <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                            <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1"></ellipse>
                                            <g class="rating__star-body-g">
                                                <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z"></path>
                                            </g>
                                        </svg>
                                        <span class="rating__sr">2 stars</span>
                                    </label>
                                    <label class="rating__label" for="rating-3">
                                        <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                            <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1"></ellipse>
                                            <g class="rating__star-body-g">
                                                <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z"></path>
                                            </g>
                                        </svg>
                                        <span class="rating__sr">3 stars</span>
                                    </label>
                                    <label class="rating__label" for="rating-4">
                                        <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                            <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1"></ellipse>
                                            <g class="rating__star-body-g">
                                                <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z"></path>
                                            </g>
                                        </svg>
                                        <span class="rating__sr">4 stars</span>
                                    </label>
                                    <label class="rating__label" for="rating-5">
                                        <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                            <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1"></ellipse>
                                            <g class="rating__star-body-g">
                                                <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z"></path>
                                            </g>
                                        </svg>
                                        <span class="rating__sr">5 stars</span>
                                    </label>
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
                                <p>Size:</p>
                                <div class="select-size">
                                    <?php $i = 0; ?>
                                    @foreach ($product->variants as $variant)
                                    <div class="button">
                                        <input type="radio" {{$i==0 ? "checked":""}} data-id="{{$variant->id}}" class="variantBTN" name="variantItem">
                                        <label class="btn btn-default" for="XXS">{{$variant->name}}</label>
                                    </div>
                                    <?php $i++; ?>
                                    @endforeach

                                </div>
                            </div>
                            <input type="hidden" class="selectedVariant" value="{{$product->variants[0]->id}}">
                            <div class="text-center buttons-wrap submit-btn-wrap">
                                <button type="submit" class="g-btn f-btn border-btn mb-0 addToCart" data-variantId="{{$product->variants[0]->id}}">Add To Cart</button>
                                <button type="submit" class="g-btn f-btn mb-0">Buy Now</button>
                            </div>
                            <div class="free-main-text">
                                <p>Free delivery before 31st July 2023 <span class="star">*</span></p>
                                <p>Category: <span class="b-text-category">{{$product->subCategory->category->name;}}</span> </p>
                                <p>Sub Category: <span class="b-text-category">{{$product->subCategory->name}}</span> </p>
                                <p>Brand: <span class="b-text-category">{{$product->brand->name}}</span> </p>
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
                                <a href="#" class="product-btn"><img src="{{asset('frontend')}}/assets/images/like-white.svg" alt="Like" /></a>
                                <a href="#" class="product-btn"><img src="{{asset('frontend')}}/assets/images/cart-white.svg" alt="Cart" /></a>
                            </div>
                        </div>
                        <div class="products-detail">
                            <a href="#">
                                <h3>{{$product->name}}</h3>
                            </a>
                            <div class="products-price-rating">
                                <p>₹{{$product->variants[0]->price}}</p>
                                <div class="rating-wrap">
                                    <a href="#">
                                        <img src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
                                        <img src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
                                        <img src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
                                        <img src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
                                        <img src="{{asset('frontend')}}/assets/images/star.svg" alt="Star" />
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
