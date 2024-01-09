<section class="product-detail-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12">
                    <div class="common-form-section cmn-bg-tab services-inquiry-wrap">
                        <h1>Services Inquiry</h1>
                        <form  method="POST" enctype="multipart/form-data" action="{{ route('StoreServiceInquiry') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Type of Service*</label>
                                        <select name="service_category_id" class="form-control">
                                            <option value="{{$services->id}}">{{$services->name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Service in Details*</label>
                                        <input type="text" name="service_product" class="form-control" readonly value="{{$services->ServiceProducts[0]->name}}">
                                        <input type="hidden" name="service_product_id" class="form-control" readonly value="{{$services->ServiceProducts[0]->id}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Service Period*</label>
                                        <select name="period" class="form-control">
                                            <option value="1 Time">1 Time</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Your Budget*</label>
                                        <input type="text" name="budget" class="form-control" value="{{ (checkDiscountService($services->ServiceProducts[0]))?$services->ServiceProducts[0]->offer_price:$services->ServiceProducts[0]->price }}">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Address (Street/Area)*</label>
                                        <textarea name="address" cols="30" rows="2" class="form-control" placeholder="201-203, Rang Royal Residency,">{{old('address')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">City/District/Town*</label>
                                        <select name="city" id="" class="form-control">
                                            <option value="Ahmedabad">Ahmedabad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">State*</label>
                                        <select name="state" id="" class="form-control">
                                            <option value="Gujarat">Gujarat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Postal Code*</label>
                                        <input type="number" name="pincode" value="{{old('pincode')}}" class="form-control" placeholder="380081" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==6) return false;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Contact Number*</label>
                                        <input type="number" name="mobile"  value="{{old('mobile')}}" class="form-control" placeholder="98980 98009" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;">
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox-wrap text-center">
                                <div class="form-group">
                                    <input type="radio" id="home" name="address_type" checked="" value="home">
                                    <label for="home">Home</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" id="work" name="address_type" value="office">
                                    <label for="work">Work</label>
                                </div>
                            </div>
                            <div class="text-center buttons-wrap">
                                <button type="submit" class="g-btn f-btn mb-0">Inquiry</button>
                                <a hred="{{route('home')}}" class="g-btn f-btn border-btn mb-0">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
