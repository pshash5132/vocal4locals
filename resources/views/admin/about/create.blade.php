<section class="section">
    <div class="section-header">
        <h1>About</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add About</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.about.store') }}">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title"  value="{{old('title')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="containt" class="form-control summernote"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"> Create </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@push('scripts')
<script></script>
@endpush
