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
                                        <label>Image (Max 2MB)(279px X 357px)</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sub_category">Sub Category</label>
                                        <select name="subcategory_id" id="sub_category" class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <select name="brand_id" id="brand" class="form-control">
                                            <option value="" disabled selected>Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" name="sku" value="{{ old('sku') }}" class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" value="{{ old('price') }}"
                                            class="form-control">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Stock Quantity</label>
                                        <input type="number" name="qty" min="0" value="{{ old('qty') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer-Price</label>
                                        <input type="text" name="offer_price" value="{{ old('offer_price') }}"
                                            class="form-control">
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer Start Date</label>
                                        <input type="text" name="offer_start_date" value="{{ old('offer_start_date') }}"
                                            class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer End Date</label>
                                        <input type="text" name="offer_end_date" value="{{ old('offer_end_date') }}"
                                            class="form-control datepicker">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Video Link</label>
                                        <input type="text" name="video_link" min="0" value="{{ old('video_link') }}"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_type">Product Type</label>
                                        <select name="product_type" id="product_type" class="form-control">
                                            <option value="0">Select</option>
                                            <option value="new_arrival">New Arrival</option>
                                            <option value="fatured_product">Fetured</option>
                                            <option value="top_product">Top Product</option>
                                            <option value="best_product">Best Product</option>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Title</label>
                                        <input type="text" name="seo_title" min="0" value="{{ old('seo_title') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Description</label>
                                        <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                    </div>
                                </div>



                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
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
