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
                                <img src="{{asset($data->logo)}}" width="200" />
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input name="logo" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name"  value="{{$data->name}}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="fetured">Is Fetured</label>
                                <select name="is_fetured" id="fetured" class="form-control">
                                    <option value="">Select Fetured</option>
                                    <option {{$data->is_fetured == 1 ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{$data->is_fetured == 0 ? 'selected' : ''}} value="0">No</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="inputState">status</label>
                                <select name="status" id="inputState" class="form-control">
                                    <option {{$data->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$data->status == 2 ? 'selected' : ''}} value="0">Inactive</option>
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
