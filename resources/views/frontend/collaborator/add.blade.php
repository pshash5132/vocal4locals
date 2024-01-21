<section class="product-detail-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Collaboator</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12">
                    <div class="common-form-section cmn-bg-tab services-inquiry-wrap">
                        <h1>Collaboator Registration</h1>
                        <form  method="POST" enctype="multipart/form-data" action="{{ route('collaborator.add') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Banner/Logo</label>
                                        <input name="banner" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Name*</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Mark Ruffalo">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email Address*</label>
                                        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="markruffalo@gmail.com">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Contact Number*</label>
                                        <input type="number" name="mobile"  value="{{old('mobile')}}" class="form-control" placeholder="98980 98009" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Password*</label>
                                        <input type="password" name="password"  value="{{old('password')}}" class="form-control" placeholder="*****" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Address*</label>
                                        <textarea name="address" class="form-control">{{old('address')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center buttons-wrap">
                                <button type="submit" class="g-btn f-btn mb-0">Register</button>
                                <a hred="{{route('home')}}" class="g-btn f-btn border-btn mb-0">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
