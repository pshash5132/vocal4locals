<section class="banner-section position-relative inquiry-tab-section">
    <div class="owl-carousel owl-theme inquiry-slider">
        @foreach ($sliders as $slider)
            <div class="item">
                <div class="banner-slider-wrap text-center">
                    <div class="banner-slider-content">
                        <h2>{!! $slider->type !!} </h2>
                        <h3>{!! $slider->title !!}</h3>
                        <p>{!! $slider->starting_price !!}</p>
                        {{-- <a href="{{ $slider->btn_url }}" class="cmn-btn buy-now">Buy Now!</a> --}}
                    </div>
                    <img src="{{ $slider->banner }}" alt="Banne" />
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hotel-tab-wrap">
                    <ul class="nav nav-tabs border-0 justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <img src="{{ asset('frontend/assets/images/hotel.svg') }}" alt="Hotel" />
                                <h2>Hotel</h2>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">
                                <img src="{{ asset('frontend/assets/images/car.svg') }}" alt="Car" />
                                <h2>Car</h2>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content inquiry-tabs" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">

                            <div class="inquiry-tab-inner">
                                <p class="text-center">Book Domestic and International Hotel & Cab Online Now!!</p>
                                <form method="post" action="{{ route('inquiry.hotel.inquiry') }}" id="hotel_inquiry_form">
                                    @csrf

                                    <div class="form-group">
                                        <label for="">City, Property or Location</label>
                                        <div class="">
                                            <input name="location" value="{{ old('location') }}" type="text"
                                                class="form-control location-input" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Check-In</label>
                                        <div class="">
                                            <div class="">
                                                <input name="check_in" id="check_in" value="{{ old('check_in') }}" type="date"
                                                    class="form-control" min="{{date('Y-m-d')}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Check-Out</label>
                                        <div class="">
                                            <div class="">
                                                <input name="check_out" id="check_out" value="{{ old('check_out') }}" type="date"
                                                    class="form-control" min="{{date('Y-m-d')}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group position-relative">
                                        <!-- <div class="categories-icon">
                                            <img src="assets/images/user.svg" alt="user">
                                        </div> -->
                                        <div class="categories-detail-list guest-room-select">
                                            <label for="">Guests &amp; Rooms</label>
                                            <div class="btn-group">
                                                <button class="dropdown-toggle bg-transparent border-0" type="button"
                                                    id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                                                    data-bs-auto-close="outside" aria-expanded="false"></button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside"
                                                    style="">
                                                    <li>
                                                        <div class="people-counter">
                                                            <div class="input-group text-center">
                                                                <div>
                                                                    <h5 class="semi16">Rooms</h5>
                                                                    <h6 class="medium12">(Max 8)</h6>
                                                                </div>
                                                                <div>
                                                                    <input type="button" value="-"
                                                                        class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                                        data-field="rooms">
                                                                    <input type="number" step="1" max="8"
                                                                        min="1" value="1" id="room_qty"
                                                                        name="room_qty"
                                                                        class="quantity-field border-0 text-center w-25">
                                                                    <input type="button" value="+"
                                                                        class="button-plus border rounded-circle icon-shape icon-sm "
                                                                        data-field="rooms">
                                                                </div>
                                                            </div>
                                                            <div class="input-group text-center">
                                                                <div>
                                                                    <h5 class="semi16">Adults</h5>
                                                                    <h6 class="medium12">(Aged 12+ yrs)</h6>
                                                                </div>
                                                                <div>
                                                                    <input type="button" value="-"
                                                                        class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                                        data-field="adults">
                                                                    <input type="number" step="1"
                                                                        max="10" min="1" value="1"
                                                                        id="adult_qty" name="adult_qty"
                                                                        class="quantity-field border-0 text-center w-25">
                                                                    <input type="button" value="+"
                                                                        class="button-plus border rounded-circle icon-shape icon-sm "
                                                                        data-field="adults">
                                                                </div>
                                                            </div>
                                                            <div class="input-group text-center">
                                                                <div>
                                                                    <h5 class="semi16">Children</h5>
                                                                    <h6 class="medium12">(Aged 0-12 yrs)</h6>
                                                                </div>
                                                                <div>
                                                                    <input type="button" value="-"
                                                                        class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                                        data-field="children">
                                                                    <input type="number" step="1"
                                                                        max="10" min="0" value="0"
                                                                        id="child_qty" name="child_qty"
                                                                        class="quantity-field border-0 text-center w-25">
                                                                    <input type="button" value="+"
                                                                        class="button-plus border rounded-circle icon-shape icon-sm "
                                                                        data-field="children">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="traveller-age-main">
                                                            <!-- Age divs for children will be generated here -->
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="javascript:" id="apply_travellers" class="cmn-btn">Apply</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="text" id="guests" class="form-control" readonly
                                                value="1 Adult, 0 Child, 1 Room">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Your Budget</label>
                                        <input type="text" name="budget" value="{{ old('budget') }}"
                                            class="form-control budget" placeholder="₹ 1500" />
                                    </div>


                                    <div class="text-center buttons-wrap">
                                        <button type="submit" class="g-btn f-btn mb-0">Inquiry Now!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="inquiry-tab-inner">
                                <p class="text-center">Book Domestic and International Hotel & Cab Online Now!!</p>
                                <form method="post" action="{{ route('inquiry.cab.inquiry') }}" id="cab_inquiry_form">
                                    @csrf
                                    <div class="form-group position-relative">
                                        <label for="">From</label>
                                        <div class="form-wrap">
                                            <input name="from_location" id="from_location" value="{{ old('from_location') }}" type="text"
                                                class="form-control location-input" />
                                        </div>
                                        <div class="arrow-swipe">
                                            <img src="{{ asset('frontend/assets/images/swipe.svg') }}"
                                                alt="Swipe" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">To</label>
                                        <div class="form-wrap">
                                            <input name="to_location" id="to_location" value="{{ old('to_location') }}" type="text"
                                                class="form-control location-input" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Departure</label>
                                        <div class="">
                                            <input name="departure" id="departure" value="{{ old('departure') }}" type="date"
                                                class="form-control"  min="{{date('Y-m-d')}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Return</label>
                                        <div class="">
                                            <input name="return" id="return" type="date" value="{{ old('return') }}"
                                                class="form-control" min="{{date('Y-m-d')}}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Your Budget</label>

                                        <div class="">
                                            <input name="budget" type="text" value="{{ old('budget') }}"
                                                class="form-control budget" placeholder="₹ 1500" />
                                        </div>

                                    </div>
                                    <div class="text-center buttons-wrap">
                                        <button type="submit" class="g-btn f-btn mb-0">Inquiry Now!</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div style="display: none;" id="children_age_html">
    <div>


            <h5>Child age</h5>


        <div class="tra-select-main">
            <select name="children_age[]">
                @for ($i =0 ; $i <10 ; $i++)
                 <option class="medium12" value="{{$i}}">{{$i}} Year</option>
                @endfor
            </select>
        </div>
    </div>
