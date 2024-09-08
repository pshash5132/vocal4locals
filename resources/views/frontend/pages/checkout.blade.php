    <!-- cart section -->
    <section class="cart-section">
        <div class="container">
            <div class="row">
                <div class="row align-items-center listing-row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">My Account</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="billing-details-main">
                        <h1>Billing Details</h1>

                        <div class="billing-details-wrap">
                            <form>
                                @php
                                    $address_id = "";
                                @endphp
                            @if (!empty($addresses))

                            @foreach ($addresses as $address)

                            <div class="change-work-wrap">
                                <div class="change-wrap">

                                    <span>{{$address->address_type}}</span>
                                    @if ($address->is_default)
                                    @php
                                        $address_id = $address->id;
                                    @endphp
                                    <p class="tag">Default</p>

                                    @endif
                                    <div class="address-wrap checkbox-wrap">
                                        <input type="radio" class="address_select" data-val="{{$address->id}}" id="add{{$address->id}}" name="radio-group" {{$address->is_default==1?'checked':''}}>
                                        <label for="add{{$address->id}}">
                                            <p class="deliver-text">Deliver to: <span>{{$address->name}}</span> </p>
                                            <p class="reg-14-gray">
                                                {{$address->address}},{{$address->city}}
                                                {{$address->state}}, {{$address->postalcode}}
                                            </p>
                                        </label>
                                        <a data-bs-toggle="modal" data-bs-target="#myModal" data-url="{{route('user.user-address.show',$address->id)}}" href="#" type="button"  class="editAddress edit-address">Edit</a>
                                    </div>

                                </div>

                            </div>
                            @endforeach

                            @endif
                        </form>
                            <div class="common-form-section cmn-bg-tab new-shipping-wrap">
                                <h2>Add New Shipping Address</h2>
                                 @include('frontend.profile.address-add')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="billing-details-main order-summary-wrap">
                        <h2>Order Summary</h2>
                        <div class="billing-details-wrap">
                            <div class="table-wrap">
                                <table class="table mb-0">
                                    <tbody>
                                          @foreach($shipingMethods as $shipingMethod)
                                            @if($shipingMethod->type=== 'min_cost' && getCartTotal() >= $shipingMethod->min_cost)
                                                <tr class="alert" role="alert">
                                                    <td>
                                                        <div class="main-dis">
                                                            <input type="radio" name="shipping" class="shipping" value="{{$shipingMethod->id}}" data-val="{{$shipingMethod->cost}}"/>
                                                            <label for="">
                                                                <p class="light-text">{{$shipingMethod->name}} :</p>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main-dis main-dis-2">
                                                            <input type="radio" name="" />
                                                            <label for="">
                                                                <p class="dark-text">₹{{$shipingMethod->cost}}</p>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @elseif ($shipingMethod->type=== 'flat_cost')
                                                    <tr class="alert" role="alert">
                                                        <td>
                                                            <div class="main-dis">
                                                                <input type="radio" name="shipping" class="shipping" value="{{$shipingMethod->id}}" data-val="{{$shipingMethod->cost}}"/>
                                                                <label for="">
                                                                    <p class="light-text">{{$shipingMethod->name}} :</p>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main-dis main-dis-2">
                                                                <p class="dark-text">₹{{$shipingMethod->cost}}</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                        @endforeach

                                        @foreach ($cartItems as $cartItem)
                                        <tr class="alert" role="alert">
                                            <td>
                                                <div class="products-detail-wrap">
                                                    <div class="product-image-wrap">
                                                        <img src="{{asset($cartItem->options->image)}}" alt="">
                                                    </div>
                                                    <div class="product-detail-list">
                                                        <p class="p-14-dark">{{$cartItem->name}}</p>
                                                        <p class="p-14-dark">  <span>{{$cartItem->options->variant_name}}</span></p>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="product-price-wrap text-end qty-wrap">
                                                    <p class="dark-text">₹{{$cartItem->price}}</p>
                                                    <p class="p-14-dark"> <span class="span-title">Qty : </span>  <span> {{$cartItem->qty}} </span></p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr class="alert" role="alert">
                                            <td>
                                                <div class="main-dis">
                                                    <p class="light-text">Sub Total :</p>
                                                    <p class="light-text">Saving :</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="main-dis main-dis-2">
                                                    <p class="dark-text">₹{{getCartTotal()}}</p>
                                                    <p class="green-text">₹{{getMainCartDiscount()}}</p>
                                                </div>
                                            </td>
                                        </tr>

                                                <tr class="alert" role="alert">

                                                    <td>
                                                        <div class="main-dis">
                                                            <p class="light-text">Shipping :</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main-dis main-dis-2">
                                                            <p class="dark-text">₹<span id="shipping_fees">0</span></p>
                                                        </div>
                                                    </td>
                                                </tr>


                                        <tr class="alert" role="alert">
                                            <td>
                                                <div class="main-dis">
                                                    <p class="light-text">Grand Total :</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="main-dis main-dis-2">
                                                    <p class="dark-text">₹<span id="grandTotal" data-val="{{getMainCartTotal()}}">{{getMainCartTotal()}}</span></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="cards-main">
                                                    <img src="{{asset('frontend')}}/assets/images/payment.svg" alt="Payment" />
                                                    <img src="{{asset('frontend')}}/assets/images/payment-1.svg" alt="Payment" />
                                                    <img src="{{asset('frontend')}}/assets/images/payment-2.svg" alt="Payment" />
                                                    <img src="{{asset('frontend')}}/assets/images/payment-3.svg" alt="Payment" />
                                                    <img src="{{asset('frontend')}}/assets/images/payment-4.svg" alt="Payment" />
                                                </div>
                                                <div class="payment-wrapper">
                                                    <h3>Payment Method</h3>
                                                    <p>All transactions are secure and encrypted.</p>
                                                    <div class="checkbox-wrap text-center card-cod-wrap mb-2">
                                                        <div class="form-group">
                                                            <input type="radio" id="cod" name="radio-group" checked="">
                                                            <label for="cod">Cash on delivery</label>
                                                            <p>Pay with cash on delivery.</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="radio" id="c-card" name="radio-group">
                                                            <label for="c-card">Credit Card</label>
                                                            <p>We accept all major credit cards.</p>
                                                        </div>
                                                        <form method="post" id="checkOutForm">
                                                            <input type="hidden" name="shipping_method_id" id="shipping_method_id"/>
                                                            <input type="hidden" name="shipping_address_id" id="shipping_address_id" value="{{$address_id}}"/>
                                                            <input type="hidden" name="total_amount" id="total_amount" value="{{getMainCartTotal()}}"/>
                                                            <div class="text-center buttons-wrap w-100">
                                                                <button type="submit" id="SubmitCheckOutFrom" class="g-btn f-btn mb-0 w-100">Place Order</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="modal delete-address-model d-none order-confirmed-modal show" id="delete-address" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="common-form-section cmn-bg-tab order-confirmed-wrap">
                <div class="dlt-modal-wrap text-center">
                    <img src="./assets/images/confirmed.svg" alt="Order is Confirmed!">
                    <h2 class="border-0">Your Order is Confirmed!</h2>
                </div>
                <div class="text-center y-n-wrap buttons-wrap">
                    <button type="submit" class="g-btn f-btn mb-0">Continue Shopping</button>
                </div>
            </div>
        </div>
        </div>
    </div>

@push('scripts')
<script>

    $(".shipping").click(function(){
        $("#shipping_method_id").val($(this).val());
        $("#shipping_fees").html($(this).data('val'));
        var grandTotal = $("#grandTotal").data('val');
        var total = parseInt(grandTotal)+parseInt($(this).data('val'));
        console.log(total);
        console.log(parseInt($(this).val()));
        $("#grandTotal").html(total);
        $("#total_amount").val(total);
    })
    $(".address_select").click(function(){
        $("#shipping_address_id").val($(this).data('val'));

    })

    $("#SubmitCheckOutFrom").click(function(e){
        e.preventDefault();
        if($("#shipping_method_id").val()==""){
            toastr.error("Please select shipping method");
        }else
        if($("#shipping_address_id").val()==""){
            toastr.error("Please select shipping address");
        }else{
            $.ajax({
                url:"{{route('user.checkout.form-submit')}}",
                method:'POST',
                data:$("#checkOutForm").serialize(),
                success:function(res){
                    if(res.status=="success"){
                        window.location.href = res.redirect_url;
                    }
                }
            })
        }
    })
    </script>
@endpush
