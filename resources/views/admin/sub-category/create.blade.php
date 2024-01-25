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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.sub-category.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="inputState">Category</label>
                                <select name="category_id" id="category" class="form-control select2">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name"  value="{{old('name')}}" type="text" class="form-control">
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
