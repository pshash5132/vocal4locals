<section class="cart-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table_cart product_detail_table">
                    <thead>
                      <tr class="table_cart--heading">
                        <th>Products Details</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        {{-- <th>Shipping</th> --}}
                        <th>Sub Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($cartItems as $cartItem)

                      <tr class="item-row">
                        <td >
                            <div class="products-detail-wrap">
                                <div class="product-image-wrap">
                                    <img src="{{asset($cartItem->options->image)}}" alt="">
                                </div>
                                <div class="product-detail-list">
                                    <p class="p-14-dark"><span>{{$cartItem->name}}</span> </p>
                                    <p class="p-14-dark"> <span>{{$cartItem->options->variant_name}}</span></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-start">
                                <span class="item_price d-block p-med-18" data-price="{{$cartItem->price}}">₹{{$cartItem->price}}</span>
                                <span class="item_price d-block price-off-text-g" data-price="{{$cartItem->options->discount_percent}}">{{$cartItem->options->discount_percent}}% off</span>
                            </div>
                        </td>
                        <td>
                            <div class="qty-wrap-main">
                                <input type="hidden" class="cartId" />
                                <span class="remove_qty">-</span>
                                <input class="input_qty product-qty" name="quantity" data-rowId="{{$cartItem->rowId}}" value="{{$cartItem->qty}}">
                                <span class="add_qty">+</span>
                            </div>
                        </td>
                        {{-- <td class="text-center">
                            <p class="mb-0 bold-text-16">FREE</p>
                            <p class="p-14-dark justify-content-center mb-0">Delivery by Wed Jul 26</p>
                        </td> --}}
                        <td class="item_cost dark-text">₹<span class="item-cost-val">{{$cartItem->price * $cartItem->qty}}</span></td>
                        <td> <a href="javascript:" class="js_remove_item clearItem" data-rowId="{{$cartItem->rowId}}"><img src="{{asset('frontend')}}/assets/images/deletecon.svg" alt="Delete" /></a> </td>
                      </tr>
                      @endforeach

                      @if(count($cartItems)==0)
                      <tr class="item-row">
                        <td colspan="5">Nothing into cart</td>

                      </tr>
                      @endif

                    </tbody>
                </table>
                @if(count($cartItems)!=0)
                <div class="main-grand-total-main">
                    <div class="dis-code-wrap">
                        <p class="med-16-black mb-0">Discount Code:</p>
                        <p class="med-16-gray">Enter your coupon code if you have</p>

                        <div class="copy-button">
                            <input id="copyvalue" type="text" class="form-control" placeholder="Discount Code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code']:''}}">
                            <button class="couponbtn copybtn mt-0">Apply Coupon</button>
                        </div>

                        <div class="cards-main">
                            <img src="{{asset('frontend')}}/assets/images/payment.svg" alt="Payment">
                            <img src="{{asset('frontend')}}/assets/images/payment-1.svg" alt="Payment">
                            <img src="{{asset('frontend')}}/assets/images/payment-2.svg" alt="Payment">
                            <img src="{{asset('frontend')}}/assets/images/payment-3.svg" alt="Payment">
                            <img src="{{asset('frontend')}}/assets/images/payment-4.svg" alt="Payment">
                        </div>
                    </div>
                    <div class="proceed-to-checkout">
                        <div class="products-details-lists mt-0 proceed-total-wrap-main">
                            <ul>
                                <li>
                                    <p>Sub Total :</p>
                                    <p class="primary-med-18">₹ <span id="subTotal">{{getCartTotal()}}</span></p>
                                </li>
                                <li>
                                    <p>Discount :</p>
                                    <p class="green-med-18 ">-₹<span class="discount">{{getMainCartDiscount()}}</span></p>
                                </li>
                                {{-- <li>
                                    <p>Tax :</p>
                                    <p class="red-med-18">+ ₹600.50</p>
                                </li> --}}
                                <li>
                                    <p>Shipping :</p>
                                    <p class="primary-med-18">₹00.00</p>
                                </li>
                                <li>
                                    <p>Grand Total :</p>
                                    <p class="primary-med-18">₹<span id="total">{{getMainCartTotal()}}</span></p>
                                </li>
                                <li>
                                    <div class="proceed-to-checkout-btn-wrap w-100">
                                        <a href="{{route('user.checkout')}}" class="g-btn f-btn mb-0 w-100">Proceed To Checkout</a>
                                    </div>
                                </li>
                            </ul>
                            <div>
                                <a href="javascript:" class="js_remove_item remove-all-btn clearCart">Remove All</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        // add quality
