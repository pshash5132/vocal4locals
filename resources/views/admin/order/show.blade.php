@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shipping_method);
    $coupon = json_decode(@$order->coupon);

@endphp
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">
            <div class="row">
              <div class="col-lg-12">
                <div class="invoice-title">
                  <h2></h2>
                  <div class="invoice-number">Order #{{$order->invoice_id}}</div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Billed To:</strong><br>
                       {{$address->name}}<br>
                       {{$address->email}}<br>
                       {{$address->contact}}<br>
                       {{$address->address}}<br>
                       {{$address->city}} - {{$address->postalcode}}<br>
                       {{$address->state}}<br>
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Shipped To: {{$address->address_type}}</strong><br>
                      {{$address->name}}<br>
                      {{$address->email}}<br>
                      {{$address->contact}}<br>
                      {{$address->address}}<br>
                      {{$address->city}} - {{$address->postalcode}}<br>
                      {{$address->state}}<br>
                    </address>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Payment Method:</strong><br>
                      {{$order->payment_method}}<br>
                      {{@$order->transaction->transaction_id}}
                      <strong>Payment Status:</strong><br>
                      {{$order->payment_status === 1? 'Complete':'Pending'}}
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Order Date:</strong><br>
                      {{date('d F,Y', strtotime($order->created_at))}}<br><br>
                    </address>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <div class="section-title">Order Summary</div>
                <p class="section-lead">All items here cannot be deleted.</p>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <tr>
                      <th data-width="40">#</th>
                      <th>Vendor Name</th>
                      <th>Item</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-right">Totals</th>
                    </tr>
                    @foreach ($order->orderProducts as $product)
                    <tr>
                      <td>{{++$loop->index}}</td>
                      <td>{{$product->vendor->name}}</td>
                      @if($product->product->slug)
                      <td><a href="{{route('product-detail',$product->product->slug)}}" target="_blank">{{$product->product_name}} ({{$product->productVariant->name}}) </a> </td>
                        @else
                        <td>{{$product->product_name}} ({{$product->productVariant->name}})</td>
                      @endif
                      <td class="text-center">₹{{$product->unit_price}}</td>
                      <td class="text-center">{{$product->qty}}</td>
                      <td class="text-right">₹{{$product->unit_price * $product->qty}}</td>
                    </tr>

                    @endforeach

                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-8">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Payment status</label>
                            <select name="payment_status" id="payment_status" class="form-control" data-id="{{$order->id}}">

                                <option {{$order->payment_status==0?'selected':''}} value="0">Pending</option>
                                <option {{$order->payment_status==1?'selected':''}} value="1">Completed</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Order status</label>
                            <select name="order_status" id="order_status" class="form-control" data-id="{{$order->id}}">
                                @foreach (config('order_status.order_status_admin') as $key => $orderStatus)
                                    <option {{$order->order_status==$key?'selected':''}} value="{{$key}}">{{$orderStatus['status']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Subtotal</div>
                      <div class="invoice-detail-value">₹{{$order->sub_total}}</div>
                    </div>
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Shipping (+)</div>
                      <div class="invoice-detail-value">₹{{$shipping->cost}}</div>
                    </div>
                    <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Coupon (-)</div>
                        <div class="invoice-detail-value">₹{{@$order->discount_amount ? $order->discount_amount:'0' }}</div>
                      </div>
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total</div>
                      <div class="invoice-detail-value invoice-detail-value-lg">₹{{$order->amount + $shipping->cost}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="text-md-right">
            {{-- <div class="float-lg-left mb-lg-0 mb-3">
              <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
              <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
            </div> --}}
            <button class="btn btn-warning btn-icon icon-left print"><i class="fas fa-print"></i> Print</button>


          </div>
        </div>
      </div>
    </section>
  </div>
@push('scripts')
<script>

    $(document).ready(function(){
        $("#order_status").on('change',function(){
            let status = $(this).val()
            let id = $(this).data('id')
            $.ajax({
                method:'GET',
                data:{status:status,id:id},
                url:"{{route('admin.order.status')}}",
                dataType:'json',
                success:function(res){
                    if(res.status==1){
                        toastr.success(res.message);
                    }
                }
            })
        })
        $("#payment_status").on('change',function(){
            let status = $(this).val()
            let id = $(this).data('id')
            $.ajax({
                method:'GET',
                data:{status:status,id:id},
                url:"{{route('admin.order.paymentstatus')}}",
                dataType:'json',
                success:function(res){
                    if(res.status==1){
                        toastr.success(res.message);
                    }
                }
            })
        })
        $('.print').on('click',function(){
            let printBody = $('.invoice-print').html();
            let orignalBody = $('body').html();
            $('body').html(printBody)
            window.print();
            $('body').html(orignalBody);
        })
    })
</script>
@endpush
