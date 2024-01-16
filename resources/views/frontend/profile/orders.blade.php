<div class="row">
    <div class="col-lg-12 accordion" id="accordionExample">
        <div class="order-wrapper">
            <h2 class="ps-3">My Orders</h2>
            <div>
                <form action="">
                    <input type="text" class="form-control" />
                </form>
            </div>
        </div>
        @foreach ($orders as $order)
        @php
            $address = json_decode($order->order_address);
            $shipping = json_decode($order->shipping_method);
            $coupon = json_decode(@$order->coupon);

        @endphp

        <div class="my-order-wrap accordion-item common-form-section cmn-bg-tab">
            <div class="my-order-inner app-management">
                <div class="my-oreder-left">
                    <h3>Order no <span> : #{{$order->invoice_id}}</span></h3>
                    <p class="p-14-dark"> <span class="span-title"> Order Date </span> <span> : {{date('d F,Y', strtotime($order->created_at))}}</span></p>
                    {{-- <p class="p-14-dark"> <span class="span-title"> Delivery Date </span> <span> : 25 June 2023  </span> </p> --}}
                    <p class="p-14-dark"> <span class="span-title"> Order Status </span> <span class="green-semi-14"> : {{$order->order_status}}</span> </p>
                    <p class="p-14-dark"> <span class="span-title"> Payment Status </span> <span>: {{$order->payment_method}}</span> </p>
                </div>
                <div class="my-oreder-right">
                    <h3>{{@$address->name}}</h3>
                    <p class="p-14-dark"> {{@$address->address}}, {{@$address->city}} - {{@$address->postalcode}}</p>
                    <p class="p-14-dark">{{@$address->email}}</p>
                    <p class="p-14-dark">{{@$address->contact}}</p>
                </div>
            </div>
            <div class="total-item-wrap">
                <div class="total-item-left">
                    <p class="p-14-dark mb-0"> <span class="span-title">Total Items</span>  <span class="blue-text">: ({{count($order->orderProducts)}})</span></p>
                </div>
                <div class="total-item-right">
                    <div class="rate-wrap send-review" data-bs-toggle="modal" data-bs-target="#rate-text" data-id={{$order->id}}>
                        <div class="rating__stars">
                            <input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
                            <label class="rating__label" for="rating-1">
                                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                    <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1" />
                                    <g class="rating__star-body-g">
                                        <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z" />
                                    </g>
                                </svg>
                                <span class="rating__sr">1 star</span>
                            </label>
                        </div>
                        <p class="rate-text">Rate & Review</p>
                    </div>
                    <div class="acc-wrap accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne_{{$order->id}}" aria-expanded="true" aria-controls="collapseOne_{{$order->id}}">
                            Details
                        </button>
                    </div>
                </div>
            </div>
            <div class="rating-review-main-wrap excellent-wrapper">
                {{-- <div class="col-lg-12 rating-wrapper-main">
                    <h2>Rating</h2>
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
                    <span class="green-semi-14"> Excellent </span>
                </div>
                <p class="p-14-dark mb-0"> <span class="span-title"> Review </span> <span>: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s,</span>
                </p> --}}
            </div>
            @foreach ($order->orderProducts as $product)
            <div id="collapseOne_{{$order->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="table-wrap">
                        <table class="table">
                        <tbody>
                            <tr class="alert" role="alert">
                            <td>
                                <div class="products-detail-wrap">
                                    <div class="product-image-wrap">
                                        <img src="{{asset($product->product->thumb_image)}}" alt="" />
                                    </div>
                                    <div class="product-detail-list">
                                        <p class="p-14-dark">{{$product->product_name}} ({{$product->productVariant->name}})</p>

                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="product-price-wrap">
                                    <p class="dark-text">₹{{$product->unit_price}}</p>

                                </div>
                            </td>
                            <td class="delete-wrap">
                                <img src="{{asset('frontend')}}/assets/images/delete.png" alt="Delete" />
                            </td>
                            </tr>

                        </tbody>
                        </table>
                        <div class="tracking-wrap">
                            <h2>Tracking:</h2>
                            <div class="row justify-content-between order-wrap-main">
                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Order Placed</p>
                                </div>
                                <div class="order-tracking completed">
                                    <span class="inprogress"></span>
                                    <p>Inprogress</p>
                                </div>
                                <div class="order-tracking shipped-tracking">
                                    <span class="is-complete shipped"></span>
                                    <p>shipped</p>
                                </div>
                                <div class="order-tracking shipped-tracking">
                                    <span class="is-complete shipped"></span>
                                    <p>Delivered</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endforeach

    </div>
