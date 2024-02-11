@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shipping_method);
    $coupon = json_decode(@$order->coupon);
    $current_status = config('order_status.order_status_admin')[$order->order_status]['status'];
    $current_detail = config('order_status.order_status_admin')[$order->order_status]['details'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocalforlocal.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
</head>
<body>

    <section style="padding-top: 35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table style="width: 100%; max-width: 640px; margin: 0 auto;">
                        <thead>
                            <tr>
                                <td style="text-align: center;"><a href="index.html"><img src="{{asset('frontend')}}/assets/images/logo.png" style="max-width: 287px;" alt="Vocalforlocal" /></a></td>
                            </tr>
                        </thead>
                        <tbody style="margin: 50px auto 0 !important; width: 100%; display: block; max-width: 560px; border: 1px solid #374850; border-radius: 10px;padding: 43px 35px;">
                            <tr>
                                <td style="font-size: 24px; font-weight: 600; color: #374850;">{{ ucfirst($current_status) }}</td>
                            </tr>
                            <tr style="width: 100%; display: flex; gap: 20px;">
                                <td style="width: 57%; color: #374850; font-weight: 400; margin-top: 15px; display: block; font-size: 14px; line-height: 24px;">Hi {{$order->user->name}}, <span style="color: #08BA26; display: block;">{{ucfirst($current_detail)}}.</span></td>
                                <td style="width: 43%; font-size: 16px; text-align: right; color: #374850; line-height: 30px; font-weight: 400; margin-top: 15px; display: block;">
                                    <p style="font-size: 12px; line-height: 24px; margin-bottom: 0;">Order placed on <b style="color: #374850; font-weight: 700;"> {{date('d F,Y', strtotime($order->created_at))}}</b></p>
                                    <p style="font-size: 12px; line-height: 24px; margin-bottom: 0;">Order ID <b style="color: #374850; font-weight: 700;"> {{$order->invoice_id}} </b></p>
                                    {{-- <p style="font-size: 12px; line-height: 24px; margin-bottom: 0;">Delivery by Sun, Aug 20, 2023</p> --}}
                                </td>
                            </tr>
                            <tr style="width: 100%; display: flex; gap: 20px;">
                                <td style="width: 57%; font-size: 16px; color: #374850; line-height: 30px; font-weight: 400; margin-top: 15px; display: block;">
                                    <h4>Delivery Address</h4>
                                    <p style="color: #374850; font-weight: 400; margin-top: 15px; display: block; font-size: 14px; line-height: 24px; margin-bottom: 0;"> {{$address->name}}<br>

                                        {{$address->address}}<br>
                                        {{$address->city}} - {{$address->postalcode}}<br>
                                        {{$address->state}}<br>.</p>
                                    <p style="color: #374850; font-weight: 400; margin-top: 7px; display: block; font-size: 14px; line-height: 24px; margin-bottom: 0;"><a style="text-decoration: none; color: #374850;" href="mailto:{{$address->email}}">{{$address->email}}</a></p>
                                    <p style="color: #374850; font-weight: 400; margin-top: 7px; display: block; font-size: 14px; line-height: 24px; margin-bottom: 0;"><a style="text-decoration: none; color: #374850;" href="tel:{{$address->contact}}">{{$address->contact}}</a></p>
                                </td>
                            </tr>
                            @foreach ($order->orderProducts as $product)
                           <tr style="border-top: 1px solid #9BA3A7; width: 100%; display: flex; padding: 20px 0; margin-top: 30px;">
                                <td style="width: 25%;">
                                    <div>
                                        <img src="{{asset($product->thumb_image)}}" alt="" />
                                    </div>
                                </td>
                                <td style="width: 65%; margin-left: 12px;">
                                    <div class="product-detail-list">
                                        <p class="p-14-dark">{{$product->product_name}} </p>
                                        <p class="p-14-dark">  <span>({{$product->productVariant->name}})</span></p>
                                    </div>
                                </td>
                                <td style="width: 20%; margin-left: 50px;">
                                    <div class="text-start">
                                        <span class="item_price d-block p-med-18" data-price="1500">{{$product->qty}} * ₹{{$product->unit_price}}</span>
                                        <span class="item_price d-block price-off-text-g" data-price="1500">{{$product->unit_price * $product->qty}}</span>
                                    </div>
                                </td>
                           </tr>
                           @endforeach

                            <tr style="border-top: 1px solid #9BA3A7; width: 100%; display: flex; padding: 20px 0; justify-content: center; gap: 33px;">
                                <td><p style="display: flex;"><span style="color: #A3A9BD; display: block;">Discount :</span> <span style="color: #08BA26; margin-left: 20px; font-weight: 500;">- ₹{{@$order->discount_amount ? $order->discount_amount:'0' }}</span></p></td>
                                <td><p style="display: flex;"><span style="color: #A3A9BD; display: block;">Grand Total :</span> <span style="color: #6C7ACB; margin-left: 20px; font-weight: 500;">₹{{$order->amount + $shipping->cost}}</span></p></td>
                            </tr>
                            <tr style="width: 100%; display: flex;">
                                <td style="width: 100%; display: flex; justify-content: space-between;">
                                    <div class="order-tracking-map-wrap">
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Order Placed</p>
                                        </div>
                                        <div class="order-tracking completed inprogress-wrap">
                                            <span class="is-complete"></span>
                                            <p>Inprogress</p>
                                        </div>
                                        <div class="order-tracking">
                                            <span class="is-complete"></span>
                                            <p>Shipped</p>
                                        </div>
                                        <div class="order-tracking">
                                            <span class="is-complete"></span>
                                            <p>Delivered</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #374850; font-weight: 400; margin-top: 25px; display: block; font-size: 14px; line-height: 24px; margin-bottom: 0;">
                                    Thank you for shopping with Vocaal4local’s
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="display: flex; flex-direction: column; background: #374850; padding: 26px 0 15px; margin-top: 27px;">
                                <td>
                                    <div class="social-media-wrap" style="margin-bottom: 10px;">
                                        <ul>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/instagram.png" alt="Insta" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/facebook.png" alt="Facebook" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/linkedin.png" alt="Twiter" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/whatsapp.png" alt="Pintrest" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td style="color: #FFFFFF; text-align: center; line-height: 30px; font-weight: 400; font-size: 10px;">© 2023 All Rights Reserved | Vocaal4local's</td>
                            </tr>
                            <tr style="background: #5264AE; padding: 12px 0;">
                                <td style="text-align: center;">
                                    <div style="display: flex;align-items: center; justify-content: center;">
                                        <ul style="list-style: none; list-style-position: inside; display: flex; justify-content: center; gap: 20px;">
                                            <li><a href="#" style="color: #FFFFFF; text-decoration: none; padding-top: 12px; display: block; font-size: 10px;">Privacy Policy</a></li>
                                            <li><a href="#" style="color: #FFFFFF; text-decoration: none; padding-top: 12px; display: block; font-size: 10px;">Terms & Conditions</a></li>
                                            <li><a href="#" style="color: #FFFFFF; text-decoration: none; padding-top: 12px; display: block; font-size: 10px;">www.vocaal4local’s.com</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>


</body>
</html>
