@foreach ($products  as $product)
<div class="col-xl-4 col-lg-6 col-md-6 col-xs-4">
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
            <a href="{{route('product-detail',$product->slug)}}">
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