</div>

<div class="modal delete-address-model" id="rate-text">
    <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <h2>Rate this Product</h2>
        <div class="common-form-section cmn-bg-tab">
            <form class="py-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Enter/Select the product name</label>
                            <select name="" id="" class="form-control">
                                <option value="Gujarat">Enter/Select the product name</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Review the product</label>
                            <textarea name="" id="" rows="3" placeholder="Write a review the product" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 rating-wrapper-main">
                        <h2>Rating</h2>
                        <div class="rating__stars">
                            <input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
                            <input id="rating-2" class="rating__input rating__input-2" type="radio" name="rating" value="2">
                            <input id="rating-3" class="rating__input rating__input-3" type="radio" name="rating" value="3">
                            <input id="rating-4" class="rating__input rating__input-4" type="radio" name="rating" value="4">
                            <input id="rating-5" class="rating__input rating__input-5" type="radio" name="rating" value="5">
                            <label class="rating__label" for="rating-1">
                                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                    <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1" />
                                    <g class="rating__star-body-g">
                                        <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z" />
                                    </g>
                                </svg>
                                <span class="rating__sr">1 star</span>
                            </label>
                            <label class="rating__label" for="rating-2">
                                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                    <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1" />
                                    <g class="rating__star-body-g">
                                        <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z" />
                                    </g>
                                </svg>
                                <span class="rating__sr">2 stars</span>
                            </label>
                            <label class="rating__label" for="rating-3">
                                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                    <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1" />
                                    <g class="rating__star-body-g">
                                        <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z" />
                                    </g>
                                </svg>
                                <span class="rating__sr">3 stars</span>
                            </label>
                            <label class="rating__label" for="rating-4">
                                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                    <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1" />
                                    <g class="rating__star-body-g">
                                        <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z" />
                                    </g>
                                </svg>
                                <span class="rating__sr">4 stars</span>
                            </label>
                            <label class="rating__label" for="rating-5">
                                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                                    <ellipse class="rating__star-shadow" cx="16" cy="31" rx="16" ry="1" />
                                    <g class="rating__star-body-g">
                                        <path class="rating__star-body" d="M15.5,26.8l-8.2,4.3c-0.8,0.4-1.7-0.3-1.6-1.1l1.6-9.2c0.1-0.3-0.1-0.7-0.3-1l-6.7-6.5c-0.6-0.6-0.3-1.7,0.6-1.8l9.2-1.3c0.4-0.1,0.7-0.3,0.8-0.6L15,1.3c0.4-0.8,1.5-0.8,1.9,0l4.1,8.3c0.2,0.3,0.5,0.5,0.8,0.6l9.2,1.3c0.9,0.1,1.2,1.2,0.6,1.8L25,19.9c-0.3,0.2-0.4,0.6-0.3,1l1.6,9.2c0.2,0.9-0.8,1.5-1.6,1.1l-8.2-4.3C16.2,26.7,15.8,26.7,15.5,26.8z" />
                                    </g>
                                </svg>
                                <span class="rating__sr">5 stars</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="text-center buttons-wrap submit-btn-wrap">
                    <button type="submit" class="g-btn f-btn mb-0">Submit</button>
                    <button type="submit" class="g-btn f-btn border-btn mb-0">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