$(document).ready(function () {
    $(".couponbtn").on("click", function (ev) {
        var couponvalue = $("#copyvalue").val();
        if(couponvalue===''){
           return toastr.error("please enter coupon code!!!")
        }
        $.ajax({
            url:'{{route("apply-coupon")}}',
            data:{coupon:couponvalue},
            type:'GET',
            success:function(res){
                if(res.status ==1 ){
                   toastr.success(res.message)
                   calculateCouponDiscount()
                }else{
                    toastr.error(res.message)
                }
            }
        })
    })
    function calculateCouponDiscount(){
        $.ajax({
            url:'{{route("calculate-discount")}}',
            type:'GET',
            success:function(res){
                if(res.status ==1 ){
                   $(".discount").text(res.discount);
                   $("#total").text(res.cart_total);
                }else{
                    toastr.error(res.message)
                }
            }
        })
    }
    $(".add_qty").on("click", function (ev) {
        $currObj = $(ev.currentTarget);
        var currQCount = getCurrQCount($currObj);
        currQCount++;
        updateData($currObj, currQCount);
    });

    $(".remove_qty").on("click", function (ev) {
        $currObj = $(ev.currentTarget);
        var currQCount = getCurrQCount($currObj);
        currQCount--;
        if(currQCount<=0){
            return true;
        }
        updateData($currObj, currQCount);
    });

    function getCurrQCount($currObj) {
        return $currObj.siblings(".input_qty").val();
    }

    function updateData($currObj, currQCount) {
        $currObj.siblings(".input_qty").val(currQCount);

        var rowId = $currObj.siblings(".input_qty").attr('data-rowId');
        var $parentObj = $currObj.closest(".item-row");
        $.ajax({
            url:'{{route("cart.update-qty")}}',
            data:{qty:currQCount,rowId:rowId},
            type:'POST',
            success:function(res){
                if(res.status ==1 ){
                   toastr.success(res.message)
                   $parentObj.find(".item-cost-val").text(res.data);
                   $("#subTotal").text(res.subTotal);
                   $("#total").text(res.cart_total);
                   calculateCouponDiscount()
                }
            }
        })


        // var itemPrice = $parentObj.find(".item_price").attr("data-price");
        // var itemCost = Number(itemPrice) * currQCount;


        // var subTotal = getSubTotal();
        // var vatAmount = getVatAmount();
        // var totalCost = subTotal + vatAmount;
        // $("#subtotal").text(subTotal);
        // $("#total_vat").text(vatAmount);
        // $("#total_cost").text(totalCost);
    }

    function getSubTotal() {
        var subTotal = 0;
        $(".item-cost-val").each(function () {
            subTotal += Number($(this).text());
        });
        return subTotal;
    }

    function getVatAmount() {
        var vatPercentage = 0.2;
        return vatPercentage * getSubTotal();
    }

    $(".clearItem").click(function(e){
        e.preventDefault();
        var rowId = $(this).attr('data-rowId');
        $.ajax({
            url:'{{route("cart-remove")}}',
            data:{rowId:rowId},
            type:'POST',
            success:function(res){
                if(res.status ==1 ){
                   toastr.success(res.message);
                   window.location.reload();
                }
            }
        })
    })
    $(".clearCart").click(function(e){
        e.preventDefault();
                let deleteUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will clear your cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{route("cart-clear")}}',
                            success: function(res) {
                                if (res.status == '1') {
                                    Swal.fire(
                                        'Cleared!',
                                        res.message
                                    )
                                    window.location.reload();
                                }else if(res.status == '0'){
                                    Swal.fire(
                                        'Not Cleared!',
                                        res.message
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error)
                            }
                        })
                    }
                })
    })
});
    </script>
@endpush
