<section class="section">
    <div class="section-header">
        <h1>Category Details</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Category Details</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.category.update',$data->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Icon</label>
                                <div>
                                    <button data-icon="{{$data->icon}}" class="btn btn-primary" data-selected-class="btn-danger"
                                    data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name"  value="{{$data->name}}" type="text" class="form-control">
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
