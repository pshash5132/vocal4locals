<section class="section">
    <div class="section-header">
        <h1>About</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit About</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.about.update',$about->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title"  value="{{$about->title}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="containt" class="form-control summernote">{{$about->containt}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>About Footer 1</label>
                                    <input type="text" value="{{$about->about_title1}}" name="about_title1" class="form-control" placeholder="Sallers active our site"/>
                                    <input type="text" value="{{$about->about1}}" name="about1" class="form-control" placeholder="25"/>
                                </div>
                                <div class="col-md-3">
                                    <label>About Footer 2</label>
                                    <input type="text" value="{{$about->about_title2}}" name="about_title2" class="form-control" placeholder="Sallers active our site"/>
                                    <input type="text" value="{{$about->about2}}" name="about2" class="form-control" placeholder="25"/>
                                </div>
                                <div class="col-md-3">
                                    <label>About Footer 3</label>
                                    <input type="text" value="{{$about->about_title3}}" name="about_title3" class="form-control" placeholder="Sallers active our site"/>
                                    <input type="text" value="{{$about->about3}}" name="about3" class="form-control" placeholder="25"/>
                                </div>
                                <div class="col-md-3">
                                    <label>About Footer 4</label>
                                    <input type="text" value="{{$about->about_title4}}" name="about_title4" class="form-control" placeholder="Sallers active our site"/>
                                    <input type="text" value="{{$about->about4}}" name="about4" class="form-control" placeholder="25"/>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary"> Update </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
