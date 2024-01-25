<section class="section">
    <div class="section-header">
        <h1>Coupon update</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Service Product update</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.'.$folder.'.update',$data->id) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Service Category</label>
                                        <select name="service_category_id" id="category" class="form-control select2">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"  value="{{$data->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title"  value="{{$data->title}}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" value="{{$data->price}}" name="price" class="form-control">
                                    </div>
                                </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer-Price</label>
                                    <input type="text" value="{{$data->offer_price}}" name="offer_price" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer Start Date</label>
                                        <input type="text" name="offer_start_date" value="{{ $data->offer_start_date }}"
                                            class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer End Date</label>
                                        <input type="text" name="offer_end_date" value="{{ $data->offer_end_date }}"
                                            class="form-control datepicker">
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Detail</label>
                                        <textarea name="detail" class="form-control summernote">{{ $data->detail }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Preview</label>
                                        <br>
                                        <img src="{{asset($data->image)}}" width="150" height="150"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" name="image" class="form-control">
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
