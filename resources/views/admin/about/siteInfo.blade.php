<section class="section">
    <div class="section-header">
        <h1>Site Info</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Site Info</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.siteInfo.store') }}">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input name="title"  value="{{$data?$data->title:old('title')}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input name="subtitle"  value="{{$data?$data->subtitle:old('subtitle')}}" type="text" class="form-control">
                            </div>
                            @if ($data)
                                <img height="100" src="{{asset($data->image1)}}">
                            @endif
                            <div class="form-group">
                                <label>Image-Left</label>
                                <input name="image1" type="file" class="form-control">
                            </div>
                            @if ($data)
                                <img height="100" src="{{asset($data->image2)}}">
                            @endif
                            <div class="form-group">
                                <label>Image-Right</label>
                                <input name="image2" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Footer Title</label>
                                <input name="footer_title"  value="{{$data?$data->footer_title:old('footer_title')}}" type="text" class="form-control">
                            </div>
                            @if ($data)
                                <img height="100" src="{{asset($data->footer_image)}}">

                            @endif
                            <div class="form-group">
                                <label>Footer-Image</label>
                                <input name="footer_image" type="file" class="form-control">
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
