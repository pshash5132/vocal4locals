<section class="section">
    <div class="section-header">
        <h1>{{$folder}}</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$folder}}</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.'.$folder.'.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Banner</label>
                                <input name="banner" type="file" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name"  value="{{old('name')}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email"  value="{{old('email')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone"  value="{{old('text')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nature of business</label>
                                <input name="nob"  value="{{old('nob')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{old('address')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control summernote">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Facebook Link</label>
                                <input name="fb_link"  value="{{old('fb_link')}}" type="url" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input name="tw_link"  value="{{old('tw_link')}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input name="insta_link"  value="{{old('insta_link')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputState">status</label>
                                <select name="status" id="inputState" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary"> Create </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
