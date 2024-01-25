  <!-- listing section -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css" />

  <section class="listing-section">
    <div class="container">
        <div class="row align-items-center listing-row">
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ ($category->count() == 1 ? $category[0]->name :'All' )}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-5">
                <div class="search-wrap listing-search-wrap">
                    <form action="">
                        <input type="search" name="search" placeholder="Search" class="form-control" />
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="accordion" id="accordionStayOpen">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filter">
                                Filter
                            </button>
                        </h2>
                        <div id="filter" class="accordion-collapse">
                            <div class="accordion-body p-0">
                                <ul class="navbar-nav">
                                    @foreach ($subcaregories as $subcategory)

                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item catClick" href="{{ route('product-list',['subcategory' => $subcategory->slug])}}" data-bs-toggle="dropdown">
                                            {{$subcategory->name}}
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price">
                                price
                            </button>
                        </h2>

                        <div id="" class="accordion-collapse">
                            <div id="price-slider" class=""></div>
                            <div class="max-min-price-wrap">
                                <p class="min-price">₹<span id="min-price">0</span></p>
                                <p class="max-price">₹<span id="max-price">0</span></p>
                            </div>
                        </div>




                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#size">
                                Sort By Price
                            </button>
                        </h2>
                        <div id="size" class="accordion-collapse">
                            <div class="accordion-body select-size">
                                <div class="button">
                                    <input type="radio" id="lth" checked name="check-substitution-2" />
                                    <label class="btn btn-default" for="lth">Low to High</label>
                                </div>
                                <div class="button">
                                    <input type="radio" id="htl" name="check-substitution-2" />
                                    <label class="btn btn-default" for="htl">High to low</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="row" id="productsContainer">
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
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var priceSlider = document.getElementById('price-slider');
    var minPriceDisplay = document.getElementById('min-price');
    var maxPriceDisplay = document.getElementById('max-price');
    $.ajax({
        url: '{{route("get-min-max-prices")}}',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Initialize the slider with fetched min and max prices
            noUiSlider.create(priceSlider, {
                start: [data.minPrice, data.maxPrice],
                connect: true,
                range: {
                    'min': data.minPrice,
                    'max': data.maxPrice
                }
            });

            // Update the initial display values
            minPriceDisplay.innerHTML = data.minPrice;
            maxPriceDisplay.innerHTML = data.maxPrice;

            // Handle slider events
            priceSlider.noUiSlider.on('update', function (values, handle) {
                if (handle === 0) {
                    minPriceDisplay.innerHTML =   values[0];
                }
                if (handle === 1) {
                    maxPriceDisplay.innerHTML =  values[1];
                }
            });

            priceSlider.noUiSlider.on('change', function (values, handle) {
                // Handle the slider change event
                var existingUrl = window.location.href;
                var newRoute = 'get-products-by-price';
                var url = new URL(existingUrl);
                var searchParams = new URLSearchParams(url.search);
                url.pathname = '/' + newRoute;
                var separator = searchParams.toString() ? '&' : '?';

                // Update the URL with the modified route
                var updatedUrl = url.href;

                var minPrice = values[0];
                var maxPrice = values[1];
                var fullUrl = updatedUrl + separator+'min=' + minPrice + '&max=' + maxPrice;

                // Make an AJAX request to fetch products based on minPrice and maxPrice
                getProduct(fullUrl);
            });
        },
        error: function(error) {
            console.error('Error fetching min and max prices:', error);
        }
    });

    $('input[name="check-substitution-2"]').change(function () {
            var existingUrl = window.location.href;
            var newRoute = 'get-products-by-price';
            var url = new URL(existingUrl);
            var searchParams = new URLSearchParams(url.search);
            url.pathname = '/' + newRoute;
            var minPrice = $("#min-price").html();
            var maxPrice = $("#max-price").html();
            var separator = searchParams.toString() ? '&' : '?';

            // Update the URL with the modified route
            var updatedUrl = url.href;
            var sortOrder = $(this).attr('id') === 'lth' ? 'asc' : 'desc';
            var fullUrl = updatedUrl + separator +'sortOrder=' + sortOrder+'&min=' + minPrice + '&max=' + maxPrice;
            getProduct(fullUrl)
    })
    function getProduct(fullUrl){
        $.ajax({
            url: fullUrl,
            type: 'GET',
            success: function(html) {
                $('#productsContainer').html(html);
            },
            error: function(error) {
                console.error('Error fetching products:', error);
            }
        });
    }
});
</script>
@endpush