</div>
@push('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW43KgTNs_Kusuvbian6KYGi_QzXOLS4w&v=3.exp&libraries=places">
    </script>


    <script>
         $(".budget").on("input", function () {
            var inputValue = $(this).val();
            var numericValue = inputValue.replace(/\D/g, '');
            $(this).val(numericValue);
        });

        $("#check_in").change(function(){
            var inputDate = new Date($(this).val());
            inputDate.setDate(inputDate.getDate() + 1);
            var newdate = inputDate.toISOString().slice(0, 10)
            $("#check_out").val(newdate);
            $("#check_out").attr("min",newdate);

        })
        $("#departure").change(function(){
            var inputDate = new Date($(this).val());
            inputDate.setDate(inputDate.getDate() + 1);
            var newdate = inputDate.toISOString().slice(0, 10)
            $("#return").attr("min",newdate);
            $("#return").val(newdate);
        })
        $(".arrow-swipe").click(function(){
            var from_location = $("#from_location").val();
            $("#from_location").val($("#to_location").val())
            $("#to_location").val(from_location);
        })
        var locationInputs = document.getElementsByClassName('location-input');

        // Loop through each element and initialize Google Places Autocomplete
        for (var i = 0; i < locationInputs.length; i++) {
            var autocomplete = new google.maps.places.Autocomplete(locationInputs[i]);
        }
        // Add an event listener to capture the selected location
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // Location details not found for this place.
                return;
            }

            // Access the selected location's details
            var locationName = place.name; // Name of the location
            var locationAddress = place.formatted_address; // Formatted address
            var locationLat = place.geometry.location.lat(); // Latitude
            var locationLng = place.geometry.location.lng(); // Longitude

            // // You can use these details as needed, e.g., display them on the page
            // console.log('Name: ' + locationName);
            // console.log('Address: ' + locationAddress);
            // console.log('Latitude: ' + locationLat);
            // console.log('Longitude: ' + locationLng);
        });
