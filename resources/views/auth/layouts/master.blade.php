<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocalforlocal.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >

</head>
<body class="cmn-light-bg">
    <section class="section-comming-soon common-form-section overflow-hidden position-relative">
        <img src="{{asset('frontend/assets/images/signup.svg')}}" class="signup-img position-absolute" alt="signup" />
        <img src="{{asset('frontend/assets/images/birds.svg')}}" class="birds position-absolute wow fadeInRight" alt="birds" />
        <img src="{{asset('frontend/assets/images/plan.svg')}}" data-wow-delay="2s" data-wow-duration="3s" class="plan position-absolute wow fadeInRightBig" alt="plan" />
        <img src="{{asset('frontend/assets/images/girl.svg')}}" data-wow-delay="1s"  class="girl position-absolute wow fadeInLeft" alt="girl" />
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="form-logo-wrap">
                        <img src="{{asset('frontend/assets/images/form-logo.svg')}}" class="form-logo" alt="logo" />
                    </div>
                </div>
                <div class="col-xl-7 col-lg-5"></div>
               @yield('content')
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.error("{{$error}}")
        @endforeach
    @endif
</script>
<script>
    $(document).ready(function () {
        // Initialize form validation
        $("#login_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter your password"
                }
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });
    });
</script>

</body>
</html>
