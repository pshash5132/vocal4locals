<section class="section">
    <div class="section-header">
        <h1>Slider</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Slider</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.slider.update',$slider->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{asset($slider->banner)}}" width="200" />
                            </div>
                            <div class="form-group">
                                <label>Banner (Max 2MB)</label>
                                <input name="banner" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input name="type" type="text" class="form-control" value="{{$slider->type}}">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title"  value="{{$slider->title}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Starting-Price</label>
                                <input name="starting_price"  value="{{$slider->starting_price}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Button Url</label>
                                <input name="btn_url"  value="{{$slider->btn_url}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Serial</label>
                                <input name="serial"  value="{{$slider->serial}}" type="text" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="inputState">status</label>
                                <select name="status" id="inputState" class="form-control">
                                    <option {{$slider->serial == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$slider->serial == 2 ? 'selected' : ''}} value="0">Inactive</option>
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
