<section class="product-detail-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Collaborator </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12">
                    <div class="common-form-section cmn-bg-tab services-inquiry-wrap">
                        <h1>Free Registration</h1>
                        <form  method="POST" enctype="multipart/form-data" action="{{ route('collaborator.add') }}" id="collaborator_registration">
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
                                        <label for="">Nature of business*</label>
                                        <input type="text" name="nob" value="{{old('nob')}}" class="form-control" placeholder="Grocery store">
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
                                        <input type="number" name="mobile"  value="{{old('mobile')}}" class="form-control" placeholder="98980 98009">
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
                                <a href="{{route('home')}}" class="g-btn f-btn border-btn mb-0" style="margin: 0 !important">Cancel</a>
                                <a href="{{route('login')}}" class="g-btn f-btn border-btn mb-0" style="margin: 0 !important">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#collaborator_registration').validate({
            rules: {
                banner: {
                    extension: "png|jpg|jpeg|gif", // Allow only these file extensions for the banner
                },
                name: {
                    required: true,
                },
                nob: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                address: {
                    required: true,
                },
            },
            messages: {
                banner: {
                    extension: "Please upload a valid image file (png, jpg, jpeg, gif).",
                },
                name: {
                    required: "Please enter vendor name.",
                },
                nob: {
                    required: "Please enter nature of business.",
                },
                email: {
                    required: "Please enter email address.",
                    email: "Please enter a valid email address.",
                },
                mobile: {
                    required: "Please enter contact number.",
                    digits: "Please enter a valid numeric contact number.",
                    minlength: "Please enter at least 10 digits.",
                    maxlength: "Please enter no more than 10 digits.",
                },
                password: {
                    required: "Please enter a password.",
                    minlength: "Password must be at least {0} characters long.",
                },
                address: {
                    required: "Please enter full address.",
                },
            },
        });
    });
</script>
@endpush
