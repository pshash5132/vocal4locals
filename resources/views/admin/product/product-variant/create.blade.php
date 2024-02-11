<section class="section">
    <div class="section-header">
        <h1>{{ $folder }}</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $folder }}</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.' . $folder . '.store') }}">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="variant_name" readonly value="{{ $product->name }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{$product->id}}" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Variant Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price<code>(Set 0 for make it free)</code></label>
                                        <input type="text" name="price" value="{{ old('price') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer-Price</label>
                                        <input type="text" name="offer_price" value="{{ old('offer_price') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Stock Quantity</label>
                                        <input type="number" name="qty" min="0" value="{{ old('qty') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Is Default</label>
                                        <select name="is_default"  class="form-control">+
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">status</label>
                                        <select name="status" id="inputState" class="form-control">+
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> Create </button>

                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@include('admin.product.product_js')
