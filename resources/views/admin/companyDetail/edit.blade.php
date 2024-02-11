<section class="section">
    <div class="section-header">
        <h1>Company Details</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Company Details</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.companyDetail.update',$data->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{asset($data->logo)}}" width="200" />
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input name="logo" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Footer Tag</label>
                                <textarea name="footer_tag" class="form-control">{{$data->footer_tag}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input name="mobile"  value="{{$data->mobile}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Site Url</label>
                                <input name="website"  value="{{$data->website}}" type="url" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email"  value="{{$data->email}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <input name="instagram"  value="{{$data->instagram}}" type="url" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>LinkedIn</label>
                                <input name="twitter"  value="{{$data->twitter}}" type="url" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input name="facebook"  value="{{$data->facebook}}" type="url" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input name="whatsapp"  value="{{$data->whatsapp}}" type="url" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"> Update </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
