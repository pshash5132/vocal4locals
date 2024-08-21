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
                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{asset($data->banner)}}" width="200" />
                            </div>
                            <div class="form-group">
                                <label>Banner</label>
                                <input name="banner" type="file" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name"  value="{{$data->name}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email"  value="{{$data->email}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone"  value="{{$data->phone}}" type="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nature of business</label>
                                <input name="nob"  value="{{old('nob')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{$data->address}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control summernote">{{$data->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Facebook Link</label>
                                <input name="fb_link"  value="{{$data->fb_link}}" type="url" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input name="tw_link"  value="{{$data->tw_link}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input name="insta_link"  value="{{$data->insta_link}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputState">status</label>
                                <select name="status" id="inputState" class="form-control">
                                    <option {{$data->status=="1" ? "selected":""}} value="1">Active</option>
                                    <option {{$data->status=="0" ? "selected":""}} value="0">Inactive</option>
                                </select>

                            </div>



                            <button type="submit" class="btn btn-primary"> Update </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
