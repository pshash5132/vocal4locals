<section class="section">
    <div class="section-header">
        <h1>{{$folder}} Details</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$folder}} Details</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.'.$folder.'.update',$data->id) }}">
                            @csrf
                            @method('put')

                            @csrf


                            <div class="row">


                                <input type="hidden" name="product_id" value="{{$data->product_id}}" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Variant Name</label>
                                        <input type="text" name="name" value="{{ $data->name }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price<code>(Set 0 for make it free)</code></label>
                                        <input type="text" name="price" value="{{ $data->price }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer-Price</label>
                                        <input type="text" name="offer_price" value="{{$data->offer_price}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Stock Quantity</label>
                                        <input type="number" name="qty" min="0" value="{{$data->qty}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Is Default</label>
                                        <select name="is_default"  class="form-control">+
                                            <option value="">Select</option>
                                            <option {{ $data->is_default=="1"?"SELECTED":"" }} value="1">Yes</option>
                                            <option {{ $data->is_default=="0"?"SELECTED":"" }} value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">status</label>
                                        <select name="status" id="inputState" class="form-control">+
                                            <option {{ $data->status=="1"?"SELECTED":"" }} value="1">Active</option>
                                            <option {{ $data->status=="0"?"SELECTED":"" }} value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary"> Update </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@include('admin.product.product_js')
