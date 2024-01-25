{{-- profile section --}}
<div class="col-lg-9">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane app-lang-wrap fade {{ request()->query('profile') || count(request()->query()) == 0 ? 'show active' : '' }}" id="nav-app-language" role="tabpanel" aria-labelledby="nav-app-language-tab">
            <h2 class="ps-3">User Profile</h2>
            @include('frontend.profile.profile-edit')
        </div>

        <div class="tab-pane fade {{ request()->query('address') ? 'show active' : '' }}" id="nav-address-add" role="tabpanel" aria-labelledby="nav-address-add-tab">
            <h2 class="ps-3">Address Add</h2>
            @include('frontend.profile.address-add')
        </div>

        <div class="tab-pane fade {{ request()->query('address-manage') ? 'show active' : '' }}" id="nav-mobile-number" role="tabpanel" aria-labelledby="nav-mobile-number-tab">
            <h2 class="ps-3">Address Management</h2>
            @include('frontend.profile.address-manage')
        </div>

        <div class="tab-pane fade help-wrap {{ request()->query('change-password') ? 'show active' : '' }}" id="nav-help" role="tabpanel" aria-labelledby="nav-help-tab">
            <h2 class="ps-3">Change Password</h2>
           @include('frontend.profile.change-password')
        </div>
        <div class="tab-pane fade about-wrap" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            @include('frontend.profile.orders')

        </div>
        <div class="tab-pane fade Wishlist-wrap {{ request()->query('wishlist') ? 'show active' : '' }}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <h2 class="ps-3">Wishlist</h2>
            <div class="common-form-section cmn-bg-tab change-pass-wrap text-center">



                {{-- wishlist --}}
                @if(count($wishlists) > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table_cart product_detail_table">
                            <thead>
                              <tr class="table_cart--heading">
                                <th>Products Details</th>
                                <th>Variants</th>
                                <th>Price</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($wishlists as $wishlist)

                              <tr class="item-row">
                                <td >
                                    <a href="{{route('product-detail',$wishlist->product->slug)}}">
                                    <div class="products-detail-wrap">
                                        <div class="product-image-wrap">
                                            <img src="{{asset($wishlist->product->thumb_image)}}" alt="">
                                        </div>
                                        <div class="product-detail-list">
                                            <p class="p-14-dark"><span>{{$wishlist->product->name}}</span> </p>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                                <td>
                                @foreach ($wishlist->product->variants as $variant)
                                    <div class="text-start">{{$variant->name}} </div>
                                @endforeach
                                </td>
                                <td>
                                @foreach ($wishlist->product->variants as $variant)

                                    <div class="text-start">
                                        <span class="item_price d-block p-med-18" data-price="{{$variant->price}}">₹{{$variant->price}}</span>
                                        </div>
                                    @endforeach
                                </td>

                                <td> <a href="javascript:" class="js_remove_item removeWishlist" data-url="{{route('user.wishlist.delete', $wishlist->id)}}"><img src="{{asset('frontend')}}/assets/images/deletecon.svg" alt="Delete" /></a> </td>

                              </tr>
                              @endforeach



                            </tbody>
                        </table>

                    </div>
                </div>
                @endif
                {{-- wishlist --}}
                @if(count($wishlists) == 0)
                <img src="{{asset('frontend')}}/assets/images/heart.png" class="heart-image" alt="heart" />
                <h2>Your Wishlist is empty</h2>
                <p>You don't have any products in the wish list yet. You will get a lot of interesting products on our shop page. </p>
                <div class="text-center buttons-wrap submit-btn-wrap justify-content-center">
                    <button type="submit" class="g-btn f-btn mb-0">Continue Shopping</button>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@push('scripts')
@include('frontend.profile.js_profile')
@endpush
