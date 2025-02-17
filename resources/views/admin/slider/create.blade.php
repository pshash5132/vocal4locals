<section class="section">
    <div class="section-header">
        <h1>Slider</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Slider</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.slider.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Banner (Max 2MB) (1200px X 600px)</label>
                                <input name="banner" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input name="type" type="text" class="form-control" value="{{old('type')}}">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title"  value="{{old('title')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Starting-Price</label>
                                <input name="starting_price"  value="{{old('starting_price')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Button Url</label>
                                <input name="btn_url"  value="{{old('btn_url')}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Serial</label>
                                <input name="serial"  value="{{old('serial')}}" type="text" class="form-control">
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
