<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vocal4locals</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css?v=0.0.1') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/images/logo.png')}}">

    <style>
        .error{
            color: red;
        }
        .seach_img{
            width: 50px
        }
    </style>
</head>

<body>
    @include('frontend.layouts.header')
    @if ($page!='frontend.pages.privacy-policy')

    @include('frontend.layouts.menu')
    @endif
    @yield('content')

    <!-- get-in-touch-section -->
    @php
    $siteInfo = siteInfo();
    @endphp
    @if (!isset($notshowTouch))
    <section class="get-in-touch-section common-form-section position-relative">
        <img src="{{ asset($siteInfo?$siteInfo->footer_image:'frontend/assets/images/get-in-touch-bg.png') }}" class="get-in-touch-img"
            alt="Get In Touch Background" />
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="get-in-touch-content">
                        <h2>{{$siteInfo?$siteInfo->footer_title:`Can't find what you are looking for?`}}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend') }}/assets/images/call.svg" alt="Call" />
                                <a href="tel:{{$company->mobile}}">{{$company->mobile}}</a>
                            </li>
                            <li>
                                <img src="{{ asset('frontend') }}/assets/images/email.svg" alt="Email" />
                                <a href="mailto:{{$company->email}}">{{$company->email}}</a>
                            </li>
                            <li>
                                <img src="{{ asset('frontend') }}/assets/images/internet.svg" alt="Internet" />
                                <a href="">{{$company->website}}</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="col-lg-5">
                    <div class="get-in-touch">
                        <form id="contactFrom" method="POST" action="{{route('contact.add')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-title">
                                        <h2>Get In Touch</h2>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Full Name*</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Email Address*</label>
                                        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Contact Number*</label>
                                        <input type="number" name="number" value="{{old('number')}}" class="form-control" placeholder="98980 98009" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Message*</label>
                                        <textarea name="message" cols="30" rows="2" class="form-control" placeholder="Write a message">{{old('message')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="f-btn">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

<div class="modal" id="myModal" >
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="common-form-section edit-your-address-modal cmn-bg-tab new-shipping-wrap">
                    <h2>Edit your address</h2>
                    <form id="edit_address" method="post" action="{{route('user.user-address.update','')}}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Name*</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Mark Ruffalo" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Email Address*</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="markruffalo@gmail.com" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Address (Street/Area)*</label>
                                    <textarea name="address" id="address" id="" cols="30" rows="2" class="form-control"
                                        placeholder="201-203, Rang Royal Residency,"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">City/District/Town*</label>
                                    <input type="text" name="city" id="city" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">State*</label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="Gujarat">Gujarat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Postal Code*</label>
                                    <input type="number" class="form-control"  name="postalcode" id="postalcode" placeholder="380081" pattern="/^-?\d+\.?\d*$/"
                                        onKeyPress="if(this.value.length==6) return false;" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Contact Number*</label>
                                    <input type="number" class="form-control" name="contact" id="contact" placeholder="98980 98009"
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="checkbox-wrap text-center">
                            <div class="form-group">
                                <input type="checkbox" class="default" id="default1" name="is_default" value="true">
                                <label for="default">default</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" class="home"  id="home1" name="address_type" value="Home">
                                <label for="home">Home</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" class="work" id="work1" name="address_type" value="Work">
                                <label for="work">Work</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="g-btn f-btn mb-0">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('frontend.layouts.footer')



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        currency = '₹';
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    </script>
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error("{{$error}}")
            @endforeach
        </script>
        @endif
        @stack('scripts')
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

        @if(Session::has('order_placed'))
        <script>
            Swal.fire({
                title: "Order Placed",
                text: "{{ Session::get('order_placed') }}",
                icon: "success",
                timer: 5500,
                showClass: {
                    popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                    `
                },
                hideClass: {
                    popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                    `
                }
            });
        </script>
    @endif
    <script>
           $(document).ready(function () {
        // Initialize form validation
        $("#contactFrom").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                number: {
                    required: "Please enter your contact number",
                    digits: "Please enter only digits",
                    minlength: "Contact number must be 10 digits",
                    maxlength: "Contact number must be 10 digits"
                },
                message: {
                    required: "Please enter your message"
                }
            },
            // errorElement: "span",
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


    $(".addToCart").click(function(){
        var variantId = $(this).attr('data-variantid');
        console.log(variantId)
        $.ajax({
            type:'POST',
            url:"{{route('add-to-cart')}}",
            data:{variantId:variantId,qty:1},
            success:function(res){
                if(res.status ==1 ){
                   toastr.success(res.message)
                }
            }
        })
    })

    $('.wishlist').click(function(e){
        e.preventDefault();
        var that =$(this);
        let id = that.data('id');
        $.ajax({
            type:'Get',
            url:"{{route('wishlist.store')}}",
            data:{id:id},
            success:function(res){
                if(res.status ==1 ){
                   toastr.success(res.message)
                }else{
                    console.log(that)
                    toastr.error(res.message)
                }
                that.children('.wishImg').attr('src','{{asset("frontend/assets/images/Like.svg")}}');

            }
        })
    })
    </script>
    <script>
        $(".catClick").click(function(){

            window.location.href =  $(this).attr('href');
        })
    </script>

<script>
    $(function() {
        $("input[name='search']").autocomplete({
            source: function(request, response) {
                var searchType = $("#search_type").val(); // Assuming the dropdown has an id of 'search_type'
                var searchRoute = (searchType === 'products') ? "{{ route('product.search') }}" : "{{ route('service.search') }}";
                $.ajax({
                    url: searchRoute,
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.name,
                                value: item.name,
                                image: (searchType === 'products') ? item.product_image_gallery[0].image : item.image, // Adjust for service image
                                slug: item.slug // Add the product ID or any other identifier you need
                            };
                        }));
                    }
                });
            },
            minLength: 2, // Minimum characters to trigger autocomplete
            select: function(event, ui) {
                var searchType = $("#search_type").val();
                // Redirect to the product detail page when a product is selected
                var detailRoute = (searchType === 'products') ?
                "{{ route('product-detail', '') }}" : "{{ route('service-detail', '') }}";

                // Redirect to the product or service detail page based on the search type
                window.location.href = detailRoute + "/" + ui.item.slug;
            },
            focus: function (event, ui) {
                // Prevent the default focus behavior to avoid replacing the input value
                event.preventDefault();
            }, open: function () {
                // Fix the issue with focusing on some browsers
                $(this).autocomplete('widget').css('z-index', 9999);
            }
        }).autocomplete('instance')._renderItem = function (ul, item) {
            // Custom rendering for each autocomplete item
            return $('<li>')
                .append('<div><img class="seach_img" src="{{ asset('') }}' + item.image + '" alt="Product Image">' + item.label + '</div>')
                .appendTo(ul);
        };
    });

    $('.editAddress').click(function(){
        let editUrl = $(this).data('url');
        $.ajax({
            type:'GET',
            url:editUrl,
            success:function(res){
                $('#edit_address').attr('action', "{{ route('user.user-address.update', '') }}/" + res.address.id);
                $("#name").val(res.address.name)
                $("#email").val(res.address.email)
                $("#address").val(res.address.address)
                $("#city").val(res.address.city)
                $("#state").val(res.address.state)
                $("#postalcode").val(res.address.postalcode)
                $("#contact").val(res.address.contact)
                $(".default").prop('checked', res.address.is_default == 1);
                $(".home").prop('checked', res.address.address_type == 'Home');
                $(".work").prop('checked', res.address.address_type == 'Work');
            }
        })
    })

    $('#add-address').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                postalcode: {
                    required: true,
                    number: true,
                    minlength: 6
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: 'Please enter your name.'
                },
                email: {
                    required: 'Please enter your email address.',
                    email: 'Please enter a valid email address.'
                },
                address: {
                    required: 'Please enter your address.'
                },
                city: {
                    required: 'Please enter your city/district/town.'
                },
                state: {
                    required: 'Please select your state.'
                },
                postalcode: {
                    required: 'Please enter your postal code.',
                    digits: 'Please enter a valid postal code.',
                    minlength: 'Postal code must be at least 6 digits.'
                },
                contact: {
                    required: 'Please enter your contact number.',
                    digits: 'Please enter a valid contact number.',
                    minlength: 'Contact number must be at least 10 digits.'
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "is_default" || element.attr("name") == "address_type") {
                    error.insertAfter($(element).closest('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            }
        });
</script>
</body>

</html>
