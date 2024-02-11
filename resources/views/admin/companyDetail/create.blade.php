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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.companyDetail.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Logo</label>
                                <input name="logo" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Footer Tag</label>
                                <textarea name="footer_tag" class="form-control">{{old('type')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input name="mobile"  value="{{old('mobile')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Site Url</label>
                                <input name="website"  value="{{old('website')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email"  value="{{old('email')}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <input name="instagram"  value="{{old('instagram')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>LinkedIn</label>
                                <input name="twitter"  value="{{old('twitter')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input name="facebook"  value="{{old('facebook')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input name="whatsapp"  value="{{old('whatsapp')}}" type="text" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary"> Create </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
