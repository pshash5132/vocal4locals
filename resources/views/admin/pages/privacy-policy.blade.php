<section class="section">
    <div class="section-header">
        <h1>Privacy-Policy</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Privacy-Policy</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="product_form"
                            action="{{ route('admin.privacy-policies.store') }}">
                            @csrf

                            <div class="form-group">

                                <textarea name="content" class="form-control summernote">{{ @$data->content }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"> Create </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
