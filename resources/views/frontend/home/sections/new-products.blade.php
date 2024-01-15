<section class="top-products-section popular-products-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title">
                    <h2>New Arrivals</h2>
                    <div class="view-all">
                        <a href="{{route('product-list')}}" class="view-all-text">View all <img src="{{asset('frontend')}}/assets/images/view-all-arrow.svg" alt="view-all-arrow" /></a>
                    </div>
                </div>
            </div>
            @foreach ($new_products  as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 col-xs-4">
                <div class="products-wrap">
                    <div class="products-wrap-img position-relative">

                        @if(checkDiscount($product))
                        <div class="discount-wrap"><p>-{{$product->variants[0]->discount_percent}}%</p></div>
                        @endif
                        <a href="{{route('product-detail',$product->slug)}}">
                            <img src="{{asset($product->thumb_image)}}" alt="Product" />
                        </a>
                        <div class="product-like-cart">
                            <button class="product-btn wishlist" data-id="{{$product->id}}"><img src="{{asset('frontend')}}/assets/images/like-white.svg" alt="Like" class="wishImg" /></button>
                            <button data-variantId="{{$product->variants[0]->id}}" class="product-btn addToCart"><img src="{{asset('frontend')}}/assets/images/cart-white.svg" alt="Cart" /></button>

                        </div>
                    </div>
                    <div class="products-detail">
                        <a href="#">
                            <h3>{{$product->name}}</h3>
                        </a>

                        <div class="products-price-rating">
                            @if(checkDiscount($product))
                            <p>₹{{$product->variants[0]->offer_price}} <del>₹{{$product->variants[0]->price}}</del></p>
                            @else
                            <p>₹{{$product->variants[0]->price}} </p>
                            @endif
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
    </div>
</section>
