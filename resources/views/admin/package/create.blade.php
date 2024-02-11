<section class="section">
    <div class="section-header">
        <h1>{{ $folder }}</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $folder }}</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.' . $folder . '.store') }}">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"   class="form-control">
                                    </div>
                                </div>


                            </div>


                            <button type="submit" class="btn btn-primary"> Create </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@include('admin.product.product_js')