$("#apply_travellers").click(function(){
    console.log('clickerd')
    $(".btn-group").find(".dropdown-toggle").removeClass('show');
    $(".btn-group").find("ul.dropdown-menu").removeClass('show');
    $(".btn-group").find("ul.dropdown-menu").removeAttr('style');
})
        $(document).ready(function() {
            // Initialize counters
            var totalRooms = 1;
            var totalAdults = 1;
            var totalChildren = 0;

            // Function to update the display
            function updateDisplay() {

                var displayText =  totalRooms + ' Room ,';
                displayText += totalAdults + ' Adult';
                if (totalAdults > 1) {
                    displayText += 's';
                }
                if (totalChildren > 0) {
                    displayText += ' - ' + totalChildren + ' Child';
                    if (totalChildren > 1) {
                        displayText += 'ren';
                    }
                }

               // Update the input field with the display text
                $('#guests').val(displayText);
                $('#room_qty').val(totalRooms);
                $('#adult_qty').val(totalAdults);
                $('#child_qty').val(totalChildren);
            }

            // Plus and minus button handlers
            $('.button-plus').click(function() {
                var fieldName = $(this).data('field');
                switch (fieldName) {
                    case 'rooms':
                        if (totalRooms < 8) {
                            totalRooms++;
                        }
                        break;
                    case 'adults':
                        if (totalAdults < 10) {
                            totalAdults++;
                        }
                        break;
                    case 'children':
                        totalChildren++;
                        // Generate a new age div for the child

                        $('.traveller-age-main').append($('#children_age_html').html());
                        break;
                }
                updateDisplay();
            });

            $('.button-minus').click(function() {
                var fieldName = $(this).data('field');
                switch (fieldName) {
                    case 'rooms':
                        if (totalRooms > 1) {
                            totalRooms--;
                        }
                        break;
                    case 'adults':
                        if (totalAdults > 1) {
                            totalAdults--;
                        }
                        break;
                    case 'children':
                        if (totalChildren > 0) {
                            totalChildren--;
                            // Remove the age div for the last child
                            $('.traveller-age-main div:last-child').remove();
                        }
                        break;
                }
                updateDisplay();
            });

            // Initial display update
            updateDisplay();
        });


    $("#hotel_inquiry_form").validate({
        rules: {
            location: "required",
            check_in: "required",
            check_out: "required",
            budget: {
                required: true,
                number: true, // Should be a valid number
                max: 100000 // Maximum budget of 1 lakh
            }
        },
        messages: {
            location: "Please enter a location",
            check_in: "Please enter a check-in date",
            check_out: "Please enter a check-out date",
            budget: {
                required: "Please enter your budget",
                number: "Please enter a valid number",
                max: "Maximum budget allowed is 1 lakh"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    // Add custom validation for date fields (check_in and check_out)
    $.validator.addMethod("date", function (value, element) {
        return this.optional(element) || /^(19|20)\d\d-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/.test(value);
    }, "Please enter a valid date (YYYY-MM-DD)");

    $("#check_in, #check_out").rules("add", {
        date: true,
        messages: {
            date: "Please enter a valid date (YYYY-MM-DD)"
        }
    });


    $("#cab_inquiry_form").validate({
        rules: {
            from_location: "required",
            to_location: "required",
            departure: "required",
            return: "required",
            budget: {
                required: true,
                number: true,
                max: 100000 // Maximum budget of 1 lakh
            }
        },
        messages: {
            from_location: "Please enter the starting location",
            to_location: "Please enter the destination",
            departure: "Please enter the departure date",
            return: "Please enter the return date",
            budget: {
                required: "Please enter your budget",
                number: "Please enter a valid number",
                max: "Maximum budget allowed is 1 lakh"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    // Add custom validation for date fields (departure and return)
    $.validator.addMethod("date", function (value, element) {
        return this.optional(element) || /^(19|20)\d\d-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/.test(value);
    }, "Please enter a valid date (YYYY-MM-DD)");

    $("#departure, #return").rules("add", {
        date: true,
        messages: {
            date: "Please enter a valid date (YYYY-MM-DD)"
        }
    });


    </script>
@endpush
