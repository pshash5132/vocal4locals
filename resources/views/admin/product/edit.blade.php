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

                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{asset($data->thumb_image)}}" width="200" />
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$data->name}}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option {{$sub_category->category_id==$category->id?'SELECTED':''}}  value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sub_category">Sub Category</label>
                                        <select name="subcategory_id" id="sub_category" class="form-control">
                                            <option value="" disabled selected>Select </option>
                                            @foreach ($sub_categories as $sub_category)
                                            <option {{$data->subcategory_id==$sub_category->id?'SELECTED':''}} value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <select name="brand_id" id="brand" class="form-control">
                                            <option value="" disabled selected>Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option {{$data->brand_id==$brand->id?'SELECTED':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" name="sku" value="{{$data->sku}}" class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" value="{{$data->price}}"
                                            class="form-control">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Stock Quantity</label>
                                        <input type="number" name="qty" min="0" value="{{$data->qty}}"
                                            class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer-Price</label>
                                        <input type="text" name="offer_price" value="{{$data->offer_price}}"
                                            class="form-control">
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer Start Date</label>
                                        <input type="text" name="offer_start_date" value="{{$data->offer_start_date}}"
                                            class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer End Date</label>
                                        <input type="text" name="offer_end_date" value="{{$data->offer_end_date}}"
                                            class="form-control datepicker">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Video Link</label>
                                        <input type="text" name="video_link" min="0" value="{{$data->video_link}}"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_type">Product Type</label>
                                        <select name="product_type" id="product_type" class="form-control">
                                            <option value="0">Select</option>
                                            <option {{$data->product_type == "new_arrival"?"SELECTED":""}} value="new_arrival">New Arrival</option>
                                            <option {{$data->product_type == "fatured_product"?"SELECTED":""}} value="fatured_product">Fetured</option>
                                            <option {{$data->product_type == "top_product"?"SELECTED":""}} value="top_product">Top Product</option>
                                            <option {{$data->product_type == "best_product"?"SELECTED":""}} value="best_product">Best Product</option>
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
                                        <input type="text" name="seo_title" min="0" value="{{$data->seo_title}}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Description</label>
                                        <textarea name="seo_description" class="form-control">{{$data->seo_description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" class="form-control">{{$data->short_description}}</textarea>
                                    </div>
                                </div>



                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="long_description" class="form-control summernote">{{$data->long_description}}</textarea>
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